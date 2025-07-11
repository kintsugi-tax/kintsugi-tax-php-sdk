# TaxEstimation
(*taxEstimation*)

## Overview

### Available Operations

* [estimateTax](#estimatetax) - Estimate Tax

## estimateTax

The Estimate Tax API calculates the estimated tax for a specific
    transaction based on the provided details, including organization nexus,
    transaction details, customer details, and addresses. Optionally simulates nexus being met for tax calculation purposes. The `simulate_nexus_met` parameter is deprecated and will be removed in future releases.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;
use OpenAPI\OpenAPI\Utils;

$sdk = OpenAPI\SDK::builder()->build();

$transactionEstimateRequest = new Components\TransactionEstimateRequest(
    date: Utils\Utils::parseDateTime('2025-01-23T13:01:29.949Z'),
    externalId: 'txn_12345',
    currency: Components\CurrencyEnum::Usd,
    addresses: [
        new Components\TransactionEstimateRequestAddress(
            type: Components\TransactionEstimateRequestType::ShipTo,
            street1: '789 Pine St',
            city: 'Austin',
            state: 'TX',
            postalCode: '78701',
            country: 'US',
        ),
    ],
    transactionItems: [
        new Components\TransactionItemEstimateBase(
            externalId: 'item_A',
            date: Utils\Utils::parseDateTime('2024-10-28T10:00:00Z'),
            externalProductId: 'prod_abc',
            quantity: 2,
            amount: 100,
        ),
        new Components\TransactionItemEstimateBase(
            externalId: 'item_B',
            date: Utils\Utils::parseDateTime('2024-10-28T10:00:00Z'),
            externalProductId: 'prod_xyz',
            quantity: 1,
            amount: 75.5,
        ),
    ],
);
$requestSecurity = new Operations\EstimateTaxV1TaxEstimatePostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->taxEstimation->estimateTax(
    security: $requestSecurity,
    xOrganizationId: 'org_12345',
    transactionEstimateRequest: $transactionEstimateRequest

);

if ($response->pageTransactionEstimateResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                | Type                                                                                                                                                                                                     | Required                                                                                                                                                                                                 | Description                                                                                                                                                                                              | Example                                                                                                                                                                                                  |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                                                                               | [Operations\EstimateTaxV1TaxEstimatePostSecurity](../../Models/Operations/EstimateTaxV1TaxEstimatePostSecurity.md)                                                                                       | :heavy_check_mark:                                                                                                                                                                                       | The security requirements to use for the request.                                                                                                                                                        |                                                                                                                                                                                                          |
| `xOrganizationId`                                                                                                                                                                                        | *string*                                                                                                                                                                                                 | :heavy_check_mark:                                                                                                                                                                                       | The unique identifier for the organization making the request                                                                                                                                            | org_12345                                                                                                                                                                                                |
| `transactionEstimateRequest`                                                                                                                                                                             | [Components\TransactionEstimateRequest](../../Models/Components/TransactionEstimateRequest.md)                                                                                                           | :heavy_check_mark:                                                                                                                                                                                       | N/A                                                                                                                                                                                                      |                                                                                                                                                                                                          |
| `simulateNexusMet`                                                                                                                                                                                       | *?bool*                                                                                                                                                                                                  | :heavy_minus_sign:                                                                                                                                                                                       | : warning: ** DEPRECATED **: This will be removed in a future release, please migrate away from it as soon as possible.<br/><br/>**Deprecated:** Use `simulate_active_registration` in the request body instead. |                                                                                                                                                                                                          |

### Response

**[?Operations\EstimateTaxV1TaxEstimatePostResponse](../../Models/Operations/EstimateTaxV1TaxEstimatePostResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401                                                            | application/json                                               |
| Errors\BackendSrcTaxEstimationResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |