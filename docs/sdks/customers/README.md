# Customers
(*customers*)

## Overview

### Available Operations

* [list](#list) - Get Customers
* [create](#create) - Create Customer
* [get](#get) - Get Customer By Id
* [update](#update) - Update Customer
* [getByExternalId](#getbyexternalid) - Get Customer By External Id
* [getTransactions](#gettransactions) - Get Transactions By Customer Id
* [createTransaction](#createtransaction) - Create Transaction By Customer Id

## list

The Get Customers API retrieves
    a paginated list of customers based on specified filters.
    This API allows searching, filtering by country and state, and sorting the results.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();

$request = new Operations\GetCustomersV1Request(
    searchQuery: 'John',
    country: [
        'U',
        'S',
    ],
    state: 'CA',
    sourceIn: 'SHOPIFY,API',
    orderBy: 'created_at,street_1,street_2,city,state,postal_code,country,status',
    xOrganizationId: 'org_12345',
);
$requestSecurity = new Operations\GetCustomersV1Security(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->customers->list(
    request: $request,
    security: $requestSecurity
);

if ($response->pageCustomerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                              | Type                                                                                   | Required                                                                               | Description                                                                            |
| -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| `$request`                                                                             | [Operations\GetCustomersV1Request](../../Models/Operations/GetCustomersV1Request.md)   | :heavy_check_mark:                                                                     | The request object to use for the request.                                             |
| `security`                                                                             | [Operations\GetCustomersV1Security](../../Models/Operations/GetCustomersV1Security.md) | :heavy_check_mark:                                                                     | The security requirements to use for the request.                                      |

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

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();

$customerCreate = new Components\CustomerCreate(
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
$requestSecurity = new Operations\CreateCustomerV1CustomersPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->customers->create(
    security: $requestSecurity,
    xOrganizationId: 'org_12345',
    customerCreate: $customerCreate

);

if ($response->customerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                            | Type                                                                                                                 | Required                                                                                                             | Description                                                                                                          | Example                                                                                                              |
| -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                           | [Operations\CreateCustomerV1CustomersPostSecurity](../../Models/Operations/CreateCustomerV1CustomersPostSecurity.md) | :heavy_check_mark:                                                                                                   | The security requirements to use for the request.                                                                    |                                                                                                                      |
| `xOrganizationId`                                                                                                    | *string*                                                                                                             | :heavy_check_mark:                                                                                                   | The unique identifier for the organization making the request                                                        | org_12345                                                                                                            |
| `customerCreate`                                                                                                     | [Components\CustomerCreate](../../Models/Components/CustomerCreate.md)                                               | :heavy_check_mark:                                                                                                   | N/A                                                                                                                  |                                                                                                                      |

### Response

**[?Operations\CreateCustomerV1CustomersPostResponse](../../Models/Operations/CreateCustomerV1CustomersPostResponse.md)**

### Errors

| Error Type                                                 | Status Code                                                | Content Type                                               |
| ---------------------------------------------------------- | ---------------------------------------------------------- | ---------------------------------------------------------- |
| Errors\ErrorResponse                                       | 401, 404                                                   | application/json                                           |
| Errors\BackendSrcCustomersResponsesValidationErrorResponse | 422                                                        | application/json                                           |
| Errors\ErrorResponse                                       | 500                                                        | application/json                                           |
| Errors\APIException                                        | 4XX, 5XX                                                   | \*/\*                                                      |

## get

The Get Customer By ID API retrieves the details of a single customer
    using their unique identifier. It returns customer-specific data,
    including contact information, address, name and metadata, etc.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();


$requestSecurity = new Operations\GetCustomerByIdV1CustomersCustomerIdGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->customers->get(
    security: $requestSecurity,
    customerId: 'cust_abc123',
    xOrganizationId: 'org_12345'

);

if ($response->customerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                | Type                                                                                                                                     | Required                                                                                                                                 | Description                                                                                                                              | Example                                                                                                                                  |
| ---------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                               | [Operations\GetCustomerByIdV1CustomersCustomerIdGetSecurity](../../Models/Operations/GetCustomerByIdV1CustomersCustomerIdGetSecurity.md) | :heavy_check_mark:                                                                                                                       | The security requirements to use for the request.                                                                                        |                                                                                                                                          |
| `customerId`                                                                                                                             | *string*                                                                                                                                 | :heavy_check_mark:                                                                                                                       | Unique identifier of the customer                                                                                                        | cust_abc123                                                                                                                              |
| `xOrganizationId`                                                                                                                        | *string*                                                                                                                                 | :heavy_check_mark:                                                                                                                       | The unique identifier for the organization making the request                                                                            | org_12345                                                                                                                                |

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

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();

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
$requestSecurity = new Operations\UpdateCustomerV1CustomersCustomerIdPutSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->customers->update(
    security: $requestSecurity,
    customerId: '<id>',
    xOrganizationId: 'org_12345',
    customerUpdate: $customerUpdate

);

if ($response->customerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                              | Type                                                                                                                                   | Required                                                                                                                               | Description                                                                                                                            | Example                                                                                                                                |
| -------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                             | [Operations\UpdateCustomerV1CustomersCustomerIdPutSecurity](../../Models/Operations/UpdateCustomerV1CustomersCustomerIdPutSecurity.md) | :heavy_check_mark:                                                                                                                     | The security requirements to use for the request.                                                                                      |                                                                                                                                        |
| `customerId`                                                                                                                           | *string*                                                                                                                               | :heavy_check_mark:                                                                                                                     | Unique identifier of the customer to be retrieved.                                                                                     |                                                                                                                                        |
| `xOrganizationId`                                                                                                                      | *string*                                                                                                                               | :heavy_check_mark:                                                                                                                     | The unique identifier for the organization making the request                                                                          | org_12345                                                                                                                              |
| `customerUpdate`                                                                                                                       | [Components\CustomerUpdate](../../Models/Components/CustomerUpdate.md)                                                                 | :heavy_check_mark:                                                                                                                     | N/A                                                                                                                                    |                                                                                                                                        |

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

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();


$requestSecurity = new Operations\GetCustomerByExternalIdV1CustomersExternalExternalIdGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->customers->getByExternalId(
    security: $requestSecurity,
    externalId: 'external_12345',
    xOrganizationId: 'org_12345'

);

if ($response->customerRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                | Type                                                                                                                                                                     | Required                                                                                                                                                                 | Description                                                                                                                                                              | Example                                                                                                                                                                  |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `security`                                                                                                                                                               | [Operations\GetCustomerByExternalIdV1CustomersExternalExternalIdGetSecurity](../../Models/Operations/GetCustomerByExternalIdV1CustomersExternalExternalIdGetSecurity.md) | :heavy_check_mark:                                                                                                                                                       | The security requirements to use for the request.                                                                                                                        |                                                                                                                                                                          |
| `externalId`                                                                                                                                                             | *string*                                                                                                                                                                 | :heavy_check_mark:                                                                                                                                                       | The external identifier of the customer to retrieve.                                                                                                                     | external_12345                                                                                                                                                           |
| `xOrganizationId`                                                                                                                                                        | *string*                                                                                                                                                                 | :heavy_check_mark:                                                                                                                                                       | The unique identifier for the organization making the request                                                                                                            | org_12345                                                                                                                                                                |

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

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();


$requestSecurity = new Operations\GetTransactionsByCustomerIdV1CustomersCustomerIdTransactionsGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->customers->getTransactions(
    security: $requestSecurity,
    customerId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->responseGetTransactionsByCustomerIdV1CustomersCustomerIdTransactionsGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                | Type                                                                                                                                                                                     | Required                                                                                                                                                                                 | Description                                                                                                                                                                              | Example                                                                                                                                                                                  |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                                                               | [Operations\GetTransactionsByCustomerIdV1CustomersCustomerIdTransactionsGetSecurity](../../Models/Operations/GetTransactionsByCustomerIdV1CustomersCustomerIdTransactionsGetSecurity.md) | :heavy_check_mark:                                                                                                                                                                       | The security requirements to use for the request.                                                                                                                                        |                                                                                                                                                                                          |
| `customerId`                                                                                                                                                                             | *string*                                                                                                                                                                                 | :heavy_check_mark:                                                                                                                                                                       | N/A                                                                                                                                                                                      |                                                                                                                                                                                          |
| `xOrganizationId`                                                                                                                                                                        | *string*                                                                                                                                                                                 | :heavy_check_mark:                                                                                                                                                                       | The unique identifier for the organization making the request                                                                                                                            | org_12345                                                                                                                                                                                |

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

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Operations;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()->build();

$transactionCreate = new Components\TransactionCreate(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2023-02-16T04:36:50.697Z'),
    addresses: [],
    transactionItems: [
        new Components\TransactionItemCreateUpdate(
            organizationId: '<id>',
            date: Utils\Utils::parseDateTime('2024-05-13T04:49:24.946Z'),
            externalProductId: '<id>',
        ),
    ],
);
$requestSecurity = new Operations\CreateTransactionByCustomerIdV1CustomersCustomerIdTransactionsPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->customers->createTransaction(
    security: $requestSecurity,
    customerId: '<id>',
    xOrganizationId: 'org_12345',
    transactionCreate: $transactionCreate

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                      | Type                                                                                                                                                                                           | Required                                                                                                                                                                                       | Description                                                                                                                                                                                    | Example                                                                                                                                                                                        |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                                                                     | [Operations\CreateTransactionByCustomerIdV1CustomersCustomerIdTransactionsPostSecurity](../../Models/Operations/CreateTransactionByCustomerIdV1CustomersCustomerIdTransactionsPostSecurity.md) | :heavy_check_mark:                                                                                                                                                                             | The security requirements to use for the request.                                                                                                                                              |                                                                                                                                                                                                |
| `customerId`                                                                                                                                                                                   | *string*                                                                                                                                                                                       | :heavy_check_mark:                                                                                                                                                                             | N/A                                                                                                                                                                                            |                                                                                                                                                                                                |
| `xOrganizationId`                                                                                                                                                                              | *string*                                                                                                                                                                                       | :heavy_check_mark:                                                                                                                                                                             | The unique identifier for the organization making the request                                                                                                                                  | org_12345                                                                                                                                                                                      |
| `transactionCreate`                                                                                                                                                                            | [Components\TransactionCreate](../../Models/Components/TransactionCreate.md)                                                                                                                   | :heavy_check_mark:                                                                                                                                                                             | N/A                                                                                                                                                                                            |                                                                                                                                                                                                |

### Response

**[?Operations\CreateTransactionByCustomerIdV1CustomersCustomerIdTransactionsPostResponse](../../Models/Operations/CreateTransactionByCustomerIdV1CustomersCustomerIdTransactionsPostResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |