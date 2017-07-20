<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use App\category;
use DB;
use jsonPrint;
class categoryCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $order =  $request->input('order');        
            if($order == "")
                $order =  "asc";
            
        $sort = $request->input('sort');
            if($sort == "")
                $sort = "categories.category_id";

        //$data = products::with('rating')->get();
        $data = category::with('child')->where('category_parent_id','0')
        ->orderBy($sort,$order)
        ->get();
        
        $datas['status'] = 'success';
        $datas['total'] = count($data);
        $datas['data'] = $data;

        return jsonPrint::prints($datas);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        //
        $data_per_page =  $request->input('data_per_page');
            if($data_per_page == "")
                $data_per_page =  10;
                        
            $page =  $request->input('page');
            if($page == "")
                $page =  1;
                

            $order =  $request->input('order');        
            if($order == "")
                $order =  "asc";
            
            $sort = $request->input('sort');
            if($sort == "")
                $sort = "products.product_id";

        $data = DB::table('products') 
                    ->select(DB::raw("products.*,count(seens.product_id) as seen,categories.*,sellers.*,avg(rates.star)-1 as avg_star"))
                    ->leftJoin('categories','products.product_category_id','=','categories.category_id')
                    ->leftJoin('sellers','products.product_seller_id','=','sellers.seller_id')
                    ->leftJoin('seens','products.product_id','=','seens.product_id') 
                    ->leftJoin('rates','products.product_id','=','rates.rate_product_id')
                    ->groupBy("products.product_id")
                    ->where('categories.category_id',$id)
                    ->orderBy($sort,$order);

       return jsonPrint::prints($data->paginate($data_per_page));                      
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
        return "update";
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
