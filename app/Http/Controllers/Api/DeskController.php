<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeskStoreRequest;
use App\Http\Resources\DeskResource;
use App\Models\Desk;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\Console\Input\Input;

class DeskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DeskResource::collection(Desk::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeskStoreRequest $request)
    {
        $created_desk = Desk::create($request->validated());

        return new DeskResource($created_desk);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
<<<<<<< HEAD
    {   
        $desk = Desk::where('token' , $id)->first();
        $desk->delete();
        return response()->json([
            'success' => false,
            'message' => 'Տվյալը գտնված է և ջնջված բազայից'
        ]);
=======
    {
        $desk = Desk::where('token' , $id)->withTrashed()->first();
        $deleted_desk = Desk::where('token' , $id)->onlyTrashed()->first();
        $desk->delete();
        if (!$deleted_desk) {
            return response()->json([true]);
        }else {
            return response()->json([false]);
        }
>>>>>>> 3f5018b8d9179aad28e9020396998a778b690488
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DeskStoreRequest $request, Desk $desk)
    {
        $desk->update($request->validated());

        return new DeskResource($desk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desk = Desk::where('token' , $id)->first();
        $desk->delete();

        return response()->json([
            'success' => false,
            'message' => 'Տվյալը գտնված է և ջնջված բազայից'
        ]);
    }
}
