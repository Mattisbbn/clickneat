<x-restaurateur>

    <section class="flex flex-wrap w-10/12">
        <x-card class="m-5 flex flex-col w-full">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold">Articles</h1>
                <a href="{{ route('restaurateur.items.create') }}" class="bg-clementine-500 text-white p-2 text-center flex rounded-lg">Ajouter un article</a>
            </div>
            <div class="overflow-auto">
            <table class="table-auto w-full">
            <thead class="rounded-lg bg-gray-100">
                <tr class="text-gray-500">
                    <th class="p-2 font-medium">ARTICLE</th>
                    <th class="p-2 font-medium">CATEGORIES</th>
                    <th class="p-2 font-medium">PRIX</th>
                    <th class="p-2 font-medium">COÛT</th>
                    <th class="p-2 font-medium">STATUS</th>
                    <th class="p-2 font-medium">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr class="border-b border-gray-200 p-3">
                        <td class="p-4">{{ $item->name }}</td>
                        <td class="p-4">{{ $item->category->name}}</td>
                        <td class="p-4">{{ $item->formatedPrice }}</td>
                        <td class="p-4">{{ $item->formattedCost }}</td>
                        <td class="p-4">
                            <div class="text-center rounded-xl {{ $item->is_active ? 'text-green-800 bg-green-200' : 'bg-yellow-100 text-yellow-800' }}">
                              {{ $item->is_active ? 'Actif' : 'Inactif' }}
                            </div>
                        </td>
                        <td class="p-3 flex align-center justify-center gap-2" >
                            <a href="{{ route('restaurateur.items.edit', $item->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square text-clementine-500"></i></a>

                            <form action="{{ route('restaurateur.items.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash text-clementine-500"></i></button>
                            </form>
                        </td>

                            {{-- <a href="{{ route('items.show', $item->id) }}" class="btn btn-primary">Voir</a>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form> --}}

                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </x-card>









    </section>

</x-restaurateur>
