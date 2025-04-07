<x-guest-layout>

    <div class="d-flex flex-column p-4 m-auto main-bg">
        <h1 class="text-center mb-4">Restaurant : {{$restaurant->name}}</h1>
        <div>
            <h4 class="mb-2">Date de création : {{ $restaurant->created_at }}</h4>
            <h4 class="mb-2">Mis à jour le : {{ $restaurant->updated_at }}</h4>
            <h4 class="mb-4 mt-4">Liste des catégories :</h4>

                @foreach ($restaurant->categories as $category)

                        <div>
                            <a href="{{ route("categories.show",[$category->id]) }}" ><h5 class="text-black mb-2">{{ $category->name }}</h5></a>
                            <div class="d-flex flex-wrap">

                                @foreach ($category->items as $item)
                                <div class="rounded-3 col-2 m-3 bg-white d-flex flex-column">
                                    <img class="img-fluid rounded-top-3" src="{{ $item->image_url }}" alt="">
                                    <h5>{{ $item->name }}</h5>

                                </div>
                            @endforeach
                            </div>

                        </div>




                @endforeach

        </div>





    </div>
</x-guest-layout>
