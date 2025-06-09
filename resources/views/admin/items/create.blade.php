<x-admin-layout>

    <form class="d-flex flex-column justify-content-center align-items-center" method="post" action="{{ route("articles.store") }}">
        @csrf
        @method("post")
        <div class="d-flex flex-column bg-white shadow p-4 rounded-3">
            <h1 class="text-center mb-4">Créer un article</h1>
            <input class="p-2 rounded-3 border-0 mb-2 shadow-sm" placeholder="Nom" type="text" name="name" id="name">
            <input class="p-2 rounded-3 border-0 mb-2 shadow-sm" placeholder="Description" type="text" name="description" id="description">
            <input class="p-2 rounded-3 border-0 mb-2 shadow-sm" placeholder="Prix" type="number" name="price" id="price">
            <input class="p-2 rounded-3 border-0 mb-2 shadow-sm" placeholder="Cout" type="number" name="cost" id="cost">
            <div class="p-2 rounded-3 border-0 mb-2 shadow-sm d-flex justify-content-between align-items-center">
                <label for="is_active">Actif</label>
                <input class="p-2 rounded-3 border-0 mb-2 shadow-sm" type="checkbox" name="is_active" id="is_active" value="1">
            </div>
            <select class="p-2 rounded-3 border-0 mb-4 shadow-sm" name="category_id">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }} | <b>{{ $category->restaurant->name }}</b></option>
                @endforeach
            </select>
            <button class="p-2 rounded-3" type="submit">Créer</button>
        </div>
    </form>

</x-admin-layout>