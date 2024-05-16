@extends('layouts.admin')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
           
           <!-- Basic Bootstrap Table -->
           <div class="card">

            @if(session()->has('success'))
            <div class="alert alert-success" role="alert">{{ session()->get('success') }}</div>
            @endif
             <div class="row">
               <div class="col-7 col-md-9">
                 <h5 class="card-header">Kritik & Saran</h5>
               </div>
               <div class="col-5 col-md-3">
                 <div class="mt-3">
                  
                   @forelse ($getCust as $item)
                   <!-- Modal -->
                   <div class="modal fade" id="modalScrollable{{ $item->id }}" data-bs-backdrop="static" tabindex="-1">
                     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
                       <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="modalScrollableTitle">Hapus Kritik & Saran</h5>
                           <button
                             type="button"
                             class="btn-close"
                             data-bs-dismiss="modal"
                             aria-label="Close"
                           ></button>
                         </div>
                         <form action="{{ route('customercare.destroy', ['customercare' => $item->id]) }}" method="POST">
                           @method('DELETE')
                           @csrf
                         <div class="modal-body">
                           <p>
                             Apakah Anda yakin untuk menghapus data dengan <span class="text-danger">Nama: {{ $item->nama }}</span>?
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
                     <th>Nama</th>
                     <th>Email</th>
                     <th>Subjek</th>
                     <th>Pesan</th>
                     <th>Action</th>
                   </tr>
                 </thead>
                 <tbody class="table-border-bottom-0">
                   @forelse ($getCust as $item)
                   <tr>
                     <td>{{ $loop->iteration }}</td>
                     <td>{{ $item->nama }}</td>
                     <td>{{ $item->email }}</td>
                     <td>{{ $item->subjek }}</td>
                     <?php
                        $shortWords = (strlen($item->pesan) > 50) ? substr($item->pesan, 0, 50) . "..." : $item->pesan;
                     ?>
                     <td>{{ $shortWords }}</td>
                     <td>
                       <div class="dropdown">
                         <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                           <i class="bx bx-dots-vertical-rounded"></i>
                         </button>
                         <div class="dropdown-menu">
                           
                           <button
                             type="button"
                             class="btn"
                             data-bs-toggle="modal"
                             data-bs-target="#modalScrollable{{ $item->id }}"
                           >
                           <i class="bx bx-trash me-2"></i> Delete
                           </button>
                           
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