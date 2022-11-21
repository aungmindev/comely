<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Parliament;
use App\Models\Report;
use App\Models\Sessiontime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptimes = Parliament::all();
        $psessiontimes = Sessiontime::all();
        return view('backend.reports.index' , compact('ptimes' , 'psessiontimes'));
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
        $validator = Validator::make($request->all() , [
            'image' => 'nullable|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:1024',
            'pdf_file' => 'required|mimes:pdf|mimetypes:application/pdf|max:2048',
            'ptimes'  => 'required',
            'session_time'  => 'required',
            'session_time_en'  => 'required',
            'report_title'  => 'required',
            'report_title_en'  => 'required',
            
        ]);

        if($validator->fails()){
            $validator->errors()->add('modal' , 'Add Question (Or) Proposal fail');
            return redirect()->back()->withErrors($validator);
        }
        if($request->image != null){
            $image_file = $request->file('image');
            $image_name = uniqid().'_'.$image_file->getClientOriginalName();
            $image_file->move(public_path('/uploads/reports/image/') , $image_name);
        }else{
            $image_name = null;
        }

        $pdf_file = $request->file('pdf_file');
        $pdf_name = uniqid().'_'.$pdf_file->getClientOriginalName();
        $pdf_file->move(public_path('/uploads/reports/pdf/') , $pdf_name);
        Report::create([
            'parliament_times_id' => $request->ptimes,
            'title' => $request->report_title,
            'title_en' => $request->report_title_en,
            'session_time_id' => $request->session_time,
            'pdf' => $pdf_name,
            'image' => $image_name,
            'summary' => $request->summary,
            'summary_en' => $request->summary_en,
        ]);

        return redirect()->route('report.get')->withSuccess('Successfully uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Report::with('parliament_time', 'session_times')->orderBy('created_at' , 'desc')->get();

        return DataTables::of($data)
        ->editColumn('parliament_times_id' , function($data){
            return $data->parliament_time->name;
        })
        
        ->editColumn('created_at' , function($data){
            return date('M Y , d' , strtotime($data->created_at));
        })
        ->editColumn('session_time_id' , function($data){
            return $data->session_times->name;
        })
        ->editColumn('pdf' , function($data){
            return '<a download href="'.asset('/uploads/reports/pdf/'.$data->pdf).'" ><span class="btn btn-sm btn-primary"> <i class="fas fa-download"></i></span></a>';
        })
        ->editColumn('image' , function($data){
            if($data->image){
                return '<a download href="'.asset('/uploads/reports/image/'.$data->image).'" ><img class="img-fluid" src="'.asset('/uploads/reports/image/'.$data->image).'" ></a>';
            }else{
                return '-';
            }
        })
        ->addColumn('action', function ($data) {
            return ' 
                <div class="row">
                    <div class="col-lg-6">
                     <span onclick="edit(`'.$data->id.'`,`'.$data->parliament_time->name.'`,`'.$data->session_times->name.'`,`'.$data->title.'`,`'.$data->title_en.'`,`'.$data->summary.'`,`'.$data->summary_en.'`,`'.$data->pdf.'`,`'.$data->image.'`)" class="btn btn-sm btn-warning d-inline"><i class="fas fa-edit"></i> </span>
                    </div>
                    <div class="col-lg-6">
                     <span onclick="edit(`'.$data->id.'`,`'.$data->session_type.'`,`'.$data->session_data_type.'`,`'.$data->parliament_times_id.'`,`'.$data->session_time.'`,`'.$data->session_time_en.'`,`'.$data->title.'`,`'.$data->title_en.'`,`'.$data->date.'`,`'.$data->summary.'`,`'.$data->summary_en.'`,`'.$data->pdf.'`,`'.$data->image.'`)" class="btn btn-sm btn-danger d-inline"><i class="fas fa-trash"></i> </span>
                    </div>
                </div>
            ';

           
        })
        ->rawColumns(['pdf' , 'action' , 'image' , 'summary'])
        ->make(true);
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
    public function update(Request $request)
    {
        $validator = Validator::make($request->all() , [
            'image' => 'nullable|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:1024',
            'pdf_file' => 'nullable|mimes:pdf|mimetypes:application/pdf|max:2048',
            'ptimes'  => 'required',
            'session_time'  => 'required',
            'session_time_en'  => 'required',
            'report_title'  => 'required',
            'report_title_en'  => 'required',
        ]);
        if($validator->fails()){
            $validator->errors()->add('modal' , 'Add Laws fail');
            return redirect()->back()->withErrors($validator);
        }
        if($request->image != null){
            $image_file = $request->file('image');
            $image_name = uniqid().'_'.$image_file->getClientOriginalName();
            $image_file->move(public_path('/uploads/reports/image/') , $image_name);
        }else{
            $image_name = $request->old_image;
        }
        if($request->pdf_file != null){
            $pdf_file = $request->file('pdf_file');
            $pdf_name = uniqid().'_'.$pdf_file->getClientOriginalName();
            $pdf_file->move(public_path('/uploads/reports/pdf/') , $pdf_name);
        }else{
            $pdf_name = $request->old_pdf;
        }
        Report::where('id' , $request->update_id)->update([
            'parliament_times_id' => $request->ptimes,
            'title' => $request->report_title,
            'title_en' => $request->report_title_en,
            'session_time_id' => $request->session_time,
            'pdf' => $pdf_name,
            'image' => $image_name,
            'summary' => $request->summary,
            'summary_en' => $request->summary_en,
        ]);

        return redirect()->route('report.get')->withSuccess('Successfully updated.');
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