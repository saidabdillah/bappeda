<div>
    <flux:heading>Lihat Matriks</flux:heading>
    <flux:text class="mt-2">Lorem ipsum dolor sit amet consectetur.</flux:text>
    <flux:separator class="mt-4 mb-6" variant="outline" />


    <div class="mb-6 flex justify-between">
        <form wire:submit="searching" class="flex w-1/3">
            <flux:input icon="magnifying-glass" wire:model.live="search" placeholder="Pencarian..." />
            <flux:button class="ml-2" type="submit" variant="primary">Cari</flux:button>
        </form>
        <div>
            <flux:button variant="primary" href="{{ route('matrik.export') }}">Cetak Excel</flux:button>
        </div>
    </div>


    <div class="overflow-x-scroll">
        <table class="border-2 w-[5000px]">
            <thead class="bg-neutral-400 text-center">
                <tr>
                    <th class="py-2 px-3 border-2">No.</th>
                    <th class="py-2 px-3 border-2">Tujuan Program</th>
                    <th class="py-2 px-3 border-2">Perangkat Daerah Pelaksana</th>
                    <th class="py-2 px-3 border-2">Kode</th>
                    <th class="py-2 px-3 border-2">Program</th>
                    <th class="py-2 px-3 border-2">Subkegiatan</th>
                    <th class="py-2 px-3 border-2">Alokasi Kegiatan (Rp)</th>
                    <th class="py-2 px-3 border-2">Anggaran Belanja Spesifik Sub Kegiatan</th>
                    <th class="py-2 px-3 border-2">Sumber Pembiayaan</th>
                    <th class="py-2 px-3 border-2">Realisasi Anggaran (Rp)</th>
                    <th class="py-2 px-3 border-2">Lokasi</th>
                    <th class="py-2 px-3 border-2">Sasaran Penerima Manfaat</th>
                    <th class="py-2 px-3 border-2">Kendala Pelaksanaan</th>
                    <th class="py-2 px-3 border-2">Besaran Manfaat</th>
                    <th class="py-2 px-3 border-2">Durasi Pemberian Bantuan</th>
                </tr>
            </thead>
            <tbody class="border-2 text-left">
                @foreach ($matriks as $index => $matrik)
                <tr>
                    <td class="py-2 px-3 border-2">{{ ++$index }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->tujuan_program }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->kode_program }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->program_kegiatan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->alokasi_anggaran }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->belanja_spesifik_sub_kegiatan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->anggaran_belanja_spesifik_sub_kegiatan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->sumber_pembiayaan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->realisasi_anggaran }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->realisasi_anggaran_belanja_sub_kegiatan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->lokasi }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->sarana_penerima_manfaat }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->kendala_pelaksanaan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->besaran_manfaat }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->durasi_pemberian_bantuan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>