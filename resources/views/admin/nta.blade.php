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
            <strong class="card-title">Nomor Tidak Aktif </strong>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Kontak</th>
                        <th scope="col">Nomor WA</th>
                        <th scope="col">Tanggal Terakhir Broadcast</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1 ?>
                    @foreach($alumni as $item)
                    <tr>
                        <th scope="row">{{$no++}}</th>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['no_hp']}}</td>
                        <td>{{$item['updated_at	']}}</td>
                                                
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection