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
          <h5 class="mb-0">Edit Promo</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('promo.edit', ['promo' => $promo->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PATCH')  
            @csrf

            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nama</label>
              <input type="text" class="form-control" id="basic-default-fullname" name="nama" value="{{ $promo->nama }}" />
            </div>
            <div class="mb-3">
                <label for="exampleFormControlSelect2" class="form-label">Kategori</label>
                <select class="form-control js-search" aria-label="Default select example" name="kategori[]" multiple style="width: 100%;">
                    <?php
                        $setArr = ["0", "1", "2"];

                        $isMatching = array_diff($setArr, $promo->kategori);
                    ?>
                    @foreach ($promo->kategori as $item)
                        <?php
                            if ($item == "0") {
                                $getName = "Makanan";
                            } else if ($item == "1") {
                                $getName = "Minuman";
                            } else if ($item == "2") {
                                $getName = "Best Seller";
                            }
                        ?>
                        <option value="{{ $item }}" selected>{{ $getName}}</option>
                    @endforeach
                    @if ($isMatching)
                        @foreach ($isMatching as $match)
                            <?php
                                if ($match == "0") {
                                    $getName = "Makanan";
                                } else if ($match == "1") {
                                    $getName = "Minuman";
                                } else if ($match == "2") {
                                    $getName = "Best Seller";
                                }
                            ?>
                            <option value="{{ $match }}">{{ $getName }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Harga Sebelum Diskon</label>
              <input type="text" class="form-control" id="basic-default-company" name="harga_before" value="{{ $promo->harga_before }}" />
            </div>

            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Harga Setelah Diskon</label>
              <input type="text" class="form-control" id="basic-default-company" name="harga_after" value="{{ $promo->harga_after }}" />
            </div>

            <div class="mb-3">
              <label class="form-label" for="basic-default-company">Berlaku Sampai</label>
              <input type="date" class="form-control" id="basic-default-company" name="masa_berlaku" value="{{ $promo->masa_berlaku }}" />
            </div>
            
            <div class="mb-3">
              <label class="form-label" for="basic-default-phone">Keterangan</label>
              <input
                type="text"
                id="basic-default-phone"
                class="form-control phone-mask"
                name="keterangan"
                value="{{ $promo->keterangan }}"
              />
            </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">Pilih Gambar</label>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Gambar harus berupa jpeg,jpg,png</li>
                <li class="list-group-item">Maks panjang & lebar gambar 1080 pixels, min 500 pixels</li>
                <li class="list-group-item">Jika tidak perlu mengganti gambar, maka bagian ini boleh di kosongkan</li>
              </ul>
              <input class="form-control" type="file" id="formFile" name="gambar">              
            </div>

            <div class="mb-3">
              <label class="form-label">Anda telah menggunakan gambar dengan nama gambar: <span class="text-danger">{{ $promo->gambar }}</span></label>
            </div>
            
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection