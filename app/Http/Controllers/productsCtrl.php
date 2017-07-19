<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\products;
use DB;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\seen;
use App\rate;
use App\image;
class productsCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
              
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
                    ->orderBy($sort,$order);
                    
                                
            $search = $request->input('search');        
            if($search !== "")
            {
                    //return $search;
                    $data = $data->where('products.product_name','like','%'.$search.'%');
                               // ->orWhere('categories.category_name','like','%'.$search.'%');
            }

        
            return response()->json($data->paginate($data_per_page),200,[],JSON_PRETTY_PRINT);  
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
       $client = new Client(); //GuzzleHttp\Client
        $result = $client->get('https://developers.zomato.com/api/v2.1/search',  [
            'headers' => [
                'user-key' => 'f3fa83bb71e7594277a762787a696833',
            ],
        ]);
        return $result->getBody()->getContents();

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
    public function show($id)
    {
        //
                      
        
        $datas['product_id'] = $id;
        $datas['seen_by'] = \Request::ip();
        seen::create($datas);
        $data = DB::table('products')  
                ->select(DB::raw("products.*,count(seens.product_id) as seen,categories.*,sellers.*,avg(rates.star)-1 as avg_star"))
                ->leftJoin('seens','products.product_id','=','seens.product_id')  
                ->leftJoin('rates','products.product_id','=','rates.rate_product_id')                    
                ->leftJoin('categories','products.product_category_id','=','categories.category_id')
                ->leftJoin('sellers','products.product_seller_id','=','sellers.seller_id')
                ->where('products.product_id',$id)                    
                ->groupBy("seens.product_id")
                ->first() ;  
        if($data)
        {
            $data->comment = rate::where('rate_product_id',$id)->get();
            $data->images = image::where('product_id',$id)->get();
        }
       

        if(!$data)
        {
            $data['message'] = "no data";        
            $data['status'] = "not found";        
        }

        return response()->json($data,200,[],JSON_PRETTY_PRINT);  

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
