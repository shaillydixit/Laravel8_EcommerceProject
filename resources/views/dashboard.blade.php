<x-app-layout>
    <x-slot name="header">
        Hello {{Auth::user()->name}}
    </x-slot>

    <div class="py-12">
        Hi Everyone.....
    </div>
</x-app-layout>