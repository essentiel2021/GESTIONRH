<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResetController extends Controller
{
    public function index(string $token){
        $password_reset = DB::table('password_resets')->where('token',$token)->first();
        abort_unless($password_reset, 403);
        $data = [
            	'title' => $description = 'Réinitialisation de mot de passe - '.config('app.name'),
            	'description'=>$description,
             	'password_reset'=>$password_reset,
        ];
        return view('auth.reset', $data);
    }
}
