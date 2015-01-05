@foreach($users as $user)
<div class="cat">
<a href="{{url('user/'.$user->id)}}">
<strong> {{{$user->email}}} </strong> - {{{$user->name}}}
</a>
</div>
@endforeach