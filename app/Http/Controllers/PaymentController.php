<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = Payment::all();
        return $payment;
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
        $table = Payment::create([
            "nomor_pesan" => $request->nomor_pesan,
            "tanggal_pesan" => $request->tanggal_pesan,
            "nama" => $request->nama,
            "telepon" => $request->telepon,
            "metode_pembayaran" => $request->metode_pembayaran,
            "harga" => $request->harga,
        ]);

        return response()->json([
            'success' => 201,
            'message' => 'Pembayaran Sukses!',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);
        if ($payment) {
            return response()->json([
                'status' => 200,
                'data' => $payment
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id ' . $id . ' tidak ditemukan'
            ], 400);
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
        $payment = Payment::find($id);
        if($payment){
            $payment->nomor_pesan = $request->nomor_pesan ? $request->nomor_pesan : $payment->nomor_pesan;
            $payment->tanggal_pesan = $request->tanggal_pesan ? $request->tanggal_pesan : $payment->tanggal_pesan;
            $payment->nama = $request->nama ? $request->nama : $payment->nama;
            $payment->telepon = $request->telepon ? $request->telepon : $payment->telepon;
            $payment->metode_pembayaran = $request->metode_pembayaran ? $request->metode_pembayaran : $payment->metode_pembayaran;
            $payment->harga = $request->harga ? $request->harga : $payment->harga;
            return response()->json([
                'status' => 200,
                'data' => $payment
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . ' tidak ditemukan'
            ], 404);
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
        $payment = Payment::where('id', $id)->first();
        if($payment){
            $payment->delete();
            return response()->json([
                'status' => 'Pembayaran Sukses dihapus!',
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id .' tidak ditemukan'
            ], 404);
        }
    }
}