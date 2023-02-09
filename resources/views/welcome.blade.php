@extends("layout.app")

@section("content")

    <div class="row my-5">
        <div class="col-md-12">
            <home-vue :user_id="{{ auth()->user()->id }}"></home-vue>
        </div>
    </div>

@endsection
