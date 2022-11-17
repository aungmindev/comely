<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Law;
use App\Models\Parliament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class LawsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ptimes = Parliament::all();
        return view('backend.laws.index' , compact('ptimes'));
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
            'law_type'  => 'required',
            'ptimes'  => 'required',
            'session_time'  => 'required',
            'session_time_en'  => 'required',
            'law_title'  => 'required',
            'law_title_en'  => 'required',
            'law_date_of_publication'  => 'required',
            'law_proposed_from'  => 'required',
            'law_proposed_from_en'  => 'required',
            'law_proposed_day'  => 'required',
            'law_report_read'  => 'required',
        ]);

        if($validator->fails()){
            $validator->errors()->add('modal' , 'Add Laws fail');
            return redirect()->back()->withErrors($validator);
        }
        if($request->image != null){
            $image_file = $request->file('image');
            $image_name = uniqid().'_'.$image_file->getClientOriginalName();
            $image_file->move(public_path('/uploads/laws/image/') , $image_name);
        }else{
            $image_name = null;
        }

        $pdf_file = $request->file('pdf_file');
        $pdf_name = uniqid().'_'.$pdf_file->getClientOriginalName();
        $pdf_file->move(public_path('/uploads/laws/pdf/') , $pdf_name);
        Law::create([
            'law_type' => $request->law_type,
            'parliament_times_id' => $request->ptimes,
            'law_name' => $request->law_title,
            'law_name_en' => $request->law_title_en,
            'session_time' => $request->session_time,
            'session_time_en' => $request->session_time_en,
            'dop' => $request->law_date_of_publication,
            'proposed_from' => $request->law_proposed_from,
            'proposed_from_en' => $request->law_proposed_from_en,
            'dopd' => $request->law_proposed_day,
            'doprd' => $request->law_report_read,
            'pdf' => $pdf_name,
            'image' => $image_name,
            'summary' => $request->summary,
            'summary_en' => $request->summary_en,
        ]);

        return redirect()->route('laws.get')->withSuccess('Successfully uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Law::with('parliament_time')->orderBy('created_at' , 'desc')->get();

        return DataTables::of($data)
        ->editColumn('parliament_times_id' , function($data){
            return $data->parliament_time->name;
        })
        ->editColumn('created_at' , function($data){
            return date('M Y , d' , strtotime($data->created_at));
        })
        
        ->editColumn('pdf' , function($data){
            return '<a download href="'.asset('/uploads/laws/pdf/'.$data->pdf).'" ><span class="btn btn-sm btn-primary"> <i class="fas fa-download"></i></span></a>';
        })
        ->editColumn('image' , function($data){
            if($data->image){
                return '<a download href="'.asset('/uploads/laws/image/'.$data->image).'" ><img class="img-fluid" src="'.asset('/uploads/laws/image/'.$data->image).'" ></a>';
            }else{
                return '-';
            }
        })
        ->addColumn('action', function ($data) {
            return ' 
                <div class="row">
                    <div class="col-lg-6">
                     <span onclick="edit(`'.$data->id.'`,`'.$data->law_type.'`,`'.$data->parliament_time->name.'`,`'.$data->session_time.'`,`'.$data->session_time_en.'`,`'.$data->law_name.'`,`'.$data->law_name_en.'`,`'.$data->dop.'`,`'.$data->proposed_from.'`,`'.$data->proposed_from_en.'`,`'.$data->dopd.'`,`'.$data->doprd.'`,`'.$data->summary.'`,`'.$data->summary_en.'`,`'.$data->pdf.'`,`'.$data->image.'`)" class="btn btn-sm btn-warning d-inline"><i class="fas fa-edit"></i> </span>
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
            'law_type'  => 'required',
            'ptimes'  => 'required',
            'session_time'  => 'required',
            'session_time_en'  => 'required',
            'law_title'  => 'required',
            'law_title_en'  => 'required',
            'law_date_of_publication'  => 'required',
            'law_proposed_from'  => 'required',
            'law_proposed_from_en'  => 'required',
            'law_proposed_day'  => 'required',
            'law_report_read'  => 'required',
        ]);
        if($validator->fails()){
            $validator->errors()->add('modal' , 'Add Laws fail');
            return redirect()->back()->withErrors($validator);
        }
        if($request->image != null){
            $image_file = $request->file('image');
            $image_name = uniqid().'_'.$image_file->getClientOriginalName();
            $image_file->move(public_path('/uploads/laws/image/') , $image_name);
        }else{
            $image_name = $request->old_image;
        }
        if($request->pdf_file != null){
            $pdf_file = $request->file('pdf_file');
            $pdf_name = uniqid().'_'.$pdf_file->getClientOriginalName();
            $pdf_file->move(public_path('/uploads/laws/pdf/') , $pdf_name);
        }else{
            $pdf_name = $request->old_pdf;
        }
        Law::where('id' , $request->update_id)->update([
            'law_type' => $request->law_type,
            'parliament_times_id' => $request->ptimes,
            'law_name' => $request->law_title,
            'law_name_en' => $request->law_title_en,
            'session_time' => $request->session_time,
            'session_time_en' => $request->session_time_en,
            'dop' => $request->law_date_of_publication,
            'proposed_from' => $request->law_proposed_from,
            'proposed_from_en' => $request->law_proposed_from_en,
            'dopd' => $request->law_proposed_day,
            'doprd' => $request->law_report_read,
            'pdf' => $pdf_name,
            'image' => $image_name,
            'summary' => $request->summary,
            'summary_en' => $request->summary_en,
        ]);

        return redirect()->route('laws.get')->withSuccess('Successfully updated.');
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
