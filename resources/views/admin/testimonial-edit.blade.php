@extends('layouts.admin')

@section('content')
<div class="container">

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

    <div class="row">
    <div class="col-xl">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Edit Testimonial</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('testimonial.edit', ['testimoni' => $testimoni->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')  
            @csrf
            
            <div class="mb-3">
                <label for="name1Backdrop" class="form-label">Nama</label>
                <input class="form-control" type="text" id="name1Backdrop" name="nama" value="{{ $testimoni->nama }}">
            </div>

            <div class="mb-3">
              <label class="form-label" for="basic-default-phone">Keterangan</label>
              <textarea name="keterangan" id="basic-default-phone" class="form-control">{{ $testimoni->keterangan }}</textarea>
            </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">Pilih Gambar (Jika tidak perlu mengganti gambar, maka bagian ini boleh di kosongkan)</label>
              <input class="form-control" type="file" id="formFile" name="gambar">              
            </div>

            <div class="mb-3">
              <label class="form-label">Anda telah menggunakan gambar dengan nama gambar: <span class="text-danger">{{ $testimoni->gambar }}</span></label>
            </div>
            
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection