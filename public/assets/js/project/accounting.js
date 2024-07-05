let _token = $('meta[name="csrf-token"]').attr('content');
function deletePayment(id) {
    swal({
        title: "Diqqət",
        text: "Ödənişin silinməsinə əminsinizmi?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
            if (willDelete) {
                location.href = `/accounting/delete/${id}`;
            } else {
                swal("İmtina edildi!", {
                    icon: "success",
                });
            }
        });
}

function search(){
    document.getElementById('view').style.display = "block";
    document.getElementById('loading').style.display = "flex";
    document.getElementById('view-table').style.display = 'none';
    const type = document.getElementById('type').value;
    const startdate = document.getElementById('startdate').value ?? null;
    const endate = document.getElementById('enddate').value ?? null;
    $.ajax({
        type: "POST",
        url: "/accounting/filtr",
        data: {
            _token,
            type,
            startdate,
            endate,
        },
        success: async function (res) {
            console.log(res);
            if(res.data.length  > 0){
                let tableHead = `
                <tr>
                    <th style="width: 20%;">ID</th>
                    <th style="width: 10%;">Tipi</th>
                    <th style="width: 20%;">Başlıq</th>
                    <th style="width: 10%;">Ödəniş</th>
                    <th style="width: 20%;">Ödəniş Tarixi</th>
                    <th style="width: 20%;">Əlavə edilmə Tarixi</th>
                </tr>
            `;
                let tableBody = ``;

                for (let i = 0; i < res.data.length; i++ ){
                    tableBody += `
                    <tr>
                        <td>${res.data[i].id}</td>
                        <td>${res.data[i].type==="income" ? 'Mədaxil' : 'Məxaric'}</td>
                        <td>${res.data[i].title}</td>
                        <td>${res.data[i].amount} AZN</td>
                        <td>${res.data[i].payment_date}</td>
                        <td>${res.data[i].created_at}</td>
                    </tr>
                `
                }
                document.getElementsByTagName('thead')[0].innerHTML = tableHead
                document.getElementsByTagName('tbody')[0].innerHTML = tableBody
                document.getElementById('loading').style.cssText = 'display:none !important';
                document.getElementById('view-table').style.display = 'block';
            }else{

                document.getElementById('view-table').innerHTML = 'Axtarışa uyğun nəticə tapılmadı...';
                document.getElementById('loading').style.cssText = 'display:none !important';
                document.getElementById('view-table').style.display = 'block';
            }


        },
        error: function () {
            alert('Error... 5011');
        },
        beforeSend: function () {
            $('#loader').removeClass('display-none')
        },
        complete: function () {
            $('#loader').addClass('display-none');
        },
    })
}