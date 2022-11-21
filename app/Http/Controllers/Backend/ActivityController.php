<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.activity.index');
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
            'image' => 'required|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:1024',
            'title'  => 'required',
            'title_en'  => 'required',
            'description'  => 'required',
            'description_en'  => 'required',
            
        ]);

        if($validator->fails()){
            $validator->errors()->add('modal' , 'Add Question (Or) Proposal fail');
            return redirect()->back()->withErrors($validator);
        }

        $image_file = $request->file('image');
        $image_name = uniqid().'_'.$image_file->getClientOriginalName();
        $image_file->move(public_path('/uploads/reports/image/') , $image_name);
        

        
        Activity::create([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'image' => $image_name,
        ]);

        return redirect()->route('activity.index')->withSuccess('Successfully uploaded.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Activity::orderBy('created_at' , 'desc')->get();

        return DataTables::of($data)
        
        
        ->editColumn('created_at' , function($data){
            return date('M Y , d' , strtotime($data->created_at));
        })
        ->editColumn('description' , function($data){
            return mb_substr(strip_tags($data->description) , 0 , 100) . ' ...';
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
                     <span onclick="edit(`'.$data->id.'`,`'.$data->title.'`,`'.$data->title_en.'`,`'.$data->description.'`,`'.$data->description_en.'`,`'.$data->image.'`)" class="btn btn-sm btn-warning d-inline"><i class="fas fa-edit"></i> </span>
                    </div>
                    <div class="col-lg-6">
                     <span onclick="edit(`'.$data->id.'`,`'.$data->session_type.'`,`'.$data->session_data_type.'`,`'.$data->parliament_times_id.'`,`'.$data->session_time.'`,`'.$data->session_time_en.'`,`'.$data->title.'`,`'.$data->title_en.'`,`'.$data->date.'`,`'.$data->summary.'`,`'.$data->summary_en.'`,`'.$data->pdf.'`,`'.$data->image.'`)" class="btn btn-sm btn-danger d-inline"><i class="fas fa-trash"></i> </span>
                    </div>
                </div>
            ';

           
        })
        ->rawColumns(['action' , 'image'])
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
            'title'  => 'required',
            'title_en'  => 'required',
            'description'  => 'required',
            'description_en'  => 'required',
            
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
            $image_name = $request->old_image;
        }
        

        
        Activity::where('id' , $request->update_id)->update([
            'title' => $request->title,
            'title_en' => $request->title_en,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'image' => $image_name,
        ]);

        return redirect()->route('activity.index')->withSuccess('Successfully uploaded.');
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
