# kintsugi-tax/tax-platform-sdk

Developer-friendly & type-safe Php SDK specifically catered to leverage *kintsugi-tax/tax-platform-sdk* API.

<div align="left">
    <a href="https://www.speakeasy.com/?utm_source=kintsugi-tax/tax-platform-sdk&utm_campaign=php"><img src="https://custom-icon-badges.demolab.com/badge/-Built%20By%20Speakeasy-212015?style=for-the-badge&logoColor=FBE331&logo=speakeasy&labelColor=545454" /></a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/badge/License-MIT-blue.svg" style="width: 100px; height: 28px;" />
    </a>
</div>


<br /><br />
> [!IMPORTANT]
> This SDK is not yet ready for production use. To complete setup please follow the steps outlined in your [workspace](https://app.speakeasy.com/org/kintsugi-ai/tax-platform). Delete this section before > publishing to a package manager.

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

$response = $sdk->addressValidation->searchV1AddressValidationSearchPost(
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

$response = $sdk->addressValidation->suggestionsV1AddressValidationSuggestionsPost(
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

$response = $sdk->addressValidation->searchV1AddressValidationSearchPost(
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

### [addressValidation](docs/sdks/addressvalidation/README.md)

* [searchV1AddressValidationSearchPost](docs/sdks/addressvalidation/README.md#searchv1addressvalidationsearchpost) - Search
* [suggestionsV1AddressValidationSuggestionsPost](docs/sdks/addressvalidation/README.md#suggestionsv1addressvalidationsuggestionspost) - Suggestions

### [customers](docs/sdks/customers/README.md)

* [getCustomersV1](docs/sdks/customers/README.md#getcustomersv1) - Get Customers
* [createCustomerV1CustomersPost](docs/sdks/customers/README.md#createcustomerv1customerspost) - Create Customer
* [getCustomerByIdV1CustomersCustomerIdGet](docs/sdks/customers/README.md#getcustomerbyidv1customerscustomeridget) - Get Customer By Id
* [updateCustomerV1CustomersCustomerIdPut](docs/sdks/customers/README.md#updatecustomerv1customerscustomeridput) - Update Customer
* [getCustomerByExternalIdV1CustomersExternalExternalIdGet](docs/sdks/customers/README.md#getcustomerbyexternalidv1customersexternalexternalidget) - Get Customer By External Id
* [getTransactionsByCustomerIdV1CustomersCustomerIdTransactionsGet](docs/sdks/customers/README.md#gettransactionsbycustomeridv1customerscustomeridtransactionsget) - Get Transactions By Customer Id
* [createTransactionByCustomerIdV1CustomersCustomerIdTransactionsPost](docs/sdks/customers/README.md#createtransactionbycustomeridv1customerscustomeridtransactionspost) - Create Transaction By Customer Id

### [exemptions](docs/sdks/exemptions/README.md)

* [getExemptionsV1ExemptionsGet](docs/sdks/exemptions/README.md#getexemptionsv1exemptionsget) - Get Exemptions
* [createExemptionV1ExemptionsPost](docs/sdks/exemptions/README.md#createexemptionv1exemptionspost) - Create Exemption
* [getExemptionByIdV1ExemptionsExemptionIdGet](docs/sdks/exemptions/README.md#getexemptionbyidv1exemptionsexemptionidget) - Get Exemption By Id
* [uploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost](docs/sdks/exemptions/README.md#uploadexemptioncertificatev1exemptionsexemptionidattachmentspost) - Upload Exemption Certificate
* [getAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGet](docs/sdks/exemptions/README.md#getattachmentsforexemptionv1exemptionsexemptionidattachmentsget) - Get Attachments For Exemption

### [filings](docs/sdks/filings/README.md)

* [getFilingsV1FilingsGet](docs/sdks/filings/README.md#getfilingsv1filingsget) - Get Filings
* [getFilingByIdV1FilingsFilingIdGet](docs/sdks/filings/README.md#getfilingbyidv1filingsfilingidget) - Get Filing By Id
* [getFilingsByRegistrationIdV1FilingsRegistrationRegistrationIdGet](docs/sdks/filings/README.md#getfilingsbyregistrationidv1filingsregistrationregistrationidget) - Get Filings By Registration Id

### [nexus](docs/sdks/nexus/README.md)

* [getPhysicalNexusV1NexusPhysicalNexusGet](docs/sdks/nexus/README.md#getphysicalnexusv1nexusphysicalnexusget) - Get Physical Nexus
* [createPhysicalNexusV1NexusPhysicalNexusPost](docs/sdks/nexus/README.md#createphysicalnexusv1nexusphysicalnexuspost) - Create Physical Nexus
* [updatePhysicalNexusV1NexusPhysicalNexusPhysicalNexusIdPut](docs/sdks/nexus/README.md#updatephysicalnexusv1nexusphysicalnexusphysicalnexusidput) - Update Physical Nexus
* [deletePhysicalNexusV1NexusPhysicalNexusPhysicalNexusIdDelete](docs/sdks/nexus/README.md#deletephysicalnexusv1nexusphysicalnexusphysicalnexusiddelete) - Delete Physical Nexus
* [getNexusForOrgV1NexusGet](docs/sdks/nexus/README.md#getnexusfororgv1nexusget) - Get Nexus For Org

### [products](docs/sdks/products/README.md)

* [getProductsV1ProductsGet](docs/sdks/products/README.md#getproductsv1productsget) - Get Products
* [createProductV1ProductsPost](docs/sdks/products/README.md#createproductv1productspost) - Create Product
* [getProductByIdV1ProductsProductIdGet](docs/sdks/products/README.md#getproductbyidv1productsproductidget) - Get Product By Id
* [updateProductV1ProductsProductIdPut](docs/sdks/products/README.md#updateproductv1productsproductidput) - Update Product
* [getProductCategoriesV1ProductsCategoriesGet](docs/sdks/products/README.md#getproductcategoriesv1productscategoriesget) - Get Product Categories

### [registrations](docs/sdks/registrations/README.md)

* [getRegistrationsV1RegistrationsGet](docs/sdks/registrations/README.md#getregistrationsv1registrationsget) - Get Registrations
* [createRegistrationV1RegistrationsPost](docs/sdks/registrations/README.md#createregistrationv1registrationspost) - Create Registration
* [getRegistrationByIdV1RegistrationsRegistrationIdGet](docs/sdks/registrations/README.md#getregistrationbyidv1registrationsregistrationidget) - Get Registration By Id
* [updateRegistrationV1RegistrationsRegistrationIdPut](docs/sdks/registrations/README.md#updateregistrationv1registrationsregistrationidput) - Update Registration
* [deregisterRegistrationV1RegistrationsRegistrationIdDeregisterPost](docs/sdks/registrations/README.md#deregisterregistrationv1registrationsregistrationidderegisterpost) - Deregister Registration


### [taxEstimation](docs/sdks/taxestimation/README.md)

* [estimateTaxV1TaxEstimatePost](docs/sdks/taxestimation/README.md#estimatetaxv1taxestimatepost) - Estimate Tax

### [transactions](docs/sdks/transactions/README.md)

* [getTransactionsV1TransactionsGet](docs/sdks/transactions/README.md#gettransactionsv1transactionsget) - Get Transactions
* [createTransactionV1TransactionsPost](docs/sdks/transactions/README.md#createtransactionv1transactionspost) - Create Transaction
* [getTransactionByExternalIdV1TransactionsExternalExternalIdGet](docs/sdks/transactions/README.md#gettransactionbyexternalidv1transactionsexternalexternalidget) - Get Transaction By External Id
* [updateTransactionV1TransactionsTransactionIdPut](docs/sdks/transactions/README.md#updatetransactionv1transactionstransactionidput) - Update Transaction
* [getTransactionByIdV1TransactionsTransactionIdGet](docs/sdks/transactions/README.md#gettransactionbyidv1transactionstransactionidget) - Get Transaction By Id
* [getTransactionsByFilingIdV1TransactionsFilingsFilingIdGet](docs/sdks/transactions/README.md#gettransactionsbyfilingidv1transactionsfilingsfilingidget) - Get Transactions By Filing Id
* [postCreateCreditNoteByTransactionId](docs/sdks/transactions/README.md#postcreatecreditnotebytransactionid) - Create Credit Note By Transaction Id
* [putUpdateCreditNoteByTransactionId](docs/sdks/transactions/README.md#putupdatecreditnotebytransactionid) - Update Credit Note By Transaction Id

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

When custom error responses are specified for an operation, the SDK may also throw their associated exception. You can refer to respective *Errors* tables in SDK docs for more details on possible exception types for each operation. For example, the `searchV1AddressValidationSearchPost` method throws the following exceptions:

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

    $response = $sdk->addressValidation->searchV1AddressValidationSearchPost(
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

$response = $sdk->addressValidation->searchV1AddressValidationSearchPost(
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
