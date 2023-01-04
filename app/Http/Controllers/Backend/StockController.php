<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Box_option;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_box_option;
use App\Models\Product_image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.stock.index' );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands     = Brand::all();
        $boxes      = Box_option::all();
        return view('backend.stock.create' , compact('categories' , 'brands' , 'boxes'));
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
            'images.*' => 'required|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:2048',
            'name'  => 'required',
            'name_en'  => 'required',
            'brand'  => 'required',
            'category'  => 'required',
            'colors'  => 'required',
            'length'  => 'required',
            'width'  => 'required',
            'height'  => 'required',
            'stock'  => 'required',
            'regular_price'  => 'required',
            'original_sale_price'  => 'required',
            'after_discount_price'  => 'required',
            'boxOption'  => 'required',
        ]);

        if($validator->fails()){
            $validator->errors()->add('modal' , 'Creating products fail');
            return redirect()->back()->withInput($request->input())->withErrors($validator);
        }

        $latest_product = Product::latest()->first();
        if($latest_product){
           $latest_product_id = $latest_product->id += 1;
        }else{
           $latest_product_id = 1;
        }

        foreach($request->boxOption as $box){
            Product_box_option::create([
                'product_id' => $latest_product_id,
                'box_option_id' => $box,
            ]);
        }
         $images = $request->file('images');

         foreach($images as $image){
            $client_image_name = $image->getClientOriginalName();
            if(in_array($client_image_name , json_decode($request->uploadsImage))){
                $image_name = uniqid().'_'.$image->getClientOriginalName();
                $image->move(public_path('/uploads/products/') , $image_name);

                Product_image::create([
                    'product_id' => $latest_product_id,
                    'image'      => config('app.url').'/uploads/products/'.$image_name,
                ]);
            }
         }
         

         $colors = explode(',', array_keys($request->colors)[0]);

         Product::create([
            'item_code' => '#c'.$latest_product_id ,
            'name'  => $request->name,
            'name_en'  => $request->name_en,
            'brand_id'  => $request->brand,
            'category_id'  => $request->category,
            'colors' => json_encode($colors),
            'length'  => $request->length,
            'width'  => $request->width,
            'height'  => $request->height,
            'stock'  => $request->stock,
            'regular_price'  => $request->regular_price,
            'original_sale_price'  => $request->original_sale_price,
            'after_discount_price'  => $request->after_discount_price,
            'discount_percent'  => $request->discount,
            'description'  => $request->description,
            'description_en'  => $request->description_en,
         ]);
         return redirect()->route('products.index')->withSuccess('Successfully created.');

       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Product::all();
        return DataTables::of($data)
        ->addColumn('action', function ($data) {
            return ' 
             <a href="'.route('products.edit' , ['id' => $data->id]).'"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button></a>
             <a href=""><button class="btn btn-danger btn-sm ml-2"><i class="fas fa-trash"></i></button></a>
            ';

           
        })
        ->rawColumns(['action'])
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
        
        $categories = Category::all();
        $brands = Brand::all();
        $boxes      = Box_option::all();
        $data = Product::with(['product_images' , 'box_options'])->find($id);
        $edit_box_array = [];
        foreach($data->box_options as $box){
            array_push($edit_box_array , $box->box_option_id);
        }
        return view('backend.stock.prouctedit' , compact('data' , 'brands' , 'categories' , 'boxes' , 'edit_box_array'));
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
            'images.*' => 'nullable|mimes:jpg,jpeg,png|mimetypes:image/png,image/jpeg|max:2048',
            'name'  => 'required',
            'name_en'  => 'required',
            'brand'  => 'required',
            'category'  => 'required',
            'colors'  => 'required',
            'length'  => 'required',
            'width'  => 'required',
            'height'  => 'required',
            'stock'  => 'required',
            'regular_price'  => 'required',
            'original_sale_price'  => 'required',
            'after_discount_price'  => 'required',
            'boxOption'  => 'required',
        ]);

        if($validator->fails()){
            $validator->errors()->add('modal' , 'Creating products fail');
            return redirect()->back()->withInput($request->input())->withErrors($validator);
        }

        $update_product_id = $request->update_id;
            
            if($request->uploadsImage == 'null'){
             Product_image::where('product_id' , $update_product_id)->delete();                
            }else{
                Product_image::where('product_id' , $update_product_id)->delete(); 
                foreach(json_decode($request->uploadsImage) as $image){
                    if (substr($image , 0 , 7) == 'http://' || substr($image , 0 , 8) == 'https://') {
    
                        Product_image::create([
                            'product_id'     => $update_product_id,
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

                        $image->move(public_path('/uploads/products/') , $image_name);
        
                        Product_image::create([
                            'product_id'     => $update_product_id,
                            'image'      => config('app.url').'/uploads/products/'.$image_name
                        ]);

                    }
                 }

            }

            Product_box_option::where('product_id' , $update_product_id)->delete(); 

            foreach($request->boxOption as $box){
                Product_box_option::create([
                    'product_id' => $update_product_id,
                    'box_option_id' => $box,
                ]);
            }  
            $colors = explode(',', array_keys($request->colors)[0]);
            Product::where('id' , $update_product_id)->update(
                [
                    'item_code' => '#c'.$update_product_id ,
                    'name'  => $request->name,
                    'name_en'  => $request->name_en,
                    'brand_id'  => $request->brand,
                    'category_id'  => $request->category,
                    'colors' => json_encode($colors),
                    'length'  => $request->length,
                    'width'  => $request->width,
                    'height'  => $request->height,
                    'stock'  => $request->stock,
                    'regular_price'  => $request->regular_price,
                    'original_sale_price'  => $request->original_sale_price,
                    'after_discount_price'  => $request->after_discount_price,
                    'discount_percent'  => $request->discount,
                    'description'  => $request->description,
                    'description_en'  => $request->description_en,
                 ]
                );
                return redirect()->route('products.index')->withSuccess('Successfully updated.');
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
