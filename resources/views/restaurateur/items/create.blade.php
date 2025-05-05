<x-restaurateur>

    <section class="flex flex-wrap w-10/12">

        <x-card class="m-auto flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Ajouter un article</h1>
                <a href="{{ route('restaurateur.items.index') }}" class="text-clementine-500"><i class="fa-solid fa-xmark text-xl"></i></a>
            </div>
            <form action="{{ route('restaurateur.items.store') }}" method="POST">
                @csrf
                <div class="flex flex-col">
                    <div class="flex flex-wrap gap-4 ">
                    <div>
                        <div class="flex flex-col w-full">
                            <label for="name">Nom de l'article</label>
                            <input type="text" name="name" id="name" class="border border-gray-300 rounded-lg p-2">
                        </div>
                        <div class="flex flex-col w-full">
                            <label for="price">Prix de vente</label>
                            <input type="number" name="price" id="price" class="border border-gray-300 rounded-lg p-2">
                        </div>
                    </div>
                    <div>
                        <div class="flex flex-col w-full">
                            <label for="cost">Coût</label>
                            <input type="number" name="cost" id="cost" class="border border-gray-300 rounded-lg p-2">
                        </div>
                    <div class="flex flex-col w-full">
                        <label for="category_id">Catégorie</label>
                        <select name="category_id" id="category_id" class="border border-gray-300 rounded-lg p-2">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>


                    </div>

                </div>
                <div class="flex flex-col mb-4">
                    <label for="image_url">Image</label>
                    <input type="file" name="image_url" id="image_url" class="border border-gray-300 rounded-lg p-2 w-full">
                </div>
                <div class="flex mb-4 align-start justify-start">
                    <input type="checkbox" name="is_active" id="is_active" class="border border-gray-300 rounded-lg p-2">
                    <p class="ml-2">Article disponible</p>
                </div>
            </div>
                <button type="submit" class="bg-clementine-500 text-white p-2 text-center flex rounded-lg">Ajouter</button>
            </form>
        </x-card>








    </section>

</x-restaurateur>
