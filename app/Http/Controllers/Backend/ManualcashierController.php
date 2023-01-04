<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Salehistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
class ManualcashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.manualcashier.manualCashier');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cashier(Request $request)
    {
        $item_code = $request->itemCode;
        $product   = Product::with('brands' , 'categories')->find($item_code);
        if($product){
            $product->stock -= 1;
            $product->update();
    
            Salehistory::create([
                'product_id' => $item_code,
                'item_code' => $product->item_code,
                'product_name' => $product->name_en,
                'price' => $product->after_discount_price,
                'brand' => $product->brands->name_en,
                'category' => $product->categories->name_en,
            ]);
    
            return response()->json([
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'status' => 403,
                'message' => 'Product item_code is wrong',
            ]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $date = date('Y-m-d');
        $data = DB::select(DB::raw("
            SELECT product_id , item_code , product_name , price , brand , category , count(*) as saled_qty , date(created_at) as 'date'  FROM comely.salehistories where date(created_at) = '$date' 
            group by product_id , item_code , product_name , price , brand , category , date;
        "));

        return DataTables::of($data)
        ->editColumn('saled_qty' , function($data){
            return '<span class="badge badge-phoenix badge-phoenix-success">'.$data->saled_qty.'</span>';
        })
        ->editColumn('brand' , function($data){
            return '<span class="badge badge-phoenix badge-phoenix-primary">'.$data->brand.'</span>';
        })
        ->editColumn('category' , function($data){
            return '<span class="badge badge-phoenix badge-phoenix-primary">'.$data->category.'</span>';
        })
        ->rawColumns(['saled_qty' , 'brand' , 'category'])
        ->make(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function history(Request $request)
    {
        
        return view('backend.manualcashier.salehistory');
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
