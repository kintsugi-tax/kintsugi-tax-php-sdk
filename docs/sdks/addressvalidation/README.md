# AddressValidation
(*addressValidation*)

## Overview

### Available Operations

* [search](#search) - Search
* [suggestions](#suggestions) - Suggestions

## search

This API validates and enriches address information
    submitted by the user. It ensures that the address is standardized, accurate,
    and compliant with geographical and postal standards.
    The API also adds additional fields, such as county, when possible.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();

$request = new Components\AddressBase(
    phone: '555-123-4567',
    street1: '1600 Amphitheatre Parkway',
    street2: 'Building 40',
    city: 'Mountain View',
    county: 'Santa Clara',
    state: 'CA',
    postalCode: '94043',
    country: Components\CountryCodeEnum::Us,
    fullAddress: '1600 Amphitheatre Parkway, Mountain View, CA 94043',
);
$requestSecurity = new Operations\SearchV1AddressValidationSearchPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->addressValidation->search(
    request: $request,
    security: $requestSecurity
);

if ($response->response200SearchV1AddressValidationSearchPost !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                        | Type                                                                                                                             | Required                                                                                                                         | Description                                                                                                                      |
| -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                       | [Components\AddressBase](../../Models/Components/AddressBase.md)                                                                 | :heavy_check_mark:                                                                                                               | The request object to use for the request.                                                                                       |
| `security`                                                                                                                       | [Operations\SearchV1AddressValidationSearchPostSecurity](../../Models/Operations/SearchV1AddressValidationSearchPostSecurity.md) | :heavy_check_mark:                                                                                                               | The security requirements to use for the request.                                                                                |

### Response

**[?Operations\SearchV1AddressValidationSearchPostResponse](../../Models/Operations/SearchV1AddressValidationSearchPostResponse.md)**

### Errors

| Error Type                                                         | Status Code                                                        | Content Type                                                       |
| ------------------------------------------------------------------ | ------------------------------------------------------------------ | ------------------------------------------------------------------ |
| Errors\ErrorResponse                                               | 401                                                                | application/json                                                   |
| Errors\BackendSrcAddressValidationResponsesValidationErrorResponse | 422                                                                | application/json                                                   |
| Errors\ErrorResponse                                               | 500                                                                | application/json                                                   |
| Errors\APIException                                                | 4XX, 5XX                                                           | \*/\*                                                              |

## suggestions

This API endpoint provides address suggestions based on
    partial input data. It helps users auto-complete and validate addresses efficiently
    by returning a list of suggested addresses that match the input criteria.
    This improves accuracy, increases speed, reduces errors,
    and streamlines the data entry process.

### Example Usage

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();

$validationAddress = new Components\ValidationAddress(
    line1: '1600 Amphitheatre Parkway',
    line2: '',
    line3: '',
    city: 'Mountain View',
    state: 'CA',
    country: 'US',
    postalCode: '94043',
    id: 215,
    county: '',
    fullAddress: '1600 Amphitheatre Parkway, Mountain View, CA 94043',
);
$requestSecurity = new Operations\SuggestionsV1AddressValidationSuggestionsPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->addressValidation->suggestions(
    security: $requestSecurity,
    xOrganizationId: 'org_12345',
    validationAddress: $validationAddress

);

if ($response->any !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                            | Type                                                                                                                                                 | Required                                                                                                                                             | Description                                                                                                                                          | Example                                                                                                                                              |
| ---------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                           | [Operations\SuggestionsV1AddressValidationSuggestionsPostSecurity](../../Models/Operations/SuggestionsV1AddressValidationSuggestionsPostSecurity.md) | :heavy_check_mark:                                                                                                                                   | The security requirements to use for the request.                                                                                                    |                                                                                                                                                      |
| `xOrganizationId`                                                                                                                                    | *string*                                                                                                                                             | :heavy_check_mark:                                                                                                                                   | The unique identifier for the organization making the request                                                                                        | org_12345                                                                                                                                            |
| `validationAddress`                                                                                                                                  | [Components\ValidationAddress](../../Models/Components/ValidationAddress.md)                                                                         | :heavy_check_mark:                                                                                                                                   | N/A                                                                                                                                                  |                                                                                                                                                      |

### Response

**[?Operations\SuggestionsV1AddressValidationSuggestionsPostResponse](../../Models/Operations/SuggestionsV1AddressValidationSuggestionsPostResponse.md)**

### Errors

| Error Type                                                         | Status Code                                                        | Content Type                                                       |
| ------------------------------------------------------------------ | ------------------------------------------------------------------ | ------------------------------------------------------------------ |
| Errors\ErrorResponse                                               | 401                                                                | application/json                                                   |
| Errors\BackendSrcAddressValidationResponsesValidationErrorResponse | 422                                                                | application/json                                                   |
| Errors\ErrorResponse                                               | 500                                                                | application/json                                                   |
| Errors\APIException                                                | 4XX, 5XX                                                           | \*/\*                                                              |