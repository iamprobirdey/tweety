<div class="col-sm-6">
    Profile page of {{$user->name}}
    @can ('edit',$user)
        <a href="{{ $user->path('edit') }}" class="btn btn-success">Edit Profile </a>
    @endcan
    @unless (current_user()->is($user))
        <form action="{{ route('follow',$user->username) }}" method="POST">
            @csrf
            <button
                type="submit"
                class="btn btn-primary">
                {{current_user()->$user ? 'UnFollow Me ' : 'Follow me'}}
            </button>
        </form>
    @endunless
    @include('timeline',[
        'tweets' => $user->tweets
    ])
</div>
