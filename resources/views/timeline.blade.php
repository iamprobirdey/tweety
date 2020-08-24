
    <div class="col-sm-12">
        @forelse ($tweets as $tweet)
            <div>
                <a href="{{$tweet->user->path()}}">
                    <img src="{{$tweet->user->avatar}}" alt="avatar" height="40" width="40">
                </a>
            </div>
            <div>
                <a href="{{$tweet->user->path()}}">
                    <h4> {{$tweet->user->name}}</h4>
                </a>
                <p>
                    {{$tweet->body}}
                </p>
                <p> {{$tweet->likes ?: 0  }} Likes</p>
                <p>{{$tweet->dislikes ?: 0  }} Dislikes</p>
            </div>
            @empty
                <p>No tweets yet!!</p>
        @endforelse
    </div>
