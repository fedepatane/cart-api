<?php

namespace App\Repositories;

use App\items_by_cart;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ItemsByCartRepository implements ItemsByCartRepositoryInterface
{
    protected $model;


    public function __construct(items_by_cart $post)
    {
        $this->model = $post;
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

    public function find($id)
    {
        if (null == $post = $this->model->find($id)) {
            throw new ModelNotFoundException("Post not found");
        }

        return $post;
    }

    public function erase_product_from_cart($product, $cart)
    {
        
        $instance = $this->model::where([
                ['product_id' , '=' , $product], 
                ['cart_id' , '=' , $cart]
            ])->get();       
        
        return $instance->each->delete();       

    }


}