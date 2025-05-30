<div>
    <flux:heading>Tambah Program</flux:heading>

    <flux:separator class="mt-4 mb-6" variant="outline" />

    <form wire:submit="save">
        <div class="grid gap-y-5 mb-5 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-x-5">
            <flux:input label="Kode" placeholder="Kode" wire:model="form.kode" />
            <flux:field>
                <flux:label>SKPD</flux:label>
                <flux:select wire:model="form.id_skpd">
                    <flux:select.option selected value="">Pilih SKPD</flux:select.option>
                    @forelse ($skpd as $item)
                    <flux:select.option value="{{ $item->id }}">{{ $item->skpd }}
                    </flux:select.option>
                    @empty
                    <flux:select.option value="">Tidak ada</flux:select.option>
                    @endforelse
                </flux:select>
            </flux:field>
            <flux:input label="Program" placeholder="Program" wire:model="form.program" />
            <flux:input label="Kegiatan" placeholder="Kegiatan" wire:model="form.kegiatan" />
            <flux:input label="Sub Kegiatan" placeholder="Sub Kegiatan" wire:model="form.sub_kegiatan" />
            <flux:input label="Alokasi Anggaran" placeholder="Alokasi Anggaran" wire:model="form.alokasi_anggaran" />
        </div>
        <div class="grid gap-x-5 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
            <flux:button variant="primary" type="submit">Simpan</flux:button>
        </div>
    </form>
</div>