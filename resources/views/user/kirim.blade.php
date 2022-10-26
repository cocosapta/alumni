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
                    <li class="active">Dashboard/Broadcast/Data Broadcast</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Kirim Pesan</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Kontak WA</th>
                        <th>Broadcast</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumni as $item)
                    <tr>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['prodi']}}</td>
                        <td>{{$item['no_hp']}}</td>
                        <td>
                            <button type="button" class="btn btn-success">Sudah</button>
                            <button type="button" class="btn btn-danger">Belum</button>
                        </td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection