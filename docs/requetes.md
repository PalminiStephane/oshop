# Requêtes SQL

## Récupérer tous les produits

```sql
SELECT * FROM product
```

## Récupérer le produit ayant un id donné (#2)

```sql
SELECT *
FROM product
WHERE id = 2
```

## Les 5 catégories mises en avant sur la page d'accueil

```sql
SELECT name
FROM category
WHERE home_order BETWEEN 1 and 5
ORDER BY home_order 
```

```sql
SELECT *
FROM category
WHERE home_order > 0
ORDER BY home_order
LIMIT 5;
```

## Tous les produits triés par id de catégorie

```sql
SELECT id, name, category_id
FROM product
ORDER BY category_id
```

## Tous les produits triés par nom de catégorie

```sql
SELECT product.id, product.name, product.category_id, category.name
FROM product
JOIN category ON product.category_id = category.id
ORDER BY category.name
```

## Tous les produits de la catégorie #1 triés par nom croissant

```sql
SELECT id, name, category_id
FROM product
WHERE category_id = 1
ORDER BY name
```

## Tous les produits de la marque #2 triés par prix croissant

```sql
SELECT id, name, price, brand_id
FROM product
WHERE brand_id = 2
ORDER BY price
```

## Les infos sur le produit #1 + nom de la catégorie + nom de la marque

```sql
SELECT product.id, product.name, product.price, category.name, brand.name
FROM product
INNER JOIN category ON product.category_id = category.id
INNER JOIN brand ON product.brand_id = brand.id
WHERE product.id = 1
```