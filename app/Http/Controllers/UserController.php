<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\alumni;
use App\Models\Broadcast;
use App\Models\Pesan;
use App\Models\MasterPesan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $a = alumni::count();
        $b = alumni::count();
        $c = Broadcast::count();

        return view('user.index', compact('a', 'b', 'c'));
    }
    public function data()
    {
        $alumni = MasterPesan::join('master_alumni', 'master_alumni.id', '=', 'master_pesan.id_alumni')
            ->join('master_broadcast', 'master_broadcast.id_broadcast', '=', 'master_pesan.id_broadcast')
            ->select(
                'master_alumni.nim',
                'master_alumni.nama',
                'master_alumni.prodi',
                'master_alumni.bidangminat',
                'master_alumni.no_hp',
                'master_pesan.id',
                'master_pesan.id_alumni',
                'master_pesan.flag_broadcast',
                'master_broadcast.id_broadcast',
                'master_broadcast.nama_broadcast',
                'master_broadcast.keterangan_broadcast',
                'master_broadcast.tujuan',
            )
            ->paginate(10);
        return view('user.data', compact('alumni'));
    }
    public function pesan()
    {
        $user = auth()->user();
        $alumni = pesan::join('master_pesan', 'master_pesan.id', '=', 'pesan.id_broadcast')
            ->join('master_alumni', 'master_alumni.id', '=', 'pesan.id_alumni')
            ->select(
                'master_alumni.nim',
                'master_alumni.nama',
                'master_alumni.prodi',
                'master_alumni.bidangminat',
                'master_alumni.no_hp',
                'master_pesan.id',
                'master_pesan.id_user',
                'master_pesan.id_alumni',
                'master_pesan.flag_broadcast',  
                'pesan.link',  
                'pesan.judul',  
                'pesan.keterangan',  
            )
            ->get();
        return view('user.pesan', compact('alumni'));
    }
    public function kirim()
    {
        $alumni = alumni::all();
        return view('user.kirim', compact('alumni'));
    }
    public function reply()
    {
        $alumni = alumni::all();
        return view('user.reply', compact('alumni'));
    }
    protected function update(Request $request)
    {

        Pesan::create([
            'id_broadcast' => $request['id'],
            'id_alumni' => $request['id_alumni'],
            'link' => $request['link'],
            'judul' => $request['nama'],
            'keterangan' => $request['keterangan'],
        ]);
        $user = auth()->user();
        MasterPesan::where(['id_alumni' => $request->id_alumni])->update([
            'id_user' => $user->id,
            'flag_broadcast' => 's',
        ]);
        return redirect()->back()->with('success1', 'Data Successfully');
    }
}
