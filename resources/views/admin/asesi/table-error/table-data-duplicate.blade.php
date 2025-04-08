<table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap" style="font-size: 12px">
  <thead>
      <tr>
          <th nowrap>Status</th>
          <th nowrap>Nama Group Asesi</th>
          <th nowrap>Nama Lengkap</th>
          <th nowrap>Nama Tempat Bekerja</th>
          <th nowrap>NIK</th>
          <th nowrap>Alamat Tempat Tinggal</th>
          <th nowrap>No Telp</th>
          <th nowrap>Email</th>
          <th nowrap>Jabatan Pekerjaan</th>
          <th nowrap>Skema Sertifikasi</th>
          <th nowrap>Rencana Uji Kompetensi</th>
      </tr>
  </thead>
  <tbody>
      @foreach($dataError as $duplicate)
          <tr>
              <td><span class="badge bg-warning">Data Duplicate</span></td>
              <td nowrap>{{ $duplicate['nama_group_asesi'] }}</td>
              <td nowrap>{{ $duplicate['nama_lengkap'] }}</td>
              <td nowrap>{{ $duplicate['nama_tempat_bekerja'] }}</td>
              <td nowrap>{{ $duplicate['nik'] }}</td>
              <td nowrap>{{ $duplicate['alamat_tempat_tinggal'] }}</td>
              <td nowrap>{{ $duplicate['telp'] }}</td>
              <td nowrap>{{ $duplicate['email'] }}</td>
              <td nowrap>{{ $duplicate['jabatan_pekerjaan'] }}</td>
              <td nowrap>{{ $duplicate['skema_sertifikasi'] }}</td>
              <td nowrap>{{ $duplicate['rencana_uji_kompetensi'] }}</td>
          </tr>
      @endforeach
  </tbody>
  </table>