@extends("dashboard.index")
@section("title","Restaurant : ".$restaurant->name)

@section("content")
    <form class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center" method="post" action="{{ route('restaurants.update',$restaurant->id) }}">
        <h1 class="text-center mb-4">Modifier</h1>
        @method("put")
        @csrf
        <input id="name" name="name" class="border-1" type="text" value="{{ $restaurant->name }}">
        <button type="submit">Modifier</button>
    </form>
@endsection
