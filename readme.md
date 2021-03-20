<p align="center"><img src="https://uchidamyfirst.s3.ap-northeast-1.amazonaws.com/test/9Kfr2b2Zdh8zpc7X4LQxwXkT1ajVOW1nZLWq5eJW.png" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## OurArrangementについて
今回作成したOurArrangementというアプリケーションは、Twitter等のSNSをベースにしたアプリケーションで、自らが考えたオリジナルのアレンジ料理を発信したり、他人が考えたオリジナルのアレンジ料理を見ることがでます。また、本アプリケーションではランキング機能が搭載されており、年代別、ジャンル別で評価が高い順に料理をみることができます。

## デモンストレーション
本アプリケーションにおける以下の点をデモンストレーションしました。<br>
1.登録<br>
2.料理を投稿<br>
3.検索機能を使って投稿したものを確認<br>
4.他の人をフォロー<br>
5.フォローした情報がメイン画面に反映される<br>

## 使用技術
- PHP(>=7.0)
- Laravel(>=6.0)
- MySQL
- JavaScript
- jQuery
- Ajax通信
- BootStrap
- s3
- heroku

## 使い方
- https://ourarrangement.herokuapp.com/ にアクセス
- デモユーザーでログイン
  -  メールアドレス:sample@gmail.com
  -  パスワード:5XZ8LvJU
- メイン画面が出てきて、自分がフォローしているユーザーの投稿を見ることができる。また、左上のボタンを押すと、自分の情報や、投稿、検索、ランキング表示など様々な基本的なアクションを行うためのボタンが出てくる。

##その他
以下の点を工夫してアプリケーションの作成を行いました。
- 投稿にいいねボタンを押す際に、画面遷移が滑らかに行えるようにAjax通信を実装した。
- 登録画面に細かいPlaceholderを記入して登録をよりスムーズに行えるようにした。
- 写真を保存する際に、より耐久性、信頼性が強く大量に保存できるという理由でs3を活用した。
