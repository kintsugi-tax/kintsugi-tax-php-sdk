# TaxEstimation

## Overview

### Available Operations

* [estimate](#estimate) - Estimate Tax

## estimate

The Estimate Tax API calculates the estimated tax for a specific
    transaction based on the provided details, including organization nexus,
    transaction details, customer details, and addresses. Optionally simulates nexus being met for tax calculation purposes. The `simulate_nexus_met` parameter is deprecated and will be removed in future releases.

### Example Usage

<!-- UsageSnippet language="php" operationID="estimate_tax_v1_tax_estimate_post" method="post" path="/v1/tax/estimate" -->
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

$transactionEstimatePublicRequest = new Components\TransactionEstimatePublicRequest(
    date: Utils\Utils::parseDateTime('2025-01-23T13:01:29.949Z'),
    externalId: 'txn_12345',
    currency: Components\CurrencyEnum::Usd,
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
    addresses: [
        new Components\TransactionEstimatePublicRequestAddress(
            type: Components\TransactionEstimatePublicRequestType::ShipTo,
            street1: '789 Pine St',
            city: 'Austin',
            state: 'TX',
            postalCode: '78701',
            country: 'US',
        ),
    ],
);

$response = $sdk->taxEstimation->estimate(
    transactionEstimatePublicRequest: $transactionEstimatePublicRequest
);

if ($response->pageTransactionEstimateResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                | Type                                                                                                                                                                                                     | Required                                                                                                                                                                                                 | Description                                                                                                                                                                                              |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `transactionEstimatePublicRequest`                                                                                                                                                                       | [Components\TransactionEstimatePublicRequest](../../Models/Components/TransactionEstimatePublicRequest.md)                                                                                               | :heavy_check_mark:                                                                                                                                                                                       | N/A                                                                                                                                                                                                      |
| `simulateNexusMet`                                                                                                                                                                                       | *?bool*                                                                                                                                                                                                  | :heavy_minus_sign:                                                                                                                                                                                       | : warning: ** DEPRECATED **: This will be removed in a future release, please migrate away from it as soon as possible.<br/><br/>**Deprecated:** Use `simulate_active_registration` in the request body instead. |

### Response

**[?Operations\EstimateTaxV1TaxEstimatePostResponse](../../Models/Operations/EstimateTaxV1TaxEstimatePostResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401                                                            | application/json                                               |
| Errors\BackendSrcTaxEstimationResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |