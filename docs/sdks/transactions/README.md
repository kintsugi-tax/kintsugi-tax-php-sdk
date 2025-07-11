# Transactions
(*transactions*)

## Overview

### Available Operations

* [list](#list) - Get Transactions
* [create](#create) - Create Transaction
* [getByExternalId](#getbyexternalid) - Get Transaction By External Id
* [update](#update) - Update Transaction
* [getById](#getbyid) - Get Transaction By Id
* [getByFilingId](#getbyfilingid) - Get Transactions By Filing Id
* [createCreditNote](#createcreditnote) - Create Credit Note By Transaction Id
* [updateCreditNote](#updatecreditnote) - Update Credit Note By Transaction Id

## list

The Get Transactions API retrieves a list of transactions with
    optional filtering, sorting, and pagination.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();

$request = new Operations\GetTransactionsV1TransactionsGetRequest(
    xOrganizationId: 'org_12345',
);
$requestSecurity = new Operations\GetTransactionsV1TransactionsGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->transactions->list(
    request: $request,
    security: $requestSecurity
);

if ($response->pageTransactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                  | Type                                                                                                                       | Required                                                                                                                   | Description                                                                                                                |
| -------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                 | [Operations\GetTransactionsV1TransactionsGetRequest](../../Models/Operations/GetTransactionsV1TransactionsGetRequest.md)   | :heavy_check_mark:                                                                                                         | The request object to use for the request.                                                                                 |
| `security`                                                                                                                 | [Operations\GetTransactionsV1TransactionsGetSecurity](../../Models/Operations/GetTransactionsV1TransactionsGetSecurity.md) | :heavy_check_mark:                                                                                                         | The security requirements to use for the request.                                                                          |

### Response

**[?Operations\GetTransactionsV1TransactionsGetResponse](../../Models/Operations/GetTransactionsV1TransactionsGetResponse.md)**

### Errors

| Error Type                                                    | Status Code                                                   | Content Type                                                  |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| Errors\ErrorResponse                                          | 401, 404                                                      | application/json                                              |
| Errors\BackendSrcTransactionsResponsesValidationErrorResponse | 422                                                           | application/json                                              |
| Errors\ErrorResponse                                          | 500                                                           | application/json                                              |
| Errors\APIException                                           | 4XX, 5XX                                                      | \*/\*                                                         |

## create

Create a transaction.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;
use OpenAPI\OpenAPI\Utils;

$sdk = OpenAPI\SDK::builder()->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: 'orgn_YourOrgIdHere',
    externalId: 'YourUniqueOrder123',
    date: Utils\Utils::parseDateTime('2024-01-15T14:30:00Z'),
    currency: Components\CurrencyEnum::Usd,
    source: Components\SourceEnum::Api,
    addresses: [
        new Components\TransactionAddressPublic(
            street1: '123 Main St',
            city: 'San Francisco',
            state: 'CA',
            postalCode: '94107',
            country: Components\CountryCodeEnum::Us,
            type: Components\AddressType::ShipTo,
        ),
    ],
    transactionItems: [
        new Components\TransactionItemBuilder(
            organizationId: 'orgn_YourOrgIdHere',
            date: Utils\Utils::parseDateTime('2024-01-15T14:30:00Z'),
            externalProductId: 'SKU-ABC',
            product: 'Example Widget',
            quantity: 2,
            amount: 50,
        ),
    ],
    customer: new Components\TransactionImportCustomer(
        externalId: 'Cust456',
        name: 'John Doe',
        organizationId: 'orgn_YourOrgIdHere',
    ),
    type: Components\TransactionTypeEnum::Sale,
);
$requestSecurity = new Operations\CreateTransactionV1TransactionsPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->transactions->create(
    security: $requestSecurity,
    xOrganizationId: 'org_12345',
    transactionPublicRequest: $transactionPublicRequest

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                        | Type                                                                                                                             | Required                                                                                                                         | Description                                                                                                                      | Example                                                                                                                          |
| -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                       | [Operations\CreateTransactionV1TransactionsPostSecurity](../../Models/Operations/CreateTransactionV1TransactionsPostSecurity.md) | :heavy_check_mark:                                                                                                               | The security requirements to use for the request.                                                                                |                                                                                                                                  |
| `xOrganizationId`                                                                                                                | *string*                                                                                                                         | :heavy_check_mark:                                                                                                               | The unique identifier for the organization making the request                                                                    | org_12345                                                                                                                        |
| `transactionPublicRequest`                                                                                                       | [Components\TransactionPublicRequest](../../Models/Components/TransactionPublicRequest.md)                                       | :heavy_check_mark:                                                                                                               | N/A                                                                                                                              |                                                                                                                                  |

### Response

**[?Operations\CreateTransactionV1TransactionsPostResponse](../../Models/Operations/CreateTransactionV1TransactionsPostResponse.md)**

### Errors

| Error Type                                                    | Status Code                                                   | Content Type                                                  |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| Errors\ErrorResponse                                          | 400, 401                                                      | application/json                                              |
| Errors\BackendSrcTransactionsResponsesValidationErrorResponse | 422                                                           | application/json                                              |
| Errors\ErrorResponse                                          | 500                                                           | application/json                                              |
| Errors\APIException                                           | 4XX, 5XX                                                      | \*/\*                                                         |

## getByExternalId

Retrieves a specific transaction based on its external ID.
    This allows users to fetch transaction details using an identifier from an external system.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();


$requestSecurity = new Operations\GetTransactionByExternalIdV1TransactionsExternalExternalIdGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->transactions->getByExternalId(
    security: $requestSecurity,
    externalId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                            | Type                                                                                                                                                                                 | Required                                                                                                                                                                             | Description                                                                                                                                                                          | Example                                                                                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `security`                                                                                                                                                                           | [Operations\GetTransactionByExternalIdV1TransactionsExternalExternalIdGetSecurity](../../Models/Operations/GetTransactionByExternalIdV1TransactionsExternalExternalIdGetSecurity.md) | :heavy_check_mark:                                                                                                                                                                   | The security requirements to use for the request.                                                                                                                                    |                                                                                                                                                                                      |
| `externalId`                                                                                                                                                                         | *string*                                                                                                                                                                             | :heavy_check_mark:                                                                                                                                                                   | The unique external identifier of the transaction.                                                                                                                                   |                                                                                                                                                                                      |
| `xOrganizationId`                                                                                                                                                                    | *string*                                                                                                                                                                             | :heavy_check_mark:                                                                                                                                                                   | The unique identifier for the organization making the request                                                                                                                        | org_12345                                                                                                                                                                            |

### Response

**[?Operations\GetTransactionByExternalIdV1TransactionsExternalExternalIdGetResponse](../../Models/Operations/GetTransactionByExternalIdV1TransactionsExternalExternalIdGetResponse.md)**

### Errors

| Error Type                                                    | Status Code                                                   | Content Type                                                  |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| Errors\ErrorResponse                                          | 401, 404                                                      | application/json                                              |
| Errors\BackendSrcTransactionsResponsesValidationErrorResponse | 422                                                           | application/json                                              |
| Errors\ErrorResponse                                          | 500                                                           | application/json                                              |
| Errors\APIException                                           | 4XX, 5XX                                                      | \*/\*                                                         |

## update

Update a specific transaction by its ID.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;
use OpenAPI\OpenAPI\Utils;

$sdk = OpenAPI\SDK::builder()->build();

$transactionUpdate = new Components\TransactionUpdate(
    organizationId: 'orgn_argaLQwMy2fJc',
    externalId: 'EXT12345',
    date: Utils\Utils::parseDateTime('2025-04-02T17:36:59.814Z'),
    addresses: [
        new Components\TransactionAddressBuilder(
            type: Components\AddressType::BillTo,
        ),
    ],
    transactionItems: [
        new Components\TransactionItemCreateUpdate(
            organizationId: 'orgn_argaLQwMy2fJc',
            date: Utils\Utils::parseDateTime('2025-04-02T17:36:59.814Z'),
            externalProductId: '1186DUMMYITEM',
        ),
    ],
    customer: new Components\CustomerUpdate(),
);
$requestSecurity = new Operations\UpdateTransactionV1TransactionsTransactionIdPutSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->transactions->update(
    security: $requestSecurity,
    transactionId: '<id>',
    xOrganizationId: 'org_12345',
    transactionUpdate: $transactionUpdate

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                | Type                                                                                                                                                     | Required                                                                                                                                                 | Description                                                                                                                                              | Example                                                                                                                                                  |
| -------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                               | [Operations\UpdateTransactionV1TransactionsTransactionIdPutSecurity](../../Models/Operations/UpdateTransactionV1TransactionsTransactionIdPutSecurity.md) | :heavy_check_mark:                                                                                                                                       | The security requirements to use for the request.                                                                                                        |                                                                                                                                                          |
| `transactionId`                                                                                                                                          | *string*                                                                                                                                                 | :heavy_check_mark:                                                                                                                                       | N/A                                                                                                                                                      |                                                                                                                                                          |
| `xOrganizationId`                                                                                                                                        | *string*                                                                                                                                                 | :heavy_check_mark:                                                                                                                                       | The unique identifier for the organization making the request                                                                                            | org_12345                                                                                                                                                |
| `transactionUpdate`                                                                                                                                      | [Components\TransactionUpdate](../../Models/Components/TransactionUpdate.md)                                                                             | :heavy_check_mark:                                                                                                                                       | N/A                                                                                                                                                      |                                                                                                                                                          |

### Response

**[?Operations\UpdateTransactionV1TransactionsTransactionIdPutResponse](../../Models/Operations/UpdateTransactionV1TransactionsTransactionIdPutResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## getById

The Get Transaction By Id API retrieves detailed information
    about a specific transaction by providing its unique transaction ID.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();


$requestSecurity = new Operations\GetTransactionByIdV1TransactionsTransactionIdGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->transactions->getById(
    security: $requestSecurity,
    transactionId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                  | Type                                                                                                                                                       | Required                                                                                                                                                   | Description                                                                                                                                                | Example                                                                                                                                                    |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                                 | [Operations\GetTransactionByIdV1TransactionsTransactionIdGetSecurity](../../Models/Operations/GetTransactionByIdV1TransactionsTransactionIdGetSecurity.md) | :heavy_check_mark:                                                                                                                                         | The security requirements to use for the request.                                                                                                          |                                                                                                                                                            |
| `transactionId`                                                                                                                                            | *string*                                                                                                                                                   | :heavy_check_mark:                                                                                                                                         | The unique identifier of the transaction to retrieve.                                                                                                      |                                                                                                                                                            |
| `xOrganizationId`                                                                                                                                          | *string*                                                                                                                                                   | :heavy_check_mark:                                                                                                                                         | The unique identifier for the organization making the request                                                                                              | org_12345                                                                                                                                                  |

### Response

**[?Operations\GetTransactionByIdV1TransactionsTransactionIdGetResponse](../../Models/Operations/GetTransactionByIdV1TransactionsTransactionIdGetResponse.md)**

### Errors

| Error Type                                                    | Status Code                                                   | Content Type                                                  |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| Errors\ErrorResponse                                          | 401, 404                                                      | application/json                                              |
| Errors\BackendSrcTransactionsResponsesValidationErrorResponse | 422                                                           | application/json                                              |
| Errors\ErrorResponse                                          | 500                                                           | application/json                                              |
| Errors\APIException                                           | 4XX, 5XX                                                      | \*/\*                                                         |

## getByFilingId

Retrieve transactions by filing ID.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();


$requestSecurity = new Operations\GetTransactionsByFilingIdV1TransactionsFilingsFilingIdGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->transactions->getByFilingId(
    security: $requestSecurity,
    filingId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->response200GetTransactionsByFilingIdV1TransactionsFilingsFilingIdGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                    | Type                                                                                                                                                                         | Required                                                                                                                                                                     | Description                                                                                                                                                                  | Example                                                                                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                                                   | [Operations\GetTransactionsByFilingIdV1TransactionsFilingsFilingIdGetSecurity](../../Models/Operations/GetTransactionsByFilingIdV1TransactionsFilingsFilingIdGetSecurity.md) | :heavy_check_mark:                                                                                                                                                           | The security requirements to use for the request.                                                                                                                            |                                                                                                                                                                              |
| `filingId`                                                                                                                                                                   | *string*                                                                                                                                                                     | :heavy_check_mark:                                                                                                                                                           | The unique identifier of the filing<br/>        whose transactions you wish to retrieve.<br/>                                                                                |                                                                                                                                                                              |
| `xOrganizationId`                                                                                                                                                            | *string*                                                                                                                                                                     | :heavy_check_mark:                                                                                                                                                           | The unique identifier for the organization making the request                                                                                                                | org_12345                                                                                                                                                                    |

### Response

**[?Operations\GetTransactionsByFilingIdV1TransactionsFilingsFilingIdGetResponse](../../Models/Operations/GetTransactionsByFilingIdV1TransactionsFilingsFilingIdGetResponse.md)**

### Errors

| Error Type                                                    | Status Code                                                   | Content Type                                                  |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| Errors\ErrorResponse                                          | 401                                                           | application/json                                              |
| Errors\BackendSrcTransactionsResponsesValidationErrorResponse | 422                                                           | application/json                                              |
| Errors\ErrorResponse                                          | 500                                                           | application/json                                              |
| Errors\APIException                                           | 4XX, 5XX                                                      | \*/\*                                                         |

## createCreditNote

Create a new credit note for a specific transaction.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;
use OpenAPI\OpenAPI\Utils;

$sdk = OpenAPI\SDK::builder()->build();

$creditNoteCreate = new Components\CreditNoteCreate(
    externalId: 'CN-12345',
    date: Utils\Utils::parseDateTime('2024-10-27T14:30:00Z'),
    status: Components\Status::Pending,
    description: 'Refund for damaged product',
    totalAmount: 50,
    currency: Components\CurrencyEnum::Usd,
    transactionItems: [
        new Components\CreditNoteItemCreateUpdate(
            externalId: 'ITEM-1',
            date: Utils\Utils::parseDateTime('2024-10-27T14:30:00Z'),
            externalProductId: 'PROD-ABC',
            quantity: 1,
            amount: 50,
        ),
    ],
);
$requestSecurity = new Operations\CreateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->transactions->createCreditNote(
    security: $requestSecurity,
    originalTransactionId: '<id>',
    xOrganizationId: 'org_12345',
    creditNoteCreate: $creditNoteCreate

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                    | Type                                                                                                                                                                                                                         | Required                                                                                                                                                                                                                     | Description                                                                                                                                                                                                                  | Example                                                                                                                                                                                                                      |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                                                                                                   | [Operations\CreateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesPostSecurity](../../Models/Operations/CreateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesPostSecurity.md) | :heavy_check_mark:                                                                                                                                                                                                           | The security requirements to use for the request.                                                                                                                                                                            |                                                                                                                                                                                                                              |
| `originalTransactionId`                                                                                                                                                                                                      | *string*                                                                                                                                                                                                                     | :heavy_check_mark:                                                                                                                                                                                                           | N/A                                                                                                                                                                                                                          |                                                                                                                                                                                                                              |
| `xOrganizationId`                                                                                                                                                                                                            | *string*                                                                                                                                                                                                                     | :heavy_check_mark:                                                                                                                                                                                                           | The unique identifier for the organization making the request                                                                                                                                                                | org_12345                                                                                                                                                                                                                    |
| `creditNoteCreate`                                                                                                                                                                                                           | [Components\CreditNoteCreate](../../Models/Components/CreditNoteCreate.md)                                                                                                                                                   | :heavy_check_mark:                                                                                                                                                                                                           | N/A                                                                                                                                                                                                                          |                                                                                                                                                                                                                              |

### Response

**[?Operations\CreateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesPostResponse](../../Models/Operations/CreateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesPostResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## updateCreditNote

Update an existing credit note for a specific transaction.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;
use OpenAPI\OpenAPI\Utils;

$sdk = OpenAPI\SDK::builder()->build();

$creditNoteCreate = new Components\CreditNoteCreate(
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2023-04-03T14:25:55.241Z'),
    status: Components\Status::Pending,
    currency: Components\CurrencyEnum::Jod,
    transactionItems: [
        new Components\CreditNoteItemCreateUpdate(
            externalId: '<id>',
            date: Utils\Utils::parseDateTime('2024-04-29T01:52:56.740Z'),
            externalProductId: '<id>',
        ),
    ],
);
$requestSecurity = new Operations\UpdateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesCreditNoteIdPutSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->transactions->updateCreditNote(
    security: $requestSecurity,
    originalTransactionId: '<id>',
    creditNoteId: '<id>',
    xOrganizationId: 'org_12345',
    creditNoteCreate: $creditNoteCreate

);

if ($response->any !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                          | Type                                                                                                                                                                                                                                               | Required                                                                                                                                                                                                                                           | Description                                                                                                                                                                                                                                        | Example                                                                                                                                                                                                                                            |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                                                                                                                         | [Operations\UpdateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesCreditNoteIdPutSecurity](../../Models/Operations/UpdateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesCreditNoteIdPutSecurity.md) | :heavy_check_mark:                                                                                                                                                                                                                                 | The security requirements to use for the request.                                                                                                                                                                                                  |                                                                                                                                                                                                                                                    |
| `originalTransactionId`                                                                                                                                                                                                                            | *string*                                                                                                                                                                                                                                           | :heavy_check_mark:                                                                                                                                                                                                                                 | N/A                                                                                                                                                                                                                                                |                                                                                                                                                                                                                                                    |
| `creditNoteId`                                                                                                                                                                                                                                     | *string*                                                                                                                                                                                                                                           | :heavy_check_mark:                                                                                                                                                                                                                                 | N/A                                                                                                                                                                                                                                                |                                                                                                                                                                                                                                                    |
| `xOrganizationId`                                                                                                                                                                                                                                  | *string*                                                                                                                                                                                                                                           | :heavy_check_mark:                                                                                                                                                                                                                                 | The unique identifier for the organization making the request                                                                                                                                                                                      | org_12345                                                                                                                                                                                                                                          |
| `creditNoteCreate`                                                                                                                                                                                                                                 | [Components\CreditNoteCreate](../../Models/Components/CreditNoteCreate.md)                                                                                                                                                                         | :heavy_check_mark:                                                                                                                                                                                                                                 | N/A                                                                                                                                                                                                                                                |                                                                                                                                                                                                                                                    |

### Response

**[?Operations\UpdateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesCreditNoteIdPutResponse](../../Models/Operations/UpdateCreditNoteByTransactionIdV1TransactionsOriginalTransactionIdCreditNotesCreditNoteIdPutResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |