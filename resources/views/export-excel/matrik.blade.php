<table>
  <thead>
    <tr>
      <th rowspan="2" align="center" valign="center">Periode
      </th>
      <th rowspan="2" align="center" valign="center">Perangkat Daerah
        Pelaksana</th>
      <th rowspan="2" align="center" valign="center">Tujuan Program
      </th>
      <th rowspan="2" align="center" valign="center">Kode</th>
      <th rowspan="2" align="center" valign="center">Program</th>
      <th rowspan="2" align="center" valign="center">Kegiatan</th>
      <th rowspan="2" align="center" valign="center">Subkegiatan</th>
      <th rowspan="2" align="center" valign="center">Pagu Sub Kegiatan</th>
      <th rowspan="2" align="center" valign="center">Belanja
        Spesifik Sub Kegiatan
      </th>
      <th rowspan="2" align="center" valign="center">Anggaran Belanja
        Spesifik Sub Kegiatan
      </th>
      <th rowspan="2" align="center" valign="center">Realisasi Anggaran
        Belanja Spesifik</th>
      <th rowspan="2" align="center" valign="center">Sumber Pembiayaan
      </th>
      <th rowspan="2" align="center" valign="center">% Realisasi Anggaran Belanja
        Spesifik</th>
      <th rowspan="2" align="center" valign="center">Lokasi</th>
      <th rowspan="2" align="center" valign="center">Sasaran Penerima
        Manfaat</th>
      <th rowspan="2" align="center" valign="center">Kendala
        Pelaksanaan</th>
      <th rowspan="2" align="center" valign="center">Besaran Manfaat
      </th>
      <th rowspan="2" align="center" valign="center">Durasi Pemberian
        Bantuan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
    </tr>
    @foreach ($matriks as $index => $matrik)
    <tr>
      <td>
        {{ \Carbon\Carbon::parse($matrik->periode)->locale('id')->translatedFormat('F Y') }}
      </td>
      <td>{{ $matrik->skpd->perangkat_daerah_pelaksana }}</td>
      <td>{{ $matrik->tujuan_program }}</td>
      <td>{{ $matrik->kode }}</td>
      <td>{{ $matrik->program }}</td>
      <td>{{ $matrik->kegiatan }}</td>
      <td>{{ $matrik->sub_kegiatan }}</td>
      <td>{{ $matrik->alokasi_anggaran }}</td>
      <td>{{ $matrik->belanja_spesifik_sub_kegiatan }}</td>
      <td>{{ $matrik->anggaran_belanja_spesifik_sub_kegiatan }}</td>
      <td>{{ $matrik->sumber_pembiayaan }}</td>
      <td>{{ $matrik->realisasi_anggaran }}</td>
      <td>{{ $matrik->realisasi_anggaran_belanja_sub_kegiatan }}</td>
      <td>{{ $matrik->lokasi }}</td>
      <td>{{ $matrik->sasaran_penerima_manfaat }}</td>
      <td>{{ $matrik->kendala_pelaksanaan }}</td>
      <td>{{ $matrik->besaran_manfaat }}</td>
      <td>{{ $matrik->durasi_pemberian_bantuan }}</td>
    </tr>
    @endforeach
    <!-- Tambahkan baris data lainnya di sini -->
  </tbody>
</table>