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
                    <li class="active">Dashboard/Kontak/Nomor Baru</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-lg">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Nomor baru</strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
            <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Nomor Lama</th>
                        <th>Nomor Baru</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1 ?>
                    @foreach($alumni as $item )
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item['nim']}}</td>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['prodi']}}</td>
                        <td>{{$item['no_hp']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection