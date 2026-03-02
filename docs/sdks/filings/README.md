# Filings

## Overview

### Available Operations

* [get](#get) - Get Filings
* [getById](#getbyid) - Get Filing By Id
* [getByRegistrationId](#getbyregistrationid) - Get Filings By Registration Id

## get

The Get Filings API retrieves a paginated list of filings based on
    filters such as dates, jurisdiction, Country, status, etc. This helps track
    and manage tax filings efficiently across multiple jurisdictions.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_filings_v1_filings_get" method="get" path="/v1/filings" -->
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

$request = new Operations\GetFilingsV1FilingsGetRequest(
    startDate: '2024-01-01',
    endDate: '2024-12-31',
    dateFiledGte: '2024-01-01',
    dateFiledLte: '2024-12-31',
    orderBy: 'status,start_date,end_date,amount',
    stateCode: 'CA',
    countryCode: [

    ],
);

$response = $sdk->filings->get(
    request: $request
);

if ($response->pageFilingRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                            | Type                                                                                                 | Required                                                                                             | Description                                                                                          |
| ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------- |
| `$request`                                                                                           | [Operations\GetFilingsV1FilingsGetRequest](../../Models/Operations/GetFilingsV1FilingsGetRequest.md) | :heavy_check_mark:                                                                                   | The request object to use for the request.                                                           |

### Response

**[?Operations\GetFilingsV1FilingsGetResponse](../../Models/Operations/GetFilingsV1FilingsGetResponse.md)**

### Errors

| Error Type                                               | Status Code                                              | Content Type                                             |
| -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- |
| Errors\ErrorResponse                                     | 401, 404                                                 | application/json                                         |
| Errors\BackendSrcFilingsResponsesValidationErrorResponse | 422                                                      | application/json                                         |
| Errors\ErrorResponse                                     | 500                                                      | application/json                                         |
| Errors\APIException                                      | 4XX, 5XX                                                 | \*/\*                                                    |

## getById

This API retrieves detailed information about a specific
    filing using its unique identifier (filing_id).

### Example Usage

<!-- UsageSnippet language="php" operationID="get_filing_by_id_v1_filings__filing_id__get" method="get" path="/v1/filings/{filing_id}" -->
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



$response = $sdk->filings->getById(
    filingId: '<id>'
);

if ($response->filingDetailsRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                     | Type                                          | Required                                      | Description                                   |
| --------------------------------------------- | --------------------------------------------- | --------------------------------------------- | --------------------------------------------- |
| `filingId`                                    | *string*                                      | :heavy_check_mark:                            | Unique identifier for the filing to retrieve. |

### Response

**[?Operations\GetFilingByIdV1FilingsFilingIdGetResponse](../../Models/Operations/GetFilingByIdV1FilingsFilingIdGetResponse.md)**

### Errors

| Error Type                                               | Status Code                                              | Content Type                                             |
| -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- |
| Errors\ErrorResponse                                     | 401, 404                                                 | application/json                                         |
| Errors\BackendSrcFilingsResponsesValidationErrorResponse | 422                                                      | application/json                                         |
| Errors\ErrorResponse                                     | 500                                                      | application/json                                         |
| Errors\APIException                                      | 4XX, 5XX                                                 | \*/\*                                                    |

## getByRegistrationId

The Get Filings By Registration ID API
    retrieves all filings
    associated with a specific registration ID. This allows users to query detailed
    filing information tied to
    a specific registration record.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_filings_by_registration_id_v1_filings_registration__registration_id__get" method="get" path="/v1/filings/registration/{registration_id}" -->
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



$response = $sdk->filings->getByRegistrationId(
    registrationId: '<id>',
    page: 1,
    size: 50

);

if ($response->pageFilingRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                   | Type                                                                        | Required                                                                    | Description                                                                 |
| --------------------------------------------------------------------------- | --------------------------------------------------------------------------- | --------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| `registrationId`                                                            | *string*                                                                    | :heavy_check_mark:                                                          | Unique identifier for the registration<br/>        associated with the filings. |
| `page`                                                                      | *?int*                                                                      | :heavy_minus_sign:                                                          | Page number                                                                 |
| `size`                                                                      | *?int*                                                                      | :heavy_minus_sign:                                                          | Page size                                                                   |

### Response

**[?Operations\GetFilingsByRegistrationIdV1FilingsRegistrationRegistrationIdGetResponse](../../Models/Operations/GetFilingsByRegistrationIdV1FilingsRegistrationRegistrationIdGetResponse.md)**

### Errors

| Error Type                                               | Status Code                                              | Content Type                                             |
| -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- |
| Errors\ErrorResponse                                     | 401, 404                                                 | application/json                                         |
| Errors\BackendSrcFilingsResponsesValidationErrorResponse | 422                                                      | application/json                                         |
| Errors\ErrorResponse                                     | 500                                                      | application/json                                         |
| Errors\APIException                                      | 4XX, 5XX                                                 | \*/\*                                                    |