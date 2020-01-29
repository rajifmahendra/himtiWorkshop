<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;

class UtamaController extends Controller
{
    public function index(){
      return view('utama.landing');
    }

    public function create(){
      $data = Karyawan::all();
      return view('karyawan.karyawan', compact('data'));
    }

    public function input(){
      return view('create.create_karyawan');
    }

    public function store(Request $request){
      $request->validate([
      'nama' => 'required',
      'alamat' => 'required',
      'jabatan' => 'required'
    ]);

    $karyawan = new Karyawan;
    $karyawan->nama = $request->nama;
    $karyawan->alamat = $request->alamat;
    $karyawan->jabatan = $request->jabatan;

    $karyawan->save();

    return redirect('karyawan');
    }

    public function edit($id){
      $karyawan = Karyawan::find($id);

      return view('update.update_karyawan', compact('karyawan'));
    }

    public function update(Request $request, $id) {
      $karyawan = Karyawan::find($id);
      $karyawan->nama = $request->nama;
      $karyawan->alamat = $request->alamat;
      $karyawan->jabatan = $request->jabatan;
      $karyawan->save();
      return redirect('karyawan');
    }

    public function destroy($id){
      $data = Karyawan::find($id);
      $data->delete();

      return redirect('karyawan');
    }
}
