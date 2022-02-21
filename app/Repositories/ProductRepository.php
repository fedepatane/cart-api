<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductRepository implements ProductRepositoryInterface
{
    protected $model;


    public function __construct(Product $p)
    {
        $this->model = $p;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {   
        // aca veo q no exista , si no existe , entonces lo creo 
        $instance = $this->model::where('name' , '=', $data["name"]);
        if (!$instance->exists()){
            return $this->model->create($data);
        }
        // get the id 
        return $instance->first();
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
}