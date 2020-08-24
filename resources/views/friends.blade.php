<h1>Following</h1>
<ul>
    @forelse (current_user()->follows as $user)
        <li>
            <a href="{{route('profile',$user->name)}}">
                <img src="{{$user->avatar}}" alt="avatar" height="40" width="40">
            </a>
            <a href="{{route('profile',$user->name)}}">
                {{$user->name}}
            </a>
        </li>
        @empty
            <p>No friends yet</p>
    @endforelse
</ul>
