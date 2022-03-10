@extends('layouts.master')
@section('title', '')
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-12">
            <div class="card">
              <div class="card-header">
                <h4>Data Barang</h4>
              </div>
              <div class="card-body">
                  <form action="{{ route('save-data') }}" method="post">
                    @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('kode_barang')
                                class="text-danger"
                            @enderror>Kode Barang @error('kode_barang')
                                | {{$message}}
                            @enderror</label>
                            <input type="text" name="kode_barang" value="{{old('kode_barang')}}"  class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label @error('nama_barang')
                                class="text-danger"
                            @enderror>Nama Barang @error('nama_barang')
                                | {{$message}}
                            @enderror</label>
                                <input type="text" name="nama_barang" value="{{old('nama_barang')}}" class="form-control">
                            </div>
                        </div>
                    </div>

              <div class="Card-footer text-right">
                <button class="btn btn-primary mr-1" type="submit">submit</button>
                <button class="btn btn-secondary" type="reset">Reset</button>
              </div>
            </form>
            </div>
          </div>
    </div>
</div>
@endsection