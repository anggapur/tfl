<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use jsonPrint;
use DB;
use Validator;
class cartCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('form');
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
        $data['cart_buyer_id'] = $request->input('user_id');
        $data['cart_product_id'] = $request->input('product_id');
        $data['cart_qty'] = $request->input('qty');
        if($data['cart_qty'] == "")
            $data['cart_qty'] = "1";

        $query = cart::where([
                'cart_buyer_id' => $request->input('user_id'),
                'cart_product_id' => $request->input('product_id'),
            ]);
        if(count($query->get()) == 0)
        {
            if(cart::create($data))
            {
                $feedback['message'] = 'success';
                $feedback['action'] = 'store';
                $feedback['data'] = $query->select(DB::raw('carts.*,products.*,(carts.cart_qty*products.product_sell_price) as subtotal'))
                        ->leftJoin('products','carts.cart_product_id','=','products.product_id')
                        ->with(['seller'=>function($query){
                            $query->select('seller_id','seller_name');
                        }])->first();
            }
        }
        else
        {
            $feedback['message'] = 'data is exists';
            $feedback['action'] = 'store';            
        }

        return jsonPrint::prints($feedback);
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

        $data['data'] = cart::select(DB::raw('carts.*,products.*,(carts.cart_qty*products.product_sell_price) as subtotal'))
                        ->leftJoin('products','carts.cart_product_id','=','products.product_id')
                        ->with(['seller'=>function($query){
                            $query->select('seller_id','seller_name');
                        }])
                        ->where('cart_buyer_id',$id)
                        ->get();

        $data['total'] = count($data['data']);
        $data['message'] ='success';        
        return jsonPrint::prints($data);

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
       //  //proses
       //  $data['cart_product_id'] = $id;
       //  $data['cart_buyer_id'] = $request->input('user_id');
       //  $qty = $request->input('qty');

       //  //validasi 
       // $validator = Validator::make($request->all(),[
       //          'user_id' => 'required',
       //          'product_id' => 'required',                
       //      ]);
       //  if($validator->fails())
       //  {   
       //      $feedback['action'] ='update';
       //      $feedback['message'] = 'failed';
       //      $feedback['errors'] =$validator->errors();
       //      return $feedback;
       //  }

       //  if($qty == "")
       //      $qty = "1";
        
       //  $query = cart::where($data); 
       //  if(count($query->get()) > 0)
       //  {
       //      $exe = $query->update(['cart_qty'=>$qty]);
       //      if($exe)
       //      {
       //          $feedback['message'] = "success";
       //          $feedback['action'] = "update";
       //          $feedback['data'] = $query->leftJoin('products','carts.cart_product_id','=','products.product_id')
       //                              ->with(['seller'=>function($query){
       //                                      $query->select('seller_id','seller_name');
       //                                  }])
       //                              ->first();
       //      }
       //      else
       //      {
       //          $feedback['message'] = "failed";
       //      }
       //  }


        if(cart::where('cart_id',$id)->update(['cart_qty' => $request->input('qty')]))
        {
            $feedback['message'] = 'success';
            $feedback['action'] = 'update';
            $feedback['data'] = cart::where('cart_id',$id)
                                ->leftJoin('products','carts.cart_product_id','=','products.product_id')
                                    ->with(['seller'=>function($query){
                                            $query->select('seller_id','seller_name');
                                        }])
                                    ->first();
            
        }
        else
        {
            $feedback['message'] = 'failed';
            $feedback['desc'] = 'the data is not exist or somthing else';
        }
        return jsonPrint::prints($feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //
        // $user_id = $request->input('user_id');
        // //find the data base on what we get
        // $query  = cart::where([
        //         'cart_product_id' => $id,
        //         'cart_buyer_id' => $user_id,
        //     ]);        
        // $data['total'] = count($query->get());
        // $data['data'] = $query
        //             ->leftJoin('products','carts.cart_product_id','=','products.product_id')
        //             ->with(['seller'=>function($query){
        //                     $query->select('seller_id','seller_name');
        //                 }])
        //             ->first();
        // //proses delete;

        // if($query->delete())
        //     $data['message'] = "success";            
        // else
        // {
        //     $data['message'] = "failed";
        //     $data['desc'] = "The Data No Exist or Something Else";
        // }

        // return $data;
        $query = cart::where('cart_id',$id);
        if(count($query->get()) > 0)
        {
            $exe = $query->delete();
            if($exe)
            {
                $feedback['message'] = 'success';
                $feedback['action'] ='delete';
            }
        }
        else
        {
            $feedback['message'] = 'failed';
            $feedback['action'] ='delete';
            $feedback['desc'] = 'data not exists';
        }
        return jsonPrint::prints($feedback);
    }
}
