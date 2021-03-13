<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name'=>'内田林太郎',
                'email'=>'v795b3eed7qzaE05SE@softbank.ne.jp',
                'password'=>Hash::make('5XZ8LvJU'),
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/W5oP6DzzhDUUQPBpyij1pByJQ2XX3fC1iANrrzVX.jpg',
                'birthday'=>'1998-03-11'
            ],
            [
                'name'=>'ウチダ林太郎',
                'email'=>'v810b3eed7qzaE05SE@softbank.ne.jp',
                'password'=>Hash::make('5XZ8LvJU'),
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/ktJGBUthH6GooHekRJoq0iq4PrbLfo9LHdiUvuvb.jpg',
                'birthday'=>'1998-03-11'
            ],
            [
                'name'=>'ウチダリンタ郎',
                'email'=>'v79b3eed7qzaE05SE@softbank.ne.jp',
                'password'=>Hash::make('5XZ8LvJU'),
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/ysaNymxYeCloZXpBAKVM1UIlhZC5ts6rP07dKGWJ.jpg',
                'birthday'=>'2007-03-11'
                
            ],
            [
                'name'=>'山田太郎',
                'email'=>'v001b3eed7qzaE05SE@softbank.ne.jp',
                'password'=>Hash::make('5XZ8LvJU'),
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/ysaNymxYeCloZXpBAKVM1UIlhZC5ts6rP07dKGWJ.jpg',
                'birthday'=>'1980-03-11'
            ],
            [
                'name'=>'鈴木一郎',
                'email'=>'v002b3eed7qzaE05SE@softbank.ne.jp',
                'password'=>Hash::make('5XZ8LvJU'),
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/ysaNymxYeCloZXpBAKVM1UIlhZC5ts6rP07dKGWJ.jpg',
                'birthday'=>'1990-03-11'
            ],
            [
                'name'=>'佐藤あつし',
                'email'=>'v003b3eed7qzaE05SE@softbank.ne.jp',
                'password'=>Hash::make('5XZ8LvJU'),
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/ysaNymxYeCloZXpBAKVM1UIlhZC5ts6rP07dKGWJ.jpg',
                'birthday'=>'1960-03-11'
            ],
        ]);
    }
}

