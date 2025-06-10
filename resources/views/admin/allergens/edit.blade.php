<x-admin-layout>
    <x-slot name="title">
        Modifier l'allergène
    </x-slot>
    <x-slot name="content">
    <form class="d-flex flex-column bg-white shadow p-4 m-auto rounded-3 justify-content-center align-items-center" method="post" action="{{ route('allergens.update',$allergen->id) }}">
        <h1 class="text-center mb-4">Modifier</h1>
        @method("put")
        @csrf
        <label for="name">Nom</label>
        <input id="name" name="name" class="border-1" type="text" value="{{ $allergen->name }}">
        <label for="item_id">Article lié</label>
        <select id="item_id" name="item_id" class="border-1">
            @foreach ($items as $item)
                <option value="{{ $item->id }}" {{ $allergen->item_id == $item->id ? "selected" : "" }}>{{ $item->name }} | {{ $item->category->name }} | {{ $item->category->restaurant->name }}</option>
            @endforeach
        </select>
        <button type="submit">Modifier</button>
    </form>

</x-admin-layout>
