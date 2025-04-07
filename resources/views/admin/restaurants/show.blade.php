<x-guest-layout>

    <div class="d-flex flex-column m-auto main-bg">
        <div class="position-relative w-100 restaurant-banner">
            <img src="{{ $restaurant->banner_url }}" alt="Bannière du restaurant"
                 class="w-100 h-100 object-fit-cover" style="filter: brightness(70%);">

            <div class="position-absolute bottom-0 start-0 p-4 text-white">
                <h2 class=" fw-bold m-0">{{ $restaurant->name }}</h2>
                <p>{{ $restaurant->address }}</p>
            </div>
        </div>
    </div>










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
