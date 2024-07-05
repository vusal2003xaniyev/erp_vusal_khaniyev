<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class helperController extends Controller
{
    public static function getCompanyTypeName($id){
        $companyTypes = DB::table('company_types')
            ->where('id',$id)
        ->first();
        return $companyTypes ? $companyTypes->name : "--";
    }
    public static function getTaxTypeName($id){
        $taxTypes = DB::table('tax_type')
            ->where('id',$id)
            ->first();
        return $taxTypes ? $taxTypes->name : "--";
    }
    public static function getJobTitle($id){
        $jobTitle = DB::table('job_title')
            ->where('id',$id)
            ->first();
        return $jobTitle ? $jobTitle->title : "--";
    }

    public static function getCustomerType($type){
       switch ($type){
           case 'standard':
               return '<span class="badge bg-info">Standart</span>';
           case 'VIP':
               return '<span class="badge bg-success">VIP</span>';
           case 'unwanted':
               return '<span class="badge bg-danger">Arzuolunmaz</span>';
       }
    }
    public static function paymentType($type){
        switch ($type){
            case 'income':
                return '<span class="badge bg-success">Mədaxil</span>';
            case 'expense':
                return '<span class="badge bg-danger">Məxaric</span>';
        }
    }
    public static function customerName($customer_id){

        $customerName = DB::table('customers')
            ->where('id',$customer_id)
            ->first();
        return $customerName ? $customerName->fullname : "--";
    }

    public static function getTaskCategoryName($category_id){
        $categoryName = DB::table('task_categories')
            ->where('id',$category_id)
            ->first();
        return $categoryName ? $categoryName->title : "--";
    }
    public static function getTaskProjectName($project_id){
        $projectName = DB::table('projects')
            ->where('id',$project_id)
            ->first();
        return $projectName ? $projectName->title : "Ümumi";
    }
    public static function getTaskUserImage($user_id){
        $user = DB::table('users')
            ->where('id',$user_id)
            ->first();
        return $user && $user->image != null ? asset($user->image) : asset("assets/images/user.png");
    }
    public static function getTaskUserName($user_id){
        $user = DB::table('users')
            ->where('id',$user_id)
            ->first();
        return $user ? $user->name : "--";
    }

    public static function getTaskUserPosition($user_id){
        $user = DB::table('users')
            ->where('id',$user_id)
            ->first();
        return $user ? $user->position : "--";
    }

    public static function getTaskFiles($id){

        return File::allFiles("uploads/files/".$id);

    }

    public static function checkFile($id){
        $fileCheck = DB::table('task_files')->where([
            'task_id'=>$id
        ])->first();
        return $fileCheck ?? null;
    }
}