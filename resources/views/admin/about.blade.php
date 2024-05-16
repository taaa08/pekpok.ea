@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
           
           <!-- Basic Bootstrap Table -->
           <div class="card">

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
               <div class="col-7 col-md-9">
                 <h5 class="card-header">Tentang Kami</h5>
               </div>
               <div class="col-5 col-md-3">
                 <div class="mt-3">
                   <!-- Button trigger modal -->

                   <?php
                      $aboutLong = count($getAbout);
                   ?>

                   @if ($aboutLong < 1)
                   <button
                     type="button"
                     class="btn btn-primary float-end"
                     data-bs-toggle="modal"
                     data-bs-target="#backDropModal"
                   >
                   <i class="bx bx-plus"></i> Tambah Tentang Kami 
                   </button>
                   @else
                   <button class="btn btn-primary float-end" disabled><i class="bx bx-plus"></i> Tambah Tentang Kami</button>
                   @endif
                   
                   <!-- Modal -->
                   <div class="modal fade" id="backDropModal" data-bs-backdrop="static" tabindex="-1">
                     <div class="modal-dialog">
                       <form class="modal-content" method="POST" action="{{ route('about.store') }}" enctype="multipart/form-data">
                         @csrf
                         <div class="modal-header">
                           <h5 class="modal-title" id="backDropModalTitle">Tambah Tentang Kami</h5>
                           <button
                             type="button"
                             class="btn-close"
                             data-bs-dismiss="modal"
                             aria-label="Close"
                           ></button>
                         </div>
                         <div class="modal-body">
                         <div class="row">
                             <div class="col mb-3">
                               <label for="name2Backdrop" class="form-label">Keterangan</label>
                               <textarea name="keterangan" id="name2Backdrop" class="form-control"></textarea>
                               
                             </div>
                         </div>
                         <div class="row">
                             <div class="col mb-3">
                               <label for="formFile" class="form-label">Pilih Gambar</label>
                               <input class="form-control" type="file" id="formFile" name="gambar">
                             </div>
                         </div>
                           
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                             Close
                           </button>
                           <button type="submit" class="btn btn-primary">Save</button>
                         </div>
                       </form>
                     </div>
                   </div>

                   @forelse ($getAbout as $item)
                   <!-- Modal -->
                   <div class="modal fade" id="modalScrollable{{ $item->id }}" data-bs-backdrop="static" tabindex="-1">
                     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="modalScrollableTitle">Hapus Tentang Kami</h5>
                           <button
                             type="button"
                             class="btn-close"
                             data-bs-dismiss="modal"
                             aria-label="Close"
                           ></button>
                         </div>
                         <form action="{{ route('about.destroy', ['about' => $item->id]) }}" method="POST">
                           @method('DELETE')
                           @csrf
                         <div class="modal-body">
                           <p>
                             Apakah Anda yakin untuk menghapus data dengan ini?
                           </p>
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                             Close
                           </button>
                           <button type="submit" class="btn btn-danger">
                             Delete
                           </button>
                         </div>
                         </form>
                       </div>
                     </div>
                   </div>
                   @empty

                   @endforelse

                 </div>
               </div>
             </div>
             
             
             <div class="table-responsive text-nowrap">
               <table class="table">
                 <thead>
                   <tr>
                     <th>No</th>
                     <th>Keterangan</th>
                     <th>Gambar</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody class="table-border-bottom-0">
                   @forelse ($getAbout as $item)
                   <tr>
                     <td>{{ $loop->iteration }}</td>
                     <?php
                        $shortWords = (strlen($item->keterangan) > 50) ? substr($item->keterangan, 0, 50) . "..." : $item->keterangan;
                     ?>
                     <td>{{ $shortWords }}</td>
                     <td>{{ $item->gambar }}</td>
                     <td>
                       <div class="dropdown">
                         <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                           <i class="bx bx-dots-vertical-rounded"></i>
                         </button>
                         <div class="dropdown-menu">
                           <a class="dropdown-item" href="{{ route('about.show', ['about' => $item->id]) }}"
                             ><i class="bx bx-edit-alt me-2"></i> Edit</a
                           >

                           <button
                             type="button"
                             class="btn"
                             data-bs-toggle="modal"
                             data-bs-target="#modalScrollable{{ $item->id }}"
                           >
                           <i class="bx bx-trash me-2"></i> Delete
                           </button>
                           
                           
                           <!-- <a class="dropdown-item" href="javascript:void(0);"
                             ><i class="bx bx-trash me-2" data-bs-toggle="modal"data-bs-target="#modalScrollable"></i> Delete</a
                           > -->
                           
                         </div>
                       </div>
                     </td>
                   </tr>
                   @empty

                   @endforelse
                 </tbody>
               </table>
             </div>
           </div>
           <!--/ Basic Bootstrap Table -->

         </div>    
@endsection