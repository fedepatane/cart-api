<?php


namespace App\Http\Controllers;


use App\Http\Controllers\CartController;
use App\items_by_cart;
use Illuminate\Http\Request;
use App\Repositories\ItemsByCartRepositoryInterface;
use App\helpers\PriceGetter;


class ItemsByCartController extends Controller
{

    private $repository;

    public function __construct(ItemsByCartRepositoryInterface $repository)
    {
        $this->repository = $repository;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CartController $cart, ProductController $product_cont, PriceGetter $priceGetter)
    {   
        // primero creamos el cart y nos agarramos el id del cart 
        $products = $request->input('data');
        $totalPrice = $priceGetter->get($products);
        $id_cart = $cart->store(array("total_price" => $totalPrice ))->id;

        foreach ($products as $product_i ) {
            $product_name = $product_i["name"];
            $product_id = $product_cont->store(array("name" => $product_name))->id;
            $quantity = $product_i["quant"];
            $price = $product_i["price"];
            $params = array(
                            "product_id" => $product_id, 
                            "cart_id" => $id_cart , 
                            "quantity" => $quantity, 
                            "unit_price" => $price);
            $this->repository->create($params);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\items_by_cart  $items_by_cart
     * @return \Illuminate\Http\Response
     */
    public function show(items_by_cart $items_by_cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\items_by_cart  $items_by_cart
     * @return \Illuminate\Http\Response
     */
    public function edit(items_by_cart $items_by_cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\items_by_cart  $items_by_cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, items_by_cart $items_by_cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\items_by_cart  $items_by_cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(items_by_cart $items_by_cart)
    {
        //
    }

    public function erase_product_from_cart($product, $cart)
    {
        $this->repository->erase_product_from_cart($product, $cart);
    }



}
