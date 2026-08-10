<x-layout>
    <x-slot:title>
        Welcome
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
        @foreach ($tweaks as $tweak)
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <h1 class="text-xl font-bold">{{ $tweak['message'] }}</h1>
                    <p class="mt-4 text-base-content/60">{{ $tweak['user'] }}</p>
                    <p class="text-sm text-base-content/40">{{ $tweak['time'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-layout>