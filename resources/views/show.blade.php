@foreach($steps as $step)
手順{{$step->step_num}}<br>
{{$step->title}}<br>
{{$step->about}}<br>
@endforeach

made by {{$maker}}

