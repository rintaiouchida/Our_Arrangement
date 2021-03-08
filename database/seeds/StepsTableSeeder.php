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
            [
                'post_id'=>2,
                'step_num'=>1,
                'title'=>'ペヤングを作る',
                'about'=>'市販のペヤングを普通にそのまま作ります。',
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/aeOhw7xzAH7hXkhUeLqyE12DJjddSPWkxyyyegIa.png'
            ],
            [
                'post_id'=>2,
                'step_num'=>2,
                'title'=>'作ったペヤングを切る',
                'about'=>'全体が1~2cmくらいの大きさになるようにペヤングを包丁で切ります。',
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/aXSGQl5XEWtldC4ciS0bdzKm1wZjxe8RwdAJlg2s.png'
            ],
            [
                'post_id'=>2,
                'step_num'=>3,
                'title'=>'コロッケの形を作り、揚げる',
                'about'=>'コロッケくらいの大きさに丸めて、生卵につけ、パン粉をまぶしたのちに中火で10分ほど上げて、表面が黄金色になったら完成です。',
                'picture'=>'https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/LQMBj7OqKTebPMTAV9228CyaRnXElKVb3ehcVG8g.png'
            ],
            
        ]);
    }
}
