<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ptimes = 3 , $session_time = 1)
    {
        $reports = Report::with('session_times')->where(['parliament_times_id' => $ptimes  , 'session_time_id' => $session_time ])->paginate(10);
        return view('frontend.report.report' , compact('ptimes' , 'reports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getByPid(Request $request)
    {
        
        $data1 = Report::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 1])->get()->unique('session_time_id');
        $data2 = Report::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 2 ])->get()->unique('session_time_id');
        $data3 = Report::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 3 ])->get()->unique('session_time_id');
        return [$data1 , $data2 , $data3];
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
        $data = Report::with(['parliament_time' , 'session_times'])->where('id' , $id)->first();
        return view('frontend.report.detail' , compact('data'));
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
