@extends('layout')
 
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif

    <table class="table table-bordered pt-4 mb-4 table-striped text-capitalize">
        <thead>
            <tr class="text-center">
                <th scope="col">No</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat Lengkap</th>
                <th scope="col">Agama</th>
                <th scope="col">Asal SMP</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($data as $dt)
            <tr>
                @if (!count($data))
                    <th scope="row" colspan="8">Data Tidak Tersedia.</th>
                @endif
                <td>{{ $i++ }}.</td>
                <td>{{ $dt->NamaLengkap }}</td>
                <td>{{ $dt->JK }}</td>
                <td>{{ $dt->AlamatLengkap }}</td>
                <td>{{ $dt->Agama }}</td>
                <td>{{ $dt->AsalSMP }}</td>
                <td>{{ $dt->Jurusan }}</td>
                <td>
                    <form action="{{ route('destroy',$dt->NoDaftar) }}" method="POST">
                        <a class="btn btn-success mt-1" href="{{ route('edit',$dt->NoDaftar) }}">Edit</a>
                        <a class="btn btn-info text-white mt-1" href="{{ route('show',$dt->NoDaftar) }}" target="_blank">Cetak</a>
    
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger mt-1">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection