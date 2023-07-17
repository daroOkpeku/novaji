<?php

namespace App\Http\Controllers;

use App\Events\signevnt;
use App\Http\Requests\signreq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
class AuthController extends Controller
{


    public function home(){

        return view('welcome');
    }

    public function encrypt($word){
        $info =  Crypt::encryptString($word);
        return response()->json(['success'=>$info]);
    }


    public function decryptdata(Request $request){
        $decrypted = Crypt::decryptString($request->word);
        return response()->json(['success'=>$decrypted]);
    }




    public function register(){
      return view('signup');
    }


    public function registerdata(signreq $request){

      $user =  User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
        ]);

        event(new signevnt($user->name, $user->emaill));
        return response()->json(["success"=>"Successfully registered"]);

    }
}
