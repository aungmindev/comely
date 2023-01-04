<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Box_option;
use App\Models\Boximage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BoxoptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boxes = Box_option::orderBy('id' , 'desc')->with('box_images')->paginate(10);
        return view('backend.stock.boxoption' , compact('boxes'));
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
            'images.*'  => 'nullable|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:2048',
            'name'      => 'required',
            'name_en'   => 'required',
            'price'     => 'required'
        ]);

        if($validator->fails()){
            $validator->errors()->add('modal' , 'Creating Box fail');
            return redirect()->back()->withErrors($validator);
        }
        if(!isset($request->box_id)){
            $latest_box = Box_option::latest()->first();
            if($latest_box){
               $latest_box_id = $latest_box->id += 1;
            }else{
               $latest_box_id = 1;
            }
            if($request->hasFile('images')){
                $images = $request->file('images');
    
                foreach($images as $image){
                   $client_image_name = $image->getClientOriginalName();
                   if(in_array($client_image_name , json_decode($request->uploadsImage))){
                       $image_name = uniqid().'_'.$image->getClientOriginalName();
                       $image->move(public_path('/uploads/boxes/') , $image_name);
       
                       Boximage::create([
                           'box_id'     => $latest_box_id,
                           'image'      => config('app.url').'/uploads/boxes/'.$image_name
                       ]);
                   }
                }
            }
            
    
             Box_option::create([
                'name' => $request->name,
                'name_en' => $request->name_en,
                'price' => $request->price,
                'description' => $request->description,
                'description_en' => $request->description_en,
             ]);
    
             return redirect()->route('boxOption.index')->withSuccess('Successfully created.');
        }else{
            $update_box_id = $request->box_id;
            
            if($request->uploadsImage == 'null'){
             Boximage::where('box_id' , $update_box_id)->delete();                
            }else{
                Boximage::where('box_id' , $update_box_id)->delete(); 
                foreach(json_decode($request->uploadsImage) as $image){
                    if (substr($image , 0 , 7) == 'http://' || substr($image , 0 , 8) == 'https://') {
    
                        Boximage::create([
                            'box_id'     => $update_box_id,
                            'image'      => $image
                        ]);
                     }
                 }
            }
            if($request->hasFile('images')){
                $images = $request->file('images');
                foreach($images as $image){
                    $client_image_name = $image->getClientOriginalName();
                    if(in_array($client_image_name , json_decode($request->uploadsImage))){
                        $image_name = uniqid().'_'.$image->getClientOriginalName();

                        $image->move(public_path('/uploads/boxes/') , $image_name);
        
                        Boximage::create([
                            'box_id'     => $update_box_id,
                            'image'      => config('app.url').'/uploads/boxes/'.$image_name
                        ]);

                    }
                 }

            }
            
            
             
             Box_option::where('id' , $update_box_id)->update(
                [
                    'name' => $request->name,
                    'name_en' => $request->name_en,
                    'price' => $request->price,
                    'description' => $request->description,
                    'description_en' => $request->description_en,
                 ]
                );
             
                return redirect()->route('boxOption.index')->withSuccess('Successfully updated.');
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
        $data = Box_option::with(['box_images'])->find($id);
        return view('backend.stock.boxoptionedit' , compact('data'));
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
