<x-guest-layout>
    <div class="flex flex-col items-center w-full bg-gray">
        <div class="relative w-full restaurant-banner">
            <img src="{{ $restaurant->banner_url }}" alt="Bannière du restaurant"
                 class="w-full h-full object-cover" style="filter: brightness(70%);">
            <div class="absolute flex flex-col bottom-5 left-5">
                <h2 class="font-bold text-2xl !text-white">{{ $restaurant->name }}</h2>
                <p class="text-lg text-white">{{ $restaurant->address }}</p>
            </div>
        </div>
    </div>


    <div class="p-4">


        @foreach ($restaurant->categories as $category)
        <div class="mb-4 overflow-hidden">
            <a href="{{ route('categories.show', [$category->id]) }}" class="text-black no-underline">
                <h2 class="font-bold text-2xl mb-2">{{ $category->name }}</h2>
            </a>
            <x-basic-swiper>
                    @foreach ($category->items as $item)
                        <div class="swiper-slide p-2">
                            <div class="rounded-lg bg-white shadow-md flex flex-col">
                                <img class=" rounded-t-lg" src="{{ $item->image_url }}" alt="{{ $item->name }}">
                                <div class="p-2">
                                    <h5 class="text-black font-bold">{{ $item->name }}</h5>
                                    <p class="font-light">{{ $item->description }}</p>
                                    <div class="flex justify-between pt-2">
                                        <span class="!text-clementine-500 font-bold">{{ $item->price }}€</span>
                                        <button type="submit" class="bg-clementine-500 cursor-pointer rounded-2xl p-1 px-2 text-white">Ajouter</button></div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
            </x-basic-swiper>
        </div>
    @endforeach
    </div>
</x-guest-layout>
