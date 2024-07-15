<?php

namespace App\Livewire\Users;
use App\Models\UnitOffice;
use App\Models\RefRank;
use App\Models\Station;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class UsersDelete extends Component
{
    public $user;
    public $id;
    public $email = "";
    public $first_name = "";
    public $middle_name = "";
    public $last_name = "";
    public $qualifier = "";
    public $update_mode = false;
    public $unit_offices;
    public $ranks;
    public $stations;
    public $selected_unit_office_id=null;
    public $selected_station_name="";
    public $selected_rank_id=null;
    public $selected_station="All";

    public function render()
    {
        $this->ranks = RefRank::all();
        $this->unit_offices = UnitOffice::all();
        $this->users = User::all();
        return view('livewire.users.users-delete')
            ->extends('layouts.app')
            ->section('content');
          
            
    }
     public function mount($id){
         $this->user = User::find($id);
        if($this->user){
            $this->email = $this->user->email;
            $this->first_name = $this->user->first_name;
            $this->middle_name = $this->user->middle_name;
            $this->last_name = $this->user->last_name;
            $this->qualifier = $this->user->qualifier;
        }

     }
    public function destroy()
    {
       $this->user->delete();
       session()->flash('success', 'User deleted successfully.');
       return redirect('users');
    }   
}
