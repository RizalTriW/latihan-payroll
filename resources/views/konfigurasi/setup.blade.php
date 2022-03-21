@extends('layouts.master')
@section('title', '')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            @if (sizeof($setup) == 0 )
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah
                Data</button>
            @endif
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
                    <th>Hari Kerja</th>
                    <th>Action</th>
                </tr>
                @foreach ($setup as $no => $data )
                <tr>
                    <td>{{$no+1 }}</td>
                    <td>{{ $data->jumlah_hari_kerja }}</td>
                    <td>
                        <a href="{{ route('setup.store', $data->id) }}" class="badge badge-success">edit</a>
                        {{-- <a href="#" data-id="{{$data->id }}" class="badge badge-danger swall">
                        <form action="{{ route('delete-data', $data->id) }}" id="delete{{ $data->id }}" method="POST">
                            @csrf
                            @method('delete')
                        </form>
                        Delete
                        </a> --}}
                    </td>
                </tr>
                @endforeach

            </table>
            {{-- {{ $data_barang->links() }} --}}
        </div>
    </div>
</div>
@section('modal')
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hari Kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('setup.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label @error('jumlah_hari_kerja') class="text-danger" @enderror>Hari Kerja
                                    @error('jumlah_hari_kerja')
                                    | {{$message}}
                                    @enderror</label>
                                <input type="text" name="jumlah_hari_kerja" value="{{old('jumlah_hari_kerja')}}"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@endsection

@push('page-script')
{{-- <script src={{ asset("../assets/js/page/modules-sweetalert.js") }}></script> --}}
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-script')
<script>
    $(".swall").click(function (e) {
        id = e.target.dataset.id;
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
