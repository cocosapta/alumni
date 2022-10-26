<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\alumni;
use App\Models\Broadcast;
use App\Models\MasterPesan;

class AdminController extends Controller
{
    public function index()
    {
        $a = alumni::count();
        $b = alumni::count();
        $c = Broadcast::count();


        return view('admin.index', compact('a', 'b', 'c'));
    }
    public function admin()
    {
        $user = User::where('level', 'admin')->get();

        return view('admin.admin', compact('user'));
    }
    public function him()
    {
        $user = User::where('jabatan', 'Him')->get();

        return view('admin.him', compact('user'));
    }
    public function alumni()
    {
        $alumni = alumni::all();
        return view('admin.alumni', compact('alumni'));
    }
    public function kontak()
    {
        $alumni = alumni::all();
        return view('admin.nb', compact('alumni'));
    }

    public function user()
    {
        $user = user::all();
        return view('admin.user', compact('user'));
    }
    public function pesan()
    {
        $b = broadcast::all();
        return view('admin.pesan', compact('b'));
    }
    public function data()
    {
        $b = MasterPesan::join('master_alumni', 'master_alumni.id', '=', 'master_pesan.id_alumni')
            ->select('master_alumni.nim', 'master_alumni.nama', 'master_alumni.prodi', 'master_alumni.bidangminat', 'master_alumni.no_hp', 'master_pesan.id_broadcast')
            ->get();
        $c = Broadcast::all();
        return view('admin.broadcast', compact('b','c'));
    }
    protected function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|max:255|unique:users',
            'email' => 'required|max:255',
            'password' => 'required|min:5|max:255'

        ]);
        User::create([
            'nama' => $request['nama'],
            'username' => $request['username'],
            'email' => $request['email'],
            'no_hp' => $request['no_hp'],
            'level' => 'admin',
            'jabatan' => $request['jabatan'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
    protected function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|max:255',

        ]);
        User::where(['id' => $id])->update([
            'nama' => $request['nama'],
            'username' => $request['username'],
            'email' => $request['email'],
            'no_hp' => $request['no_hp'],
            'level' => 'admin',
            'jabatan' => $request['jabatan'],
        ]);
        return redirect()->back()->with('success1', 'Data Successfully');
    }
    protected function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('destroy', 'Data Successfully');
    }
    protected function store_alumni(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|max:255|unique:alumni',
            'prodi' => 'required|max:255',
            'bidangminat' => 'required|max:255',


        ]);
        alumni::create([
            'nama' => $request['nama'],
            'nim' => $request['nim'],
            'prodi' => $request['prodi'],
            'no_hp' => $request['no_hp'],
            'bidangminat' => $request['jabatan'],

        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
    protected function update_alumni(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|max:255|unique:alumni',
            'prodi' => 'required|max:255',
            'bidangminat' => 'required|max:255',

        ]);
        alumni::where(['id' => $id])->update([
            'nama' => $request['nama'],
            'nim' => $request['nim'],
            'prodi' => $request['prodi'],
            'no_hp' => $request['no_hp'],
            'bidangminat' => $request['jabatan'],
        ]);
        return redirect()->back()->with('success1', 'Data Successfully');
    }
    protected function delete_alumni(Request $request, $id)
    {
        $alumni = alumni::find($id);
        $alumni->delete();
        return redirect()->back()->with('destroy', 'Data Successfully');
    }
    protected function delete_pesan($id_broadcast)
    {
        $broadcast =  Broadcast::find($id_broadcast);
        $broadcast->delete();
        return redirect()->back()->with('destroy', 'Data Successfully');
    }
    protected function add(Request $request)
    {
        $request->validate([
            'nama_broadcast' => 'required',
            'keterangan_broadcast' => 'required|max:255',

        ]);
        Broadcast::create([
            'nama_broadcast' => $request['nama_broadcast'],
            'keterangan_broadcast' =>  $request['keterangan_broadcast'],
            'tujuan' => $request['tujuan'],
            'angkatan' => $request['angkatan']

        ]);
        return redirect()->back()->with('success', 'Data Successfully');
    }
    protected function edit_pesan(Request $request, $id_broadcast)
    {
        $request->validate([
            'nama_broadcast' => 'required',
            'keterangan_broadcast' => 'required|max:255',

        ]);
        Broadcast::where(['id_broadcast' => $id_broadcast])->update([
            'nama_broadcast' => $request['nama_broadcast'],
            'keterangan_broadcast' =>  $request['keterangan_broadcast'],
            'tujuan' => $request['tujuan'],
            'angkatan' => $request['angkatan']

        ]);
        return redirect()->back()->with('success1', 'Data Successfully');
    }
    protected function add_pesan(Request $request)
    {
        $keyword = $request->angkatan;
        $alumni = alumni::where('nim', 'like', $keyword . "%")->get();
        Broadcast::where(['id_broadcast' => $request->id])->update([
            'flag' => "s"
        ]);
        foreach ($alumni as $item) {
            MasterPesan::create([
                'id_alumni' => $item->id,
                'id_broadcast' => $request->id,
            ]);
        }
        return redirect()->back()->with('success1', 'Data Successfully');
    }
}
