@extends('halaman_utama.template')

@section('konten')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kep Keluar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    @include('login.logout')
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

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

            <form class="form-inline" method="GET" action="{{ route('surat-masuk-suratKeputusan.index') }}">
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
                        <th width="5%">No.</th>
                        <th>Nama</th>
                        <th>PANGKAT</th>
                        <th>NIP</th>
                        <th>JABATAN</th>
                        <th>KESATUAN</th>
                        <th width="15%"><i class="fas fa-cog"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop data surat -->
                    @foreach ($suratKeputusanKel as $surat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $surat->nama }}</td>
                        <td>{{ $surat->pangkat }}</td>
                        <td>{{ $surat->nip }}</td>
                        <td>{{ $surat->jabatan }}</td>
                        <td>{{ $surat->kesatuan }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSuratModal{{ $surat->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="POST" action="{{ route('surat-keluar-suratKeputusanKel.destroy', $surat->id) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Surat Modal -->
<div class="modal fade" id="editSuratModal{{ $surat->id }}" tabindex="-1" role="dialog" aria-labelledby="editSuratModalLabel{{ $surat->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('surat-keluar-suratKeputusanKel.update', $surat->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editSuratModalLabel{{ $surat->id }}"><i class="fas fa-edit"></i> Edit Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="nama"><i class="fas fa-envelope"></i> Nama</label>
                        <input type="text" name="nama" id="nama" value="{{ $surat->nama }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pangkat"><i class="fas fa-address-card"></i> Pangkat</label>
                        <input type="text" name="pangkat" id="pangkat" value="{{ $surat->pangkat }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nip"><i class="fas fa-address-card"></i> NIP</label>
                        <input type="text" name="nip" id="nip" value="{{ $surat->nip }}" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="jabatan"><i class="fas fa-address-card"></i> Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ $surat->jabatan }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kesatuan"><i class="fas fa-address-card"></i> Kesatuan</label>
                        <input type="text" name="kesatuan" id="kesatuan" value="{{ $surat->kesatuan }}" class="form-control" required>
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
            <form method="POST" action="{{ route('surat-keluar-suratKeputusanKel.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel"><i class="fas fa-user-plus"></i> Tambah Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama"><i class="fas fa-envelope"></i> Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pangkat"><i class="fas fa-address-card"></i> Pangkat</label>
                        <input type="text" name="pangkat" id="pangkat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nip"><i class="fas fa-address-card"></i> NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan"><i class="fas fa-address-card"></i> Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kesatuan"><i class="fas fa-address-card"></i> Kesatuan</label>
                        <input type="text" name="kesatuan" id="kesatuan" class="form-control" required>
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

@endsection
