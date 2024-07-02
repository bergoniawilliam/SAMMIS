<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersForm extends Component
{
    public $id;
    public $email;
    public $password;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $qualifier;
    public $success;
    

    protected $rules = [
        'email' => 'required|email|string',
        'password' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
    ];
   

    public function updateUser()
    {
        $this->validate();

        $user = User::find($this->id);
        $user->update([
            'email' => $this->email,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'qualifier' => $this->qualifier,
        ]);

        $this->success = 'User updated successfully!';
        
        // Reset form data (optional)
        $this->reset(['email', 'first_name', 'middle_name', 'last_name', 'qualifier']);
    }


    public function store()
    {
        $this->validate();

        User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'qualifier' => $this->qualifier,
        ]);

        $this->success = 'User created successfully!';
        $this->reset(['email', 'password', 'first_name', 'middle_name', 'last_name', 'qualifier']);
    }

    public function render()
    {
        return view('livewire.user.users-form')->extends('layouts.app');
    }

    public function clearSuccessMessage()
    {
        $this->success = null;
    }

}
