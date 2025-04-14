<aside {{ $attributes->merge(['type' => 'submit', 'class' => 'flex sticky top-16 min-w-[230px] h-[calc(100vh-60px)] bg-white shadow-lg']) }}>
    <div class="flex flex-col h-full p-4 w-full">
        <a class="p-3 my-1 text-gray-500 rounded-lg hover:bg-clementine-500 hover:text-white pe-4 w-full" href="{{ route('restaurateur.orders.index') }}"><i class="fa-solid fa-clipboard-list me-2"></i>Commandes</a>
        <a class="p-3 my-1 text-gray-500 rounded-lg hover:bg-clementine-500 hover:text-white pe-4 w-full" href=""><i class="fa-solid fa-burger me-2"></i>Articles</a>
        <a class="p-3 my-1 text-gray-500 rounded-lg hover:bg-clementine-500 hover:text-white pe-4 w-full" href=""><i class="fa-solid fa-tags me-2"></i>Catégories</a>
        <a class="p-3 my-1 text-gray-500 rounded-lg hover:bg-clementine-500 hover:text-white pe-4 w-full" href=""><i class="fa-solid fa-gear me-2"></i>Paramètres</a>
    </div>
</aside>