<?php

use Illuminate\Database\Seeder;
use App\matchComment;

class MatchCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mc = new matchComment();
        $mc->user_id = 4;
        $mc->match_id = 2;
        $mc->content = "asd asd asd asd ";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 2;
        $mc->match_id = 3;
        $mc->content = "Komentar 2";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 6;
        $mc->match_id = 1;
        $mc->content = "Komentar 3";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 7;
        $mc->match_id = 1;
        $mc->content = "Komentar 4";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 6;
        $mc->match_id = 3;
        $mc->content = "Komentar 5";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 1;
        $mc->match_id = 4;
        $mc->content = "Komentar 6";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 5;
        $mc->match_id = 1;
        $mc->content = "Komentar 7";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 7;
        $mc->match_id = 1;
        $mc->content = "Komentar 8";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 4;
        $mc->match_id = 3;
        $mc->content = "Komentar 9";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 2;
        $mc->match_id = 2;
        $mc->content = "klasndkl lnaklsdnklna";
        $mc->save();

        $mc = new matchComment();
        $mc->user_id = 3;
        $mc->match_id = 3;
        $mc->content = "text";
        $mc->save();
    }
}
