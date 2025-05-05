<x-restaurateur>

    <section class="flex flex-wrap w-10/12">

        <x-card class="m-auto flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Modifier un article</h1>
                <a href="{{ route('restaurateur.items.index') }}" class="text-clementine-500"><i class="fa-solid fa-xmark text-xl"></i></a>
            </div>
            <form action="{{ route('restaurateur.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                    <div class="flex flex-wrap gap-4 ">
                    <div>
                        <div class="flex flex-col w-full">
                            <label for="name">Nom de l'article</label>
                            <input type="text" value="{{ $item->name }}" name="name" id="name" required class="border border-gray-300 rounded-lg p-2">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="price">Prix de vente (€)</label>
                            <input type="number" value="{{ $item->price / 100 }}" name="price" id="price" required step="0.01" min="0" class="border border-gray-300 rounded-lg p-2">
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col w-full">
                            <label for="cost">Coût (€)</label>
                            <input type="number" value="{{ $item->cost / 100 }}" name="cost" id="cost" required step="0.01" min="0" class="border border-gray-300 rounded-lg p-2">
                        </div>
                    <div class="flex flex-col w-full">
                        <label for="category_id">Catégorie</label>
                        <select name="category_id" id="category_id" required class="border border-gray-300 rounded-lg p-2">
                            <option value="" disabled selected>Sélectionnez une catégorie</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $item->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>
                    </div>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="description">Description</label>
                    <textarea rows="4" required name="description" id="description" class="border border-gray-300 rounded-lg p-2 w-full">{{ $item->description }}</textarea>
                </div>

                <div class="flex mb-4 align-start justify-start">
                    <input type="checkbox" {{ $item->is_active ? 'checked' : '' }} name="is_active" id="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="border border-gray-300 rounded-lg p-2">
                    <p class="ml-2">Article disponible</p>
                </div>


                <button type="submit" class="bg-clementine-500 text-white p-2 text-center flex rounded-lg">Sauvegarder</button>
            </div>
            </form>

            @if ($errors->any())
                <div class="mt-4 text-red-500">
                    <h3 class="font-bold mb-2">Erreurs de validation :</h3>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </x-card>
    </section>
</x-restaurateur>
