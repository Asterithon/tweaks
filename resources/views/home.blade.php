<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @forelse ($tweaks as $tweak)
            <x-tweak :tweak="$tweak" />
        @empty
            <p class="text-center text-base-content/60">No tweaks found. Be the first to Tweak!</p>
        @endforelse
    </div>
</x-layout>