<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Register;
use PDF;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Register::orderBy('NoDaftar', 'DESC')->get();
        return view('index', compact('data'))->with('i', 1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'NamaLengkap' => 'required',
            'JK' => 'required',
            'AlamatLengkap' => 'required',
            'Agama' => 'required',
            'AsalSMP' => 'required',
            'Jurusan' => 'required',
        ]);

        Register::create($request->all());

        return redirect()->route('index')
        ->with('success', 'Data pendaftaran siswa berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Register::where('NoDaftar', $id)->first();

        $send = [
            'data' => $data,
        ];
        $pdf = PDF::loadView('show', $send);
        return $pdf->download('form_pendaftaran.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Register::where('NoDaftar', $id)->first();
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaLengkap' => 'required',
            'JK' => 'required',
            'AlamatLengkap' => 'required',
            'Agama' => 'required',
            'AsalSMP' => 'required',
            'Jurusan' => 'required',
        ]);

        Register::where('NoDaftar', $id)->update(request()->except(['_token', '_method']));

        return redirect()->route('index')
        ->with('success', 'Data pendaftaran siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Register::where('NoDaftar', $id)->delete();

        return redirect()->route('index')
        ->with('success', 'Data pendaftaran siswa berhasil dihapus!');
    }
}
