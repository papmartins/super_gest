<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use App\Models\ProductDetail;
use App\Repositories\ProductDetailRepository;
use App\Repositories\UnitRepository;
use App\Http\Requests\ProductDetailRequest;

class ProductDetailsController extends Controller
{
    protected $productDetailRepository;
    protected $unitRepository;
    
    public function __construct()
    {
        $this->productDetailRepository = new ProductDetailRepository(new ProductDetail());
        $this->unitRepository = new UnitRepository(new Unit());
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
    public function create()
    {
        $units = $this->unitRepository->getAll();
        return view('app.product_details.create',['units' => $units]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductDetailRequest $request)
    {
        $this->productDetailRepository->create($request->all());

        echo "Cadstro realizado com sucesso";
        // return redirect()->route('product_details.index');
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

    // public function edit(ProductDetail $product_details)
    public function edit($id)
    {
        //lazy loading
        $product_details = $this->productDetailRepository->find($id);
        
        //eager loading with('product','rel1','rel2') para vários relacionamentos
        $product_details = $this->productDetailRepository->with('product')->find($id);

        $units = $this->unitRepository->getAll();
        
        return view('app.product_details.edit',['product_details' => $product_details,'units' => $units]);
        // return view('app.product.create',['product' => $product,'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductDetail $product_details)
    {
        // $this->validar($request);

        $product_details->update($request->all());
        Echo "Atualização realizada com sucesso";
        // return redirect()->route('product_details.show',['product_details' => $product_details->id]);
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
