<x-restaurateur>

    <section class="flex flex-wrap w-10/12">

        <x-card class="m-auto flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Modifier une catégorie</h1>
                <a href="{{ route('restaurateur.categories.index') }}" class="text-clementine-500"><i class="fa-solid fa-xmark text-xl"></i></a>
            </div>
            <form action="{{ route('restaurateur.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col">
                    <div class="flex flex-wrap gap-4 ">

                        <div class="flex flex-col w-full">
                            <label for="name">Nom de la catégorie</label>
                            <input type="text" value="{{ $category->name }}" name="name" id="name" required class="border border-gray-300 rounded-lg p-2">
                        </div>


                    </div>
                </div>




                <button type="submit" class="bg-clementine-500 text-white p-2 text-center flex rounded-lg mt-4">Sauvegarder</button>
@if ($category->items->isNotEmpty())
                <div>
                    <h2 class="mt-4 text-lg font-bold text-center">Articles associés</h2>
                    <ul class="list-disc ml-4">
                        @foreach ($category->items as $item)
                            <li>
                                {{ $item->name }}
                            </li>
                        @endforeach
                    </ul>
                </div>
@endif
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
