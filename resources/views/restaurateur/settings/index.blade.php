<x-restaurateur>
    <section class="flex flex-wrap w-10/12">
        <x-card class="m-5 flex flex-col w-full">
            <div class="flex flex-col justify-between">
                {{-- <h1 class="text-2xl font-bold">Paramètres</h1> --}}

                    <div class="relative">

                        <img src="{{ $banner }}"  draggable="false" alt="banner" class="w-full h-40 object-cover rounded-lg">
                        <a draggable="false" class="absolute filter-brightness-75 top-1/2 right-1/2 translate-x-1/2 translate-y-1/2 flex items-center gap-2 bg-clementine-500 text-white rounded-lg p-2" href="">
                            <i class="fa-solid fa-camera"></i>
                            <p>Changer la bannière</p>
                        </a>
                    </div>



            <div class="flex items-center gap-2 relative">
                    <img src="{{ $logo }}" alt="logo" class="w-20 h-20 rounded-full">
                    <a draggable="false" class="absolute top-1/2 right-1/2 translate-x-1/2 translate-y-1/2 flex items-center gap-2 bg-clementine-500 text-white rounded-xl p-2" href=""><i class="fa-solid fa-pen"></i></a>
            </div>

        </x-card>









    </section>
</x-restaurateur>
