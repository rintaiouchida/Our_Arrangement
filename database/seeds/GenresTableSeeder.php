<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('genres')->insert([
            [
                'name'=>'ご飯もの'
            ],
            [
                'name'=>'麺類'
            ],
            [
                'name'=>'揚げ物'
            ],
            [
                'name'=>'スープ'
            ],
            [
                'name'=>'デザート'
            ],
        ]);
    }
}
