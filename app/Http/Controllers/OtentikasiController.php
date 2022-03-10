<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class OtentikasiController extends Controller
{
    public function index(){
        return view('authentication/login');
    }

    public function login(Request $request){

        // $data = User::where('email' ,$request->email)->firstOrFail();
        // if ($data){
        //     if(Hash::check($request->password,$data->password)){
        //         Session(['berhasil_login'=>true]);
        //         return redirect('/dashboard');
        //     }
        // }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/dashboard');
        }
        return redirect('/')->with('message','email atau password salah');
    }

    public function logout(Request $request){

        // $request->Session()->flush();
        // Auth::logout();
        // return redirect('/');

    }
}
