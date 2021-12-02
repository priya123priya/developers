<?php

namespace App\Http\Controllers;
use Hash;
use  App\Models\Developer;
use Illuminate\Http\Request;



class DeveloperController extends Controller
{
    public function register(Request $request)
    {
        
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $file = $request->file('avatar');
        $avator = '/avatars/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $avator);

           
            $user = new Developer([
                "first_name" => $request->get('first_name'),
                "last_name" => $request->get('last_name'),
                "phone" => $request->get('phone'),
                "email" => $request->get('email'),
                "address" => $request->get('address'),
                "password" => $request->get('password'),
                "avatar" => $avator
            ]);
            $user->save(); 
            return "success";
        

      

    }
    
    public function login(request $request){

        $email = $request -> email;
        $password = $request -> password;
       
        $user = Developer::where('email', '=', $email)->first();   
        if($user != null)  {

          if(Hash::check($password, $user->password)) {   
       
             return 'true';
       
           } else {
               return 'false';
           }
        } 
        else {
            return 'false';
        }
       
       }
    
    

    public function listDeveloper(){
       
       return $users = Developer::all();
       
    }
    public function deleteDeveloper(Request $request){
        try {
            $id = $request->ids;
            $ids = explode(",", $id);
            
            Developer::destroy($ids);
        }
        catch(Exception  $e) {
            return $e->getMessage();
        }

        return response()->json(['success'=>"User Deleted successfully."]);
    }
    
    
    public function updateDeveloper(Request $request,$id){
        try {
        $user = Developer::find($id);
        $user->first_name = $request -> first_name;
        $user->last_name = $request -> last_name;
        $user->phone = $request -> phone;
        $user->email = $request -> email;
        $user->address = $request -> address;
        $user->password = $request -> password;
        
        $file = $request->file('avatar');
        if($file != null ){
        $avatar = '/avatars/' . uniqid() . '.' . $file->extension();
        $file->storePubliclyAs('public', $avatar);
        $user->avatar = $avatar;
        }

        $user->update();
        }
        catch(Exception  $e) {
            return $e->getMessage();
        }
        return response()->json(['success'=>"User updated successfully."]);
    }

}
