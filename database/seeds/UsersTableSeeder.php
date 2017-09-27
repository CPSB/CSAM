<?php

use ActivismeBE\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory = factory(User::class)->create();
        $user = ['name' => $factory->name, 'email' => $factory->email, 'password' => bcrypt('secret')];

        $table = DB::table('users');
        $table->delete();
        $table->insert($user);

        $this->command->info('De gebruiker is aangemaakt');
        $this->command->info('Email: ' . $factory->email);
        $this->command->info('Wachtwoord: Secret');
    }
}
