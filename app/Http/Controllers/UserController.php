<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

   public function index(){
       $users = User::all();

       return inertia('User/Index',[
           'users'=>$users->map(function($user){
               return [
                   'id'=>$user->id,
                   'fname'=>$user->first_name,
                   'lname'=>$user->last_name,
                   'email'=>$user->email,
                   'can'=>[
                       'viewany'=>Auth::user()->can('viewAny',$user)
                   ],
               ];

           }),
           'isAdmin'=>Gate::allows('isAdmin')
       ]);
   }

    public function edit(){
        return inertia('Profile/Edit');
    }
}
