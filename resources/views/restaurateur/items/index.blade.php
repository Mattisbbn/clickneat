<x-restaurateur>

    <section class="flex flex-wrap">
        <x-card class="m-5">
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Catégories</th>
                    <th>Prix</th>
                    <th>Cout</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </x-card>









    </section>

</x-restaurateur>
