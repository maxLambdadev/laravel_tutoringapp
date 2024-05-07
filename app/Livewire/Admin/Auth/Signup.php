<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Administrator;
use Illuminate\Support\Facades\Hash;

class Signup extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
    }

    public function register()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:passwordConfirmation',
        ]);

        $password = Hash::make($this->password);
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $password,
            'role_id' => 4
        ]);

        // Log the user in
        auth()->login($user);
        
        $user = Administrator::create([
            'user_id' => $user->id,
            'admin_name' => $this->name,
            'admin_email' => $this->email,
            'admin_pass' => $password,
        ]);

        // Redirect to a route after registration
        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.admin.auth.signup');
    }
}