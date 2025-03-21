<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User;
        $user->name = 'Anibal';
        $user->lastname = 'Castro';
        $user->document = '123456788';
        $user->address = 'Cll 23 #24a';
        $user->phone = '234563456';
        $user->photo = '11111';
        $user->email = 'anibalcas@autonoma.com';
        $user->password = bcrypt('nasa');
        $user->role = 'Admin';
        $user->save();
    }
}
