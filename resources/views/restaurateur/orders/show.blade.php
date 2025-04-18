@php
    use App\Models\OrderStatus;
@endphp
<x-restaurateur>

    <section class="w-8/12 mx-auto ">
            <x-card class="flex m-6">
                <div class="p-4 flex flex-col w-full">
                    <div class="flex items-center  justify-between">
                        <div class="flex items-center">
                            <div class="flex items-center justify-center bg-clementine-100 w-12 h-12 rounded-lg p-2 me-4">
                                <i class="fa-solid fa-utensils text-xl text-clementine-500"></i>
                            </div>
                            <div>
                                <h2 class="font-bold text-xl">Commande #{{ $order->id }}</h2>
                                <p class="text-gray-500">{{ $order->created_at->locale('fr')->translatedFormat('d M Y, H:i') }}</p>
                            </div>
                        </div>

                        <div>
                            <form action="{{ route('restaurateur.orders.update', $order->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" id="status" class="bg-gray-100 rounded-lg px-2 py-1">

                                    @foreach (OrderStatus::cases() as $status)
                                        <option value="{{ $status->value }}" {{ $order->status->value === $status->value ? 'selected' : '' }}>{{ $status->value }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </div>
                    </div>
                    <hr class="my-6 border-gray-200">
                    <div>
                        <div class="flex items-center mb-4">
                            <img src="{{ $order->restaurant->logo_url }}" class="h-12 w-12 rounded-lg me-4" alt="">
                            <div>
                                <h3 class="font-bold text-xl">{{ $order->restaurant->name }}</h3>
                                <p class="text-gray-500">{{ $order->orderItems->count() }} articles</p>
                            </div>
                        </div>

                        @foreach ($order->orderItems as $orderItem)
                            <div class="flex items-center justify-between">
                                <p class="!text-gray-600 font-medium mt-2">{{ $orderItem->quantity }}x {{ $orderItem->item->name }}</p>
                                <p class="!text-gray-600 font-medium mt-2">{{ number_format( $orderItem->price * $orderItem->quantity / 100, 2, ',', ' ') . ' €'}}</p>
                            </div>
                        @endforeach

                        <div>
                            <p class="!text-gray-600 font-medium mt-2">Note:
                                 <span class="bg-gray-100 rounded-lg px-2 py-1">{{ $order->note }}</span></p>
                        </div>

                        <hr class="my-6 border-gray-200">

                        <div class="flex items-center justify-between">
                            <h3 class="!text-gray-600 text-lg font-medium mb-3">Total</h3>
                            <h3 class="!text-clementine-500 text-lg font-bold mb-3">{{ $order->total() }}</h3>
                        </div>



                </div>

            </x-card>

    </section>



 </x-restaurateur>
<script src="{{ asset('js/submitonselect.js') }}"></script>