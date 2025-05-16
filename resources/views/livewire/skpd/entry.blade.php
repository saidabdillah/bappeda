<div>
    <flux:heading>Tambah SKPD</flux:heading>
    <flux:text class="mt-2">Lorem ipsum dolor sit amet consectetur.</flux:text>

    <flux:separator class="mt-4 mb-6" variant="outline" />

    <form wire:submit="save">
        <div class="grid gap-y-5 mb-5 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 sm:gap-x-5">
            <flux:input label="SKPD" placeholder="SKPD" wire:model.live="form.skpd" />

            <flux:input label="Tujuan Program" placeholder="Tujuan Program" wire:model="form.tujuan_program" />
            {{--

            <flux:input label="Realisasi" placeholder="Realisasi" wire:model.live="form.realisasi" />

            <flux:input label="Anggaran Spesifik" type="number" placeholder="Anggaran Spesifik"
                wire:model.live="form.anggaran_spesifik" />

            <flux:input label="Realisasi Spesifik" placeholder="Realisasi Spesifik"
                wire:model.live="form.realisasi_spesifik" /> --}}
        </div>
        <div class="grid sm:gap-x-5 sm:grid-cols-2">
            <flux:button variant="primary" type="submit">Simpan</flux:button>
        </div>
    </form>
</div>


@script
<script>
    $wire.on('create-skpd', (e) => {
        Swal.fire({
            title: 'Berhasil',
            text: e.message,
            icon: e.type,
            timer: 2000
        })
    });
    $wire.on('error-skpd', (e) => {
        console.log(e);
        Swal.fire({
            title: 'Gagal',
            text: e.message,
            icon: e.type,
            timer: 2000
        })
    });
</script>
@endscript