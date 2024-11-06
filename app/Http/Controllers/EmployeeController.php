<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request){
        
        if($request->has('search')){
            $data = Employee::where('namalengkap','LIKE','%'.$request->search.'%',)->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }

        
        return view ('about', compact('data'));
    }

    public function tambahpegawai(){
        return view('tambahdata');
    }

    public function inserdata(Request $request){
       
        $data = Employee::create($request->all());
        if ($request->hasFile('logo')){
            $request->file('logo')->move('fotopegawai/', $request->file('logo')->getClientOriginalName());
            $data->logo = $request->file('logo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('about')->with('success','Data Berhasil Di Tambahkan');
    }
    public function tampilkandata($id){
        $data = Employee::find($id);
        //dd($data);
        return view('tampildata',compact('data'));
    }
    public function updatedata(Request $request, $id){
        $data = Employee::find($id);
        $data->update($request->all());
        return redirect()->route('about')->with('success','Data Berhasil Di Update');
    }
    public function delete($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect()->route('about')->with('success','Data Berhasil Di Hapus');
    }
}