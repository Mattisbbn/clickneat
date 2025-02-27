
@section("name","Créer")
@section("content")
    <form method="post" action="{{ route("restaurants.store") }}">
        @csrf
        @method("post")
        <input placeholder="Nom" type="text" name="name" id="name">

        <button type="submit">Submit</button>
    </form>

@endsection
