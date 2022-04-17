<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function check_tel($tel){
        $user = User::where('tel',$tel);
        $count = $user->count();
        if($count > 0){
            return 1;
        } else {
            return 2;
        }
    }

    public function register_process(Request $request)
    {
        $data = $request->validate([
            'tel' => ['required', 'string','unique:users,tel','min:10;'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create([
            'tel' => $data['tel'],
            'password' => bcrypt($data['password']),
        ]);

        if ($user) {
            auth('web')->login($user);
        }

        return 1;
    }

    public function login_process(Request $request)
    {
        $data = $request->validate([
            'tel' => ['required','string'],
            'password' => ['required']
        ]);

        if (auth('web')->attempt($data)) {
            return 1;
        } else {
            return 2;
        }
    }
}
