@if(!empty($ranks))
  @foreach($ranks as $rank)
  第{{$rank_num++}}位:{{$rank->name}}<br>
  @endforeach
@endif