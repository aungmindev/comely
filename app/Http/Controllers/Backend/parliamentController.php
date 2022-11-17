<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Parliament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class parliamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptimes = Parliament::all();
        return view('backend.parliament.index' , compact('ptimes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'Name_myanmar' => 'required|',
            'Name_english' => 'required|',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withModal('open');
        }
        if($request->ptimes_id == null){
            Parliament::firstOrCreate(
                ['name' => $request->Name_myanmar , 'name_en' => $request->Name_english ],
                ['name' => $request->Name_myanmar , 'name_en' => $request->Name_english ],
            );
            return redirect()->route('parliament.times.index')->withSuccess('Successfully added.'); 

        }else{
            Parliament::where('id' , $request->ptimes_id)->update([
                'name' => $request->Name_myanmar,
                'name_en' => $request->Name_english,
            ]);
            return redirect()->route('parliament.times.index')->withSuccess('Successfully updated.'); 

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
