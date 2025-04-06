@extends("dashboard.index")
@section("title","Créer un restaurant")

@section("content")
   
    <form class="d-flex flex-column justify-content-center align-items-center" method="post" action="{{ route("restaurants.store") }}">
        @csrf
        @method("post")
        <div class="d-flex flex-column bg-white shadow p-4 rounded-3">
            <h1 class="text-center mb-4">Créer un restaurant</h1>
            <input class="p-2 rounded-3 border-0 mb-2 shadow-sm" placeholder="Nom" type="text" name="name" id="name">
            <button class="p-2 rounded-3" type="submit">Créer</button>
        </div>
    </form>

@endsection