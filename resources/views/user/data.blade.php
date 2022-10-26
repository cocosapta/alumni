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
            <strong class="card-title">Data Broadcast</strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Bidang Minat</th>
                        <th>Kontak WA</th>
                        <th>Broadcast</th>
                    </tr>
                </thead>
                <?php $no=1; ?>
                <tbody>
                    @foreach($alumni as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['prodi']}}</td>
                        <td>{{$item['bidangminat']}}</td>
                        <td>{{$item['no_hp']}}</td>
                        <td>
                            <form action="pesan.post" method="POST">
                                @csrf
                                <input type="hidden" value="{{$item['id']}}" name="id">
                                <input type="hidden" value="{{$item['id_alumni']}}" name="id_alumni">
                                <input type="hidden" value="{{$item['keterangan_broadcast']}}" name="keterangan">
                                <input type="hidden" value="{{$item['nama_broadcast']}}" name="nama">
                                <input type="hidden" value="{{$item['tujuan']}}" name="link">
                                @if($item['flag_broadcast'] == 'b')
                                <button class="btn " type="submit"><i class="fa fa-check" style="color: green;"></i></button>
                                @else
                                <a class="btn " type="submit"><i class="fa  fa-exclamation" style="color: red;"></i></a>
                                @endif
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection