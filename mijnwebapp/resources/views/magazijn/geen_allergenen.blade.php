<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Overzicht Allergenen</h2>
    </x-slot>

    {{-- Automatische redirect na 4 seconden conform specificatie --}}
    <meta http-equiv="refresh" content="4;url={{ route('magazijn.index') }}">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow text-center">
                <p class="text-red-600 font-semibold text-lg">
                    In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken
                </p>
                <p class="text-sm text-gray-400 mt-2">U wordt binnen 4 seconden teruggestuurd naar het overzicht...</p>
            </div>
        </div>
    </div>
</x-app-layout>