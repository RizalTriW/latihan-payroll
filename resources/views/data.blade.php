@extends('layouts.master')
@section('title', '')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <a href="{{ route('create-data')}}" class="btn btn-icon icon-right btn-primary"><i class="far fa-edit"></i> Tambah data</a>
            <hr>
            @if (session('message'))
            <div class="alert alert-success alert-dismissible show fade">
                <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                    <span>×</span>
                  </button>
                  Data Berhasil di simpan
                </div>
              </div>
                
            @endif
            <table class="table table-striped table-bordered table-sm">
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Action</th>
                </tr>
                @foreach ($data_barang as $no => $data )
                <tr>
                    <td>{{ $data_barang->firstItem()+$no }}</td>
                    <td>{{ $data->kode_barang }}</td>
                    <td>{{ $data->nama_barang }}</td>
                    <td>
                        <a href="{{ route('edit-data', $data->id) }}" class="badge badge-success">edit</a>
                        <a href="#" data-id="{{$data->id }}" class="badge badge-danger swall">
                            <form action="{{ route('delete-data', $data->id) }}" id="delete{{ $data->id }}" method="POST">
                            @csrf
                            @method('delete')  
                            </form>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
                
            </table>
            {{ $data_barang->links() }}
        </div>
    </div>
</div>

@endsection

@push('page-script')
{{-- <script src={{ asset("../assets/js/page/modules-sweetalert.js") }}></script>  --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-script')
<script>
$(".swall").click(function(e) {
    id=e.target.dataset.id;
    swal({
        title: 'Apakah Anda Yakin? ',
        text: 'Data yang sudah terhapus tidak bisa kembali',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
        // swal('Poof! Your imaginary file has been deleted!', {
        //   icon: 'success',
        // });
        $(`#delete${id}`).submit();
    } else {
        // swal('Your imaginary file is safe!');
        }
      });
  });
</script>
@endpush