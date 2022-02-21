## To run the project : 

-composer install 
-php artisan serve 

## To create a cart with products : 

curl --location --request POST 'http://127.0.0.1:8000/api/items_by_carts' \
--header 'Content-Type: application/json' \
--data-raw '{
"data" : [{"name" :"p11", "quant" : 10, "price" : 1} , {"name" :"p2", "quant" : 10, "price" : 1}]
}
'

## To get a cart with products 

curl --location --request GET 'http://127.0.0.1:8000/api/carts/{cart_id}' \
--header 'Content-Type: application/json' \
--data-raw ''


## To delete products from a cart 

curl --location --request DELETE 'http://127.0.0.1:8000/api/erase_product_from_cart/{id_product}/{id_cart}' \
--header 'Content-Type: application/json' \
--data-raw ''


## To do checkout of a cart 
curl --location --request POST 'http://127.0.0.1:8000/api/do_checkout/{cart_id}' \
--data-raw ''
