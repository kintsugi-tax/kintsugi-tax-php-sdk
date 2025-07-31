# AddressValidation
(*addressValidation*)

## Overview

### Available Operations

* [searchV1AddressValidationSearchPost](#searchv1addressvalidationsearchpost) - Search
* [suggestionsV1AddressValidationSuggestionsPost](#suggestionsv1addressvalidationsuggestionspost) - Suggestions

## searchV1AddressValidationSearchPost

This API validates and enriches address information
    submitted by the user. It ensures that the address is standardized, accurate,
    and compliant with geographical and postal standards.
    The API also adds additional fields, such as county, when possible.

### Example Usage

<!-- UsageSnippet language="php" operationID="search_v1_address_validation_search_post" method="post" path="/v1/address_validation/search" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();

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

$response = $sdk->addressValidation->searchV1AddressValidationSearchPost(
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

## suggestionsV1AddressValidationSuggestionsPost

This API endpoint provides address suggestions based on
    partial input data. It helps users auto-complete and validate addresses efficiently
    by returning a list of suggested addresses that match the input criteria.
    This improves accuracy, increases speed, reduces errors,
    and streamlines the data entry process.

### Example Usage

<!-- UsageSnippet language="php" operationID="suggestions_v1_address_validation_suggestions_post" method="post" path="/v1/address_validation/suggestions" -->
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

$request = new Components\ValidationAddress(
    line1: '1600 Amphitheatre Parkway',
    line2: '',
    line3: '',
    city: 'Mountain View',
    state: 'CA',
    postalCode: '94043',
    id: 215,
    county: '',
    fullAddress: '1600 Amphitheatre Parkway, Mountain View, CA 94043',
);

$response = $sdk->addressValidation->suggestionsV1AddressValidationSuggestionsPost(
    request: $request
);

if ($response->any !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                    | Type                                                                         | Required                                                                     | Description                                                                  |
| ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| `$request`                                                                   | [Components\ValidationAddress](../../Models/Components/ValidationAddress.md) | :heavy_check_mark:                                                           | The request object to use for the request.                                   |

### Response

**[?Operations\SuggestionsV1AddressValidationSuggestionsPostResponse](../../Models/Operations/SuggestionsV1AddressValidationSuggestionsPostResponse.md)**

### Errors

| Error Type                                                         | Status Code                                                        | Content Type                                                       |
| ------------------------------------------------------------------ | ------------------------------------------------------------------ | ------------------------------------------------------------------ |
| Errors\ErrorResponse                                               | 401                                                                | application/json                                                   |
| Errors\BackendSrcAddressValidationResponsesValidationErrorResponse | 422                                                                | application/json                                                   |
| Errors\ErrorResponse                                               | 500                                                                | application/json                                                   |
| Errors\APIException                                                | 4XX, 5XX                                                           | \*/\*                                                              |