<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(User $user){
        return view('profile',compact('user'));
    }

    public function edit(User $user){
        //$this->authorize('edit',$user);
        return view('edit_profile',compact('user'));
    }

    public function update(User $user){

        $attributes = request()->validate([
            'username' => ['string','required','max:255',Rule::unique('users')->ignore($user)],
            'name' => ['string','required','max:255'],
            'email' => ['string','required','email','max:255',Rule::unique('users')->ignore($user)],
            'password' => ['string','required','min:8','max:255','confirmed'],
            'avatar' => ['file']
        ]);

        if(request('avatar')){
            $attributes['avatar'] = 'storage/'.request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect($user->path());
    }

}
