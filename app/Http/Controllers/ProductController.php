<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use App\Repositories\UnitRepository;
use App\Repositories\SupplierRepository;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $productRepository;
    protected $unitRepository;
    protected $supplierRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository(new Product());
        $this->unitRepository = new UnitRepository(new Unit());
        $this->supplierRepository = new SupplierRepository(new Supplier());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //eager loading with('productDetail','rel1','rel2') to many relacionships
        $products = $this->productRepository->with(['productDetail','supplier','orders'])->paginate(10);
        return view('app.product.index',['products' => $products, 'request' => $request->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = $this->unitRepository->getAll();
        $suppliers = $this->supplierRepository->getAll();
        return view('app.product.create',['units' => $units,'suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $this->productRepository->create($data);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produt  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('app.product.show',['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produt  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $units = $this->unitRepository->getAll();
        $suppliers = $this->supplierRepository->getAll();
        return view('app.product.edit',['product' => $product,'units' => $units,'suppliers' => $suppliers]);
        // return view('app.product.create',['product' => $product,'units' => $units]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produt  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('product.show',['product' => $product->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produt  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }

}
