<?php

namespace App\Livewire\User;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UsersModals extends Component
{

    public $id;
    public $email;
    public $password;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $qualifier;
    public $success;
    public function render()
    {
        return view('livewire.user.users-modals')->extends('layouts.app');
    }

    protected $listeners = [
        'populateForm' => 'handlePopulateForm',
    ];

     public function handlePopulateForm($id)
    {
        $user = User::find($id);
        // $this->user_data = $user;
   
            $this->userid = $user->id;
            $this->updateMode = true;
            $this->email = $user->email;
            // $this->lastname = $user->lastname;
            // $this->firstname = $user->firstname;
            // $this->middlename = $user->middlename;
            // $this->qualifier = $user->qualifier;
            // $this->rank = $user->rank;
            // $this->role_id = $user->roles->pluck('id')[0];
    
    }
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

     protected $rules = [
        'email' => 'required|email|string',
        'password' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
    ];
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

    public function clearSuccessMessage()
    {
        $this->success = null;
    }
}
