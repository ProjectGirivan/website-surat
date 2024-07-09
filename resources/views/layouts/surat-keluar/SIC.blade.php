@extends('halaman_utama.template')

@section('konten')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">SIC Keluar</h1>
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

<div class="container mt-2" style="overflow-x: auto; max-width: 100%;">
    {{-- untuk pesan keluarnya --}}
    @include('layouts.surat-masuk.komponen.error')
    {{-- end --}}
    <div class="row">
        <div class="col-md-12">
            <hr>
            <button type="button" class="btn btn-primary btn-sm mb-3" data-toggle="modal" data-target="#addStudentModal">
                <i class="fas fa-user-plus"></i> Tambah
            </button>

            <form class="form-inline" method="GET" action="{{ route('surat-masuk-SIC.index') }}">
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
                        <th>PANGKAT/NRP</th>
                        <th>JABATAN</th>
                        <th>KESATUAN</th>
                        <th>DIBERI IZIN OLEH</th>
                        <th>JENIS CUTI</th>
                        <th>LAMA CUTI</th>
                        <th>MULAI TANGGAL</th>
                        <th>S/D TANGGAL</th>
                        <th>PERGI DARI</th>
                        <th>TUJUAN KE</th>
                        <th>TRANSPORTASI</th>
                        <th>PENGIKUT</th>
                        <th>CATATAN</th>
                        <th width="15%"><i class="fas fa-cog"></i> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop data surat -->
                    @foreach ($sicKel as $surat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $surat->nama }}</td>
                        <td>{{ $surat->pangkat }}/{{ $surat->nrp }}</td>
                        <td>{{ $surat->jabatan }}</td>
                        <td>{{ $surat->kesatuan }}</td>
                        <td>{{ $surat->diberi_izin_oleh }}</td>
                        <td>{{ $surat->jenis_cuti }}</td>
                        <td>{{ $surat->lama_cuti }}</td>
                        <td>{{ $surat->mulai_tanggal }}</td>
                        <td>{{ $surat->sd_tanggal }}</td>
                        <td>{{ $surat->pergi_dari }}</td>
                        <td>{{ $surat->tujuan_ke }}</td>
                        <td>{{ $surat->transportasi }}</td>
                        <td>{{ $surat->pengikut }}</td>
                        <td>{{ $surat->catatan }}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editSuratModal{{ $surat->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <form method="POST" action="{{ route('surat-keluar-SIC.destroy', $surat->id) }}" class="d-inline">
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
            <form method="POST" action="{{ route('surat-keluar-SIC.update', $surat->id) }}">
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
                        <label for="nrp"><i class="fas fa-address-card"></i> NRP</label>
                        <input type="text" name="nrp" id="nrp" value="{{ $surat->nrp }}" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="jabatan"><i class="fas fa-address-card"></i> Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" value="{{ $surat->jabatan }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kesatuan"><i class="fas fa-building"></i> Kesatuan</label>
                        <input type="text" name="kesatuan" id="kesatuan" value="{{ $surat->kesatuan }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="diberi_izin_oleh"><i class="fas fa-user-check"></i> Diberi Izin Oleh</label>
                        <input type="text" name="diberi_izin_oleh" id="diberi_izin_oleh" value="{{ $surat->diberi_izin_oleh }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_cuti"><i class="fas fa-plane"></i> Jenis Cuti</label>
                        <input type="text" name="jenis_cuti" id="jenis_cuti" value="{{ $surat->jenis_cuti }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lama_cuti"><i class="fas fa-clock"></i> Lama Cuti</label>
                        <input type="text" name="lama_cuti" id="lama_cuti" value="{{ $surat->lama_cuti }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mulai_tanggal"><i class="fas fa-calendar-alt"></i> Mulai Tanggal</label>
                        <input type="date" name="mulai_tanggal" id="mulai_tanggal" value="{{ $surat->mulai_tanggal }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sd_tanggal"><i class="fas fa-calendar-alt"></i> S/D Tanggal</label>
                        <input type="date" name="sd_tanggal" id="sd_tanggal" value="{{ $surat->sd_tanggal }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pergi_dari"><i class="fas fa-plane-departure"></i> Pergi Dari</label>
                        <input type="text" name="pergi_dari" id="pergi_dari" value="{{ $surat->pergi_dari }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tujuan_ke"><i class="fas fa-plane-arrival"></i> Tujuan Ke</label>
                        <input type="text" name="tujuan_ke" id="tujuan_ke" value="{{ $surat->tujuan_ke }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="transportasi"><i class="fas fa-car"></i> Transportasi</label>
                        <input type="text" name="transportasi" id="transportasi" value="{{ $surat->transportasi }}" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pengikut"><i class="fas fa-users"></i> Pengikut</label>
                        <input type="text" name="pengikut" id="pengikut" value="{{ $surat->pengikut }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="catatan"><i class="fas fa-sticky-note"></i> Catatan</label>
                        <input type="text" name="catatan" id="catatan" value="{{ $surat->catatan }}" class="form-control">
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
            <form method="POST" action="{{ route('surat-keluar-SIC.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel"><i class="fas fa-user-plus"></i> Tambah Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- form inputs for adding a new record -->
                    <div class="form-group">
                        <label for="nama"><i class="fas fa-envelope"></i> Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pangkat"><i class="fas fa-address-card"></i> Pangkat</label>
                        <input type="text" name="pangkat" id="pangkat" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nrp"><i class="fas fa-address-card"></i> NRP</label>
                        <input type="text" name="nrp" id="nrp" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jabatan"><i class="fas fa-address-card"></i> Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="kesatuan"><i class="fas fa-building"></i> Kesatuan</label>
                        <input type="text" name="kesatuan" id="kesatuan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="diberi_izin_oleh"><i class="fas fa-user-check"></i> Diberi Izin Oleh</label>
                        <input type="text" name="diberi_izin_oleh" id="diberi_izin_oleh" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_cuti"><i class="fas fa-plane"></i> Jenis Cuti</label>
                        <input type="text" name="jenis_cuti" id="jenis_cuti" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="lama_cuti"><i class="fas fa-clock"></i> Lama Cuti</label>
                        <input type="text" name="lama_cuti" id="lama_cuti" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="mulai_tanggal"><i class="fas fa-calendar-alt"></i> Mulai Tanggal</label>
                        <input type="date" name="mulai_tanggal" id="mulai_tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sd_tanggal"><i class="fas fa-calendar-alt"></i> S/D Tanggal</label>
                        <input type="date" name="sd_tanggal" id="sd_tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pergi_dari"><i class="fas fa-plane-departure"></i> Pergi Dari</label>
                        <input type="text" name="pergi_dari" id="pergi_dari" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tujuan_ke"><i class="fas fa-plane-arrival"></i> Tujuan Ke</label>
                        <input type="text" name="tujuan_ke" id="tujuan_ke" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="transportasi"><i class="fas fa-car"></i> Transportasi</label>
                        <input type="text" name="transportasi" id="transportasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="pengikut"><i class="fas fa-users"></i> Pengikut</label>
                        <input type="text" name="pengikut" id="pengikut" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="catatan"><i class="fas fa-sticky-note"></i> Catatan</label>
                        <input type="text" name="catatan" id="catatan" class="form-control">
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
