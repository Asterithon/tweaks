@props(['tweak'])

<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            @if($tweak->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($tweak->user->email) }}"
                            alt="{{ $tweak->user->name }}'s avatar"
                            class="rounded-full" />
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full">
                        <img src="<https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth>"
                        alt="Anonymous User"
                        class="rounded-full" />
                    </div>
                </div>
            @endif

            <div class="min-w-0 flex-1">
                <div class="flex justify-between w-full">
                    <div class="flex items-center gap-1">
                        <span class="text-sm font-semibold">{{ $tweak->user ? $tweak->user->name : 'Anonymous' }}</span>
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60">{{ $tweak->created_at->diffForHumans() }}</span>
                        @if ($tweak->updated_at->gt($tweak->created_at->addSeconds(5)))
                            <span class="text-xs text-base-content/60">edited</span>
                        @endif
                    </div>
                    
                    @can('update', $tweak)
                        <div class="flex gap-1">
                            <a href="/tweaks/{{ $tweak->id }}/edit" class="btn btn-ghost btn-xs">
                                Edit
                            </a>
                            <form method="POST" action="/tweaks/{{ $tweak->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure you want to delete this tweak?')"
                                    class="btn btn-ghost btn-xs text-error">
                                    Delete
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
                <p class="mt-1">{{ $tweak->message }}</p>
            </div>
        </div>
    </div>
</div>