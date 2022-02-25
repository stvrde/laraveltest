<?php

use Illuminate\Database\Seeder;
use App\mediaComment;

class MediaCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mc = new mediaComment();
        $mc->user_id = 4;
        $mc->media_id = 2;
        $mc->content = "komentar 1";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 2;
        $mc->media_id = 3;
        $mc->content = "Komentar 2";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 6;
        $mc->media_id = 1;
        $mc->content = "Komentar 3";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 7;
        $mc->media_id = 1;
        $mc->content = "Komentar 4";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 6;
        $mc->media_id = 3;
        $mc->content = "mediaComment 5";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 1;
        $mc->media_id = 4;
        $mc->content = "Komentar 6";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 5;
        $mc->media_id = 1;
        $mc->content = "Komentar 7";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 7;
        $mc->media_id = 1;
        $mc->content = "Komentar 8";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 4;
        $mc->media_id = 3;
        $mc->content = "Komentar 9";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 2;
        $mc->media_id = 2;
        $mc->content = "random";
        $mc->save();

        $mc = new mediaComment();
        $mc->user_id = 3;
        $mc->media_id = 3;
        $mc->content = "ggwp";
        $mc->save();
    }
}
