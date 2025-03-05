<table id="scroll-horizontal-datatable" class="table table-bordered w-100 nowrap" style="font-size: 12px">
  <thead>
      <tr>
          <th width="50">No</th>
          <th width="100">Status</th>
          <th>Status Error</th>
          <th>Baris Ke</th>
          <th>Nama</th>
          <th>Value Excel</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($dataError as $error)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td><span class="badge bg-danger">{{ $status == 'error' ? 'Data Excel Error' : 'Duplicate' }}</span></td>
              <td>{{ $error['message'] }}</td>
              <td>Baris Excel Ke : {{ $error['row_number'] }}</td>
              <td>{{ $error['nama'] }}</td>
              <td>
                   {{ $error['value'] }}    

              </td>
          </tr>
      @endforeach
  </tbody>
</table>