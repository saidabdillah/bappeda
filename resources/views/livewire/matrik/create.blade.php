<div>
  <form wire:submit="save">
    <div class="grid sm:grid-cols-2 gap-x-5 xl:grid-cols-3 gap-y-5">

      <flux:field>
        <flux:input type="month" label="Periode" wire:model="periode" />
      </flux:field>

      <flux:field>
        <flux:label>Tujuan Program</flux:label>
        <flux:select wire:model="tujuan_program">
          <flux:select.option selected value="">Pilih Tujuan Program</flux:select.option>
          <flux:select.option value="mengurangi beban pengeluaran">Mengurangi Beban Pengeluaran
          </flux:select.option>
          <flux:select.option value="meminimalkan wilayah kantong kemisikinan">Meminimalkan Wilayah Kantong
            Kemiskinan</flux:select.option>
          <flux:select.option value="meningkatkan pendapatan">Meningkatkan Pendapatan</flux:select.option>
          <flux:select.option value="tidak langsung">Tidak Langsung</flux:select.option>
        </flux:select>
      </flux:field>

      <flux:field>
        <flux:label>Perangkat Daerah Pelaksana</flux:label>
        <flux:select wire:model.live="perangkat_daerah_pelaksana">
          <flux:select.option selected value="">Pilih Perangkat Daerah Pelaksana</flux:select.option>
          @forelse ($skpd as $item)
          @if(Auth::user()->getRoleNames()->first() === 'admin')
          <flux:select.option value="{{ $item->id }}">{{ $item->skpd }}
          </flux:select.option>
          @else
          <flux:select.option value="{{ $item->skpd->id }}">{{ $item->skpd->skpd }}
          </flux:select.option>
          @endif
          @empty
          <flux:select.option value="">Tidak Ada</flux:select.option>
          @endforelse
        </flux:select>
      </flux:field>

      <flux:field>
        <flux:label>Kode</flux:label>
        <flux:select wire:model.live="kode" wire:key="{{ $perangkat_daerah_pelaksana }}">
          <flux:select.option selected>Pilih Kode</flux:select.option>
          @forelse (App\Models\Program::where('id_skpd', $perangkat_daerah_pelaksana)->get() as $item)
          <flux:select.option value="{{ $item->kode }}">{{ $item->kode }}</flux:select.option>
          @empty
          <flux:select.option value="">Tidak Ada</flux:select.option>
          @endforelse
        </flux:select>
      </flux:field>

      <flux:field>
        <flux:label>Program</flux:label>
        <flux:select wire:model="program" wire:key="{{ $kode }}">
          <flux:select.option selected>Pilih Program</flux:select.option>
          @forelse (App\Models\Program::where('kode', $kode)->get() as $item)
          <flux:select.option value="{{ $item->program }}">{{ $item->program }}</flux:select.option>
          @empty
          <flux:select.option value="">Tidak ada</flux:select.option>
          @endforelse
        </flux:select>
      </flux:field>

      <flux:field>
        <flux:label>Kegiatan</flux:label>
        <flux:select wire:model="kegiatan" wire:key="{{ $kode }}">
          <flux:select.option selected>Pilih Kegiatan</flux:select.option>
          @forelse (App\Models\Program::where('kode', $kode)->get() as $item)
          <flux:select.option value="{{ $item->kegiatan }}">{{ $item->kegiatan }}</flux:select.option>
          @empty
          <flux:select.option value="">Tidak ada</flux:select.option>
          @endforelse
        </flux:select>
      </flux:field>

      <flux:field>
        <flux:label>Sub Kegiatan</flux:label>
        <flux:select wire:model="sub_kegiatan" wire:key="{{ $kode }}">
          <flux:select.option selected>Pilih Sub Kegiatan</flux:select.option>
          @forelse (App\Models\Program::where('kode', $kode)->get() as $item)
          <flux:select.option value="{{ $item->sub_kegiatan }}">{{ $item->sub_kegiatan }}</flux:select.option>
          @empty
          <flux:select.option value="">Tidak ada</flux:select.option>
          @endforelse
        </flux:select>
      </flux:field>

      <flux:field>
        <flux:label>Pagu Sub Kegiatan</flux:label>
        <flux:select wire:model="alokasi_anggaran" wire:key="{{ $kode }}">
          <flux:select.option selected>Pilih Pagu Sub Kegiatan</flux:select.option>
          @forelse (App\Models\Program::where('kode', $kode)->get() as $item)
          <flux:select.option value="{{ $item->alokasi_anggaran }}">Rp.{{ number_format($item->alokasi_anggaran, 2, ',',
            '.') }}
          </flux:select.option>
          @empty
          <flux:select.option value="0">Rp.0</flux:select.option>
          @endforelse
        </flux:select>
      </flux:field>

      <flux:input label="Belanja Spesifik Sub Kegiatan" placeholder="Belanja Spesifik Sub Kegiatan"
        wire:model="belanja_spesifik_sub_kegiatan" />

      <flux:input label="Anggaran Belanja Spesifik Sub Kegiatan" type="number"
        placeholder="Anggaran Belanja Spesifik Sub Kegiatan" wire:model="anggaran_belanja_spesifik_sub_kegiatan" />


      <flux:input label="Realisasi Anggaran Belanja Spesifik" type="number"
        placeholder="Realisasi Anggaran Belanja Spesifik" wire:model="realisasi_anggaran" />

      <flux:input label="Sumber Pembiayaan" placeholder="Sumber Pembiayaan" wire:model="sumber_pembiayaan" />

      <flux:input label="% Realisasi Anggaran Belanja Spesifik" type="number"
        placeholder="% Realisasi Anggaran Belanja Spesifik" wire:model="realisasi_anggaran_belanja_sub_kegiatan" />

      <flux:textarea label="Lokasi" placeholder="Lokasi" wire:model="lokasi" rows="auto" />

      <flux:input label="Sasaran penerima Manfaat" placeholder="Sasaran penerima Manfaat"
        wire:model="sasaran_penerima_manfaat" />

      <flux:input label="Kendala Pelaksanaan" placeholder="Kendala Pelaksanaan" wire:model="kendala_pelaksanaan" />

      <flux:input label="Besaran Manfaat" placeholder="Besaran Manfaat" wire:model="besaran_manfaat" />

      <flux:input label="Waktu Pelaksanaan" placeholder="Waktu Pelaksanaan" wire:model="durasi_pemberian_bantuan" />
    </div>
    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-x-5">
      <flux:button variant="primary" type="submit" class="mt-8">Simpan</flux:button>
    </div>
  </form>

</div>