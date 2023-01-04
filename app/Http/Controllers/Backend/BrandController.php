<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id' , 'desc')->paginate(10);
        return view('backend.stock.brand' , compact('brands'));
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
            'brand_name'      => 'required',
            'brand_name_en'   => 'required',
        ]);

        if($validator->fails()){
            $validator->errors()->add('modal' , 'Creating Brand fail');
            return redirect()->back()->withErrors($validator);
        }

        if($request->brand_id == null){
            Brand::create([
                'name_en' => $request->brand_name_en,
                'name' => $request->brand_name,
            ]);

            return redirect()->route('brand.index')->withSuccess('Successfully created.');
        }else{
            $update_id = $request->brand_id;

            Brand::where('id' , $update_id)->update([
                'name_en' => $request->brand_name_en,
                'name' => $request->brand_name,
            ]);

            return redirect()->route('brand.index')->withSuccess('Successfully updated.');
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
