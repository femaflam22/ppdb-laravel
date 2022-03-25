@extends('layout')
 
@section('content')
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif

    <h4 class="mb-3">Formulir Pendaftaran</h4>
    <div class="p-4 border m-auto bg-light">
    <form method="post" action="{{ route('store') }}">
        @csrf
        <div class="form-group">
            <label for="nama" class="mb-2">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="NamaLengkap">
        </div>
        <div class="form-group mt-3">
            <label class="mb-2">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="JK" id="male" value="Laki-Laki">
                <label class="form-check-label" for="male">
                    Laki-Laki
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="JK" id="female" value="Perempuan">
                <label class="form-check-label" for="female">
                    Perempuan
                </label>
            </div>
        </div>
        <div class="form-group mt-3">
            <label for="alamat" class="mb-2">Alamat</label>
            <textarea class="form-control" id="alamat" name="AlamatLengkap" rows="3"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="agama" class="mb-2">Agama</label>
            <select class="form-control" id="agama" name="Agama">
                <option value="Islam">Islam</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Budha">Budha</option>
                <option value="Khonghuchu">Khonghuchu</option>
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="asalSMP" class="mb-2">Asal SMP</label>
            <input type="text" class="form-control" id="asalSMP" name="AsalSMP">
        </div>
        <div class="form-group mt-3">
            <label for="jurusan" class="mb-2">Jurusan</label>
            <select class="form-control" id="jurusan" name="Jurusan">
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                <option value="Tata Boga">Tata Boga</option>
                <option value="Tata Busana">Tata Busana</option>
                <option value="Multimedia">Multimedia</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
    </div>
@endsection