@extends("dashboard.index")
@section("name","Restaurants")
@section("content")


    <table class="table-bordered">
        <thead>
        <tr>
            <th>id</th>
            <th>nom</th>
            <th class="text-center">action</th>
        </tr>
        </thead>

        <tbody>
        @foreach($restaurants as $restaurant)
            <tr>
                <td>{{ $restaurant->id }}</td>
                <td>{{ $restaurant->name }}</td>
                <td class="flex">
                    <a class="btn btn-info m-1" href="{{ route("restaurants.show",[$restaurant->id]) }}">Show</a>
                    <form method="post" action="{{ route("restaurants.delete",[$restaurant->id]) }}">
                        @method("DELETE")
                        @csrf
                        <button class="btn btn-danger m-1" type="submit">Delete</button>
                    </form>
                    <a class="btn btn-warning m-1" href="{{ route("restaurants.edit", $restaurant->id) }}">Edit</a>

                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

@endsection

