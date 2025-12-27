# kintsugi-tax/tax-platform-sdk

Developer-friendly & type-safe Php SDK specifically catered to leverage *kintsugi-tax/tax-platform-sdk* API.

<div align="left">
    <a href="https://www.speakeasy.com/?utm_source=kintsugi-tax/tax-platform-sdk&utm_campaign=php"><img src="https://custom-icon-badges.demolab.com/badge/-Built%20By%20Speakeasy-212015?style=for-the-badge&logoColor=FBE331&logo=speakeasy&labelColor=545454" /></a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/badge/License-MIT-blue.svg" style="width: 100px; height: 28px;" />
    </a>
</div>

<!-- Start Summary [summary] -->
## Summary


<!-- End Summary [summary] -->

<!-- Start Table of Contents [toc] -->
## Table of Contents
<!-- $toc-max-depth=2 -->
* [kintsugi-tax/tax-platform-sdk](#kintsugi-taxtax-platform-sdk)
  * [SDK Installation](#sdk-installation)
  * [SDK Example Usage](#sdk-example-usage)
  * [Authentication](#authentication)
  * [Available Resources and Operations](#available-resources-and-operations)
  * [Error Handling](#error-handling)
  * [Server Selection](#server-selection)
* [Development](#development)
  * [Maturity](#maturity)
  * [Contributions](#contributions)

<!-- End Table of Contents [toc] -->

<!-- Start SDK Installation [installation] -->
## SDK Installation

The SDK relies on [Composer](https://getcomposer.org/) to manage its dependencies.

To install the SDK and add it as a dependency to an existing `composer.json` file:
```bash
composer require "kintsugi-tax/tax-platform-sdk"
```
<!-- End SDK Installation [installation] -->

<!-- Start SDK Example Usage [usage] -->
## SDK Example Usage

### Example

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

$response = $sdk->addressValidation->search(
    request: $request,
    security: $requestSecurity
);

if ($response->response200SearchV1AddressValidationSearchPost !== null) {
    // handle response
}
```
<!-- End SDK Example Usage [usage] -->

<!-- Start Authentication [security] -->
## Authentication

### Per-Client Security Schemes

This SDK supports the following security schemes globally:

| Name           | Type   | Scheme  |
| -------------- | ------ | ------- |
| `apiKeyHeader` | apiKey | API key |
| `customHeader` | apiKey | API key |

You can set the security parameters through the `setSecurity` function on the `SDKBuilder` when initializing the SDK. The selected scheme will be used by default to authenticate with the API for all operations that support it. For example:
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

$response = $sdk->addressValidation->suggestions(
    request: $request
);

if ($response->any !== null) {
    // handle response
}
```

### Per-Operation Security Schemes

Some operations in this SDK require the security scheme to be specified at the request level. For example:
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

$response = $sdk->addressValidation->search(
    request: $request,
    security: $requestSecurity
);

if ($response->response200SearchV1AddressValidationSearchPost !== null) {
    // handle response
}
```
<!-- End Authentication [security] -->

<!-- Start Available Resources and Operations [operations] -->
## Available Resources and Operations

<details open>
<summary>Available methods</summary>

### [AddressValidation](docs/sdks/addressvalidation/README.md)

* [search](docs/sdks/addressvalidation/README.md#search) - Search
* [suggestions](docs/sdks/addressvalidation/README.md#suggestions) - Suggestions

### [Customers](docs/sdks/customers/README.md)

* [list](docs/sdks/customers/README.md#list) - Get Customers
* [create](docs/sdks/customers/README.md#create) - Create Customer
* [getById](docs/sdks/customers/README.md#getbyid) - Get Customer By Id
* [update](docs/sdks/customers/README.md#update) - Update Customer
* [getByExternalId](docs/sdks/customers/README.md#getbyexternalid) - Get Customer By External Id
* [getTransactions](docs/sdks/customers/README.md#gettransactions) - Get Transactions By Customer Id
* [createTransaction](docs/sdks/customers/README.md#createtransaction) - Create Transaction By Customer Id

### [Exemptions](docs/sdks/exemptions/README.md)

* [list](docs/sdks/exemptions/README.md#list) - Get Exemptions
* [create](docs/sdks/exemptions/README.md#create) - Create Exemption
* [getById](docs/sdks/exemptions/README.md#getbyid) - Get Exemption By Id
* [uploadCertificate](docs/sdks/exemptions/README.md#uploadcertificate) - Upload Exemption Certificate

### [Exemptions.Attachments](docs/sdks/attachments/README.md)

* [get](docs/sdks/attachments/README.md#get) - Get Attachments For Exemption

### [Filings](docs/sdks/filings/README.md)

* [get](docs/sdks/filings/README.md#get) - Get Filings
* [getById](docs/sdks/filings/README.md#getbyid) - Get Filing By Id
* [getByRegistrationId](docs/sdks/filings/README.md#getbyregistrationid) - Get Filings By Registration Id

### [Nexus](docs/sdks/nexus/README.md)

* [listPhysical](docs/sdks/nexus/README.md#listphysical) - Get Physical Nexus
* [createPhysical](docs/sdks/nexus/README.md#createphysical) - Create Physical Nexus
* [updatePhysical](docs/sdks/nexus/README.md#updatephysical) - Update Physical Nexus
* [delete](docs/sdks/nexus/README.md#delete) - Delete Physical Nexus
* [list](docs/sdks/nexus/README.md#list) - Get Nexus For Org

### [Products](docs/sdks/products/README.md)

* [listItems](docs/sdks/products/README.md#listitems) - Get Products
* [create](docs/sdks/products/README.md#create) - Create Product
* [get](docs/sdks/products/README.md#get) - Get Product By Id
* [update](docs/sdks/products/README.md#update) - Update Product
* [getCategories](docs/sdks/products/README.md#getcategories) - Get Product Categories

### [Registrations](docs/sdks/registrations/README.md)

* [list](docs/sdks/registrations/README.md#list) - Get Registrations
* [create](docs/sdks/registrations/README.md#create) - Create Registration
* [getById](docs/sdks/registrations/README.md#getbyid) - Get Registration By Id
* [update](docs/sdks/registrations/README.md#update) - Update Registration
* [deregister](docs/sdks/registrations/README.md#deregister) - Deregister Registration

### [TaxEstimation](docs/sdks/taxestimation/README.md)

* [estimate](docs/sdks/taxestimation/README.md#estimate) - Estimate Tax

### [Transactions](docs/sdks/transactions/README.md)

* [list](docs/sdks/transactions/README.md#list) - Get Transactions
* [create](docs/sdks/transactions/README.md#create) - Create Transaction
* [getByExternalId](docs/sdks/transactions/README.md#getbyexternalid) - Get Transaction By External Id
* [update](docs/sdks/transactions/README.md#update) - Update Transaction
* [get](docs/sdks/transactions/README.md#get) - Get Transaction By Id
* [getByFilingId](docs/sdks/transactions/README.md#getbyfilingid) - Get Transactions By Filing Id
* [createCreditNote](docs/sdks/transactions/README.md#createcreditnote) - Create Credit Note By Transaction Id
* [updateCreditNote](docs/sdks/transactions/README.md#updatecreditnote) - Update Credit Note By Transaction Id

</details>
<!-- End Available Resources and Operations [operations] -->

<!-- Start Error Handling [errors] -->
## Error Handling

Handling errors in this SDK should largely match your expectations. All operations return a response object or throw an exception.

By default an API error will raise a `Errors\APIException` exception, which has the following properties:

| Property       | Type                                    | Description           |
|----------------|-----------------------------------------|-----------------------|
| `$message`     | *string*                                | The error message     |
| `$statusCode`  | *int*                                   | The HTTP status code  |
| `$rawResponse` | *?\Psr\Http\Message\ResponseInterface*  | The raw HTTP response |
| `$body`        | *string*                                | The response content  |

When custom error responses are specified for an operation, the SDK may also throw their associated exception. You can refer to respective *Errors* tables in SDK docs for more details on possible exception types for each operation. For example, the `search` method throws the following exceptions:

| Error Type                                                         | Status Code | Content Type     |
| ------------------------------------------------------------------ | ----------- | ---------------- |
| Errors\ErrorResponse                                               | 401         | application/json |
| Errors\BackendSrcAddressValidationResponsesValidationErrorResponse | 422         | application/json |
| Errors\ErrorResponse                                               | 500         | application/json |
| Errors\APIException                                                | 4XX, 5XX    | \*/\*            |

### Example

```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Errors;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();

try {
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
} catch (Errors\ErrorResponseThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\BackendSrcAddressValidationResponsesValidationErrorResponseThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\ErrorResponseThrowable $e) {
    // handle $e->$container data
    throw $e;
} catch (Errors\APIException $e) {
    // handle default exception
    throw $e;
}
```
<!-- End Error Handling [errors] -->

<!-- Start Server Selection [server] -->
## Server Selection

### Override Server URL Per-Client

The default server can be overridden globally using the `setServerUrl(string $serverUrl)` builder method when initializing the SDK client instance. For example:
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()
    ->setServerURL('https://api.trykintsugi.com')
    ->build();

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
<!-- End Server Selection [server] -->

<!-- Placeholder for Future Speakeasy SDK Sections -->

# Development

## Maturity

This SDK is in beta, and there may be breaking changes between versions without a major version update. Therefore, we recommend pinning usage
to a specific package version. This way, you can install the same version each time without breaking changes unless you are intentionally
looking for the latest version.

## Contributions

While we value open-source contributions to this SDK, this library is generated programmatically. Any manual changes added to internal files will be overwritten on the next generation. 
We look forward to hearing your feedback. Feel free to open a PR or an issue with a proof of concept and we'll do our best to include it in a future release. 

### SDK Created by [Speakeasy](https://www.speakeasy.com/?utm_source=kintsugi-tax/tax-platform-sdk&utm_campaign=php)
