<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CeleImportModel;
use App\Models\User;
use App\Repositories\Interfaces\fileUploaderInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class CsvUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $fileUploader;

    public function __construct(fileUploaderInterface $fileInterface)
    {
        $this->fileUploader = $fileInterface;
    }

    public function index()
    {
        return view('backend.csvUpload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CsvdataTable(Request $request)
    {
        if($request->filter_rank == null && $request->filter_country == null && $request->filter_year == null){
            $data = CeleImportModel::all();
        }else if($request->filter_rank != null && $request->filter_country == null && $request->filter_year == null){
            $data = CeleImportModel::where('rank' , $request->filter_rank)->get();
        }else if($request->filter_rank == null && $request->filter_country != null && $request->filter_year == null){
            $data = CeleImportModel::where('country' , $request->filter_country)->get();
        }else if($request->filter_rank == null && $request->filter_country == null && $request->filter_year != null){
            $data = CeleImportModel::where('year' , $request->filter_year)->get();
        }else if($request->filter_rank != null && $request->filter_country != null && $request->filter_year == null){
            $data = CeleImportModel::where(['rank' => $request->filter_rank , 'country' => $request->filter_country])->get();
        }else if($request->filter_rank == null && $request->filter_country != null && $request->filter_year != null){
            $data = CeleImportModel::where(['year' => $request->filter_year , 'country' => $request->filter_country])->get();
        }else if($request->filter_rank != null && $request->filter_country == null && $request->filter_year != null){
            $data = CeleImportModel::where(['rank' => $request->filter_rank , 'year' => $request->filter_year])->get();
        }else{
            $data = CeleImportModel::where(['rank' => $request->filter_rank , 'country' => $request->filter_country , 'year' => $request->filter_year])->get();
        }
        return DataTables::of($data)->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $csvFile   =  $request->file('csvFile');

        if ($csvFile->getClientOriginalExtension() != 'csv' || $csvFile->getClientMimeType() != 'text/csv') {
            return 403;
        }
        $file_name = uniqid() . '_' . $csvFile->getClientOriginalName();

        $file_path = public_path('/uploads/csv');

        $csvFile->move($file_path, $file_name);

        $csvFileUpload = $this->fileUploader->csvUpload($file_path . '/' . $file_name);
        File::delete($file_path . '/' . $file_name);
        return $csvFileUpload;
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
