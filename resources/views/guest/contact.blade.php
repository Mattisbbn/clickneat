<x-guest-layout>
    <form class="flex flex-col w-1/2 mx-auto bg-white p-8 rounded-xl m-auto" action="{{ route("contact.send") }}" method="post">
        @csrf
        <h1 class="text-4xl text-center mt-10 mb-5">Contact</h1>

        <div class="flex mb-4 gap-4">
            <div class="w-1/2">
                <label for="lastName" class="mb-1">Nom</label>
                <x-border-input type="text" name="lastName" id="lastName" placeholder="Votre nom"/>
            </div>
            <div class="w-1/2">
                <label for="firstName" class="mb-1">Prénom</label>
                <x-border-input type="text" name="firstName" id="firstName" placeholder="Votre prénom"/>
            </div>
        </div>



            <label for="email" class="mb-1">Email</label>
            <x-border-input class="mb-4" type="email" name="email" id="email" placeholder="Votre email"/>

            <label for="object" class="mb-1">Objet</label>
            <x-border-input class="mb-4" type="text" name="object" id="object" placeholder="Votre objet"/>

            <label for="message" class="mb-1">Message</label>
            <textarea placeholder="Votre message..." rows="5" class="border-[1px] border-gray-300 rounded-xl p-3 mb-8" name="message" id="message"></textarea>

        <x-submit-button>Envoyer</x-submit-button>
    </form>
</x-guest-layout>
