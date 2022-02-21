<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Product;
use App\Repositories\ProductRepositoryInterface;

class ItemsByCartResource extends JsonResource
{

    public function __construct($resource, ProductRepositoryInterface $repo)
    {
        // Ensure you call the parent constructor
        parent::__construct($resource);
        $this->repo = $repo;        
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
        // check the product name 
        $ret = array();
        foreach($this->resource as $product){
            $product_name = $this->repo->find($product->product_id)->name;
            $ret[] = [
                        'product' => $product_name,
                        'quantity' => $product->quantity,
                        'price' => $product->unit_price,            
                    ];

        }
        return $ret;
    }
}
