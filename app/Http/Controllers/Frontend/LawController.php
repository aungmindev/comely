<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Law;
use Illuminate\Http\Request;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lawType , $ptimes = 3 , $session_time = 1)
    {
        $laws = Law::with('session_times')->where(['parliament_times_id' => $ptimes  , 'session_time_id' => $session_time , 'law_type' => $lawType])->paginate(10);
        if($lawType == 'draft'){
            $lawType = 1;
        }elseif($lawType == 'bill'){
            $lawType = 2;
        }else{
            $lawType = 3;
        }
        return view('frontend.law.law' , compact('lawType' , 'ptimes' , 'laws'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Law::with(['parliament_time' , 'session_times'])->where('id' , $id)->first();
        return view('frontend.law.detail' , compact('data'));
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
    public function getByPid(Request $request)
    {
        if($request->lawType == 1){
            $lawType = 'draft';
        }elseif($request->lawType== 2){
            $lawType = 'bill';
        }else{
            $lawType = 'lease';
        }
        $data1 = Law::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 1 , 'law_type' => $lawType])->get()->unique('session_time_id');
        $data2 = Law::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 2 , 'law_type' => $lawType])->get()->unique('session_time_id');
        $data3 = Law::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 3 , 'law_type' => $lawType])->get()->unique('session_time_id');
        return [$data1 , $data2 , $data3];
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
