<?php namespace App\Http\Controllers\UserHandler;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use \App\Models\User;
use Validator;
use Auth;
class UserController extends Controller {
	

    public function getUserDetails(){
            
            if(Auth::check()){
                $user = Auth::user();
                
                return response($user,200);    
            }
            return response('Unauthorized',401);
            
    }   
    
    public function setUserDetails(Request $request){
            
            if(Auth::check()){
                $user = Auth::user();
                $user->name = $request->input('name');
                $user->country = $request->input('country');
                $user->city = $request->input('city');
                $user->country = 'Magyarország';
                $user->zipcode = $request->input('zipcode');
                $user->address = $request->input('address');
                $user->phone = $request->input('phone');
                $user->save();  
                
                return response('success',200);
                
            }
            return response('Unauthorized',401);
            
    }
    
    public function setPassword(Request $request){
            
            if(Auth::check()){
                $user = Auth::user();
                
                return response('success',200);
                
            }
            return response('Unauthorized',401);
            
    }   
    
    public function isAuthenticated(){      
        return response(json_encode( Auth::check() ), 200);
    }

}