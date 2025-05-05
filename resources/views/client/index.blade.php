<x-guest-layout>



    <section class="h-[60vh] flex relative">
        <img src="{{ asset('img/landpage-bg.webp') }}" alt="" class="absolute inset-0 w-full h-full object-cover brightness-75 ">
        <div class="relative z-10 backdrop-blur w-full h-full flex flex-col my-auto">
            <div class="flex my-auto flex-col ms-[5%] ">
                <div class="xl:w-4/12 md:w-6/12 sm:w-10/12 ">
                    <h1 class="fw-bold md:text-6xl text-4xl !text-white">Click & Eat</h1>
                    <h5 class="mt-4 md:text-xl text-lg !text-white">Commandez facilement dans votre restaurant préféré sans attendre</h5>
                </div>

                <div class=" mt-6 flex flex-wrap">
                    <a class="text-white bg-clementine-500 py-3 px-5 rounded-3xl me-2 mt-3" href="">Commander maintenant</a>
                    <a class="text-clementine-500 bg-white py-3 px-5 rounded-3xl mt-3" href="{{ route("restaurants.view") }}">Découvrir les restaurants</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <h1 class="text-4xl text-center mt-10 mb-5">Restaurants populaires</h1>
        <div class="overflow-hidden">
            <x-basic-swiper>
                @foreach ($restaurants as $restaurant )
                <a class="swiper-slide p-2"  href="{{ route("restaurants.show",$restaurant->id) }}">
                    <div class="rounded-lg bg-white shadow-md flex flex-col">
                        <img src="{{ $restaurant->logo_url }}" class="img-fluid rounded-t" alt="Card title">
                        <div class="p-2">
                            <h5 class="card-title">{{ $restaurant->name }}</h5>
                            <p class="text-muted mb-0">{{ $restaurant->description }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </x-basic-swiper>
        </div>
    </section>


</x-guest-layout>
