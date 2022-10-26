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
            <strong class="card-title"> Pesan</strong>
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
                    @if($item->id_user == Auth::user()->id)
                    <tr>
                        <td>{{$item['nama']}}</td>
                        <td>{{$item['prodi']}}</td>
                        <td>{{$item['no_hp']}}</td>
                        <td>
                            <a id="status" name="status" target="_blank" href="https://api.whatsapp.com/send?phone=6281284616035&text=Dalam%20rangka%20{{$item['judul']}}%20maka%20dimohon%20kesediaannya%20untuk%20mengisi%20data%20diri%20pada%20link%0A%0A{{$item['link']}}%20%28{{$item['keterangan']}}%29%0A%0AAtas%20waktu%20yang%20diberikan%20dan%20kesediaannya%20kami%20ucapkan%20terima%20kasih.%0A%0ASalam%0A%0ATim%20Tracer%20Study&source&data="><i class="fa fa-whatsapp" style="color: green;"></i></a>
                            <!-- <a href="" class="btn " type="submit"><i class="fa   fa-trash-o" style="color: red;"></i></a> -->
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection