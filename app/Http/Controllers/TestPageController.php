<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class TestPageController extends Controller
{
    public static function connection()
    {
        $data = [];
        $data['resp'] = DB::connection('mysql')->table('account_master')->find("2");

        return view("test.page",$data);
    }
    public static function general()
    {
        $data = [];
        $data['resp'] = User::find(2)->person_id;

        return view("test.page",$data);
    }
    public static function validator(Request $request)
    {
        $data = [];        

        $user = User::find(1);
        $user->auth_key = "0";

        $validatedData = $request->validate([
            'auth_key' => 'required|min:4'
        ]);

        $data['resp'] = $request->auth_key;
        
        return view("test.page",$data);
    }
    public static function model_error(Request $request)
    {
        $data = [];        

        $user = User::findOrFail($request->id);
        dd("asd");
        $data['resp'] = $user;
        
        return view("test.page",$data);
    }
}