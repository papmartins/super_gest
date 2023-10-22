<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Repositories\ProductRepository;
use App\Http\Requests\ProductOrderRequest;

class ProductOrderController extends Controller
{
    protected $productRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository(new Product());
    }

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
    public function create(Order $order)
    {
        $products = $this->productRepository->getAll();
        $order->products; // eager loading
        return view('app.product_order.create',['order' => $order, 'products' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductOrderRequest $request, Order $order)
    {
        // Pelo attach
        $order->products()->attach($request->get('product_id'),
            [
                'quantity' => $request->get('quantity')
            ]
        ); // Object
        // To insert more than one in same time
        // $order->products()->attach(
        //     [
        //         $request->get('product_id') => ['quantity' => $request->get('quantidade')],
        //         $request->get('product_id') => ['quantity' => $request->get('quantidade')]
        //     ]
        // ); // Object


        return redirect()->route('product_order.create',['order' => $order->id]);
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
    // public function destroy(Order $order, Product $product)
    public function destroy(ProductOrder $orderProduct, $order_id )
    {
        /*
        // convencional 
        ProductOrder::where([
            'order_id' => $order->id,
            'product_id' => $product->id
        ])->delete();
        */

        //pelo belongsToMany em App\Models\Order
        // order_id já é conhecido
        //$order->products()->detach($product->id);
        $orderProduct->delete();
        return redirect()->route('product_order.create',['order' => $order_id]);
    }


}
