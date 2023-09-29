CREATE OR REPLACE VIEW ordersview AS 
SELECT orders.* , address.* 
FROM orders
INNER JOIN address 
ON address_no = orders.order_addressid


CREATE or REPLACE VIEW myordersdetails AS
SELECT  cart.* , products.*, ordersview.*,SUM(products.product_oldprice - products.product_oldprice * products.product_descount / 100) as newprice , COUNT(products.product_id) as countitems 
 FROM cart 
INNER JOIN products 
ON products.product_id = cart.cart_productid
INNER JOIN ordersview 
ON ordersview.order_id = cart.cart_orders
WHERE cart.cart_orders != 0
GROUP BY cart.cart_userid , cart.cart_productid , cart.cart_orders

CREATE or REPLACE VIEW myrating AS
SELECT rating.* , products.* FROM `rating` 
INNER JOIN products
ON products.product_id = rating.rate_productid

CREATE OR REPLACE VIEW products_rating AS
SELECT rating.* , users.user_id , users.user_name , users.user_email,users.user_image FROM `rating` 
INNER JOIN users
ON users.user_id = rating.rate_userid

SELECT products.*,cart.* , SUM(product_oldprice)as totalprice , SUM(cart.product_quantity) as countitems FROM `cart` 
INNER JOIN products
ON product_id = cart.cart_productid
WHERE cart_orders = 0
GROUP BY product_id


CREATE OR REPLACE VIEW  mycart as

SELECT products.*,cart.* , (product_oldprice-(product_oldprice*(product_descount/100))) as product_newprice , SUM(cart.product_quantity) as countitems FROM `cart` 
INNER JOIN products
ON product_id = cart.cart_productid
WHERE cart_orders = 0
GROUP BY product_id


/* SELECT * FROM `orders` WHERE orders.order_datetime BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY)
AND NOW(); */