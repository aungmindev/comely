<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Database\Connection;
class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboardCount()
    {
        $person  = DB::getPdo()->prepare('select  recipient , count(recipient) as person_count from cele_import_models group by recipient order by person_count desc limit 1');
        $country = DB::getPdo()->prepare('select  country , count(country) as country_count from cele_import_models group by country order by country_count desc  limit 1');
        $career  = DB::getPdo()->prepare('select  career , count(career) as career_count from cele_import_models group by career order by career_count desc  limit 1; ');
        $person->execute();
        $country->execute();
        $career->execute();
        $personData  = $person->fetchAll();
        $countryData = $country->fetchAll();
        $careerData  = $career->fetchAll();
        return [$personData , $countryData , $careerData];
        // return $personData[0]['person_count'];
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function chart(Request $request)
    {
        $current_year = date('Y');

        if($request->type == 'bar'){
            $barChertName = [];
            $barCharts = DB::select(DB::raw("select recipient from (SELECT  recipient , `rank`  FROM cele_import_models where year = '$current_year' order by `rank` desc) sub"));
            if(!$barCharts){
                $current_year = 2017;
                $barCharts = DB::select(DB::raw("select recipient from (SELECT  recipient , `rank`  FROM cele_import_models where year = '$current_year' order by `rank` desc) sub"));
            }
            foreach($barCharts as $barChart){
                $barChertName[] = $barChart->recipient;
            }
            return [$barChertName , $current_year];
        }else{
            $pieCharts = DB::select(DB::raw("select recipient as name , `rank` as y from (SELECT  recipient , `rank`  FROM cele_import_models where year = '$current_year' order by `rank` desc) sub"));
            if(!$pieCharts){
                $current_year = 2017;
                $pieCharts = DB::select(DB::raw("select recipient as name , `rank` as y from (SELECT  recipient , `rank`  FROM cele_import_models where year = '$current_year' order by `rank` desc) sub"));
            }
            return [$pieCharts , $current_year];
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
