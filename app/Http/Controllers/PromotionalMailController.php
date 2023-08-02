<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Mail\PromotionalMail;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Support\Facades\Mail;

class PromotionalMailController extends Controller
{


    function promotion(){
        
        return view('pages.dashboard.promotion-page');
    }
    function promotionalMail(Request $request){

        $userId=$request->header('id');
        $sub=$request->input('sub');
        $message=$request->input('message');
        $customers= Customer::where('user_id',$userId)->select('email')->get();
      
        
            try{
                
            foreach ( $customers as $customer ) {
                Mail::to( $customer->email )->send( new PromotionalMail( $sub,$message) );
            }
            return response()->json( ['status' => 'success', 'message' => 'message send successfully'], 200 );

            }catch(Exception $e){

                return response()->json([
                    'status'=>"failed",
                    'message'=>"Something wrong"
                ],401);
            }
       
       
    }
}
