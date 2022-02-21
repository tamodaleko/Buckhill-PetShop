<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check = User::where('is_admin', true)->count();

        if ($check) {
            return false;
        }
        
        return User::create([
            'first_name' => 'Admin',
            'last_name' => 'Account',
            'email' => 'admin@buckhill.co.uk',
            'password' => Hash::make('admin'),
            'address' => 'Testing 123',
            'phone_number' => '2223339889'
        ]);
    }
}
