# ProductCategories


## Fields

| Field                                                                                      | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `name`                                                                                     | *string*                                                                                   | :heavy_check_mark:                                                                         | Name of the product category<br/>            (e.g., PHYSICAL, SERVICE, DIGITAL, MISCELLANEOUS) |
| `subcategories`                                                                            | array<[Components\ProductSubCategory](../../Models/Components/ProductSubCategory.md)>      | :heavy_check_mark:                                                                         | List of subcategories associated with the product category                                 |