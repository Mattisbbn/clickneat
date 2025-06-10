<x-admin-layout>
    <x-slot name="title">
        Modifier l'article
    </x-slot>
    <x-slot name="content">
    <form class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center" method="post" action="{{ route('articles.update',$article->id) }}">
        <h1 class="text-center mb-4">Modifier</h1>
        @method("put")
        @csrf
        <label for="name">Nom</label>
        <input id="name" name="name" class="border-1" type="text" value="{{ $article->name }}">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="border-1" type="text">{{ $article->description }}</textarea>
        <label for="price">Prix</label>
        <input id="price" name="price" class="border-1" type="text" value="{{ $article->price / 100 }}">
        <label for="cost">Coût</label>
        <input id="cost" name="cost" class="border-1" type="text" value="{{ $article->cost / 100 }}">

        <button type="submit">Modifier</button>
    </form>

</x-admin-layout>
