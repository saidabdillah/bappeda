<div>
    <flux:heading>Tambah Matriks</flux:heading>
    <flux:text class="mt-2">Lorem ipsum dolor sit amet consectetur.</flux:text>
    <flux:separator class="mt-4 mb-6" variant="outline" />

    <form wire:submit="save">
        <div class="grid sm:grid-cols-2 sm:gap-x-10 xl:grid-cols-3 gap-y-5">
            <flux:input label="Tujuan Program" placeholder="Tujuan Program" wire:model="tujuan_program" />

            <flux:input label="Kode Program" placeholder="Kode Program" wire:model="kode_program" />

            <flux:input label="Program Kegiatan" placeholder="Program Kegiatan" wire:model="program_kegiatan" />

            <flux:input label="Alokasi Anggaran (Rp)" type="number" placeholder="Alokasi Anggaran (Rp)"
                wire:model="alokasi_anggaran" />

            <flux:input label="Belanja Spesifik Sub Kegiatan" type="number"
                placeholder="Anggaran Belanja Spesifik Sub Kegiatan" wire:model="belanja_spesifik_sub_kegiatan" />

            <flux:input label="Anggaran Belanja Spesifik Sub Kegiatan" type="number"
                placeholder="Anggaran Belanja Spesifik Sub Kegiatan"
                wire:model="anggaran_belanja_spesifik_sub_kegiatan" />

            <flux:input label="Sumber Pembiayaan" placeholder="Sumber Pembiayaan" wire:model="sumber_pembiayaan" />

            <flux:input label="Realisasi Anggaran (Rp)" placeholder="Realisasi Anggaran (Rp)"
                wire:model="realisasi_anggaran" />

            <flux:input label="Realisasi Anggaran Belanja Sub Kegiatan"
                placeholder="Realisasi Anggaran Belanja Sub Kegiatan"
                wire:model="realisasi_anggaran_belanja_sub_kegiatan" />

            <flux:textarea label="Lokasi" placeholder="Lokasi" wire:model="lokasi" rows="auto" />

            <flux:input label="Sarana penerima Manfaat" placeholder="Sarana penerima Manfaat"
                wire:model="sarana_penerima_manfaat" />

            <flux:input label="Kendala Pelaksanaan" placeholder="Kendala Pelaksanaan"
                wire:model="kendala_pelaksanaan" />

            <flux:input label="Besaran Manfaat" placeholder="Besaran Manfaat" wire:model="besaran_manfaat" />

            <flux:input label="Durasi Pemberian Bantuan" placeholder="Durasi Pemberian Bantuan"
                wire:model="durasi_pemberian_bantuan" />
        </div>
        <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-x-5">
            <flux:button variant="primary" type="submit" class="mt-8">Simpan</flux:button>
        </div>
    </form>

</div>
@script
<script>
    $wire.on('create-matriks', (e) => {
        Swal.fire({
            title: 'Berhasil',
            text: e.message,
            icon: e.type,
            timer: 2000
        })
    });
    $wire.on('error-matriks', (e) => {
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