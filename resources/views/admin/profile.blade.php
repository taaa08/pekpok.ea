@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Profile</h5>
        </div>

        @if ($errors->any())
            <ul class="list-group list-group-numbered">
            @foreach ($errors->all() as $error)
              <li class="list-group-item alert alert-danger">{{ $error }}</li>
            @endforeach
            </ul>
        @endif

        @if(session()->has('success'))
          <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
        @endif
      

        <div class="card-body">
          <form action="{{ route('profile.edit') }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')  
            @csrf

            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nama</label>
              <input type="text" class="form-control" id="basic-default-fullname" name="name" value="{{ Auth::user()->name }}" />
            </div>
            
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Email</label>
              <input type="email" class="form-control" id="basic-default-company" name="email" value="{{ Auth::user()->email }}" />
            </div>

            <div class="mb-3">
              <label class="form-label" for="basic-default-company2">New Password</label>
              <input type="password" class="form-control" id="basic-default-company2" name="password" />
            </div>
        
            <div class="mb-3">
              <label for="formFile" class="form-label">Pilih Gambar</label>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Gambar harus berupa jpeg,jpg,png</li>
                <li class="list-group-item">Maks panjang gambar 200 pixels</li>
                <li class="list-group-item">Maks lebar gambar 300 pixels</li>
                <li class="list-group-item">Jika tidak perlu mengganti gambar, maka bagian ini boleh di kosongkan</li>
              </ul>
              <input class="form-control" type="file" id="formFile" name="gambar">              
            </div>

            @if (Auth::user()->gambar)
            <div class="mb-3">
              <label class="form-label">Anda telah menggunakan gambar dengan nama gambar: <span class="text-danger">{{ Auth::user()->gambar }}</span></label>
            </div>
            @endif
            
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection