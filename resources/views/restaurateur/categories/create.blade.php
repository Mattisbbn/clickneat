<x-restaurateur>

    <section class="flex flex-wrap w-10/12">

        <x-card class="m-auto flex flex-col">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Ajouter une catégorie</h1>
                <a href="{{ route('restaurateur.categories.index') }}" class="text-clementine-500 ms-2"><i class="fa-solid fa-xmark text-xl"></i></a>
            </div>
            <form action="{{ route('restaurateur.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col">
                    <div class="flex flex-wrap gap-4 ">
                        <div class="flex flex-col w-full">
                            <label for="name">Nom de la catégorie</label>
                            <input type="text" name="name" id="name" required class="border border-gray-300 rounded-lg p-2 w-full">
                        </div>
                    </div>
                </div>
                <button type="submit" class="bg-clementine-500 text-white p-2 text-center flex rounded-lg mt-4">Ajouter</button>
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
