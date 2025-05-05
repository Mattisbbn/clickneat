<x-restaurateur>

    <section class="flex flex-wrap w-10/12">
        <x-card class="m-5 flex flex-col w-full">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Catégories</h1>
                <a href="{{ route('restaurateur.categories.create') }}" class="bg-clementine-500 text-white p-2 text-center flex rounded-lg">Ajouter une catégorie</a>
            </div>
            <div class="overflow-auto mb-auto">
            <table class="table-auto w-full">
            <thead class="rounded-lg bg-gray-100">
                <tr class="text-gray-500">
                    <th class="p-2 font-medium">NOM</th>
                    <th class="p-2 font-medium">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="border-b border-gray-200 p-3">
                        <td class="p-4">{{ $category->name }}</td>

                        <td class="p-3 flex align-center justify-center gap-2" >
                            <a href="{{ route('restaurateur.categories.edit', $category->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square text-clementine-500"></i></a>

                            <form action="{{ route('restaurateur.categories.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash text-clementine-500"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </x-card>









    </section>

</x-restaurateur>
