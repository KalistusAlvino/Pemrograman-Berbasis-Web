@extends('layouts/main')
@section('title', 'Mahasiswa')
@section('content')
    <div class="card mt-4">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/mahasiswa/simpan" method="POST">
                @csrf
                <div class="form-group">
                    <label>NIM</label>
                    <input type="number" name="nim" class="form-control" placeholder="Masukan NIM">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukan Nama">
                </div>

                <label>Gender</label>
                <div class="form-check">
                    <input type="radio" name="gender" value="Pria" class="form-check-input" checked>
                    <label>Pria</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="gender" value="Wanita" class="form-check-input">
                    <label>Wanita</label>
                </div>

                <div class="form-group">
                    <label>Program Studi</label>
                    <select name="prodi" class="form-control">
                        <option value="0">Pilih Program Studi</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Sains Data">Sains Data</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                </div>

                <label>Minat & Bakat</label>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" value="Ai" class="form-check-input">
                    <label>Artificial Intelegent</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" value="Web" class="form-check-input">
                    <label>Web Enginering</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="minat[]" value="Data" class="form-check-input">
                    <label>Data Analyst</label>
                </div>


                <button type="submit" class="btn btn-primary mt-1 float-right">Submit</button>
            </form>
        </div>
    </div>
@endsection
