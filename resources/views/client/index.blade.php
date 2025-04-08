<x-guest-layout>
    <div class="overflow-hidden">
        <x-basic-swiper>
            @foreach ($restaurants as $restaurant )
            <a class="swiper-slide p-2"  href="{{ route("restaurants.show",$restaurant->id) }}">
                <div class="rounded-lg bg-white shadow-md flex flex-col">
                    <img src="{{ $restaurant->logo_url }}" class="img-fluid rounded-t" alt="Card title">
                    <div class="p-2">
                        <h5 class="card-title">{{ $restaurant->description }}</h5>
                        <p class="text-muted mb-0">{{ $restaurant->name }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </x-basic-swiper>
    </div>
</x-guest-layout>
