<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Salehistory;
use App\Models\Slip;
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
    public function getProduct(Request $request)
    {
        $item_code = $request->itemCode;
        $slip = Slip::latest()->first();
        if($slip){
            $slip_id = $slip->id += 1;
        }else{
            $slip_id = 1;
        }
        $product   = Product::with('brands' , 'categories')->find($item_code);
        if($product){
            if($product->stock > 0){
                return [$product , $slip_id];
            }else{
                return response()->json([
                    'status' => 403,
                    'message' => 'This product is out of stock',
                ]);
            }
        }else{
            return response()->json([
                'status' => 403,
                'message' => 'Product item code is wrong.',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cashier(Request $request)
    {
        foreach($request->buying_lists as $buy){
            $item_code = $buy['id'];
            $product   = Product::with('brands' , 'categories')->find($item_code);
            if($product){
                $product->stock -= $buy['qty'];
                $product->update();
        
                Salehistory::create([
                    'product_id' => $item_code,
                    'item_code' => $product->item_code,
                    'product_name' => $product->name_en,
                    'price' => $product->after_discount_price,
                    'brand' => $product->brands->name_en,
                    'category' => $product->categories->name_en,
                    'sale_qty' => $buy['qty'],
                ]);
        
                
            }
        }

        Slip::create([
            'data' => json_encode($request->all()),
        ]);
        return response()->json([
            'status' => 200,
        ]);
        
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
        $start_date = $request->start_date;
        $end_date   = $request->end_date;
        
        if($start_date != null && $end_date != null){
            $data = DB::select(DB::raw("
            SELECT product_id , item_code , product_name , price , brand , category , sum(sale_qty) as saled_qty , date(created_at) as 'date'  FROM comely.salehistories 
            where date(created_at) between '$start_date' and '$end_date'
            group by product_id , item_code , product_name , price , brand , category , date;
            ")); 
        }else{
            $data = DB::select(DB::raw("
            SELECT product_id , item_code , product_name , price , brand , category , sum(sale_qty) as saled_qty , date(created_at) as 'date'  FROM comely.salehistories where date(created_at) = '$date' 
            group by product_id , item_code , product_name , price , brand , category , date;
            "));

        }
        
        return DataTables::of($data)
        ->editColumn('saled_qty' , function($data){
            return '<span class="badge badge-phoenix badge-phoenix-success">'.$data->saled_qty.'</span>';
        })
        ->editColumn('created_at' , function($data){
            return date('d F , Y' , strtotime($data->date));
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
