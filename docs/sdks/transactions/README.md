# Transactions

## Overview

### Available Operations

* [list](#list) - Get transactions
* [create](#create) - Create transaction
* [archiveTransactionByIdV1TransactionsArchivePost](#archivetransactionbyidv1transactionsarchivepost) - Archive transaction by id
* [getByExternalId](#getbyexternalid) - Get transaction by external id
* [getByFilingId](#getbyfilingid) - Get transactions by filing id
* [createCreditNote](#createcreditnote) - Create credit note by transaction id
* [updateCreditNote](#updatecreditnote) - Update credit note by transaction id
* [get](#get) - Get transaction by id
* [update](#update) - Update transaction
* [setTransactionTaxOnlyV1TransactionsTransactionIdTaxOnlyPost](#settransactiontaxonlyv1transactionstransactionidtaxonlypost) - Set transaction tax only

## list

The Get Transactions API retrieves a list of transactions with
    optional filtering, sorting, and pagination.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_transactions_v1_transactions_get" method="get" path="/v1/transactions" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$request = new Operations\GetTransactionsV1TransactionsGetRequest(
    addressStatusIn: 'UNVERIFIED,INVALID,PARTIALLY_VERIFIED,VERIFIED,UNVERIFIABLE',
    orderBy: 'date,state,customer_name,status',
    connectionIdIn: 'conn_abc123,conn_def456',
    xOrganizationId: 'org_12345',
);

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

Create a transaction. Set `marketplace: true` for reseller or marketplace orders where tax was remitted externally; gross sales still count toward nexus, but tax liability is excluded.

### Example Usage: connection_mismatch

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" example="connection_mismatch" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2025-11-05T23:48:53.053Z'),
    addresses: [],
    transactionItems: [],
    customer: new Components\CustomerBaseBase(
        organizationId: '<id>',
    ),
    type: Components\TransactionTypeEnum::Archive,
);

$response = $sdk->transactions->create(
    transactionPublicRequest: $transactionPublicRequest,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```
### Example Usage: duplicate_external_id

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" example="duplicate_external_id" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2025-11-05T23:48:53.053Z'),
    addresses: [],
    transactionItems: [],
    customer: new Components\CustomerBaseBase(
        organizationId: '<id>',
    ),
    type: Components\TransactionTypeEnum::Archive,
);

$response = $sdk->transactions->create(
    transactionPublicRequest: $transactionPublicRequest,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```
### Example Usage: invalid_address

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" example="invalid_address" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2025-11-05T23:48:53.053Z'),
    addresses: [],
    transactionItems: [],
    customer: new Components\CustomerBaseBase(
        organizationId: '<id>',
    ),
    type: Components\TransactionTypeEnum::Archive,
);

$response = $sdk->transactions->create(
    transactionPublicRequest: $transactionPublicRequest,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```
### Example Usage: invalid_date_format

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" example="invalid_date_format" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2025-11-05T23:48:53.053Z'),
    addresses: [],
    transactionItems: [],
    customer: new Components\CustomerBaseBase(
        organizationId: '<id>',
    ),
    type: Components\TransactionTypeEnum::Archive,
);

$response = $sdk->transactions->create(
    transactionPublicRequest: $transactionPublicRequest,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```
### Example Usage: invalid_enum_value

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" example="invalid_enum_value" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2025-11-05T23:48:53.053Z'),
    addresses: [],
    transactionItems: [],
    customer: new Components\CustomerBaseBase(
        organizationId: '<id>',
    ),
    type: Components\TransactionTypeEnum::Archive,
);

$response = $sdk->transactions->create(
    transactionPublicRequest: $transactionPublicRequest,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```
### Example Usage: missing_org_id

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" example="missing_org_id" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2025-11-05T23:48:53.053Z'),
    addresses: [],
    transactionItems: [],
    customer: new Components\CustomerBaseBase(
        organizationId: '<id>',
    ),
    type: Components\TransactionTypeEnum::Archive,
);

$response = $sdk->transactions->create(
    transactionPublicRequest: $transactionPublicRequest,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```
### Example Usage: missing_product_external_id

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" example="missing_product_external_id" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2025-11-05T23:48:53.053Z'),
    addresses: [],
    transactionItems: [],
    customer: new Components\CustomerBaseBase(
        organizationId: '<id>',
    ),
    type: Components\TransactionTypeEnum::Archive,
);

$response = $sdk->transactions->create(
    transactionPublicRequest: $transactionPublicRequest,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```
### Example Usage: missing_required_field

<!-- UsageSnippet language="php" operationID="create_transaction_v1_transactions_post" method="post" path="/v1/transactions" example="missing_required_field" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$transactionPublicRequest = new Components\TransactionPublicRequest(
    organizationId: '<id>',
    externalId: '<id>',
    date: Utils\Utils::parseDateTime('2025-11-05T23:48:53.053Z'),
    addresses: [],
    transactionItems: [],
    customer: new Components\CustomerBaseBase(
        organizationId: '<id>',
    ),
    type: Components\TransactionTypeEnum::Archive,
);

$response = $sdk->transactions->create(
    transactionPublicRequest: $transactionPublicRequest,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                  | Type                                                                                       | Required                                                                                   | Description                                                                                | Example                                                                                    |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `transactionPublicRequest`                                                                 | [Components\TransactionPublicRequest](../../Models/Components/TransactionPublicRequest.md) | :heavy_check_mark:                                                                         | N/A                                                                                        |                                                                                            |
| `xOrganizationId`                                                                          | *string*                                                                                   | :heavy_check_mark:                                                                         | The unique identifier for the organization making the request                              | org_12345                                                                                  |

### Response

**[?Operations\CreateTransactionV1TransactionsPostResponse](../../Models/Operations/CreateTransactionV1TransactionsPostResponse.md)**

### Errors

| Error Type                                                    | Status Code                                                   | Content Type                                                  |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| Errors\ErrorResponse                                          | 400, 401                                                      | application/json                                              |
| Errors\BackendSrcTransactionsResponsesValidationErrorResponse | 422                                                           | application/json                                              |
| Errors\ErrorResponse                                          | 500                                                           | application/json                                              |
| Errors\APIException                                           | 4XX, 5XX                                                      | \*/\*                                                         |

## archiveTransactionByIdV1TransactionsArchivePost

Archive transactions by transaction id

### Example Usage

<!-- UsageSnippet language="php" operationID="archive_transaction_by_id_v1_transactions_archive_post" method="post" path="/v1/transactions/archive" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->transactions->archiveTransactionByIdV1TransactionsArchivePost(
    transactionId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->any !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                     | Type                                                          | Required                                                      | Description                                                   | Example                                                       |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| `transactionId`                                               | *string*                                                      | :heavy_check_mark:                                            | N/A                                                           |                                                               |
| `xOrganizationId`                                             | *string*                                                      | :heavy_check_mark:                                            | The unique identifier for the organization making the request | org_12345                                                     |

### Response

**[?Operations\ArchiveTransactionByIdV1TransactionsArchivePostResponse](../../Models/Operations/ArchiveTransactionByIdV1TransactionsArchivePostResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## getByExternalId

Retrieves a specific transaction based on its external ID.
    This allows users to fetch transaction details using an identifier from an external system.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_transaction_by_external_id_v1_transactions_external__external_id__get" method="get" path="/v1/transactions/external/{external_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->transactions->getByExternalId(
    externalId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                     | Type                                                          | Required                                                      | Description                                                   | Example                                                       |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| `externalId`                                                  | *string*                                                      | :heavy_check_mark:                                            | The unique external identifier of the transaction.            |                                                               |
| `xOrganizationId`                                             | *string*                                                      | :heavy_check_mark:                                            | The unique identifier for the organization making the request | org_12345                                                     |

### Response

**[?Operations\GetTransactionByExternalIdV1TransactionsExternalExternalIdGetResponse](../../Models/Operations/GetTransactionByExternalIdV1TransactionsExternalExternalIdGetResponse.md)**

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

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->transactions->getByFilingId(
    filingId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->response200GetTransactionsByFilingIdV1TransactionsFilingsFilingIdGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                     | Type                                                                                          | Required                                                                                      | Description                                                                                   | Example                                                                                       |
| --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------- |
| `filingId`                                                                                    | *string*                                                                                      | :heavy_check_mark:                                                                            | The unique identifier of the filing<br/>        whose transactions you wish to retrieve.<br/>         |                                                                                               |
| `xOrganizationId`                                                                             | *string*                                                                                      | :heavy_check_mark:                                                                            | The unique identifier for the organization making the request                                 | org_12345                                                                                     |

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
        '<YOUR_API_KEY_HERE>'
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
    creditNoteCreate: $creditNoteCreate,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                  | Type                                                                       | Required                                                                   | Description                                                                | Example                                                                    |
| -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- |
| `originalTransactionId`                                                    | *string*                                                                   | :heavy_check_mark:                                                         | N/A                                                                        |                                                                            |
| `creditNoteCreate`                                                         | [Components\CreditNoteCreate](../../Models/Components/CreditNoteCreate.md) | :heavy_check_mark:                                                         | N/A                                                                        |                                                                            |
| `xOrganizationId`                                                          | *string*                                                                   | :heavy_check_mark:                                                         | The unique identifier for the organization making the request              | org_12345                                                                  |

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
        '<YOUR_API_KEY_HERE>'
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
    creditNoteCreate: $creditNoteCreate,
    xOrganizationId: 'org_12345'

);

if ($response->any !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                  | Type                                                                       | Required                                                                   | Description                                                                | Example                                                                    |
| -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- | -------------------------------------------------------------------------- |
| `originalTransactionId`                                                    | *string*                                                                   | :heavy_check_mark:                                                         | N/A                                                                        |                                                                            |
| `creditNoteId`                                                             | *string*                                                                   | :heavy_check_mark:                                                         | N/A                                                                        |                                                                            |
| `creditNoteCreate`                                                         | [Components\CreditNoteCreate](../../Models/Components/CreditNoteCreate.md) | :heavy_check_mark:                                                         | N/A                                                                        |                                                                            |
| `xOrganizationId`                                                          | *string*                                                                   | :heavy_check_mark:                                                         | The unique identifier for the organization making the request              | org_12345                                                                  |

### Response

**[?Operations\PUTUpdateCreditNoteByTransactionIdResponse](../../Models/Operations/PUTUpdateCreditNoteByTransactionIdResponse.md)**

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

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->transactions->get(
    transactionId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                     | Type                                                          | Required                                                      | Description                                                   | Example                                                       |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| `transactionId`                                               | *string*                                                      | :heavy_check_mark:                                            | The unique identifier of the transaction to retrieve.         |                                                               |
| `xOrganizationId`                                             | *string*                                                      | :heavy_check_mark:                                            | The unique identifier for the organization making the request | org_12345                                                     |

### Response

**[?Operations\GetTransactionByIdV1TransactionsTransactionIdGetResponse](../../Models/Operations/GetTransactionByIdV1TransactionsTransactionIdGetResponse.md)**

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
        '<YOUR_API_KEY_HERE>'
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
    transactionUpdate: $transactionUpdate,
    xOrganizationId: 'org_12345'

);

if ($response->transactionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                    | Type                                                                         | Required                                                                     | Description                                                                  | Example                                                                      |
| ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| `transactionId`                                                              | *string*                                                                     | :heavy_check_mark:                                                           | N/A                                                                          |                                                                              |
| `transactionUpdate`                                                          | [Components\TransactionUpdate](../../Models/Components/TransactionUpdate.md) | :heavy_check_mark:                                                           | N/A                                                                          |                                                                              |
| `xOrganizationId`                                                            | *string*                                                                     | :heavy_check_mark:                                                           | The unique identifier for the organization making the request                | org_12345                                                                    |

### Response

**[?Operations\UpdateTransactionV1TransactionsTransactionIdPutResponse](../../Models/Operations/UpdateTransactionV1TransactionsTransactionIdPutResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## setTransactionTaxOnlyV1TransactionsTransactionIdTaxOnlyPost

Mark or unmark a transaction as tax-only. SALE becomes TAX_COLLECTION; credit notes become TAX_REFUND. Unmark restores SALE or re-derives FULL/PARTIAL credit note. Only the type is changed; amounts are preserved.

### Example Usage

<!-- UsageSnippet language="php" operationID="set_transaction_tax_only_v1_transactions__transaction_id__tax_only_post" method="post" path="/v1/transactions/{transaction_id}/tax_only" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$taxOnlyUpdate = new Components\TaxOnlyUpdate(
    taxOnly: false,
);

$response = $sdk->transactions->setTransactionTaxOnlyV1TransactionsTransactionIdTaxOnlyPost(
    transactionId: '<id>',
    taxOnlyUpdate: $taxOnlyUpdate,
    xOrganizationId: 'org_12345'

);

if ($response->statusCode === 200) {
    // handle response
}
```

### Parameters

| Parameter                                                            | Type                                                                 | Required                                                             | Description                                                          | Example                                                              |
| -------------------------------------------------------------------- | -------------------------------------------------------------------- | -------------------------------------------------------------------- | -------------------------------------------------------------------- | -------------------------------------------------------------------- |
| `transactionId`                                                      | *string*                                                             | :heavy_check_mark:                                                   | N/A                                                                  |                                                                      |
| `taxOnlyUpdate`                                                      | [Components\TaxOnlyUpdate](../../Models/Components/TaxOnlyUpdate.md) | :heavy_check_mark:                                                   | N/A                                                                  |                                                                      |
| `xOrganizationId`                                                    | *string*                                                             | :heavy_check_mark:                                                   | The unique identifier for the organization making the request        | org_12345                                                            |

### Response

**[?Operations\SetTransactionTaxOnlyV1TransactionsTransactionIdTaxOnlyPostResponse](../../Models/Operations/SetTransactionTaxOnlyV1TransactionsTransactionIdTaxOnlyPostResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |