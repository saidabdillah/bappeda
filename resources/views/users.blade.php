<x-layouts.app :title="__('Users')">
    <flux:heading>Pengguna</flux:heading>
    <flux:separator class="mt-4 mb-6" variant="outline" />


    <flux:modal.trigger name="add-user">
        <flux:button>Tambah Pengguna</flux:button>
    </flux:modal.trigger>

    <livewire:user.show />

</x-layouts.app>