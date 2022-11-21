<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Parliament;
use App\Models\Psession;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sessionType , $ptimes = 3 , $session_time = 1, $session_data_type = 1)
    {
        // $thirdTimeSessions = Parliament::find($ptimes)->sessions->where('sessiontype_id' , 1);
        if($session_data_type == 1){
            $session_data_type = 'အစည်းအဝေးအစီအစဉ်များ';
        }else{
            $session_data_type = 'အစည်းအဝေးမှတ်တမ်းများ';
        }

        $thirdTimeSessions = Psession::with('session_times')->where(['parliament_times_id' => $ptimes , 'sessiontype_id' => $sessionType , 'session_data_type' => $session_data_type , 'session_time_id' => $session_time])->paginate(10);
        return view('frontend.section.session' , compact('thirdTimeSessions' , 'ptimes' ,'sessionType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
       

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getByPid(Request $request)
    {
        $data1 = Psession::with('parliament_time' , 'session_type' , 'session_times')->where(['parliament_times_id' => 1 , 'sessiontype_id' => $request->stype])->get()->unique('session_time_id');
        $data2 = Psession::with('parliament_time' , 'session_type' , 'session_times')->where(['parliament_times_id' => 2 , 'sessiontype_id' => $request->stype])->get()->unique('session_time_id');
        $data3 = Psession::with('parliament_time' , 'session_type' , 'session_times')->where(['parliament_times_id' => 3 , 'sessiontype_id' => $request->stype])->get()->unique('session_time_id');
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
        $data = Psession::with(['parliament_time' , 'session_type' , 'session_times'])->where('id' , $id)->first();
        return view('frontend.section.detail' , compact('data'));
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
