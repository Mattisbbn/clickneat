@extends("dashboard.index")
@section("title","Categories")
@section("content")

<a class="text-center" href="{{ route("categories.create") }}">Créer une catégorie</a>
<table class="table  table-bordered">

    <thead>
        <tr>
            <td>Id</td>
            <td>Nom</td>
            <td>Restaurant</td>
            <td>Action</td>
        </tr>
    </thead>

    <tbody>
        @foreach( $categories as $category )
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->restaurant->name}}</td>
                <td>
                    <button><a href="{{ route("categories.show",$category->id) }}">Show</a></button>
                    <form method="post" action="{{ route("categories.delete",[$category->id]) }}">
                        @csrf
                        @method("DELETE")
                        <button type="submit">Delete</button>
                    </form>
                    <a href="{{ route("categories.edit",$category->id) }}">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>        


@endsection