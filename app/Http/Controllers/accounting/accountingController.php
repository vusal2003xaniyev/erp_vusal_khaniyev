<?php

namespace App\Http\Controllers\accounting;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class accountingController extends Controller
{
    public function all(){
        $data = DB::table('accounting')
            ->orderBy('payment_date','DESC')
            ->get();
        return view('accounting.all',compact('data'));
    }
    public function addView(){
        return view('accounting.add');
    }
    public function addPost(Request $request){
        $request->validate([
            'title' => 'required|max:50',
            'amount' => 'required|max:50',
            'payment_date' => 'required',
            'type' => 'required',
        ]);

        $add = DB::table('accounting')->insert([
            'title' => $request->title,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'type' => $request->type,
            'note' => $request->note,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        return redirect()->back()->with($add ? 'success' : 'error',true);
    }

    public function viewPayment($id,$page = "view"){
        $data = DB::table('accounting')->where('id',$id)->first();
        if(!$data) return redirect()->back();
        return view($page == "view" ? 'accounting.view': 'accounting.edit',compact('data'));
    }

    public function deletePayment($id){
        return redirect()->route('accountingAll')->with(DB::table('accounting')->where('id',$id)->delete() ? 'deleteSuccess' : 'error',true);
    }

    public function editPost(Request $request,$id,$page){
        $request->validate([
            'title' => 'required|max:50',
            'amount' => 'required|max:50',
            'payment_date' => 'required',
            'type' => 'required',
        ]);

        $edit = DB::table('accounting')
            ->where('id',$id)
            ->update([
            'title' => $request->title,
            'amount' => $request->amount,
            'payment_date' => $request->payment_date,
            'type' => $request->type,
            'note' => $request->note,
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
        return redirect()->back()->with($edit ? 'success' : 'error',true);
    }

    public function incomePage(){
        $data = DB::table('accounting')
            ->where('type','income')
            ->orderBy('payment_date','DESC')
            ->get();
        return view('accounting.income',compact('data'));
    }
    public function expensePage(){
        $data = DB::table('accounting')
            ->where('type','expense')
            ->orderBy('payment_date','DESC')
            ->get();
        return view('accounting.expense',compact('data'));
    }


    public function filtrView(){
        return view('accounting.filtr');
    }

    public function search(Request $request){
        $returnData = null;
        if(!$request->startdate && !$request->enddate){
            if($request->type==0){
                $returnData = DB::table('accounting')
                    ->orderBy('payment_date','DESC')
                    ->get();
            }elseif($request->type==1){
                $returnData = DB::table('accounting')
                    ->where('type','income')
                    ->orderBy('payment_date','DESC')
                    ->get();
            }else{
                $returnData = DB::table('accounting')
                    ->where('type','expense')
                    ->orderBy('payment_date','DESC')
                    ->get();
            }
        }else{
            if($request->type==0){
                $returnData = DB::table('accounting')
                    ->orderBy('payment_date','DESC')
                    ->whereBetween('payment_date', [Carbon::parse($request->startdate)->format('Y-m-d'), Carbon::parse($request->enddate)->format('Y-m-d')])
                    ->get();
            }elseif($request->type==1){
                $returnData = DB::table('accounting')
                    ->where('type','income')
                    ->whereBetween('payment_date', [Carbon::parse($request->startdate)->format('Y-m-d'), Carbon::parse($request->enddate)->format('Y-m-d')])
                    ->orderBy('payment_date','DESC')
                    ->get();
            }else{
                $returnData = DB::table('accounting')
                    ->where('type','expense')
                    ->whereBetween('payment_date', [Carbon::parse($request->startdate)->format('Y-m-d'), Carbon::parse($request->enddate)->format('Y-m-d')])
                    ->orderBy('payment_date','DESC')
                    ->get();
            }
        }

        return response()->json([
            'data' => $returnData
        ]);
    }
}