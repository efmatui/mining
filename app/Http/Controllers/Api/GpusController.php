<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GpusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $singers = \App\Gpu::all();
        return [
            'success' => true,
            'data' => $singers,
            'calculate' => "",
            'choosed' =>"",
            'amount'=>0,
            'count' => 0,
            'ethdefault' => 0.95582310,
            'thbdefault' => 2623.73,
            'powerdefault' => 29.04,
            'power' => 0,
            'ethvalue' => 0,
            'thbvalue' =>0
        ];
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
        $singer = new \App\Gpu;
        $singer->name = trim($request->name);
        $singer->power = trim($request->power);
        if (!empty($singer->name) && !empty($singer->power) && $singer->save()){
            return [
                'success' => true,
                'data' => "Singer '{$singer->name}' was saved with id: {$singer->id}  {$singer->power}",
                'id' => $singer->id,
                'power' => $singer->power
            ];
        } else {
            return [
                'success' => false,
                'data' => "Some error occurred"
            ];
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $singer = \App\Gpu::find($id);
        if (!is_null($singer))
            return [
                'success' => true,
                'data' => $singer
            ];
        return [
            'success' => false,
            'data' => 'Singer not found'
        ];
    }

    public function albums($id)
    {
        $singer = \App\Gpu::find($id);
        if (!is_null($singer)) {
            return [
                'success' => true,
                'data' => [
                    'count' => $singer->albums()->count(),
                    'albums' => $singer->albums()->get()
                ]
            ];
        } else {
            return [
                'success' => false,
                'data' => 'Singer not found'
            ];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
