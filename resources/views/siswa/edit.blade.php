@extends('layouts/master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{ session('sukses') }}
                    </div>
                    @endif
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Depan</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Nama Depan" name="nama_depan"
                                            value="{{$siswa->nama_depan}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Belakang</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Nama Belakang"
                                            name="nama_belakang" value="{{$siswa->nama_belakang}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control"
                                            id="exampleFormControlSelect1">
                                            <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif >Laki
                                                Laki
                                            </option>
                                            <option value="P" @if ($siswa->jenis_kelamin == 'P') selected
                                                @endif>Perempuan
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Agama</label>
                                        <input name="agama" type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Agama" value="{{$siswa->agama}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1"
                                            rows="3">{{$siswa->alamat}}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Avatar</label>
                                        <input type="file" name="avatar" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center align-items-center">
                                    <a href="/siswa" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection