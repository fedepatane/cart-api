<?php

namespace App\Repositories;

use App\Cart;
use App\items_by_cart;
use App\Http\Resources\ItemsByCartResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Repositories\ProductRepositoryInterface;

class CartRepository implements CartRepositoryInterface
{
    protected $model;
    protected $product; 

    public function __construct(Cart $cart, ProductRepositoryInterface $product)
    {
        $this->model = $cart;
        $this->product = $product;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {   
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($cart)
    {   
        $items = items_by_cart::where('cart_id', "=" ,  $cart->id)->get();
        return new ItemsByCartResource($items, $this->product );
    }
}