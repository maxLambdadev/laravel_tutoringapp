<?php

namespace App\Livewire\Tutor\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Signin extends Component
{
    public $email = '';
    public $password = '';

    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials) && Auth::user()->role->name == 'tutor') {            

            session()->regenerate();

            // Redirect to a route after login
            return redirect()->to('/');
        }

        $this->addError('email', trans('auth.failed'));
    }

    public function render()
    {
        return view('livewire.tutor.auth.signin');
    }
}