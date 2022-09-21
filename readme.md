# Query

1. Selezionare tutti gli ordini dell'utente **Simone Giusti** mostrandone lo username e l'email
LUCA:
SELECT *
FROM orders
JOIN users ON orders.user_id = users.id
WHERE users.name = 'Simone Giusti'

SIMONE F. & co.:
SELECT users.name, users.email, orders.id, orders.code
FROM orders
JOIN users ON orders.user_id = users.id
WHERE users.name = 'Simone Giusti'

2. Selezionare tutti i prodotti disponibili con le relative categorie associate
LORENZO:
SELECT *
FROM products
JOIN categories ON products.category_id = categories.id
WHERE products.available > 0

RICCARDO:
SELECT products.id, products.name AS product_name, products.slug, products.available, categories.name AS category_name
FROM products
JOIN categories ON products.category_id = categories.id
WHERE products.available > 0

SAID & co.:
SELECT *
FROM products
LEFT JOIN categories ON products.category_id = categories.id
WHERE products.available > 0

ANDREA Q.:
SELECT *
FROM products
RIGHT JOIN categories ON products.category_id = categories.id
WHERE products.available > 0

FRANCESCO:
SELECT *
FROM products
FULL OUTER JOIN categories ON products.category_id = categories.id
WHERE products.available > 0

3. Selezionare tutti gli ordini e calcolare il totale per ognuno di essi
SELECT orders.id, orders.code, orders.shipping_address, orders.user_id, SUM(order_product.price * order_product.quantity) AS order_total
GROUP BY order_product.order_id
FROM orders
JOIN order_product ON orders.id = order_product.order_id

4. Selezionare tutti gli utenti e calcolare per ognuno di essi il numero di ordini effettuati

5. Calcolare, per ogni prodotto, il numero di volte che è stato ordinato

6. Selezionare tutti gli ordini in cui compare il prodotto **Dino Grady**
