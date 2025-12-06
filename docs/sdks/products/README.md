# Products

## Overview

### Available Operations

* [listItems](#listitems) - Get Products
* [create](#create) - Create Product
* [get](#get) - Get Product By Id
* [update](#update) - Update Product
* [getCategories](#getcategories) - Get Product Categories

## listItems

Retrieve a paginated list of products based on filters and search query.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_products_v1_products__get" method="get" path="/v1/products/" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        new Components\Security(
            apiKeyHeader: '<YOUR_API_KEY_HERE>',
            customHeader: '<YOUR_API_KEY_HERE>',
        )
    )
    ->build();

$request = new Operations\GetProductsV1ProductsGetRequest();

$response = $sdk->products->listItems(
    request: $request
);

if ($response->pageProductRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                | Type                                                                                                     | Required                                                                                                 | Description                                                                                              |
| -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                               | [Operations\GetProductsV1ProductsGetRequest](../../Models/Operations/GetProductsV1ProductsGetRequest.md) | :heavy_check_mark:                                                                                       | The request object to use for the request.                                                               |

### Response

**[?Operations\GetProductsV1ProductsGetResponse](../../Models/Operations/GetProductsV1ProductsGetResponse.md)**

### Errors

| Error Type                                                | Status Code                                               | Content Type                                              |
| --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- |
| Errors\ErrorResponse                                      | 401, 404                                                  | application/json                                          |
| Errors\BackendSrcProductsResponsesValidationErrorResponse | 422                                                       | application/json                                          |
| Errors\ErrorResponse                                      | 500                                                       | application/json                                          |
| Errors\APIException                                       | 4XX, 5XX                                                  | \*/\*                                                     |

## create

The Create Product API allows users to manually create a new product
    in the system. This includes specifying product details such as category,
    subcategory, and tax exemption status, etc.

### Example Usage

<!-- UsageSnippet language="php" operationID="create_product_v1_products__post" method="post" path="/v1/products/" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        new Components\Security(
            apiKeyHeader: '<YOUR_API_KEY_HERE>',
            customHeader: '<YOUR_API_KEY_HERE>',
        )
    )
    ->build();

$request = new Components\ProductCreateManual(
    externalId: 'prod_001',
    name: 'Sample Product',
    description: 'A description of the product',
    status: Components\ProductStatusEnum::Approved,
    productCategory: Components\ProductCategoryEnum::Physical,
    productSubcategory: Components\ProductSubCategoryEnum::GeneralClothing,
    taxExempt: false,
    source: Components\SourceEnum::Bigcommerce,
);

$response = $sdk->products->create(
    request: $request
);

if ($response->productRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                        | Type                                                                             | Required                                                                         | Description                                                                      |
| -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- |
| `$request`                                                                       | [Components\ProductCreateManual](../../Models/Components/ProductCreateManual.md) | :heavy_check_mark:                                                               | The request object to use for the request.                                       |

### Response

**[?Operations\CreateProductV1ProductsPostResponse](../../Models/Operations/CreateProductV1ProductsPostResponse.md)**

### Errors

| Error Type                                                | Status Code                                               | Content Type                                              |
| --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- |
| Errors\ErrorResponse                                      | 401                                                       | application/json                                          |
| Errors\BackendSrcProductsResponsesValidationErrorResponse | 422                                                       | application/json                                          |
| Errors\ErrorResponse                                      | 500                                                       | application/json                                          |
| Errors\APIException                                       | 4XX, 5XX                                                  | \*/\*                                                     |

## get

The Get Product By ID API retrieves detailed information about
    a single product by its unique ID. This API helps in viewing the specific details
    of a product, including its attributes, status, and categorization.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_product_by_id_v1_products__product_id__get" method="get" path="/v1/products/{product_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        new Components\Security(
            apiKeyHeader: '<YOUR_API_KEY_HERE>',
            customHeader: '<YOUR_API_KEY_HERE>',
        )
    )
    ->build();



$response = $sdk->products->get(
    productId: '<id>'
);

if ($response->productRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                   | Type                                                        | Required                                                    | Description                                                 |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| `productId`                                                 | *string*                                                    | :heavy_check_mark:                                          | The unique identifier for the product you want to retrieve. |

### Response

**[?Operations\GetProductByIdV1ProductsProductIdGetResponse](../../Models/Operations/GetProductByIdV1ProductsProductIdGetResponse.md)**

### Errors

| Error Type                                                | Status Code                                               | Content Type                                              |
| --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- |
| Errors\ErrorResponse                                      | 401                                                       | application/json                                          |
| Errors\BackendSrcProductsResponsesValidationErrorResponse | 422                                                       | application/json                                          |
| Errors\ErrorResponse                                      | 500                                                       | application/json                                          |
| Errors\APIException                                       | 4XX, 5XX                                                  | \*/\*                                                     |

## update

The Update Product API allows users to modify the details of
    an existing product identified by its unique product_id

### Example Usage

<!-- UsageSnippet language="php" operationID="update_product_v1_products__product_id__put" method="put" path="/v1/products/{product_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        new Components\Security(
            apiKeyHeader: '<YOUR_API_KEY_HERE>',
            customHeader: '<YOUR_API_KEY_HERE>',
        )
    )
    ->build();

$productUpdate = new Components\ProductUpdate(
    externalId: 'prod_001',
    name: 'Updated Product Name',
    description: 'An updated description for the product',
    status: Components\ProductStatusEnum::Approved,
    productCategory: Components\ProductCategoryEnum::Physical,
    productSubcategory: Components\ProductSubCategoryEnum::GeneralClothing,
    taxExempt: false,
);

$response = $sdk->products->update(
    productId: '<id>',
    productUpdate: $productUpdate

);

if ($response->productRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                            | Type                                                                 | Required                                                             | Description                                                          |
| -------------------------------------------------------------------- | -------------------------------------------------------------------- | -------------------------------------------------------------------- | -------------------------------------------------------------------- |
| `productId`                                                          | *string*                                                             | :heavy_check_mark:                                                   | Unique identifier of the product to be updated.                      |
| `productUpdate`                                                      | [Components\ProductUpdate](../../Models/Components/ProductUpdate.md) | :heavy_check_mark:                                                   | N/A                                                                  |

### Response

**[?Operations\UpdateProductV1ProductsProductIdPutResponse](../../Models/Operations/UpdateProductV1ProductsProductIdPutResponse.md)**

### Errors

| Error Type                                                | Status Code                                               | Content Type                                              |
| --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- |
| Errors\ErrorResponse                                      | 401                                                       | application/json                                          |
| Errors\BackendSrcProductsResponsesValidationErrorResponse | 422                                                       | application/json                                          |
| Errors\ErrorResponse                                      | 500                                                       | application/json                                          |
| Errors\APIException                                       | 4XX, 5XX                                                  | \*/\*                                                     |

## getCategories

The Get Product Categories API retrieves all
    product categories.  This endpoint helps users understand and select the
    appropriate categories for their products.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_product_categories_v1_products_categories__get" method="get" path="/v1/products/categories/" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        new Components\Security(
            apiKeyHeader: '<YOUR_API_KEY_HERE>',
            customHeader: '<YOUR_API_KEY_HERE>',
        )
    )
    ->build();



$response = $sdk->products->getCategories(

);

if ($response->responseGetProductCategoriesV1ProductsCategoriesGet !== null) {
    // handle response
}
```

### Response

**[?Operations\GetProductCategoriesV1ProductsCategoriesGetResponse](../../Models/Operations/GetProductCategoriesV1ProductsCategoriesGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |