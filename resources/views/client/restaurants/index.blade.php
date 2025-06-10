<x-guest-layout>
    <h1 class="text-6xl text-center pt-4 mb-4"> Restaurants</h1>
    <section class="flex">
        <div class="flex flex-wrap m-auto justify-center align-middle">
            @foreach ($restaurants as $restaurant)
                    <div class="rounded-lg bg-white shadow-md flex flex-col w-[28%] min-w-[300px] h-full m-4">
                        <img src="{{ $restaurant->logo_url }}" class="img-fluid rounded-t aspect-video object-cover" alt="Card title">
                        <div class="p-4 flex flex-col">
                            <h5 class="font-bold text-xl">{{ $restaurant->name }}</h5>
                            <p class="mb-2 text-gray-500">{{ $restaurant->description }}</p>
                            <p>{{ $restaurant->address }}</p>
                            <a class="mt-auto" href="{{ route("restaurant.show",$restaurant->id) }}">
                                <x-primary-button><p>Voir le menu</p></x-primary-button>
                            </a>
                        </div>
                    </div>
            @endforeach
        </div>
    </section>
</x-guest-layout>
