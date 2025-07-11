# Products
(*products*)

## Overview

### Available Operations

* [list](#list) - Get Products
* [create](#create) - Create Product
* [get](#get) - Get Product By Id
* [update](#update) - Update Product
* [listCategories](#listcategories) - Get Product Categories

## list

Retrieve a paginated list of products based on filters and search query.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();

$request = new Operations\GetProductsV1ProductsGetRequest(
    xOrganizationId: 'org_12345',
);
$requestSecurity = new Operations\GetProductsV1ProductsGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->products->list(
    request: $request,
    security: $requestSecurity
);

if ($response->pageProductRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                  | Type                                                                                                       | Required                                                                                                   | Description                                                                                                |
| ---------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                 | [Operations\GetProductsV1ProductsGetRequest](../../Models/Operations/GetProductsV1ProductsGetRequest.md)   | :heavy_check_mark:                                                                                         | The request object to use for the request.                                                                 |
| `security`                                                                                                 | [Operations\GetProductsV1ProductsGetSecurity](../../Models/Operations/GetProductsV1ProductsGetSecurity.md) | :heavy_check_mark:                                                                                         | The security requirements to use for the request.                                                          |

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

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();

$productCreateManual = new Components\ProductCreateManual(
    externalId: 'prod_001',
    name: 'Sample Product',
    description: 'A description of the product',
    status: Components\ProductStatusEnum::Approved,
    productCategory: Components\ProductCategoryEnum::Physical,
    productSubcategory: Components\ProductSubCategoryEnum::GeneralClothing,
    taxExempt: false,
    source: Components\SourceEnum::Bigcommerce,
);
$requestSecurity = new Operations\CreateProductV1ProductsPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->products->create(
    security: $requestSecurity,
    xOrganizationId: 'org_12345',
    productCreateManual: $productCreateManual

);

if ($response->productRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      | Example                                                                                                          |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                       | [Operations\CreateProductV1ProductsPostSecurity](../../Models/Operations/CreateProductV1ProductsPostSecurity.md) | :heavy_check_mark:                                                                                               | The security requirements to use for the request.                                                                |                                                                                                                  |
| `xOrganizationId`                                                                                                | *string*                                                                                                         | :heavy_check_mark:                                                                                               | The unique identifier for the organization making the request                                                    | org_12345                                                                                                        |
| `productCreateManual`                                                                                            | [Components\ProductCreateManual](../../Models/Components/ProductCreateManual.md)                                 | :heavy_check_mark:                                                                                               | N/A                                                                                                              |                                                                                                                  |

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

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();


$requestSecurity = new Operations\GetProductByIdV1ProductsProductIdGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->products->get(
    security: $requestSecurity,
    productId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->productRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                          | Type                                                                                                                               | Required                                                                                                                           | Description                                                                                                                        | Example                                                                                                                            |
| ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                         | [Operations\GetProductByIdV1ProductsProductIdGetSecurity](../../Models/Operations/GetProductByIdV1ProductsProductIdGetSecurity.md) | :heavy_check_mark:                                                                                                                 | The security requirements to use for the request.                                                                                  |                                                                                                                                    |
| `productId`                                                                                                                        | *string*                                                                                                                           | :heavy_check_mark:                                                                                                                 | The unique identifier for the product you want to retrieve.                                                                        |                                                                                                                                    |
| `xOrganizationId`                                                                                                                  | *string*                                                                                                                           | :heavy_check_mark:                                                                                                                 | The unique identifier for the organization making the request                                                                      | org_12345                                                                                                                          |

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

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();


$requestSecurity = new Operations\UpdateProductV1ProductsProductIdPutSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->products->update(
    security: $requestSecurity,
    productId: '<id>',
    xOrganizationId: 'org_12345',
    requestBody: new Components\ProductUpdateV2(
        name: 'Updated Product Name',
        status: Components\ProductStatusEnum::Approved,
        productCategory: 'PHYSICAL',
        productSubcategory: 'GENERAL_CLOTHING',
        taxExempt: false,
        externalId: 'prod_001',
        description: 'An updated description for the product',
        classificationFailed: false,
    )

);

if ($response->productRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                        | Type                                                                                                                             | Required                                                                                                                         | Description                                                                                                                      | Example                                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                       | [Operations\UpdateProductV1ProductsProductIdPutSecurity](../../Models/Operations/UpdateProductV1ProductsProductIdPutSecurity.md) | :heavy_check_mark:                                                                                                               | The security requirements to use for the request.                                                                                |                                                                                                                                  |
| `productId`                                                                                                                      | *string*                                                                                                                         | :heavy_check_mark:                                                                                                               | Unique identifier of the product to be updated.                                                                                  |                                                                                                                                  |
| `xOrganizationId`                                                                                                                | *string*                                                                                                                         | :heavy_check_mark:                                                                                                               | The unique identifier for the organization making the request                                                                    | org_12345                                                                                                                        |
| `requestBody`                                                                                                                    | [Components\ProductUpdate\|Components\ProductUpdateV2](../../Models/Operations/Product.md)                                       | :heavy_check_mark:                                                                                                               | N/A                                                                                                                              |                                                                                                                                  |

### Response

**[?Operations\UpdateProductV1ProductsProductIdPutResponse](../../Models/Operations/UpdateProductV1ProductsProductIdPutResponse.md)**

### Errors

| Error Type                                                | Status Code                                               | Content Type                                              |
| --------------------------------------------------------- | --------------------------------------------------------- | --------------------------------------------------------- |
| Errors\ErrorResponse                                      | 401                                                       | application/json                                          |
| Errors\BackendSrcProductsResponsesValidationErrorResponse | 422                                                       | application/json                                          |
| Errors\ErrorResponse                                      | 500                                                       | application/json                                          |
| Errors\APIException                                       | 4XX, 5XX                                                  | \*/\*                                                     |

## listCategories

The Get Product Categories API retrieves all
    product categories.  This endpoint helps users understand and select the
    appropriate categories for their products.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();


$requestSecurity = new Operations\GetProductCategoriesV1ProductsCategoriesGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->products->listCategories(
    security: $requestSecurity,
    xOrganizationId: 'org_12345'

);

if ($response->responseGetProductCategoriesV1ProductsCategoriesGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                        | Type                                                                                                                                             | Required                                                                                                                                         | Description                                                                                                                                      | Example                                                                                                                                          |
| ------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------ |
| `security`                                                                                                                                       | [Operations\GetProductCategoriesV1ProductsCategoriesGetSecurity](../../Models/Operations/GetProductCategoriesV1ProductsCategoriesGetSecurity.md) | :heavy_check_mark:                                                                                                                               | The security requirements to use for the request.                                                                                                |                                                                                                                                                  |
| `xOrganizationId`                                                                                                                                | *string*                                                                                                                                         | :heavy_check_mark:                                                                                                                               | The unique identifier for the organization making the request                                                                                    | org_12345                                                                                                                                        |

### Response

**[?Operations\GetProductCategoriesV1ProductsCategoriesGetResponse](../../Models/Operations/GetProductCategoriesV1ProductsCategoriesGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |