<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

      Role::create(['name' => 'admin']);
      Role::create(['name' => 'encoder']);
      Role::create(['name' => 'verifier']);
      Role::create(['name' => 'viewer']);


      $first_user = new User();
      $first_user->email = 'bergoniawilliam@gmail.com';
      $first_user->password = Hash::make('password123');
      $first_user->rank_id = 16;
      $first_user->first_name = 'William';
      $first_user->middle_name = 'Dorado';
      $first_user->last_name = 'Bergonia';
      $first_user->qualifier = 'Jr';
      $first_user->station_id = 78;
      $first_user->unit_office_id = 3;
      $first_user->isActive = '1';
      $first_user->save();
      $first_user->assignRole('admin');


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
      $second_user->isActive = '1';
      $second_user->save();
      $second_user->assignRole('encoder');

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
      $third_user->isActive = '0';
      $third_user->save();
      $third_user->assignRole('verifier');

      $fourth_user = new User();
      $fourth_user->email = 'songohan@gmail.com';
      $fourth_user->password = Hash::make('password123');
      $fourth_user->rank_id = 10;
      $fourth_user->first_name = 'Son';
      $fourth_user->middle_name = 'Gohan';
      $fourth_user->last_name = 'Kame';
      $fourth_user->qualifier = 'Jr.';
      $fourth_user->station_id = 50;
      $fourth_user->unit_office_id = 4;
      $fourth_user->isActive = '0';
      $fourth_user->save();
      $fourth_user->assignRole('viewer');

      User::factory()
      ->count(50)
      ->create();
    }
}
