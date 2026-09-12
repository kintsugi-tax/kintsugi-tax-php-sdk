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

Kintsugi Customer API: Publicly documented Kintsugi Customer API endpoints. The source (openapi/_source/openapi-master.json) is the platform spec filtered to the documented customer surface (openapi/customer-endpoints.json); scripts/build-specs.mjs re-applies that filter here. Do not edit by hand.
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

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
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

$response = $sdk->addressValidation->search(
    request: $request
);

if ($response->response200SearchV1AddressValidationSearchPost !== null) {
    // handle response
}
```
<!-- End SDK Example Usage [usage] -->

<!-- Start Authentication [security] -->
## Authentication

### Per-Client Security Schemes

This SDK supports the following security scheme globally:

| Name           | Type   | Scheme  |
| -------------- | ------ | ------- |
| `apiKeyHeader` | apiKey | API key |

To authenticate with the API the `apiKeyHeader` parameter must be set when initializing the SDK. For example:
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

$response = $sdk->addressValidation->search(
    request: $request
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

### [CustomerTaxRegistration](docs/sdks/customertaxregistration/README.md)

* [upsertCustomerTaxRegistrationV1CustomersCustomerIdTaxRegistrationsPost](docs/sdks/customertaxregistration/README.md#upsertcustomertaxregistrationv1customerscustomeridtaxregistrationspost) - Upsert customer tax registration

### [Customers](docs/sdks/customers/README.md)

* [list](docs/sdks/customers/README.md#list) - Get customers
* [create](docs/sdks/customers/README.md#create) - Create customer
* [getByExternalId](docs/sdks/customers/README.md#getbyexternalid) - Get customer by external id
* [getById](docs/sdks/customers/README.md#getbyid) - Get customer by id
* [update](docs/sdks/customers/README.md#update) - Update customer
* [getTransactions](docs/sdks/customers/README.md#gettransactions) - Get transactions by customer id
* [createTransaction](docs/sdks/customers/README.md#createtransaction) - Create transaction by customer id

### [Exemptions](docs/sdks/exemptions/README.md)

* [list](docs/sdks/exemptions/README.md#list) - Get exemptions
* [create](docs/sdks/exemptions/README.md#create) - Create exemption
* [getById](docs/sdks/exemptions/README.md#getbyid) - Get exemption by id
* [uploadCertificate](docs/sdks/exemptions/README.md#uploadcertificate) - Upload exemption certificate

### [Exemptions.Attachments](docs/sdks/attachments/README.md)

* [get](docs/sdks/attachments/README.md#get) - Get attachments for exemption

### [Filings](docs/sdks/filings/README.md)

* [get](docs/sdks/filings/README.md#get) - Get filings
* [getByRegistrationId](docs/sdks/filings/README.md#getbyregistrationid) - Get filings by registration id
* [getById](docs/sdks/filings/README.md#getbyid) - Get filing by id
* [approveFilingV1FilingsFilingIdApprovePut](docs/sdks/filings/README.md#approvefilingv1filingsfilingidapproveput) - Approve filing

### [Nexus](docs/sdks/nexus/README.md)

* [list](docs/sdks/nexus/README.md#list) - Get nexus for org
* [listPhysical](docs/sdks/nexus/README.md#listphysical) - Get physical nexus
* [createPhysical](docs/sdks/nexus/README.md#createphysical) - Create physical nexus
* [getPhysicalNexusCategoriesV1NexusPhysicalNexusCategoriesGet](docs/sdks/nexus/README.md#getphysicalnexuscategoriesv1nexusphysicalnexuscategoriesget) - Get physical nexus categories
* [delete](docs/sdks/nexus/README.md#delete) - Delete physical nexus
* [updatePhysical](docs/sdks/nexus/README.md#updatephysical) - Update physical nexus
* [getNexusDetailsForIdV1NexusNexusIdGet](docs/sdks/nexus/README.md#getnexusdetailsforidv1nexusnexusidget) - Get nexus details for id

### [Products](docs/sdks/products/README.md)

* [getProductsV1ProductsGet](docs/sdks/products/README.md#getproductsv1productsget) - Get products
* [createProductV1ProductsPost](docs/sdks/products/README.md#createproductv1productspost) - Create product
* [getProductCategoriesV1ProductsCategoriesGet](docs/sdks/products/README.md#getproductcategoriesv1productscategoriesget) - Get product categories
* [get](docs/sdks/products/README.md#get) - Get product by id
* [update](docs/sdks/products/README.md#update) - Update product

### [Registrations](docs/sdks/registrations/README.md)

* [list](docs/sdks/registrations/README.md#list) - Get registrations
* [create](docs/sdks/registrations/README.md#create) - Create registration
* [getJurisdictionSpecificFieldsV1RegistrationsJurisdictionSpecificFieldsGet](docs/sdks/registrations/README.md#getjurisdictionspecificfieldsv1registrationsjurisdictionspecificfieldsget) - Get jurisdiction specific fields
* [listRegistrationJurisdictionsV1RegistrationsJurisdictionsGet](docs/sdks/registrations/README.md#listregistrationjurisdictionsv1registrationsjurisdictionsget) - List registration jurisdictions
* [getById](docs/sdks/registrations/README.md#getbyid) - Get registration by id
* [update](docs/sdks/registrations/README.md#update) - Update registration
* [uploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost](docs/sdks/registrations/README.md#uploadregistrationattachmentv1registrationsregistrationidattachmentspost) - Upload registration attachment
* [deregister](docs/sdks/registrations/README.md#deregister) - Deregister registration
* [getOssCountriesForRegistrationV1RegistrationsRegistrationIdOssCountriesGet](docs/sdks/registrations/README.md#getosscountriesforregistrationv1registrationsregistrationidosscountriesget) - Get oss countries for registration

### [TaxEstimation](docs/sdks/taxestimation/README.md)

* [estimate](docs/sdks/taxestimation/README.md#estimate) - Estimate tax

### [Transactions](docs/sdks/transactions/README.md)

* [list](docs/sdks/transactions/README.md#list) - Get transactions
* [create](docs/sdks/transactions/README.md#create) - Create transaction
* [archiveTransactionByIdV1TransactionsArchivePost](docs/sdks/transactions/README.md#archivetransactionbyidv1transactionsarchivepost) - Archive transaction by id
* [getByExternalId](docs/sdks/transactions/README.md#getbyexternalid) - Get transaction by external id
* [getByFilingId](docs/sdks/transactions/README.md#getbyfilingid) - Get transactions by filing id
* [createCreditNote](docs/sdks/transactions/README.md#createcreditnote) - Create credit note by transaction id
* [updateCreditNote](docs/sdks/transactions/README.md#updatecreditnote) - Update credit note by transaction id
* [get](docs/sdks/transactions/README.md#get) - Get transaction by id
* [update](docs/sdks/transactions/README.md#update) - Update transaction
* [setTransactionTaxOnlyV1TransactionsTransactionIdTaxOnlyPost](docs/sdks/transactions/README.md#settransactiontaxonlyv1transactionstransactionidtaxonlypost) - Set transaction tax only

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

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

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

    $response = $sdk->addressValidation->search(
        request: $request
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

$sdk = SDK\SDK::builder()
    ->setServerURL('https://api.trykintsugi.com')
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
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

$response = $sdk->addressValidation->search(
    request: $request
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
