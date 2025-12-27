# Transactions

## Overview

### Available Operations

* [list](#list) - Get Transactions
* [create](#create) - Create Transaction
* [getByExternalId](#getbyexternalid) - Get Transaction By External Id
* [update](#update) - Update Transaction
* [get](#get) - Get Transaction By Id
* [getByFilingId](#getbyfilingid) - Get Transactions By Filing Id
* [createCreditNote](#createcreditnote) - Create Credit Note By Transaction Id
* [updateCreditNote](#updatecreditnote) - Update Credit Note By Transaction Id

## list

The Get Transactions API retrieves a list of transactions with
    optional filtering, sorting, and pagination.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_transactions_v1_transactions_get" method="get" path="/v1/transactions" -->
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

$request = new Operations\GetTransactionsV1TransactionsGetRequest();

$response = $sdk->transactions->list(
    request: $request
);

if ($response->pageTransactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                               | [Operations\GetTransactionsV1TransactionsGetRequest](../../Models/Operations/GetTransactionsV1TransactionsGetRequest.md) | :heavy_check_mark:                                                                                                       | The request object to use for the request.                                                                               |

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

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" -->
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

$request = new Components\TransactionPublicRequest(
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
    customer: new Components\CustomerBaseBase(
        name: 'John Doe',
        externalId: 'Cust456',
        organizationId: 'orgn_YourOrgIdHere',
    ),
    type: Components\TransactionTypeEnum::Sale,
);

$response = $sdk->transactions->create(
    request: $request
);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `$request`                                                                                 | [Components\TransactionPublicRequest](../../Models/Components/TransactionPublicRequest.md) | :heavy_check_mark:                                                                         | The request object to use for the request.                                                 |

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

<!-- UsageSnippet language="php" operationID="get_transaction_by_external_id_v1_transactions_external__external_id__get" method="get" path="/v1/transactions/external/{external_id}" -->
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



$response = $sdk->transactions->getByExternalId(
    externalId: '<id>'
);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                          | Type                                               | Required                                           | Description                                        |
| -------------------------------------------------- | -------------------------------------------------- | -------------------------------------------------- | -------------------------------------------------- |
| `externalId`                                       | *string*                                           | :heavy_check_mark:                                 | The unique external identifier of the transaction. |

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

<!-- UsageSnippet language="php" operationID="update_transaction_v1_transactions__transaction_id__put" method="put" path="/v1/transactions/{transaction_id}" -->
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

$response = $sdk->transactions->update(
    transactionId: '<id>',
    transactionUpdate: $transactionUpdate

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                    | Type                                                                         | Required                                                                     | Description                                                                  |
| ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| `transactionId`                                                              | *string*                                                                     | :heavy_check_mark:                                                           | N/A                                                                          |
| `transactionUpdate`                                                          | [Components\TransactionUpdate](../../Models/Components/TransactionUpdate.md) | :heavy_check_mark:                                                           | N/A                                                                          |

### Response

**[?Operations\UpdateTransactionV1TransactionsTransactionIdPutResponse](../../Models/Operations/UpdateTransactionV1TransactionsTransactionIdPutResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## get

The Get Transaction By Id API retrieves detailed information
    about a specific transaction by providing its unique transaction ID.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_transaction_by_id_v1_transactions__transaction_id__get" method="get" path="/v1/transactions/{transaction_id}" -->
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



$response = $sdk->transactions->get(
    transactionId: '<id>'
);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                             | Type                                                  | Required                                              | Description                                           |
| ----------------------------------------------------- | ----------------------------------------------------- | ----------------------------------------------------- | ----------------------------------------------------- |
| `transactionId`                                       | *string*                                              | :heavy_check_mark:                                    | The unique identifier of the transaction to retrieve. |

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

<!-- UsageSnippet language="php" operationID="get_transactions_by_filing_id_v1_transactions_filings__filing_id__get" method="get" path="/v1/transactions/filings/{filing_id}" -->
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



$response = $sdk->transactions->getByFilingId(
    filingId: '<id>'
);

if ($response->response200GetTransactionsByFilingIdV1TransactionsFilingsFilingIdGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                     | Type                                                                                          | Required                                                                                      | Description                                                                                   |
| --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| `filingId`                                                                                    | *string*                                                                                      | :heavy_check_mark:                                                                            | The unique identifier of the filing<br/>        whose transactions you wish to retrieve.<br/>         |

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

<!-- UsageSnippet language="php" operationID="POST_create_credit_note_by_transaction_id" method="post" path="/v1/transactions/{original_transaction_id}/credit_notes" -->
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

$response = $sdk->transactions->createCreditNote(
    originalTransactionId: '<id>',
    creditNoteCreate: $creditNoteCreate

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                  | Type                                                                       | Required                                                                   | Description                                                                |
| -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- |
| `originalTransactionId`                                                    | *string*                                                                   | :heavy_check_mark:                                                         | N/A                                                                        |
| `creditNoteCreate`                                                         | [Components\CreditNoteCreate](../../Models/Components/CreditNoteCreate.md) | :heavy_check_mark:                                                         | N/A                                                                        |

### Response

**[?Operations\POSTCreateCreditNoteByTransactionIdResponse](../../Models/Operations/POSTCreateCreditNoteByTransactionIdResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## updateCreditNote

Update an existing credit note for a specific transaction.

### Example Usage

<!-- UsageSnippet language="php" operationID="PUT_update_credit_note_by_transaction_id" method="put" path="/v1/transactions/{original_transaction_id}/credit_notes/{credit_note_id}" -->
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

$creditNoteCreate = new Components\CreditNoteCreate(
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2023-07-25T11:01:44.924Z'),
    status: Components\Status::Cancelled,
    totalAmount: 0,
    currency: Components\CurrencyEnum::Spl,
    transactionItems: [
        new Components\CreditNoteItemCreateUpdate(
            externalId: '<id>',
            date: Utils\Utils::parseDateTime('2024-09-15T23:01:02.880Z'),
            externalProductId: '<id>',
            quantity: 1,
            amount: 0,
        ),
    ],
);

$response = $sdk->transactions->updateCreditNote(
    originalTransactionId: '<id>',
    creditNoteId: '<id>',
    creditNoteCreate: $creditNoteCreate

);

if ($response->any !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                  | Type                                                                       | Required                                                                   | Description                                                                |
| -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- |
| `originalTransactionId`                                                    | *string*                                                                   | :heavy_check_mark:                                                         | N/A                                                                        |
| `creditNoteId`                                                             | *string*                                                                   | :heavy_check_mark:                                                         | N/A                                                                        |
| `creditNoteCreate`                                                         | [Components\CreditNoteCreate](../../Models/Components/CreditNoteCreate.md) | :heavy_check_mark:                                                         | N/A                                                                        |

### Response

**[?Operations\PUTUpdateCreditNoteByTransactionIdResponse](../../Models/Operations/PUTUpdateCreditNoteByTransactionIdResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |