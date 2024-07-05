<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

use function PHPUnit\Framework\fileExists;

class productsController extends Controller
{
    public function productsView()
    { // Products List View
        $products = DB::table('products')->get();
        $users = DB::table('users')->get();
        $categories = DB::table('categories')->where('status', '1')->get();

        View::share([
            'products' => $products,
            'categories' => $categories,
            'users' => $users,

        ]);
        return view('products.product_list');
    }
    public function productsAddPost(Request $request)
    { //Products Add
        $validated = $request->validate([
            'title' => 'required|max:500',
            'price' => 'required|max:500',
            'image' => 'required|mimes:jpg,jpeg,png',
            'stock' => 'required',
            'description' => 'required',
        ]);
        $image = $request->file('image');
        $image_name = STR::slug($request->title) . "-" . rand(1000000, 9999999) . "." . $image->getClientOriginalExtension();
        $directory = "uploads/products/";
        $image->move($directory, $image_name);
        $add = DB::table('products')->insert([
            'user_id' => $request->user,
            'category_id' => $request->category,
            'title' => $request->title,
            'image' => $directory . $image_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with($add ? 'addSuccess' : 'error', true);
    }
    public function productsDelete($id)
    { // Products Delete
        $product = DB::table('products')->where('id', $id)->first();

        if ($product) {
            if (file_exists($product->image)) {
                unlink($product->image);
            }
            $delete = DB::table('products')->where('id', $id)->delete();
            return redirect()->back()->with($delete ? 'deleteSuccess' : 'error', true);
        }
        return redirect()->back()->with('error', true);
    }
    public function productsEditView(Request $request)
    { // Products Edit Ajax
        $data = DB::table('products')->where('id', $request->id)->first();

        return response()->json([
            'data' => $data,
            'status' => $data ? true : false,
        ]);
    }
    public function productsEditPost(Request $request)
    { //Products Add
        $validated = $request->validate([
            'title' => 'required|max:500',
            'price' => 'required|max:500',
            'image' => 'mimes:jpg,jpeg,png',
            'stock' => 'required',
            'description' => 'required',
        ]);

        $image_name=$request->old_image;
        if ($request->hasFile('image')) {
            if(fileExists($request->old_image)){
                unlink($request->old_image);
            }
            $image = $request->file('image');
            $image_name = STR::slug($request->title) . "-" . rand(1000000, 9999999) . "." . $image->getClientOriginalExtension();
            $directory = "uploads/products/";
            $image->move($directory, $image_name);
            $image_name=$directory.$image_name;
        }

        $edit = DB::table('products')->where('id',$request->id)->update([
            'user_id' => $request->user,
            'category_id' => $request->category,
            'title' => $request->title,
            'status' => $request->status,
            'image' => $image_name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'updated_at' => now(),
        ]);
        return redirect()->back()->with($edit ? 'editSuccess' : 'error', true);
    }




    public function categoriesView()
    { // Categories List View
        $categories = DB::table('categories')->get();
        View::share([
            'categories' => $categories
        ]);
        return view('products.category_list');
    }
    public function categoriesAddPost(Request $request)
    { //Categories Add
        $validated = $request->validate([
            'title' => 'required|max:500',
        ]);
        $add = DB::table('categories')->insert([
            'title' => $request->title,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->back()->with($add ? 'addSuccess' : 'error', true);
    }
    public function categoriesDelete($id)
    { // Categories Delete
        $delete = DB::table('categories')->where('id', $id)->delete();

        return redirect()->back()->with($delete ? 'deleteSuccess' : 'error', true);
    }
    public function categoriesEditView(Request $request)
    { // Categories Edit Ajax
        $data = DB::table('categories')->where('id', $request->id)->first();

        return response()->json([
            'data' => $data,
            'status' => $data ? true : false,
        ]);
    }
    public function categoriesEditPost(Request $request)
    { //Categories Add
        $validated = $request->validate([
            'title' => 'required|max:500',
        ]);
        $edit = DB::table('categories')->where('id', $request->id)->update([
            'title' => $request->title,
            'status' => $request->status,
            'updated_at' => now(),
        ]);
        return redirect()->back()->with($edit ? 'editSuccess' : 'error', true);
    }


















    //static functions

    static public function getStatusCheck($status)
    {
        switch ($status) {
            case '0':
                return "<span class='badge bg-danger bg-opacity-10 text-danger'>Passiv</span>";
                break;
            case '1':
                return "<span class='badge bg-success bg-opacity-10 text-success'>Aktiv</span>";
                break;
        }
    }
    static public function getUserCheck($user_id, $column)
    {
        $user = DB::table('users')->where('id', $user_id)->first();
        return $user ? ucfirst($user->$column) : '---';
    }
    static public function getCategoryCheck($category_id, $column)
    {
        $category = DB::table('categories')->where('id', $category_id)->first();
        return $category ? ucfirst($category->$column) : '---';
    }
}
