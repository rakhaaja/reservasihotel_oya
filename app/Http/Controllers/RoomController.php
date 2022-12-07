<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\room;
use GuzzleHttp\Psr7\Message;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room = Room::all();
        return $room;
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
        $room = new Room();
        $room->tipe_kamar = $request->input('tipe_kamar');
        $room->nomor_kamar = $request->input('nomor_kamar');
        $room->fasilitas = $request->input('fasilitas');
        $room->harga = $request->input('harga');
        $room->jumlah_kamar = $request->input('jumlah_kamar');
        $room->save();

        return response()->json([
            'status' => 201,
            'data' => $room
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
        $room = room::find($id);
        if($room) {
            return response()->json([
                'status' => 200,
                'data' => $room
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
        $room = room::find($id);
        if($room){
            $room->tipe_kamar = $request->tipe_kamar ? $request->tipe_kamar : $room->tipe_kamar;
            $room->nomor_kamar = $request->nomor_kamar ? $request->nomor_kamar : $room->nomor_kamar;
            $room->fasilitas = $request->fasilitas ? $request->fasilitas : $room->fasilitas;
            $room->harga = $request->harga ? $request->harga : $room->harga;
            $room->jumlah_kamar = $request->jumlah_kamar? $request->jumlah_kamar : $room->jumlah_kamar;
            $room->save(); 
            return response()->json([
                'status' => 200,
                'data' => $room
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
        $room = room::where('id',$id)->first();
        if($room){
            $room->delete();
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


