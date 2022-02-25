<?php

use Illuminate\Database\Seeder;
use App\Media;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika1.jpg";
        $media->path = "/images/slika1.jpg";
        $media->user_id = 1;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika2.jpg";
        $media->path = "/images/slika2.jpg";
        $media->user_id = 3;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika3.jpg";
        $media->path = "/images/slika3.jpg";
        $media->user_id = 3;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika4.jpg";
        $media->path = "/images/slika4.jpg";
        $media->user_id = 2;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika1.jpg";
        $media->path = "/images/slika1.jpg";
        $media->user_id = 1;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika2.jpg";
        $media->path = "/images/slika2.jpg";
        $media->user_id = 3;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika3.jpg";
        $media->path = "/images/slika3.jpg";
        $media->user_id = 3;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika4.jpg";
        $media->path = "/images/slika4.jpg";
        $media->user_id = 2;
        $media->save();
        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika1.jpg";
        $media->path = "/images/slika1.jpg";
        $media->user_id = 1;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika2.jpg";
        $media->path = "/images/slika2.jpg";
        $media->user_id = 3;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika3.jpg";
        $media->path = "/images/slika3.jpg";
        $media->user_id = 3;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika4.jpg";
        $media->path = "/images/slika4.jpg";
        $media->user_id = 2;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika1.jpg";
        $media->path = "/images/slika1.jpg";
        $media->user_id = 1;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika2.jpg";
        $media->path = "/images/slika2.jpg";
        $media->user_id = 3;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika3.jpg";
        $media->path = "/images/slika3.jpg";
        $media->user_id = 3;
        $media->save();

        $media = new Media();
        $media->pathToThumb = "/images/rsz_slika4.jpg";
        $media->path = "/images/slika4.jpg";
        $media->user_id = 2;
        $media->save();
    }
}
