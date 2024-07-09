@extends('halaman_utama.template')

@section('konten')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Nota Dinas Keluar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            @include('login.logout')
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->

<div class="container mt-2">
    {{-- untuk pesan keluarnya --}}
    @include('layouts.surat-masuk.komponen.error')
    {{-- end --}}
    <div class="row">
        <div class="col-md-12">
            <hr>
            <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addStudentModal">
                <i class="fas fa-user-plus"></i> Tambah
            </button>

            <form class="form-inline" method="GET" action="{{ route('surat-masuk-notaDinasKel.index') }}">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>                                
                    </div>
                </div>
            </form>

            <table class="table table-striped table-bordered">
                <thead class="bg-light text-dark">
                    <tr>
                        <th width="5%">No Agenda</th>
                        <th>Kepada Yth.</th>
                        <th>Surat Dari</th>
                        <th>Nomor Surat/Tgl</th>
                        <th>Perihal</th>
                        <th width="15%"><i class="fas fa-cog"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop data surat -->
                    @foreach ($notaDinasKel as $surat)
                    <tr>
                        <td>{{ $surat->nomor_agenda }}</td>
                        <td>{{ $surat->kepada_yth }}</td>
                        <td>{{ $surat->surat_dari }}</td>
                        <td>{{ $surat->nomor_surat_tgl }}</td>
                        <td>{{ $surat->perihal }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editStudentModal{{ $surat->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                                                        
                            <form method="POST" action="{{ route('surat-keluar-notaDinasKel.destroy', $surat->id) }}" class="d-inline" onsubmit="return confirmDelete()">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="studentId" value="{{ $surat->id }}">
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            
                        </td>
                    </tr>

                    <!-- Edit Surat Modal -->
                    <div class="modal fade" id="editStudentModal{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="editStudentModalLabel{{ $surat->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('surat-keluar-notaDinasKel.update', $surat->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editStudentModalLabel{{ $surat->id }}"><i class="fas fa-edit"></i> Edit Surat</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="{{ $surat->id }}">
                                        <div class="form-group">
                                            <label for="no_agenda"><i class="fas fa-user"></i> No Agenda</label>
                                            <input type="text" name="no_agenda" id="no_agenda" value="{{ $surat->nomor_agenda }}" class="form-control" required disabled>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="kepada_yth"><i class="fas fa-envelope"></i> Kepada Yth.</label>
                                            <input type="text" name="kepada_yth" id="kepada_yth" value="{{ $surat->kepada_yth }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="surat_dari"><i class="fas fa-address-card"></i> Surat Dari</label>
                                            <input type="text" name="surat_dari" id="surat_dari" value="{{ $surat->surat_dari }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nomor_surat_tgl"><i class="fas fa-address-card"></i> Nomor Surat/Tgl</label>
                                            <input type="text" name="nomor_surat_tgl" id="nomor_surat_tgl" value="{{ $surat->nomor_surat_tgl }}" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="perihal"><i class="fas fa-address-card"></i> Perihal</label>
                                            <input type="text" name="perihal" id="perihal" value="{{ $surat->perihal }}" class="form-control" required>
                                        </div>
                                    </div>                    
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add Surat Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('surat-keluar-notaDinasKel.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel"><i class="fas fa-user-plus"></i> Tambah Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nomor_agenda"><i class="fas fa-user"></i> Nomor Agenda</label>
                        <input type="text" name="nomor_agenda" id="nomor_agenda" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kepada_yth"><i class="fas fa-envelope"></i> Kepada Yth.</label>
                        <input type="text" name="kepada_yth" id="kepada_yth" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="surat_dari"><i class="fas fa-address-card"></i> Surat Dari</label>
                        <input type="text" name="surat_dari" id="surat_dari" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nomor_surat_tgl"><i class="fas fa-address-card"></i> Nomor Surat/Tgl</label>
                        <input type="text" name="nomor_surat_tgl" id="nomor_surat_tgl" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="perihal"><i class="fas fa-address-card"></i> Perihal</label>
                        <input type="text" name="perihal" id="perihal" class="form-control" required>
                    </div>
                </div>                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection
