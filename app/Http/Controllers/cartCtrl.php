<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use jsonPrint;
use DB;
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
        return $id;
    }
}
