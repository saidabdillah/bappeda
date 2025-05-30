<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white dark:bg-zinc-800 relative">

    <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        {{--
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" /> --}}

        <a href="{{ route('dashboard') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
            <x-app-logo />
        </a>

        <flux:navlist variant="outline">
            <flux:navlist.group :heading="__('Platform')" class="grid">
                <flux:navlist.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')"
                    wire:navigate>{{ __('Dashboard') }}</flux:navlist.item>
            </flux:navlist.group>
            <flux:navlist.group :heading="__('SKBD')" class="grid">
                <flux:navlist.group expandable heading="Matriks" class="hidden lg:grid">
                    <flux:navlist.item :href="route('matriks.create')" :current="request()->routeIs('matriks.create')"
                        wire:navigate>{{ __('Tambah') }}</flux:navlist.item>
                    <flux:navlist.item :href="route('matriks.index')" :current="request()->routeIs('matriks.index')"
                        wire:navigate>{{ __('Lihat') }}</flux:navlist.item>
                </flux:navlist.group>

                @if(auth()->user()->hasRole('admin'))

                <flux:navlist.item icon="chart-bar-square" :href="route('entry.create')"
                    :current="request()->routeIs('entry.create')" wire:navigate>{{ __('SKPD') }}
                </flux:navlist.item>

                <flux:navlist.item icon="briefcase" :href="route('program.create')"
                    :current="request()->routeIs('program.create')" wire:navigate>{{ __('Program') }}
                </flux:navlist.item>

                <flux:navlist.item icon="user-group" :href="route('users')" :current="request()->routeIs('users')"
                    wire:navigate>{{ __('Pengguna') }}
                </flux:navlist.item>
                @endif
            </flux:navlist.group>
        </flux:navlist>

        <flux:spacer />

        <!-- Desktop User Menu -->
        <flux:dropdown position="bottom" align="start">
            <flux:profile :name="auth()->user()->name" :initials="auth()->user()->initials()"
                icon-trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-start text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>


                {{-- <flux:menu.radio.group>
                    <flux:menu.item :href="route('settings.profile')" icon="cog" wire:navigate>{{ __('Settings') }}
                    </flux:menu.item>
                </flux:menu.radio.group> --}}

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Keluar') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    {{ $slot }}

    @fluxScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notif', (e) => {
                Swal.fire({
                    title: e.title,
                    text: e.message,
                    icon: e.type,
                    timer: 2000
                })
            });
        });
    </script>
</body>

</html>