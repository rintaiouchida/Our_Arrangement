$(function(){
  var like=$('.js-like-toggle');
  var likePostId;

like.on('click',function(){
    var $this=$(this);
    likePostId=$this.data('postid');

    $.ajax({
      headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
      },
      url:'/ajaxlike',
      type:'POST',
      data:{
        'post_id':likePostId
      },
    })

    .done(function(e){
      $this.toggleClass('loved');
      $this.next('.likesCount').html(data.postLikesCount); 

    })
    .fail(function (data, xhr, err) {
      //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
      //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
      console.log('エラー');
      console.log(err);
      console.log(xhr);
    });
    return false;
  });
});