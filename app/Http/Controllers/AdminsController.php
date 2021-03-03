<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminsController extends Controller
{
    //

    public function index(){


        return view('admin.index');

    }
      public function show(User $admin){

        return view('admin.profile',['admin'=>$admin]);

    }
    public function update(User $admin){


        $inputs = request()->validate([

            'username'=> ['required', 'string', 'max:255','alpha_dash'],
            'name'=> ['required', 'string', 'max:255'],
            'email'=> ['required', 'email', 'max:255'],
            'avatar'=> ['file']

        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $admin->update($inputs);

        return back();
    }




}
