# Customers

## Overview

### Available Operations

* [list](#list) - Get Customers
* [create](#create) - Create Customer
* [getById](#getbyid) - Get Customer By Id
* [update](#update) - Update Customer
* [getByExternalId](#getbyexternalid) - Get Customer By External Id
* [getTransactions](#gettransactions) - Get Transactions By Customer Id
* [createTransaction](#createtransaction) - Create Transaction By Customer Id

## list

The Get Customers API retrieves
    a paginated list of customers based on specified filters.
    This API allows searching, filtering by country and state, and sorting the results.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_customers_v1" method="get" path="/v1/customers" -->
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

$request = new Operations\GetCustomersV1Request(
    searchQuery: 'John',
    country: [

    ],
    state: 'CA',
    sourceIn: 'SHOPIFY,API',
    orderBy: 'created_at,street_1,street_2,city,state,postal_code,country,status',
);

$response = $sdk->customers->list(
    request: $request
);

if ($response->pageCustomerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                            | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `$request`                                                                           | [Operations\GetCustomersV1Request](../../Models/Operations/GetCustomersV1Request.md) | :heavy_check_mark:                                                                   | The request object to use for the request.                                           |

### Response

**[?Operations\GetCustomersV1Response](../../Models/Operations/GetCustomersV1Response.md)**

### Errors

| Error Type                                                 | Status Code                                                | Content Type                                               |
| ---------------------------------------------------------- | ---------------------------------------------------------- | ---------------------------------------------------------- |
| Errors\ErrorResponse                                       | 401, 404                                                   | application/json                                           |
| Errors\BackendSrcCustomersResponsesValidationErrorResponse | 422                                                        | application/json                                           |
| Errors\ErrorResponse                                       | 500                                                        | application/json                                           |
| Errors\APIException                                        | 4XX, 5XX                                                   | \*/\*                                                      |

## create

The Create Customer API enables the creation of a new customer record with essential
details like name, contact information, and address, along with optional metadata.

### Example Usage

<!-- UsageSnippet language="php" operationID="create_customer_v1_customers_post" method="post" path="/v1/customers" -->
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

$request = new Components\CustomerCreate(
    phone: '987-654-3210',
    street1: '456 Elm St',
    street2: 'Suite 202',
    city: 'Metropolis',
    county: 'Wayne',
    state: 'NY',
    postalCode: '10001',
    country: Components\CountryCodeEnum::Us,
    name: 'Jane Smith',
    externalId: 'cust_002',
    status: Components\StatusEnum::Archived,
    email: 'jane.smith@example.com',
    source: Components\SourceEnum::Shopify,
    addressStatus: Components\AddressStatus::PartiallyVerified,
);

$response = $sdk->customers->create(
    request: $request
);

if ($response->customerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                              | Type                                                                   | Required                                                               | Description                                                            |
| ---------------------------------------------------------------------- | ---------------------------------------------------------------------- | ---------------------------------------------------------------------- | ---------------------------------------------------------------------- |
| `$request`                                                             | [Components\CustomerCreate](../../Models/Components/CustomerCreate.md) | :heavy_check_mark:                                                     | The request object to use for the request.                             |

### Response

**[?Operations\CreateCustomerV1CustomersPostResponse](../../Models/Operations/CreateCustomerV1CustomersPostResponse.md)**

### Errors

| Error Type                                                 | Status Code                                                | Content Type                                               |
| ---------------------------------------------------------- | ---------------------------------------------------------- | ---------------------------------------------------------- |
| Errors\ErrorResponse                                       | 401, 404                                                   | application/json                                           |
| Errors\BackendSrcCustomersResponsesValidationErrorResponse | 422                                                        | application/json                                           |
| Errors\ErrorResponse                                       | 500                                                        | application/json                                           |
| Errors\APIException                                        | 4XX, 5XX                                                   | \*/\*                                                      |

## getById

The Get Customer By ID API retrieves the details of a single customer
    using their unique identifier. It returns customer-specific data,
    including contact information, address, name and metadata, etc.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_customer_by_id_v1_customers__customer_id__get" method="get" path="/v1/customers/{customer_id}" -->
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



$response = $sdk->customers->getById(
    customerId: 'cust_abc123'
);

if ($response->customerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                         | Type                              | Required                          | Description                       | Example                           |
| --------------------------------- | --------------------------------- | --------------------------------- | --------------------------------- | --------------------------------- |
| `customerId`                      | *string*                          | :heavy_check_mark:                | Unique identifier of the customer | cust_abc123                       |

### Response

**[?Operations\GetCustomerByIdV1CustomersCustomerIdGetResponse](../../Models/Operations/GetCustomerByIdV1CustomersCustomerIdGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## update

The Update Customer API allows you to modify an existing customer's
    information using their unique identifier,
    enabling updates to their details as needed.

### Example Usage

<!-- UsageSnippet language="php" operationID="update_customer_v1_customers__customer_id__put" method="put" path="/v1/customers/{customer_id}" -->
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

$customerUpdate = new Components\CustomerUpdate(
    phone: '987-654-3210',
    street1: '456 Elm St',
    street2: 'Suite 202',
    city: 'Metropolis',
    county: 'Wayne',
    state: 'NY',
    postalCode: '10001',
    country: Components\CountryCodeEnum::Us,
    fullAddress: '456 Elm St, Suite 202, Metropolis, NY 10001, US',
    name: 'Jane Smith',
    status: Components\StatusEnum::Active,
    email: 'john.doe@example.com',
    source: Components\SourceEnum::Shopify,
    addressStatus: Components\AddressStatus::Verified,
    externalId: 'cust_002',
);

$response = $sdk->customers->update(
    customerId: '<id>',
    customerUpdate: $customerUpdate

);

if ($response->customerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                              | Type                                                                   | Required                                                               | Description                                                            |
| ---------------------------------------------------------------------- | ---------------------------------------------------------------------- | ---------------------------------------------------------------------- | ---------------------------------------------------------------------- |
| `customerId`                                                           | *string*                                                               | :heavy_check_mark:                                                     | Unique identifier of the customer to be retrieved.                     |
| `customerUpdate`                                                       | [Components\CustomerUpdate](../../Models/Components/CustomerUpdate.md) | :heavy_check_mark:                                                     | N/A                                                                    |

### Response

**[?Operations\UpdateCustomerV1CustomersCustomerIdPutResponse](../../Models/Operations/UpdateCustomerV1CustomersCustomerIdPutResponse.md)**

### Errors

| Error Type                                                 | Status Code                                                | Content Type                                               |
| ---------------------------------------------------------- | ---------------------------------------------------------- | ---------------------------------------------------------- |
| Errors\ErrorResponse                                       | 401, 404                                                   | application/json                                           |
| Errors\BackendSrcCustomersResponsesValidationErrorResponse | 422                                                        | application/json                                           |
| Errors\ErrorResponse                                       | 500                                                        | application/json                                           |
| Errors\APIException                                        | 4XX, 5XX                                                   | \*/\*                                                      |

## getByExternalId

The Get Customer By External ID API retrieves the details of a single customer using
their external identifier. This endpoint is useful for accessing customer data when only
an external ID is available.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_customer_by_external_id_v1_customers_external__external_id__get" method="get" path="/v1/customers/external/{external_id}" -->
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



$response = $sdk->customers->getByExternalId(
    externalId: 'external_12345'
);

if ($response->customerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                            | Type                                                 | Required                                             | Description                                          | Example                                              |
| ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- | ---------------------------------------------------- |
| `externalId`                                         | *string*                                             | :heavy_check_mark:                                   | The external identifier of the customer to retrieve. | external_12345                                       |

### Response

**[?Operations\GetCustomerByExternalIdV1CustomersExternalExternalIdGetResponse](../../Models/Operations/GetCustomerByExternalIdV1CustomersExternalExternalIdGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## getTransactions

Get a list of transactions for a customer by their unique ID.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_transactions_by_customer_id_v1_customers__customer_id__transactions_get" method="get" path="/v1/customers/{customer_id}/transactions" -->
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



$response = $sdk->customers->getTransactions(
    customerId: '<id>'
);

if ($response->responseGetTransactionsByCustomerIdV1CustomersCustomerIdTransactionsGet !== null) {
    // handle response
}
```

### Parameters

| Parameter          | Type               | Required           | Description        |
| ------------------ | ------------------ | ------------------ | ------------------ |
| `customerId`       | *string*           | :heavy_check_mark: | N/A                |

### Response

**[?Operations\GetTransactionsByCustomerIdV1CustomersCustomerIdTransactionsGetResponse](../../Models/Operations/GetTransactionsByCustomerIdV1CustomersCustomerIdTransactionsGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## createTransaction

Create a new transaction for a specific customer.

### Example Usage

<!-- UsageSnippet language="php" operationID="create_transaction_by_customer_id_v1_customers__customer_id__transactions_post" method="post" path="/v1/customers/{customer_id}/transactions" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        new Components\Security(
            apiKeyHeader: '<YOUR_API_KEY_HERE>',
            customHeader: '<YOUR_API_KEY_HERE>',
        )
    )
    ->build();

$transactionCreate = new Components\TransactionCreate(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2023-02-16T04:36:50.697Z'),
    totalAmount: 0,
    totalTaxAmountImported: 0,
    taxRateImported: 0,
    totalTaxAmountCalculated: 0,
    taxRateCalculated: 0,
    totalTaxLiabilityAmount: 0,
    taxableAmount: 0,
    addresses: [],
    transactionItems: [
        new Components\TransactionItemCreateUpdate(
            organizationId: '<id>',
            date: Utils\Utils::parseDateTime('2024-05-13T04:49:24.946Z'),
            externalProductId: '<id>',
            quantity: 1,
            amount: 0,
            taxAmountImported: 0,
            taxRateImported: 0,
            taxAmountCalculated: 0,
            taxRateCalculated: 0,
            taxableAmount: 0,
        ),
    ],
);

$response = $sdk->customers->createTransaction(
    customerId: '<id>',
    transactionCreate: $transactionCreate

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                    | Type                                                                         | Required                                                                     | Description                                                                  |
| ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| `customerId`                                                                 | *string*                                                                     | :heavy_check_mark:                                                           | N/A                                                                          |
| `transactionCreate`                                                          | [Components\TransactionCreate](../../Models/Components/TransactionCreate.md) | :heavy_check_mark:                                                           | N/A                                                                          |

### Response

**[?Operations\CreateTransactionByCustomerIdV1CustomersCustomerIdTransactionsPostResponse](../../Models/Operations/CreateTransactionByCustomerIdV1CustomersCustomerIdTransactionsPostResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |