<?php

use Illuminate\Database\Seeder;
use App\Match;
class MatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $match=new Match();
        $match->location='spaladium';
        $match->start = now();
        $match->status='finished';
        $match->capacity='10';
        $match->score_home='1';
        $match->score_away='0';
        $match->save();

        $match=new Match();
        $match->location='poljud';
        $match->start = now();
        $match->status='finished';
        $match->capacity='12';
        $match->score_home='2';
        $match->score_away='1';
        $match->save();

        $match=new Match();
        $match->location='poljud';
        $match->start = now();
        $match->status='finished';
        $match->capacity='10';
        $match->score_home='2';
        $match->score_away='4';
        $match->save();

        $match=new Match();
        $match->location='spaladium';
        $match->start = now();
        $match->status='open';
        $match->capacity='12';
        $match->score_home='2';
        $match->score_away='3';
        $match->save();

        $match=new Match();
        $match->location='bene';
        $match->start = now();
        $match->status='open';
        $match->capacity='10';
        $match->score_home='2';
        $match->score_away='2';
        $match->save();

        $match=new Match();
        $match->location='gusar';
        $match->start = now();
        $match->status='open';
        $match->capacity='10';
        $match->score_home='0';
        $match->score_away='0';
        $match->save();

    }
}
