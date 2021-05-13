<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Contracts\Hashing\Hasher;
use App\Models\User;

class UserSeeder extends Seeder
{
    const ADMIN_MAIL = 'mogurbon@hotmail.com';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hasher = app(Hasher::class);
        $user = new User();
        $user->name = "Gerardo Aquino";
        $user->email = self::ADMIN_MAIL;
        $user->password = $hasher->make('admin');
        $user->save();
    }
}
