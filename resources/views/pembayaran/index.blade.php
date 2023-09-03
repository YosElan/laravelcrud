@extends('template.main')
@section('konten')
<div class="container-fluid">
    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Data Pembayaran</h1>
    <p class="mb-4">Manajemen Spp | Inventory Spp</p> --}}
    <!-- DataTales Example -->
    <button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahDataModal">
        <i class="m-2 fas fa-plus"></i>Tambah Data
    </button>
    <div id="notification" class="notification"></div>
    <br /><br>
    <div class="card shadow mb-4">
        {{-- <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CRUD Laravel
            <button class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#tambahData"><i class="m-2 fas fa-plus"></i>Tambah Data</button>
            </h6>
        </div> --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr> <!-- Tambahkan tag penutup untuk elemen <th> -->
                    </thead>
                    <tbody>
                        @php
                        $no = 1; @endphp
                        @foreach ($pembayaran as $row)
                        <tr>
                            <td width="5%">{{$no++}}</td>
                            <td>{{$row->nama}}</td>
                            <td>{{$row->tgl_bayar}}</td>
                            <td>{{$row->jumlah}}</td>
                            <td>
                                <form id="deleteForm_{{ $row->id }}" action="{{ route('pembayaran.delete', $row->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="m-1 btn btn-sm btn-danger" onclick="deleteConfirmation({{ $row->id }})"><i class="fas fa-trash"></i></button>
                                <a href="#" class="btn btn-sm btn-warn      ing" data-toggle="modal" data-target="#editModal{{$row->id}}"><!-- Solid Style (fas) -->
                                    <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </form>
                            </td>
                        </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-header py-3 ">
            <div class="float-right">
                <h6 class="m-1 font-weight-bold text-success">Ingin menyimpan nya ke Excel?
                <a class="m-1 btn btn-sm btn-success" href="{{url('excel-export')}}"><i class="m-2 fas fa-file-excel"></i>Export</a></h6>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('pembayaran/save') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="tgl_bayar">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                </form>
            </div>
        </div>
    </div>
</div>

</div>
<!-- Edit Modal -->
@foreach ($pembayaran as $row)
<div class="modal fade" id="editModal{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$row->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{$row->id}}">Edit Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('pembayaran/save')}}" method="POST" id="tambahDataForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{$row->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="tgl_bayar">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" value="{{$row->tgl_bayar}}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{$row->jumlah}}">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('js')
<script>
    @if ($message = Session::get('dataTambah'))
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    

    Toast.fire({
        icon: 'success',
        title: 'Data Pembayaran berhasil ditambah'
    })

            @endif
</script>
 <!-- Include SweetAlert library -->
<script>
    // Tangani pengiriman formulir
    document.body.addEventListener("submit", function (e) {
        if (e.target && e.target.id === "tambahDataForm") {
            e.preventDefault(); // Mencegah formulir dikirim secara langsung

            // Simulasikan pengiriman data ke server atau tindakan yang sesuai di sini
            // Setelah data berhasil ditambahkan, tampilkan notifikasi
            showNotification('success', 'Data Barang berhasil ditambah');

            // Anda dapat menambahkan logika lain setelah notifikasi muncul
            // Contoh: menutup modal
            $('#tambahDataModal').modal('hide'); // Ini akan menutup modal dengan id 'tambahDataModal'
        }
    });

    function deleteConfirmation(id) {
  Swal.fire({
    title: 'Apakah Anda yakin?',
    text: 'Anda tidak dapat mengembalikan tindakan ini!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Ya, hapus!',
    cancelButtonText: 'Batal',
  }).then((result) => {
    if (result.isConfirmed) {
      // Submit the delete form
      const deleteForm = document.getElementById('deleteForm_' + id);
      if (deleteForm) {
        deleteForm.submit();
      } else {
        showNotification('error', 'Formulir tidak ditemukan');
      }
    }
  });
}

// Setelah data berhasil dihapus, tampilkan notifikasi
window.addEventListener('DOMContentLoaded', function () {
  const urlParams = new URLSearchParams(window.location.search);
  const successParam = urlParams.get('success');

  if (successParam === '1') {
    showNotification('success', 'Data berhasil dihapus');
  }
});

function showNotification(type, message) {
  Swal.fire({
    icon: type,
    title: message,
    showConfirmButton: false,
    timer: 2000,
  });
}


// Fungsi untuk menampilkan notifikasi
function showNotification(icon, title) {
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000, // Tampilkan notifikasi selama 3 detik
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer);
      toast.addEventListener('mouseleave', Swal.resumeTimer);
    },
  });
  Toast.fire({
    icon: icon,
    title: title,
  });
}

</script>

@endsection
