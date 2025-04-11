<x-guest-layout>
    <section class="w-10/12 m-auto">
<x-card class="justify-start align-middle mt-4">
    <img src="{{ $item->category->restaurant->logo_url }}" alt="{{ $item->category->restaurant->name }}" class="h-12 w-12 rounded-lg">
    <div class="ps-4">
        <h5 class="text-lg">{{ $item->category->restaurant->name }}</h5>
        <p class="text-md">{{ $item->category->name }}</p>
    </div>
</x-card>

<x-card class="flex lg:flex-row flex-col justify-start align-middle mt-4 pt-0 ps-0 pb-0 pe-0">
    <img src="{{ $item->image_url }}" alt="{{ $item->name }}" class="lg:w-2/5 h-65 lg:h-full w-full rounded-tl-lg rounded-tr-lg lg:rounded-tr-none object-cover">
    <div class="ps-10 pt-4 pe-4 flex flex-col">
        <h2 class="text-3xl">{{ $item->name }}</h2>
        <p class="text-md text-gray-500">{{ $item->category->name }}</p>
        <h2 class="text-2xl !text-clementine-500 my-4">{{ $item->formatedPrice }}</h2>
        <p class="text-md text-gray-500 mb-4">{{ $item->description }}</p>

        <h3 class="text-lg text-gray-500 mb-2">Ingrédients</h3>
        <ul class="flex flex-wrap gap-2">
            @foreach ($item->ingredients as $ingredient)
                <li class="px-3 text-gray-700 bg-gray-100  rounded-xl">{{ $ingredient->name }}</li>
            @endforeach
        </ul>

        <h3 class="text-lg text-gray-500 mb-2 mt-4">Allergènes</h3>
        <ul class="flex flex-wrap gap-2">
            @foreach ($item->allergens as $allergen)
                <li class="px-3 text-red-700 bg-red-100  rounded-xl">{{ $allergen->name }}</li>
            @endforeach
        </ul>


        <form method="POST" action="{{ route("cart.store",$item->id) }}" class="mt-auto">
            @csrf
            <br>
            <x-submit-button class="mb-4 me-4">Ajouter au panier</x-submit-button>
        </form>
    </div>
</x-card>

    </section>
</x-guest-layout>
