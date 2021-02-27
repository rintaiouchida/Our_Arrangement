@foreach($post as $pic)

{{$pic->id}}<br>
{{$pic->genre_id}}
{{$pic->name}}
<img src="{{$pic->icon_picture}}" style="width:200px; height:200px; margin-bottom:100px; display:block;">

@endforeach