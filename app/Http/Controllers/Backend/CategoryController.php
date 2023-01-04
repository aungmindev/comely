<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id' , 'desc')->paginate(10);
        return view('backend.stock.category' , compact('categories'));
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
            'category_name'      => 'required',
            'category_name_en'   => 'required',
        ]);

        if($validator->fails()){
            $validator->errors()->add('modal' , 'Creating Category fail');
            return redirect()->back()->withErrors($validator);
        }

        if($request->category_id == null){
            Category::create([
                'name_en' => $request->category_name_en,
                'name' => $request->category_name,
            ]);

            return redirect()->route('category.index')->withSuccess('Successfully created.');
        }else{
            $update_id = $request->category_id;

            Category::where('id' , $update_id)->update([
                'name_en' => $request->category_name_en,
                'name' => $request->category_name,
            ]);

            return redirect()->route('category.index')->withSuccess('Successfully updated.');
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
