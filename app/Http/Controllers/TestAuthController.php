<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TestAuthController extends Controller
{
    public function test()
    {
        $data = [];        

        $user = User::find(1);
        
        $data['resp'] = $user;
        
        return view("test.page",$data);
    }
}
