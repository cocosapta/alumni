@extends('layouts.layouts')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard/Broadcast/Pesan</li>
                </ol>
            </div>
        </div>
    </div>
</div>

@if(session()->has('success1'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success"></span> Data telah di Edit
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@elseif(session()->has('success'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success"></span> Data telah di Tambah
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
@elseif(session()->has('destroy'))
<div class="col-sm-12">
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success"></span> Data telah di Hapus
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>

@endif
<div class="col-md-12">
    <div class="card">
        <input class="btn btn-success" type="button" value="Pesan" data-toggle="modal" data-target="#pesan">
    </div><!-- /# card -->
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Pesan Yang Belum di Kirim</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Broadcast</th>
                        <th>Tanggal Broadcast</th>
                        <th>Keterangan Broadcast</th>
                        <th>Angkatan</th>
                        <th>User</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1 ?>
                    @foreach($b as $item)
                    @if($item->flag=='b')
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item['nama_broadcast']}}</td>
                        <td>{{$item['tgl_broadcast']}}</td>
                        <td>{{$item['keterangan_broadcast']}}</td>
                        <td>{{$item['angkatan']}}</td>
                        <td>{{$item['id_user']}}</td>
                        <td>
                            <form action="{{url('add.pesan')}}" method="POST">
                                @csrf
                                <a class="btn" data-toggle="modal" data-target="#lihat-{{$item->id_broadcast}}"><i class="fa fa-eye" style="color: blue;"></i></a>
                                <input type="hidden" name="id" value="{{$item->id_broadcast}}">
                                <input type="hidden" name="angkatan" value="{{$item->angkatan}}">
                                <button class="btn"><i class="fa fa-comments-o"></i></button>
                                <a class="btn" data-toggle="modal" data-target="#edit-{{$item->id_broadcast}}"><i class="fa fa-edit" style="color: green;"></i></a>
                                <a href="{{url('delete.pesan',$item->id_broadcast)}}" class="btn"><i class="fa fa-trash" style="color: red;"></i></a>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Kirim Broadcast</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('add') }}">
                    @csrf
                    <div class="form-group">
                        <label>Nama Broadcast</label>
                        <input id="nama_broadcast" type="text" class="form-control @error('nama_broadcast') is-invalid @enderror" name="nama_broadcast" value="{{ old('nama_broadcast') }}" required autocomplete="nama_broadcast" autofocus>

                        @error('nama_broadcast')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input id="keterangan_broadcast" type="text" class="form-control @error('keterangan_broadcast') is-invalid @enderror" name="keterangan_broadcast" value="{{ old('keterangan_broadcast') }}" required autocomplete="keterangan_broadcast" autofocus>

                        @error('keterangan_broadcast')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input id="angkatan" type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" value="{{ old('angkatan') }}" required autocomplete="angkatan" autofocus>

                        @error('angkatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input id="tujuan" type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" value="{{ old('tujuan') }}" required autocomplete="tujuan" autofocus>

                        @error('tujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach($b as $item)
<div class="modal fade" id="edit-{{$item->id_broadcast}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Kirim Broadcast</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ url('edit.pesan',$item->id_broadcast) }}">
                    @csrf
                    <div class="form-group">
                        <label>Judul Broadcast</label>
                        <input id="nama_broadcast" type="text" class="form-control @error('nama_broadcast') is-invalid @enderror" name="nama_broadcast" value="{{ old('nama_broadcast',$item->nama_broadcast) }}" required autocomplete="nama_broadcast" autofocus>

                        @error('nama_broadcast')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input id="keterangan_broadcast" type="text" class="form-control @error('keterangan_broadcast') is-invalid @enderror" name="keterangan_broadcast" value="{{ old('keterangan_broadcast',$item->keterangan_broadcast) }}" required autocomplete="keterangan_broadcast" autofocus>

                        @error('keterangan_broadcast')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input id="angkatan" type="text" class="form-control @error('angkatan') is-invalid @enderror" name="angkatan" value="{{ old('angkatan',$item->angkatan) }}" required autocomplete="angkatan" autofocus>

                        @error('angkatan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input id="tujuan" type="text" class="form-control @error('tujuan') is-invalid @enderror" name="tujuan" value="{{ old('tujuan',$item->tujuan) }}" required autocomplete="tujuan" autofocus>

                        @error('tujuan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Kirim</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@foreach($b as $item)
<div class="modal fade" id="lihat-{{$item->id_broadcast}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">Pesan Yang Akan di Kirim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Dalam rangka {{$item['nama_broadcast']}}, maka dimohon kesediaannya untuk mengisi data diri pada link
                    <br><br>{{$item['tujuan']}} ({{$item['keterangan_broadcast']}})
                    <br><br>Atas waktu yang diberikan dan kesediaannya kami ucapkan terima kasih.<br><br>Salam<br><br>
                    Tim Tracer Study
                </p>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
</div> <!-- .content -->
</div><!-- /#right-panel -->

@endsection