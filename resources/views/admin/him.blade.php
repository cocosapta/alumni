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
                    <li class="active">Dashboard/User/Him</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Data HIM</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nomor Whatsapp</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 1 ?>
                    @foreach($user as $item )
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['username']}}</td>
                        <td>{{$item['email']}}</td>
                        <td>{{$item['no_hp']}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection