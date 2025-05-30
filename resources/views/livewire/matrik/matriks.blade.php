<div>
    <div class="mb-6 flex justify-between">
        <form class="flex w-1/3">
            <flux:input icon="magnifying-glass" wire:model="search" placeholder="Pencarian..." />
            <flux:button class="ml-2" type="submit" variant="primary">Cari</flux:button>
        </form>
        <div>
            {{-- <flux:modal.trigger name="pdf">
                <flux:button>Download PDF</flux:button>
            </flux:modal.trigger> --}}
            <flux:modal.trigger name="excel">
                <flux:button variant="primary">Download Excel</flux:button>
            </flux:modal.trigger>
        </div>
    </div>



    {{-- <flux:modal name="pdf" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Download PDF</flux:heading>
            </div>

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" wire:click="downloadPdf" variant="primary">Submit
                </flux:button>
            </div>
        </div>
    </flux:modal> --}}

    <flux:modal name="excel" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Download Excel</flux:heading>
                {{-- <flux:text class="mt-2">Make changes to your personal details.</flux:text> --}}
            </div>
            <flux:field>
                <flux:input type="month" label="Periode" wire:model="periode" />
            </flux:field>

            <flux:radio.group wire:model="perbulan" label="Pilih Per Berapa Bulan">
                <flux:radio value="1" label="Satu Bulan" checked />
                <flux:radio value="3" label="Tiga Bulan" />
            </flux:radio.group>

            <div class="flex">
                <flux:spacer />

                <flux:button type="submit" wire:click="downloadExcel" variant="primary">Download</flux:button>
            </div>
        </div>
    </flux:modal>


    <div class="overflow-x-scroll">
        <table class="border-2 w-[5000px]">
            <thead class="bg-black text-white text-center">
                <tr>
                    <th class="py-2 px-3 border-2">Periode</th>
                    <th class="py-2 px-3 border-2">Perangkat Daerah Pelaksana</th>
                    <th class="py-2 px-3 border-2">Tujuan Program</th>
                    <th class="py-2 px-3 border-2">Kode</th>
                    <th class="py-2 px-3 border-2">Program</th>
                    <th class="py-2 px-3 border-2">Kegiatan</th>
                    <th class="py-2 px-3 border-2">Subkegiatan</th>
                    <th class="py-2 px-3 border-2">Pagu Sub Kegiatan</th>
                    <th class="py-2 px-3 border-2">Belanja Spesifik Sub Kegiatan</th>
                    <th class="py-2 px-3 border-2">Anggaran Belanja Spesifik Sub Kegiatan</th>
                    <th class="py-2 px-3 border-2">Sumber Pembiayaan</th>
                    <th class="py-2 px-3 border-2">Realisasi Anggaran Belanja Spesifik</th>
                    <th class="py-2 px-3 border-2">% Realisasi Anggaran Belanja Spesifik</th>
                    <th class="py-2 px-3 border-2">Lokasi</th>
                    <th class="py-2 px-3 border-2">Sasaran Penerima Manfaat</th>
                    <th class="py-2 px-3 border-2">Kendala Pelaksanaan</th>
                    <th class="py-2 px-3 border-2">Besaran Manfaat</th>
                    <th class="py-2 px-3 border-2">Waktu Pelaksanaan</th>
                </tr>
            </thead>
            <tbody class="border-2 text-left">
                @forelse ($matriks as $index => $matrik)
                <tr>
                    <td class="py-2 px-3 border-2">
                        {{ \Carbon\Carbon::parse($matrik->periode)->locale('id')->translatedFormat('F Y') }}
                    </td>
                    <td class="py-2 px-3 border-2">{{ $matrik->skpd->perangkat_daerah_pelaksana }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->tujuan_program }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->kode }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->program }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->kegiatan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->sub_kegiatan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->alokasi_anggaran != 0 ? $matrik->alokasi_anggaran :
                        0}}
                    </td>
                    <td class="py-2 px-3 border-2">{{ $matrik->belanja_spesifik_sub_kegiatan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->anggaran_belanja_spesifik_sub_kegiatan != 0 ?
                        $matrik->anggaran_belanja_spesifik_sub_kegiatan : 0
                        }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->sumber_pembiayaan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->realisasi_anggaran != 0 ? $matrik->realisasi_anggaran : 0
                        }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->realisasi_anggaran_belanja_sub_kegiatan != 0 ?
                        $matrik->realisasi_anggaran_belanja_sub_kegiatan : 0 }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->lokasi }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->sasaran_penerima_manfaat }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->kendala_pelaksanaan }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->besaran_manfaat }}</td>
                    <td class="py-2 px-3 border-2">{{ $matrik->durasi_pemberian_bantuan }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="18" class="text-center py-5">Tidak ada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>