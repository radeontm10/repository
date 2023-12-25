{{-- @extends('layouts.app')

@section('content')

    <div class="container"> 
    <h1> halo {{$myName}} </h1>
 --}}
 {{-- @extends('layouts.app')

 @section('content')
 <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">{{ __('Daftar User') }}</div>
 
                 <div class="card-body">
                     <a href="{{ url('/user/create') }}" class="btn btn-primary mb-3">Tambah User</a>
                     <table class="table">
                         <thead>
                             <tr>
                                 <th>Nama</th>
                                 <th>Email</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($users as $id => $user)
                                 <tr>
                                     <td>{{ $user['name'] }}</td>
                                     <td>{{ $user['email'] }}</td>
                                     <td>
                                         <a href="{{ url('/users/' . $id . '/edit') }}" class="btn btn-warning">Edit</a>
                                         <form action="{{ url('/users/' . $id) }}" method="POST" style="display: inline;">
                                             @csrf
                                             @method('DELETE')
                                             <button type="submit" class="btn btn-danger">Hapus</button>
                                         </form>
                                     </td>
                                 </tr>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
  --}}
  @extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Daftar Pengguna</h1>
                <a href="{{ route('user.create') }}" class="btn btn-success">Tambah Pengguna</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user['id'] }}</td>
                                <td>{{ $user['name'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>
                                    <a href="{{ route('user.show', $user['id']) }}" class="btn btn-primary">Lihat</a>
                                    <a href="{{ route('user.edit', $user['id']) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('user.destroy', $user['id']) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <a href="{{ route('user.create') }}" class="btn btn-success">Tambah Pengguna</a> --}}
            </div>
        </div>
    </div>
@endsection
