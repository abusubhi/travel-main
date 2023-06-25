<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class UsersAdminSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email','user@email.com')->first();

        if(!$user) {
            $user = User::create([
                'first_name' => "mohammed subhi",
                'email' => 'abusubhi51@gmail.com',
                'phone' => '0796106546',
                'password' => Hash::make("123456")
            ]);
        }

        $user->assignRole('admin');
    }
}
