# Routes

## Sprint 1

| URL                         | HTTP Method | Controller          | Method     | Title                            | Content                        | Comment                            |
| --------------------------- | ----------- | ------------------- | ---------- | -------------------------------- | ------------------------------ | ---------------------------------- |
| `/`                         | `GET`       | `MainController`    | `home`     | Dans les shoe                    | 5 categories                   | -                                  |
| `/catalogue/categorie/[id]` | `GET`       | `CatalogController` | `category` | Dans les shoe - [nom catégorie]  | les produits de la catégorie   | [id] c'est l'id de la catégorie    |
| `/catalogue/marque/[id]`    | `GET`       | `CatalogController` | `brand`    | Dans les shoe - [nom marque]     | les produits de la marque      | [id] c'est l'id de la marque       |
| `/catalogue/marques`        | `GET`       | `CatalogController` | `brands`   | Dans les shoe - Nos marques      | la liste des marques           |                                    |
| `/catalogue/type/[id]`      | `GET`       | `CatalogController` | `type`     | Dans les shoe - [nom type]       | les produits d'un certain type | [id] c'est l'id du type de produit |
| `/catalogue/produit/[id]`   | `GET`       | `CatalogController` | `product`  | Dans les shoe - [nom produit]    | la page produit                | [id] c'est l'id du produit         |
| `/mentions-legales`         | `GET`       | `MainController`    | `legal`    | Dans les shoe - Mentions légales | la page mentions légales       |                                    |
