<table style="width: 100%; height: 100%;">
  <thead>
    <tr>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Periode
      </th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Perangkat Daerah
        Pelaksana</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Tujuan Program
      </th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Kode</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Program</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Kegiatan</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Subkegiatan</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Alokasi Anggaran
        (Rp)</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Belanja
        Spesifik Sub Kegiatan
      </th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Anggaran Belanja
        Spesifik Sub Kegiatan
      </th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Sumber Pembiayaan
      </th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Realisasi Anggaran
        (Rp)</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Realisasi Anggaran Belanja
        Sub Kegiatan</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Lokasi</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Sasaran Penerima
        Manfaat</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Kendala
        Pelaksanaan</th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Besaran Manfaat
      </th>
      <th rowspan="2" align="center" valign="center" style="height: 100px; font-size: 20px">Durasi Pemberian
        Bantuan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
    </tr>
    @foreach ($matriks as $index => $matrik)
    <tr>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">
        {{ \Carbon\Carbon::parse($matrik->periode)->locale('id')->translatedFormat('F Y') }}
      </td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{
        $matrik->skpd->perangkat_daerah_pelaksana }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->tujuan_program }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->kode }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->program }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->kegiatan }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->sub_kegiatan }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->alokasi_anggaran }}
      </td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{
        $matrik->belanja_spesifik_sub_kegiatan }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{
        $matrik->anggaran_belanja_spesifik_sub_kegiatan
        }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->sumber_pembiayaan }}
      </td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->realisasi_anggaran }}
      </td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{
        $matrik->realisasi_anggaran_belanja_sub_kegiatan
        }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->lokasi }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{
        $matrik->sasaran_penerima_manfaat }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->kendala_pelaksanaan }}
      </td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{ $matrik->besaran_manfaat }}</td>
      <td style="text-align: center; height: 40px; font-size: 18px;" valign="center">{{
        $matrik->durasi_pemberian_bantuan }}</td>
    </tr>
    @endforeach
    <!-- Tambahkan baris data lainnya di sini -->
  </tbody>
</table>