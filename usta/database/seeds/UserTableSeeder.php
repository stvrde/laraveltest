<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'pero';
        $user->email = 'pero';
        $user->password = bcrypt('pass');
        $user->mmr = '93';
        $user->age= '1990';
        $user->isAdmin = 1;
        $user->save();
        $user->match()->attach(2, [
            'goals' => 4,
            'assists' => 1,
            'saves' => 1,
            'team' => 'home'
        ]);
        $user->match()->attach(3, [
            'goals' => 1,
            'assists' => 1,
            'saves' => 1,
            'team' => 'away'
        ]);
        $user->match()->attach(4, [
            'goals' => 1,
            'assists' => 1,
            'saves' => 1,
            'team' => 'home'
        ]);
        $user->match()->attach(5, [
            'goals' => 0,
            'assists' => 1,
            'saves' => 1,
            'team' => 'away'
        ]);

        $user = new User();
        $user->name = 'ivan';
        $user->email = 'ivan';
        $user->password = bcrypt('pass');
        $user->mmr = '98';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(1, [
            'goals' => 0,
            'assists' => 3,
            'saves' => 5,
            'team' => 'home'
        ]);
        $user->match()->attach(4, [
            'goals' => 4,
            'assists' => 5,
            'saves' => 4,
            'team' => 'away'
        ]);
        $user->match()->attach(5, [
            'goals' => 1,
            'assists' => 4,
            'saves' => 3,
            'team' => 'away'
        ]);

        $user = new User();
        $user->name = 'mate';
        $user->email = 'mate';
        $user->password = bcrypt('pass');
        $user->mmr = '90';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(1, [
            'goals' => 1,
            'assists' => 1,
            'saves' => 1,
            'team' => 'away'
        ]);
        $user->match()->attach(2, [
            'goals' => 1,
            'assists' => 1,
            'saves' => 1,
            'team' => 'home'
        ]);
        $user->match()->attach(3, [
            'goals' => 1,
            'assists' => 1,
            'saves' => 1,
            'team' => 'away'
        ]);
        $user->match()->attach(4, [
            'goals' => 1,
            'assists' => 1,
            'saves' => 1,
            'team' => 'home'
        ]);
        $user->match()->attach(5, [
            'goals' => 1,
            'assists' => 1,
            'saves' => 1,
            'team' => 'home'
        ]);

        $user = new User();
        $user->name = 'duje';
        $user->email = 'duje';
        $user->password = bcrypt('pass');
        $user->mmr = '92';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(1, [
            'goals' => 6,
            'assists' => 6,
            'saves' => 6,
            'team' => 'away'
        ]);
        $user->match()->attach(5, [
            'goals' => 6,
            'assists' => 6,
            'saves' => 6,
            'team' => 'away'
        ]);

        $user = new User();
        $user->name = 'ante';
        $user->email = 'ante';
        $user->password = bcrypt('pass');
        $user->mmr = '78';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(1, [
            'goals' => 5,
            'assists' => 3,
            'saves' => 0,
            'team' => 'home'
        ]);
        $user->match()->attach(2, [
            'goals' => 4,
            'assists' => 4,
            'saves' => 2,
            'team' => 'home'
        ]);
        $user->match()->attach(3, [
            'goals' => 1,
            'assists' => 3,
            'saves' => 0,
            'team' => 'away'
        ]);
        $user->match()->attach(4, [
            'goals' => 4,
            'assists' => 2,
            'saves' => 2,
            'team' => 'away'
        ]);
        $user->match()->attach(5, [
            'goals' => 0,
            'assists' => 0,
            'saves' => 0,
            'team' => 'away'
        ]);

        $user = new User();
        $user->name = 'josko';
        $user->email = 'josko';
        $user->password = bcrypt('pass');
        $user->mmr = '121';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(4, [
            'goals' => 4,
            'assists' => 1,
            'saves' => 1,
            'team' => 'away'
        ]);
        $user->match()->attach(5, [
            'goals' => 0,
            'assists' => 0,
            'saves' => 0,
            'team' => 'home'
        ]);

        $user = new User();
        $user->name = 'toni';
        $user->email = 'toni';
        $user->password = bcrypt('pass');
        $user->mmr = '87';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(1, [
            'goals' => 3,
            'assists' => 3,
            'saves' => 0,
            'team' => 'home'
        ]);
        $user->match()->attach(2, [
            'goals' => 3,
            'assists' => 3,
            'saves' => 2,
            'team' => 'away'
        ]);
        $user->match()->attach(3, [
            'goals' => 1,
            'assists' => 3,
            'saves' => 0,
            'team' => 'away'
        ]);
        $user->match()->attach(4, [
            'goals' => 4,
            'assists' => 2,
            'saves' => 2,
            'team' => 'home'
        ]);
        $user->match()->attach(5, [
            'goals' => 0,
            'assists' => 0,
            'saves' => 0,
            'team' => 'away'
        ]);

        $user = new User();
        $user->name = 'ljubo';
        $user->email = 'ljubo';
        $user->password = bcrypt('pass');
        $user->mmr = '90';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(1, [
            'goals' => 5,
            'assists' => 3,
            'saves' => 0,
            'team' => 'home'
        ]);
        $user->match()->attach(2, [
            'goals' => 4,
            'assists' => 4,
            'saves' => 2,
            'team' => 'home'
        ]);
        $user->match()->attach(3, [
            'goals' => 1,
            'assists' => 3,
            'saves' => 0,
            'team' => 'away'
        ]);
        $user->match()->attach(4, [
            'goals' => 4,
            'assists' => 2,
            'saves' => 2,
            'team' => 'away'
        ]);
        $user->match()->attach(5, [
            'goals' => 0,
            'assists' => 0,
            'saves' => 0,
            'team' => 'away'
        ]);



        $user = new User();
        $user->name = 'jon';
        $user->email = 'jon';
        $user->password = bcrypt('pass');
        $user->mmr = '110';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(3, [
            'goals' => 1,
            'assists' => 3,
            'saves' => 0,
            'team' => 'home'
        ]);
        $user->match()->attach(4, [
            'goals' => 1,
            'assists' => 2,
            'saves' => 2,
            'team' => 'away'
        ]);
        $user->match()->attach(5, [
            'goals' => 2,
            'assists' => 0,
            'saves' => 0,
            'team' => 'away'
        ]);

        $user = new User();
        $user->name = 'ronaldo';
        $user->email = 'ronaldo';
        $user->password = bcrypt('pass');
        $user->mmr = '130';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(1, [
            'goals' => 2,
            'assists' => 3,
            'saves' => 3,
            'team' => 'home'
        ]);
        $user->match()->attach(2, [
            'goals' => 1,
            'assists' => 2,
            'saves' => 2,
            'team' => 'home'
        ]);
        $user->match()->attach(5, [
            'goals' => 0,
            'assists' => 3,
            'saves' => 4,
            'team' => 'away'
        ]);

        $user = new User();
        $user->name = 'messi';
        $user->email = 'messi';
        $user->password = bcrypt('pass');
        $user->mmr = '70';
        $user->age= '1990';
        $user->isAdmin = 0;
        $user->save();
        $user->match()->attach(1, [
            'goals' => 2,
            'assists' => 3,
            'saves' => 3,
            'team' => 'away'
        ]);
        $user->match()->attach(2, [
            'goals' => 2,
            'assists' => 2,
            'saves' => 4,
            'team' => 'home'
        ]);
        $user->match()->attach(3, [
            'goals' => 1,
            'assists' => 3,
            'saves' => 3,
            'team' => 'away'
        ]);
        $user->match()->attach(4, [
            'goals' => 4,
            'assists' => 2,
            'saves' => 1,
            'team' => 'away'
        ]);
        $user->match()->attach(5, [
            'goals' => 0,
            'assists' => 0,
            'saves' => 0,
            'team' => 'home'
        ]);
    }
}
