<?php 
function printList($product){
 	return '<li>'.$product["name"].' '.$product["quantity"].' </li>';
}
?>

<ul>
	<?php 
		try{
			array_map("printList", $products);
		}
		catch(Exception $e){
			print "error";
		}

	?>
</ul>
