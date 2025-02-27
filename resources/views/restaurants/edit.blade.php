@extends("dashboard.index")
@section("title","Restaurant : ".$restaurant->name)

@section("content")
    <form method="post" action="{{ route('restaurants.update',$restaurant->id) }}">
        @method("put")
        @csrf
        <input id="name" name="name" class="border-1" type="text" value="{{ $restaurant->name }}">
        <button type="submit">Update</button>
    </form>
@endsection
