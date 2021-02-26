<?php

use Illuminate\Database\Seeder;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('steps')->insert([
            [
                'post_id'=>1,
                'step_num'=>1,
                'title'=>'野菜を切る',
                'about'=>'一口で食べれる大きさに切る',
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/W5oP6DzzhDUUQPBpyij1pByJQ2XX3fC1iANrrzVX.jpg'
            ],
            [
                'post_id'=>1,
                'step_num'=>2,
                'title'=>'肉を切る',
                'about'=>'一口で食べれる大きさに切る',
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/W5oP6DzzhDUUQPBpyij1pByJQ2XX3fC1iANrrzVX.jpg'
            ],
            [
                'post_id'=>1,
                'step_num'=>3,
                'title'=>'炒める',
                'about'=>'中火で10分間炒める',
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/W5oP6DzzhDUUQPBpyij1pByJQ2XX3fC1iANrrzVX.jpg'
            ],
            
        ]);
    }
}
