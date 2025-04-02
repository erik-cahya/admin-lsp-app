<table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap" style="font-size: 12px">
  <thead>
      <tr>
          <th nowrap>Status</th>
          <th nowrap>Nomor Surat Permohonan</th>
          <th nowrap>Nama Lengkap</th>
          <th nowrap>Nama Tempat Bekerja</th>
          <th nowrap>Alamat Bekerja</th>
          <th nowrap>NIK</th>
          <th nowrap>Tempat Lahir</th>
          <th nowrap>Tanggal Lahir</th>
          <th nowrap>Jenis Kelamin</th>
          <th nowrap>Alamat Tempat Tinggal</th>
          <th nowrap>No Telp</th>
          <th nowrap>Email</th>
          <th nowrap>Pendidikan Terakhir</th>
          <th nowrap>Jabatan Pekerjaan</th>
          <th nowrap>Skema Sertifikasi</th>
          <th nowrap>Rencana Uji Kompetensi</th>
      </tr>
  </thead>
  <tbody>
      @foreach($dataError as $duplicate)
          <tr>
              <td><span class="badge bg-warning">Data Duplicate</span></td>
              <td nowrap>{{ $duplicate['nomor_surat_permohonan'] }}</td>
              <td nowrap>{{ $duplicate['nama_lengkap'] }}</td>
              <td nowrap>{{ $duplicate['nama_tempat_bekerja'] }}</td>
              <td nowrap>{{ $duplicate['alamat'] }}</td>
              <td nowrap>{{ $duplicate['nik'] }}</td>
              <td nowrap>{{ $duplicate['tempat_lahir'] }}</td>
              <td nowrap>{{ $duplicate['tanggal_lahir'] }}</td>
              <td nowrap>{{ $duplicate['jenis_kelamin'] }}</td>
              <td nowrap>{{ $duplicate['alamat_tempat_tinggal'] }}</td>
              <td nowrap>{{ $duplicate['telp'] }}</td>
              <td nowrap>{{ $duplicate['email'] }}</td>
              <td nowrap>{{ $duplicate['pendidikan_terakhir'] }}</td>
              <td nowrap>{{ $duplicate['jabatan_pekerjaan'] }}</td>
              <td nowrap>{{ $duplicate['skema_sertifikasi'] }}</td>
              <td nowrap>{{ $duplicate['rencana_uji_kompetensi'] }}</td>
          </tr>
      @endforeach
  </tbody>
  </table>