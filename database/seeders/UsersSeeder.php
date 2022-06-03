<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name'     => 'Gabriel',
            'email'    => 'admin@user.com',
            'password' => \Hash::make('12345678'),
            'admin'    => true
        ]);

        $team = Team::factory()->hasAttached($user, ['role' => 'admin'])->create([
            'user_id' => $user
        ]);

        $user->switchTeam($team);
    }
}
