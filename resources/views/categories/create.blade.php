
@section("title","Créer un restaurant")
@section("content")
    <form class="flex flex-col place-items-center" method="post" action="{{ route("categories.store") }}">
        @csrf
        @method("post")
        <input placeholder="Nom" type="text" name="name" id="name">
        <select name="restaurantId">
            @foreach($restaurants as $restaurant)
                <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
            @endforeach

        </select>
        <button type="submit">Submit</button>
    </form>

@endsection
