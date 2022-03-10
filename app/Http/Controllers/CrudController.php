<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function _validation(Request $request){
        $validation = $request->validate([
            'kode_barang' => 'required|min:3|max:10',
            'nama_barang' => 'required|min:3|max:100'
        ],
        [
            'kode_barang.required'=> 'Data Wajib di isi',
            'kode_barang.min'=> 'Data yang di input minimal 3 digit',
            'kode_barang.max'=> 'Data yang di input maksimal 10 digit',
            'nama_barang.required'=> 'Data Wajib di isi',
            'nama_barang.min'=> 'Data yang di input minimal 3 digit',
            'nama_barang.max'=> 'Data yang di input maksimal 100 digit',
            
        ]);

    }

    public function index(){
        $data_barang = DB::table('data_barang')->paginate(4);
        return view('data',['data_barang'=> $data_barang]);

    }

    public function create(){
        return view('create-data');
    }


    public function save(Request $request){
        $this->_validation($request);

        DB::insert('insert into data_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);
        return redirect()->route('data')->with('message','Data Berhasil di simpan');
    }

    public function edit($id){
        $data_barang = DB::table('data_barang')->where('id',$id)->first();
        return view('edit-data',['data_barang' => $data_barang]);
    }

    public function delete($id){
        DB::table('data_barang')->where('id',$id)->delete();
        return redirect()->back()->with('message','Data Berhasil di simpan');
    }

    public function update(Request $request,$id){
        $this->_validation($request);
        DB::table('data_barang')->where('id',$id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang
        ]);
        return redirect()->route('data')->with('message','Data Berhasil di edit');
    }
}
