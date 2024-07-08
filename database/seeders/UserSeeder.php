<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $user = new User();
        $user->email = 'bergoniawilliam@gmail.com';
        $user->password = Hash::make('password123');
        $user->rank = '16';
        $user->first_name = 'William';
        $user->middle_name = 'Dorado';
        $user->last_name = 'Bergonia';
        $user->qualifier = 'Jr';
        $user->save();
    }
}
