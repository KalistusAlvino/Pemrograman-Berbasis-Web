@extends('layouts.main')
@section('title', 'Mahasiswa')
@section('content')
<div class="card mt-4">
    <div class="card-header"></div>
    <div class="card-body">
        @php
            $minat = explode(',' , $mhs->minat);
        @endphp
        <form action="/mahasiswa/update/{{ $mhs->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>NIM</label>
                <input type="number" name="nim" class="form-control" value="{{ $mhs->nim }}" readonly>
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ $mhs->nama }}">
            </div>

            <label>Gender</label>
            <div class="form-check">
                <input type="radio" name="gender" value="Pria" class="form-check-input" {{ ($mhs->gender == 'Pria') ? 'checked':''}}>
                <label>Pria</label>
            </div>
            <div class="form-check">
                <input type="radio" name="gender" value="Wanita" class="form-check-input" {{ ($mhs->gender == 'Wanita') ? 'checked':''}}>
                <label>Wanita</label>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <select name="prodi" class="form-control">
                    <option value="0" {{ ($mhs->prodi == '0') ? 'selected':'' }}>Pilih Program Studi</option>
                    <option value="Sistem Informasi" {{ ($mhs->prodi == 'Sistem Informasi') ? 'selected':'' }}>Sistem Informasi</option>
                    <option value="Informatika" {{ ($mhs->prodi == 'Informatika') ? 'selected':'' }}>Informatika</option>
                    <option value="Sains Data" {{ ($mhs->prodi == 'Sains Data') ? 'selected':'' }}>Sains Data</option>
                    <option value="Teknik Komputer" {{ ($mhs->prodi == 'Teknik Komputer') ? 'selected':'' }}>Teknik Komputer</option>
                </select>
            </div>

            <label>Minat & Bakat</label>
            <div class="form-check">
                <input type="checkbox" name="minat[]" value="Ai" class="form-check-input"{{ in_array('Ai', $minat) ? 'checked':'' }}>
                <label>Artificial Intelegent</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="minat[]" value="Web" class="form-check-input"{{ in_array('Web', $minat) ? 'checked':'' }}>
                <label>Web Enginering</label>
            </div>
            <div class="form-check">
                <input type="checkbox" name="minat[]" value="Data" class="form-check-input"{{ in_array('Data', $minat) ? 'checked':'' }}>
                <label>Data Analyst</label>
            </div>


            <button type="submit" class="btn btn-primary mt-1 float-right">Submit</button>
        </form>
    </div>
</div>
@endsection