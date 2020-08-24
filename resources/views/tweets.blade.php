<div class="col-sm-12">
    <img src="{{current_user()->avatar}}" alt="avatar" height="40" width="40">
    <form action="/tweets" method="post">
        @csrf
        <textarea
            name="tweet"
            cols="30"
            rows="2"
            value="{{ old('tweet') }}"
            @error('tweet') is-invalid @enderror
            placeholder="Tweet something"
            >
        </textarea>
        @error('tweet')
            <p>
                <strong>{{ $message }}</strong>
            </p>

        @enderror
        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Submit') }}
                </button>
            </div>
        </div>
    </form>
</div>
