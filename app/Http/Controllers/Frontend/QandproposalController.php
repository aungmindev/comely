<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\QandProposal;
use Illuminate\Http\Request;

class QandproposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isstar , $ptimes = 3 , $session_time = 1 , $qandpType = 'မေးခွန်း')
    {
        $qandps = QandProposal::with('session_times')->where(['parliament_times_id' => $ptimes  , 'session_time_id' => $session_time , 'qnadp_type' => $qandpType , 'isstar' => 1])->paginate(10);
        return view('frontend.qandp.qandp' , compact('isstar' , 'ptimes' , 'qandps'));
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
    public function getByPid(Request $request)
    {
        $data1 = QandProposal::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 1 , 'isstar' => $request->isstar ])->get()->unique('session_time_id');
        $data2 = QandProposal::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 2 , 'isstar' => $request->isstar])->get()->unique('session_time_id');
        $data3 = QandProposal::with('parliament_time'  , 'session_times')->where(['parliament_times_id' => 3 , 'isstar' => $request->isstar])->get()->unique('session_time_id');
        return [$data1 , $data2 , $data3];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = QandProposal::with(['parliament_time' , 'session_times'])->where('id' , $id)->first();
        return view('frontend.qandp.detail' , compact('data'));
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
