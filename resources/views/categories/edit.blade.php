@extends("dashboard.index")
@section("title","Catégorie : ".$category->name)
@section("content")
    <form method="post" action="{{ route('categories.update',$category->id) }}">
        @method("edit")
        @csrf
        <input id="name" name="name" class="border-1" type="text" value="{{ $category->name }}">
        <button type="submit">Update</button>
    </form>
@endsection
