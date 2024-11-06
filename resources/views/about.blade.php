<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">DATA PEGAWAI</h1>
    <div class="container">
      <a href="/tambahpegawai" class="btn btn-success">Tambah Data</a>
      <div class="row g-3 align-items-center  mt-3">
        <div class="col-auto">
        <form action="/about" method="GET">
          <input type="search" id="inputPassword5" name="search" class="form-control" aria-describedby="passwordHelpBlock">
        </form>
        </div>

      </div>
      <div class="row">
        
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">No Telp</th>
            <th scope="col">Email</th>
            <th scope="col">Logo</th>
            <th scope="col">Dibuat</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php
            $no = 1;
          @endphp
          @foreach ($data as $index => $row)
          <tr>
            <th scope="row">{{ $index + $data->firstItem()}}</th>
            <td>{{ $row->namalengkap }}</td>
            <td>{{ $row->jeniskelamin }}</td>
            <td>0{{ $row->notelpon}}</td>
            <td>{{ $row->email}}</td>
            <td>
                  <img src="{{ asset('fotopegawai/'.$row->logo) }}" alt="" style="width : 50px;">

            </td>
            <td>{{ $row->created_at->format('D M Y')}}</td>
            <td>
              <a href="/tampilkandata/{{  $row->id }}" class="btn btn-info">Edit</a>
              <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-namalengkap="{{ $row->namalengkap }}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $data->links() }}
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </body>
  <script>
        $('.delete').click(function(){
            var pegawaiid =$(this).attr('data-id');
            var namalengkap =$(this).attr('data-namalengkap');
          swal({
                        title: "Yakin, Hapus Data?",
                        text: "Kamu akan menghapus data pegawai dengan id "+namalengkap+"",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                      })
                      .then((willDelete) => {
                        if (willDelete) {
                          window.location = "/delete/"+pegawaiid+"",
                          swal("Data berhasil dihapus!", {
                            icon: "success",
                          });
                        } else {
                          swal("Data tidak terhapus");
                        }
            });
        });
                                            
  </script>
  <script>
    @if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif
    
  </script>
</html>