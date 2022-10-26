@extends('layouts.layouts')
@section('content')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Broadcast</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Broadcast/Data Broadcast</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data Broadcast</strong>
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
                    @foreach($c as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item['nama_broadcast']}}</td>
                        <td>{{$item['tgl_broadcast']}}</td>
                        <td>{{$item['keterangan_broadcast']}}</td>
                        <td>{{$item['angkatan']}}</td>
                        <td>{{$item['id_user']}}</td>
                        <td><a class="btn" data-toggle="modal" data-target="#edit-{{$item->id_broadcast}}"><i class="fa fa-eye" style="color: green;"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach($c as $item)
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
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Almuni</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Bidang Minat</th>
                        <th>Nomor WhatsApp</th>
                    </tr>
                </thead>
                <tbody>
                <?php $n = 1;
                $id= $item->id_broadcast; ?>
                @foreach($b as $item)
                @if($item->id_broadcast == $id)
                    <tr>
                        <td>{{$n++}}</td>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['nim']}}</td>
                        <td>{{$item['prodi']}}</td>
                        <td>{{$item['bidangminat']}}</td>
                        <td>{{$item['no_hp']}}</td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection