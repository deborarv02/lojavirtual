<x-app-layout>

    <form method="POST" action="" class="p-4">
        @csrf
        <x-input-label class="mt-1">Nome: (Tipo) </x-input-label>
        <x-text-input id="name" class="mt-1" type="text" name="name" required autofocus autocomplete="name" />
        <x-primary-button class="mt-4">Salvar</x-primary-button>
    </form>

</x-app-layout>