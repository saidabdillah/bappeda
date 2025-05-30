<div>
    <flux:heading>Tambah SKPD</flux:heading>

    <flux:separator class="mt-4 mb-6" variant="outline" />

    <form wire:submit="save">
        <div class="grid gap-y-5 mb-5 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-5">
            <flux:input label="SKPD" placeholder="SKPD" wire:model="form.skpd" />
            <flux:input label="Perangkat Daerah Pelaksana" placeholder="Perangkat Daerah Pelaksana"
                wire:model="form.perangkat_daerah_pelaksana" />
        </div>
        <div class="grid gap-x-5 grid-cols-4">
            <flux:button variant="primary" type="submit">Simpan</flux:button>
        </div>
    </form>
</div>