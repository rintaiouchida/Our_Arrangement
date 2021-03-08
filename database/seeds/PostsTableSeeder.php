<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     

       
        DB::table('posts')->insert([
            ['name'=>'野獣先輩',
            'user_id'=>3,
            'genre_id'=>3,
            'material'=>'豆腐',
            'icon_picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/ktJGBUthH6GooHekRJoq0iq4PrbLfo9LHdiUvuvb.jpg',
            'arrange'.'_origin'=>'豆腐',
            'created_at'=>'1998-03-11',
            ],
            [
            'name'=>'ペヤングコロッケ',
            'user_id'=>2,
            'genre_id'=>3,
            'material'=>'・ペヤング
            ・油
            ・卵
            ・パン粉',
            'icon_picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/9uCMvUI81I1qAPR1iPZRyJRsGqkdN5AQihPCf0IC.png',
            'arrange'.'_origin'=>'ペヤング',
            'created_at'=>'1998-03-11',

            ],
        ]);
        
        
    }
}
// '{"title1": "カレー", "permission": "麻婆豆腐"}'