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
      $first_user = new User();
      $first_user->email = 'bergoniawilliam@gmail.com';
      $first_user->password = Hash::make('password123');
      $first_user->rank_id = 16;
      $first_user->first_name = 'William';
      $first_user->middle_name = 'Dorado';
      $first_user->last_name = 'Bergonia';
      $first_user->qualifier = 'Jr';
      $first_user->save();

      $second_user = new User();
      $second_user->email = 'johndoe@gmail.com';
      $second_user->password = Hash::make('password123');
      $second_user->rank_id = 10;
      $second_user->first_name = 'John';
      $second_user->middle_name = 'Dela Cruz';
      $second_user->last_name = 'Doe';
      $second_user->qualifier = '';
      $second_user->station_id = 78;
      $second_user->unit_office_id = 3;
      $second_user->save();

      $third_user = new User();
      $third_user->email = 'songoku@gmail.com';
      $third_user->password = Hash::make('password123');
      $third_user->rank_id = 10;
      $third_user->first_name = 'Son';
      $third_user->middle_name = 'Kakarot';
      $third_user->last_name = 'Goku';
      $third_user->qualifier = '';
      $third_user->station_id = 6;
      $third_user->unit_office_id = 6;
      $third_user->save();
    }
}
