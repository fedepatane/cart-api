<?php 

namespace App\helpers;

class PriceGetter{
	
	public function get($listOfStuff){
		$total_price = 0;
		foreach ($listOfStuff as $stuff) {
			$total_price = $total_price + $stuff["quant"] * $stuff["price"];
		}

		return $total_price;
	}

}