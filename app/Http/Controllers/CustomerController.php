<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{   
    function customer(){
        
        return view('pages.dashboard.customer-page');
    }
    
    function getCustomer(Request $request){

        $userId=$request->header('id');
       return Customer::where('user_id',$userId)->get();

    }

    function createCustomer(Request $request){
        $userId=$request->header('id');
       return Customer::where('user_id',$userId)->create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),
            'address'=>$request->input('address'),
            'user_id'=>$userId,
        ]);
    }

    function updateCustomer(Request $request){
       
        $id=$request->input('id');
        $userId=$request->header('id');
       return Customer::where('id',$id)->where('user_id',$userId)->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'mobile'=>$request->input('mobile'),          
        ]);
    }

    function getCustomerId(Request $request){

        $id=$request->input('id');
        $userId=$request->header('id');
        return Customer::where('id',$id)->where('user_id',$userId)->first();
    }
    function deleteCustomer(Request $request){

        $id=$request->input('id');
        $userId=$request->header('id');
        return Customer::where('id',$id)->where('user_id',$userId)->delete();
    }
}
