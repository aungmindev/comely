<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = DB::table('galleries')->orderBy('created_at' , 'desc')->paginate(5);
        return view('backend.gallery.gallery' , compact('galleries'));
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
        if($request->image == null && $request->video == null){
            return redirect()->back()->withErrors('Required parameters are missing.');
        }
        if($request->image != null){
            $validator = Validator::make($request->all() , [
                'image' => 'required|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:1024',
                'image_description'  => 'required',
                'image_description_en'  => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }
            $image_file = $request->file('image');
            $image_name = uniqid().'_'.$image_file->getClientOriginalName();
            $image_file->move(public_path('/uploads/gallery/') , $image_name);
            Gallery::create([
                 'image_or_video' => $image_name ,
                 'description'   => $request->image_description,
                 'description_en'   => $request->image_description_en,
            ]);
        } 
        
        if($request->video != null){
            $validator = Validator::make($request->all() , [
                'video' => 'required',
                'video_description'  => 'required',
                'video_description_en'  => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            Gallery::create([
                'image_or_video' => $request->video ,
                'is_image' => 0,
                'description'    => $request->video_description,
                'description_en'    => $request->video_description_en
           ]);
        }
        
        return redirect()->route('gallery.index')->withSuccess('Successfully uploaded.');
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
    public function update(Request $request)
    {
        $old_data = json_decode($request->data);
        if($old_data->is_image == 1){

            $validator = Validator::make($request->all() , [
                'image' => 'mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:1024',
                'image_description'  => 'required',
                'image_description_en'  => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            if($request->image != null){ 
                $image_file = $request->file('image');
                $image_name = uniqid().'_'.$image_file->getClientOriginalName();
                $image_file->move(public_path('/uploads/gallery/') , $image_name); 
            } else{
                $image_name = $old_data->image_or_video;
            }
            $description = $request->image_description;
            $description_en = $request->image_description_en;

        }else{
            $validator = Validator::make($request->all() , [
                'video_description'  => 'required',
                'video_description_en'  => 'required',
            ]);
            if($validator->fails()){
                return redirect()->back()->withErrors($validator);
            }

            if($request->video != null){
                $image_name = $request('video');
            }else{
                $image_name = $old_data->image_or_video;
            }

            $description = $request->video_description;
            $description_en = $request->video_description_en;
        }
        
        
            Gallery::where('id' , $old_data->id)->update([
                'image_or_video' => $image_name,
                'description_en' => $description_en,
                'description' => $description,
            ]);
        
        return redirect()->route('gallery.index')->withSuccess('Successfully updated.');
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
