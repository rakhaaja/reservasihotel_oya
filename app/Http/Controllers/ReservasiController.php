<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservasi;
use GuzzleHttp\Psr7\Message;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservasi = Reservasi::all();
        return $reservasi;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservasi = new Reservasi();
        $reservasi->nomor_kamar = $request->input('nomor_kamar');
        $reservasi->nama = $request->input('nama');
        $reservasi->telepon = $request->input('telepon');
        $reservasi->tipe_kamar = $request->input('tipe_kamar');
        $reservasi->jumlah_kamar = $request->input('jumlah_kamar');
        $reservasi->check_in = $request->input('check_in');
        $reservasi->check_out = $request->input('check_out');
        $reservasi->save();

        return response()->json([
            'status' => 201,
            'data' => $reservasi
        ],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservasi = reservasi::find($id);
        if($reservasi) {
            return response()->json([
                'status' => 200,
                'data' => $reservasi
            ], 200);
        } else {
            return response()->json([
                'status' =>404,
                'message' => 'id atas ' . $id .'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $reservasi = reservasi::find($id);
        if($reservasi){
            $reservasi->nomor_kamar = $request->nomor_kamar ? $request->nomor_kamar : $reservasi->nomor_kamar;
            $reservasi->nama = $request->nama ? $request->nama : $reservasi->nama;
            $reservasi->telepon = $request->telepon ? $request->telepon : $reservasi->telepon;
            $reservasi->tipe_kamar = $request->tipe_kamar ? $request->tipe_kamar : $reservasi->tipe_kamar;
            $reservasi->jumlah_kamar = $request->jumlah_kamar? $request->jumlah_kamar : $reservasi->jumlah_kamar;
            $reservasi->check_in = $request->check_in? $request->check_in : $reservasi->check_in;
            $reservasi->check_out = $request->check_out? $request->check_out : $reservasi->check_out;
            $reservasi->save(); 
            return response()->json([
                'status' => 200,
                'data' => $reservasi
            ],200);           
        }else{
            return response()->json([
                'status'=>404,
                'message' => $id . 'tidak ditemukan'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservasi = reservasi::where('id',$id)->first();
        if($reservasi){
            $reservasi->delete();
            return response()->json([
                'status' => 200,
                'message' => 'sudah terhapus'
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .'tidak ditemukan'
            ],404);
        }
    }
}


