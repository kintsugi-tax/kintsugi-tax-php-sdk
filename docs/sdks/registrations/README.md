# Registrations

## Overview

### Available Operations

* [list](#list) - Get registrations
* [create](#create) - Create registration
* [getJurisdictionSpecificFieldsV1RegistrationsJurisdictionSpecificFieldsGet](#getjurisdictionspecificfieldsv1registrationsjurisdictionspecificfieldsget) - Get jurisdiction specific fields
* [listRegistrationJurisdictionsV1RegistrationsJurisdictionsGet](#listregistrationjurisdictionsv1registrationsjurisdictionsget) - List registration jurisdictions
* [getById](#getbyid) - Get registration by id
* [update](#update) - Update registration
* [uploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost](#uploadregistrationattachmentv1registrationsregistrationidattachmentspost) - Upload registration attachment
* [deregister](#deregister) - Deregister registration
* [getOssCountriesForRegistrationV1RegistrationsRegistrationIdOssCountriesGet](#getosscountriesforregistrationv1registrationsregistrationidosscountriesget) - Get oss countries for registration

## list

The Get Registrations API retrieves a
    paginated list of registrations.
    This API helps in tracking and managing registrations efficiently across multiple
    jurisdictions.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_registrations_v1_registrations_get" method="get" path="/v1/registrations" -->
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

$request = new Operations\GetRegistrationsV1RegistrationsGetRequest(
    xOrganizationId: 'org_12345',
);

$response = $sdk->registrations->list(
    request: $request
);

if ($response->pageRegistrationReadWithPassword !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                    | Type                                                                                                                         | Required                                                                                                                     | Description                                                                                                                  |
| ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                   | [Operations\GetRegistrationsV1RegistrationsGetRequest](../../Models/Operations/GetRegistrationsV1RegistrationsGetRequest.md) | :heavy_check_mark:                                                                                                           | The request object to use for the request.                                                                                   |

### Response

**[?Operations\GetRegistrationsV1RegistrationsGetResponse](../../Models/Operations/GetRegistrationsV1RegistrationsGetResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401, 404                                                       | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |

## create

The Create Registration API allows users to create a new registration
    for tracking and managing tax filings efficiently across multiple jurisdictions.

### Example Usage: oss

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="oss" -->
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



$response = $sdk->registrations->create(
    requestBody: new Components\OSSRegistrationCreatePayload(
        passwordPlainText: 'oss_pass_fr',
        passwordMetadataPlainText: '{"q":"a"}',
        memberStateOfIdentificationCode: Components\CountryCodeEnum::Fr,
        imported: true,
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_alabama

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_alabama" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\AlabamaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'AL',
        stateName: 'Alabama',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'alabama_user',
        amountFees: 100,
        jurisdictionSpecificFields: new Components\AlabamaFields(
            registrationType: Components\AlabamaRegistrationType::SalesTax,
            businessName: 'Acme Corp',
            signOnId: 'acme_sign_on',
            accessCode: 'abc123',
            thirdPartyPassword: 'tp_pass',
            mfaCompleted: true,
            salesTaxId: 'ST-AL-EXAMPLE',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_arizona

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_arizona" -->
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



$response = $sdk->registrations->create(
    requestBody: new Components\MississippiRegistrationPayload(
        countryCode: Components\CountryCodeEnum::Td,
        stateCode: '<value>',
        stateName: '<value>',
        filingFrequency: Components\FilingFrequencyEnum::FourMonthly,
        jurisdictionSpecificFields: new Components\MississippiFields(
            registrationType: Components\MississippiRegistrationType::SalesAndUseTax,
            businessName: '<value>',
            msStateTaxId: '<id>',
            msAccountType: Components\MississippiAccountType::UseTaxLicense,
            letterId: '<id>',
        ),
    ),
    xOrganizationId: null

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_arkansas

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_arkansas" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\ArkansasRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'AR',
        stateName: 'Arkansas',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'atap_user',
        amountFees: 100,
        passwordPlainText: 'atap_password',
        jurisdictionSpecificFields: new Components\ArkansasFields(
            registrationType: Components\ArkansasRegistrationType::RemoteSeller,
            businessName: 'Acme Corp',
            arAccountId: 'AR-123456789',
            zipCode: '72201',
            lastPaymentToState: '0.00',
            mfaCompleted: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_california

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_california" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\CaliforniaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'CA',
        stateName: 'California',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'cdtfa_user',
        amountFees: 100,
        passwordPlainText: 'cdtfa_password',
        jurisdictionSpecificFields: new Components\CaliforniaFields(
            registrationType: Components\CaliforniaRegistrationType::RemoteSeller,
            mfaCompleted: true,
            businessName: 'Acme Corp',
            salesTaxId: 'CA-1234567890',
            cdtfaThirdPartyAccessSecurityCode: 'sec-code-example',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_connecticut

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_connecticut" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\ConnecticutRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'CT',
        stateName: 'Connecticut',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'ct_user',
        amountFees: 100,
        passwordPlainText: 'ct_password',
        jurisdictionSpecificFields: new Components\ConnecticutFields(
            registrationType: Components\ConnecticutRegistrationType::SalesTax,
            businessName: 'Test Connecticut Biz',
            ctTaxRegistrationNumber: 'CT-REG-999',
            registrationId: 'REG-123456',
            lastPaymentToState: '0.00',
            mfaCompleted: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_district_of_columbia

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_district_of_columbia" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\DistrictOfColumbiaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'DC',
        stateName: 'District of Columbia',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'mytax_dc_user',
        amountFees: 100,
        passwordPlainText: 'mytax_dc_password',
        jurisdictionSpecificFields: new Components\DistrictOfColumbiaFields(
            mfaCompleted: true,
            registrationType: Components\DistrictOfColumbiaRegistrationType::SalesAndUseTax,
            businessName: 'Acme Corp District of Columbia',
            dcStateTaxId: '123456789012',
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_florida

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_florida" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'FL',
        stateName: 'Florida',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'florida_user',
        amountFees: 100,
        passwordPlainText: 'florida_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_TAX',
            'business_name' => 'Acme Corp Florida',
            'fl_certificate_number' => '78-8012345678-9',
            'business_partner_number' => '0001234567',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_georgia

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_georgia" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\GeorgiaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'GA',
        stateName: 'Georgia',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'gtc_user',
        amountFees: 100,
        passwordPlainText: 'gtc_password',
        jurisdictionSpecificFields: new Components\GeorgiaFields(
            registrationType: Components\GeorgiaRegistrationType::SalesTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Georgia',
            salesTaxId: 'GA-ST-12345',
            zipCode: '30301',
            lastPaymentToState: '0.00',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_hawaii

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_hawaii" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'HI',
        stateName: 'Hawaii',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'hawaii_user',
        amountFees: 100,
        passwordPlainText: 'hawaii_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'GENERAL_EXCISE_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Hawaii',
            'sales_tax_id' => 'HI-GE-12345',
            'letter_id' => 'LTR-HI-001',
            'last_payment_to_state' => '0.00',
            'third_party_access_enabled' => true,
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_idaho

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_idaho" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\IdahoRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'ID',
        stateName: 'Idaho',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'idaho_user',
        amountFees: 100,
        passwordPlainText: 'idaho_password',
        jurisdictionSpecificFields: new Components\IdahoFields(
            registrationType: Components\IdahoRegistrationType::SalesTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Idaho',
            salesTaxId: 'ID-ST-12345',
            accessCode: 'tap-code-example',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_illinois

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_illinois" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\IllinoisRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'IL',
        stateName: 'Illinois',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'illinois_user',
        amountFees: 100,
        passwordPlainText: 'illinois_password',
        jurisdictionSpecificFields: new Components\IllinoisFields(
            registrationType: Components\IllinoisRegistrationType::SalesAndUseTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Illinois',
            illinoisAccountId: 'IL-9876543210',
            lastPaymentToState: '0.00',
            firstName: 'Jane',
            lastName: 'Smith',
            businessPhone: '217-555-9876',
            st2Activated: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_indiana

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_indiana" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\IndianaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'IN',
        stateName: 'Indiana',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'indiana_user',
        amountFees: 100,
        passwordPlainText: 'indiana_password',
        jurisdictionSpecificFields: new Components\IndianaFields(
            mfaCompleted: true,
            businessName: 'Acme Corp Indiana',
            inStateTaxId: '1234567890',
            locationId: 'LOC-IND-01',
            salesTaxAccountNumber: 'RST-0123456789',
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_iowa

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_iowa" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\IowaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'IA',
        stateName: 'Iowa',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'iowa_user',
        amountFees: 100,
        passwordPlainText: 'iowa_password',
        jurisdictionSpecificFields: new Components\IowaFields(
            registrationType: Components\IowaRegistrationType::SalesTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Iowa',
            iaAccountType: Components\IowaAccountType::SalesTaxLicense,
            iaStateTaxPermitNumber: 'IA-PERMIT-123',
            idrNumber: '1234567890',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_kansas

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_kansas" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\KansasRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'KS',
        stateName: 'Kansas',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'kansas_user',
        amountFees: 100,
        passwordPlainText: 'kansas_password',
        jurisdictionSpecificFields: new Components\KansasFields(
            registrationType: Components\KansasRegistrationType::RetailersSalesTax,
            businessName: 'Acme Corp Kansas',
            ksStateTaxId: 'KS-TAX-001',
            accessCode: 'ks-access-secret',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_kentucky

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_kentucky" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'KY',
        stateName: 'Kentucky',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'kentucky_user',
        amountFees: 100,
        passwordPlainText: 'kentucky_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Kentucky',
            'ky_state_tax_id' => 'KY-12345678',
            'registered_via_sst' => false,
            'third_party_access_enabled' => true,
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_legacy

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_legacy" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'TX',
        stateName: 'Texas',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        comment: 'Registering for monthly sales tax filings',
        initialSync: false,
        amountFees: 100,
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_louisiana

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_louisiana" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'LA',
        stateName: 'Louisiana',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'louisiana_user',
        amountFees: 100,
        passwordPlainText: 'louisiana_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Louisiana',
            'la_state_tax_id' => '1234567890',
            'license_type' => 'DIRECT_MARKETER',
            'naics_code' => '454110',
            'registered_email_address' => 'louisiana@domain.com',
            'last_payment_to_state' => '0',
            'zip_code' => '70802',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_maine

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_maine" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\MaineRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'ME',
        stateName: 'Maine',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'maine_user',
        amountFees: 100,
        passwordPlainText: 'maine_password',
        jurisdictionSpecificFields: new Components\MaineFields(
            mfaCompleted: true,
            businessName: 'Acme Corp Maine',
            meStateTaxId: '12345678',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_maryland

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_maryland" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'MD',
        stateName: 'Maryland',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'maryland_user',
        amountFees: 100,
        passwordPlainText: 'maryland_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Maryland',
            'md_state_tax_id' => 'MD-12345678',
            'marketplace_facilitator' => false,
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_massachusetts

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_massachusetts" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\MassachusettsRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'MA',
        stateName: 'Massachusetts',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'massachusetts_user',
        amountFees: 100,
        passwordPlainText: 'massachusetts_password',
        jurisdictionSpecificFields: new Components\MassachusettsFields(
            registrationType: Components\MassachusettsRegistrationType::SalesTax,
            businessName: 'Acme Corp Massachusetts',
            maStateAccountId: 'MA-ACCT-001',
            mfaCompleted: true,
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_michigan

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_michigan" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\MichiganRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'MI',
        stateName: 'Michigan',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'michigan_user',
        amountFees: 100,
        passwordPlainText: 'michigan_password',
        jurisdictionSpecificFields: new Components\MichiganFields(
            registrationType: Components\MichiganRegistrationType::SalesTax,
            businessName: 'Acme Corp Michigan',
            miStateTaxId: 'MI-ACCT-001',
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: null

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_minnesota

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_minnesota" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\MinnesotaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'MN',
        stateName: 'Minnesota',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'minnesota_user',
        amountFees: 100,
        passwordPlainText: 'minnesota_password',
        jurisdictionSpecificFields: new Components\MinnesotaFields(
            mfaCompleted: true,
            businessName: 'Acme Corp Minnesota',
            mnStateTaxId: '1234567',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_mississippi

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_mississippi" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\MississippiRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'MS',
        stateName: 'Mississippi',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'mississippi_user',
        amountFees: 100,
        passwordPlainText: 'mississippi_password',
        jurisdictionSpecificFields: new Components\MississippiFields(
            registrationType: Components\MississippiRegistrationType::SalesAndUseTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Mississippi',
            msStateTaxId: '12345678',
            msAccountType: Components\MississippiAccountType::SalesTaxLicense,
            letterId: 'LTR-MS-001',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_missouri

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_missouri" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\MissouriRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'MO',
        stateName: 'Missouri',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'missouri_user',
        amountFees: 100,
        passwordPlainText: 'missouri_password',
        jurisdictionSpecificFields: new Components\MissouriFields(
            registrationType: Components\MissouriRegistrationType::SalesTax,
            businessName: 'Acme Corp Missouri',
            moStateTaxId: 'MO-ACCT-001',
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_nebraska

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_nebraska" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\NebraskaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'NE',
        stateName: 'Nebraska',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'nebraska_user',
        amountFees: 100,
        passwordPlainText: 'nebraska_password',
        jurisdictionSpecificFields: new Components\NebraskaFields(
            registrationType: Components\NebraskaRegistrationType::SalesTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Nebraska',
            neUserId: '12345678',
        ),
        pinPlainText: '12345',
    ),
    xOrganizationId: null

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_nevada

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_nevada" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'NV',
        stateName: 'Nevada',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'nevada_user',
        amountFees: 100,
        passwordPlainText: 'nevada_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Nevada',
            'nv_state_tax_id' => '12345678',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_new

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_new" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'TX',
        stateName: 'Texas',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        comment: 'Registering for monthly sales tax filings',
        initialSync: false,
        amountFees: 100,
    ),
    xOrganizationId: null

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_new_jersey

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_new_jersey" -->
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



$response = $sdk->registrations->create(
    requestBody: new Components\TennesseeRegistrationPayload(
        countryCode: Components\CountryCodeEnum::Sz,
        stateCode: '<value>',
        stateName: '<value>',
        filingFrequency: Components\FilingFrequencyEnum::SemiMonthly,
        jurisdictionSpecificFields: new Components\TennesseeFields(
            registrationType: Components\TennesseeRegistrationType::UseTax,
            businessName: '<value>',
            tnStateTaxId: '<id>',
            zipCode: '43158-4492',
            letterId: '<id>',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_new_mexico

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_new_mexico" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'NM',
        stateName: 'New Mexico',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'new_mexico_user',
        amountFees: 100,
        passwordPlainText: 'new_mexico_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'GROSS_RECEIPTS_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp New Mexico',
            'nm_state_tax_id' => '03-123456-001',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_new_york

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_new_york" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'NY',
        stateName: 'New York',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'new_york_user',
        amountFees: 100,
        passwordPlainText: 'new_york_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'business_name' => 'Acme Corp New York',
            'ny_state_tax_id' => '123456789',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_north_carolina

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_north_carolina" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'NC',
        stateName: 'North Carolina',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'north_carolina_user',
        amountFees: 100,
        passwordPlainText: 'north_carolina_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'business_name' => 'Acme Corp North Carolina',
            'nc_state_tax_id' => 'NC-ACCT-001',
            'contact_name' => 'Jane Smith',
            'contact_email' => 'jane.smith@example.com',
            'contact_phone' => '919-555-0100',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_north_dakota

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_north_dakota" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'ND',
        stateName: 'North Dakota',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'north_dakota_user',
        amountFees: 100,
        passwordPlainText: 'north_dakota_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp North Dakota',
            'nd_state_tax_id' => 'ND-123456',
            'letter_id' => 'L9999999999',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_ohio

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_ohio" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'OH',
        stateName: 'Ohio',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'ohio_user',
        amountFees: 100,
        passwordPlainText: 'ohio_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Ohio',
            'oh_state_tax_id' => '99-123456',
            'third_party_access_enabled' => true,
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_oklahoma

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_oklahoma" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'OK',
        stateName: 'Oklahoma',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'oklahoma_user',
        amountFees: 100,
        passwordPlainText: 'oklahoma_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Oklahoma',
            'ok_state_tax_id' => '1234567890',
            'zip_code' => '73102',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_pennsylvania

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_pennsylvania" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'PA',
        stateName: 'Pennsylvania',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'pennsylvania_user',
        amountFees: 100,
        passwordPlainText: 'pennsylvania_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Pennsylvania',
            'pa_state_tax_id' => '12345678',
            'account_type' => 'ACCOUNT_ID',
            'account_id' => '1234567890',
            'identification_type' => 'FEIN',
            'identification_number' => '12-3456789',
            'account_validation_method' => 'LETTER_ID',
            'account_validation_value' => 'L1234567890',
            'sales_and_use_account_id' => '12345678901',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_rhode_island

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_rhode_island" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'RI',
        stateName: 'Rhode Island',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'rhode_island_user',
        amountFees: 100,
        passwordPlainText: 'rhode_island_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp Rhode Island',
            'ri_state_tax_id' => 'RI-123456',
            'ri_sales_filing_id' => '123456789',
            'third_party_access_enabled' => true,
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_south_carolina

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_south_carolina" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'SC',
        stateName: 'South Carolina',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'south_carolina_user',
        amountFees: 100,
        passwordPlainText: 'south_carolina_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'RETAIL_SALES_TAX',
            'mfa_completed' => true,
            'business_name' => 'Acme Corp South Carolina',
            'sc_state_tax_id' => '12345678',
            'sc_sid' => '87654321',
            'letter_id' => 'L9999999999',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_south_dakota

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_south_dakota" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\RegistrationCreatePayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'SD',
        stateName: 'South Dakota',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'south_dakota_user',
        amountFees: 100,
        passwordPlainText: 'south_dakota_password',
        jurisdictionSpecificFields: [
            'registration_type' => 'SALES_AND_USE_TAX',
            'business_name' => 'Acme Corp South Dakota',
            'sd_state_tax_id' => '1234-5678-ST',
        ],
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_tennessee

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_tennessee" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\TennesseeRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'TN',
        stateName: 'Tennessee',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'tennessee_user',
        amountFees: 100,
        passwordPlainText: 'tennessee_password',
        jurisdictionSpecificFields: new Components\TennesseeFields(
            registrationType: Components\TennesseeRegistrationType::SalesTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Tennessee',
            tnStateTaxId: 'TN-ACCT-001',
            zipCode: '37201',
            letterId: 'L1234567890',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_texas

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_texas" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\TexasRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'TX',
        stateName: 'Texas',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'texas_user',
        amountFees: 100,
        passwordPlainText: 'texas_password',
        jurisdictionSpecificFields: new Components\TexasFields(
            registrationType: Components\TexasRegistrationType::SalesTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Texas',
            texasTaxpayerNumber: '12345678901',
            webfileNumber: 'RT888777',
            registeredLocationNumber: 'LOC-9',
            registeredAddress: '400 W Commerce St, Dallas TX 75208',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_utah

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_utah" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\UtahRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'UT',
        stateName: 'Utah',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'utah_user',
        amountFees: 100,
        passwordPlainText: 'utah_password',
        jurisdictionSpecificFields: new Components\UtahFields(
            registrationType: Components\UtahRegistrationType::SalesTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Utah',
            utStateTaxId: 'UT-9876543210',
        ),
        pinPlainText: '654321',
    ),
    xOrganizationId: null

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_vermont

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_vermont" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\VermontRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'VT',
        stateName: 'Vermont',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'vermont_user',
        amountFees: 100,
        passwordPlainText: 'vermont_password',
        jurisdictionSpecificFields: new Components\VermontFields(
            mfaCompleted: true,
            registrationType: Components\VermontRegistrationType::SalesTax,
            businessName: 'Acme Corp Vermont',
            vtStateTaxId: 'SUT-12345678',
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_virginia

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_virginia" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\VirginiaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'VA',
        stateName: 'Virginia',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'virginia_user',
        amountFees: 100,
        passwordPlainText: 'virginia_password',
        jurisdictionSpecificFields: new Components\VirginiaFields(
            registrationType: Components\VirginiaRegistrationType::RetailSalesTax,
            mfaCompleted: true,
            businessName: 'Acme Corp Virginia',
            vaStateTaxId: '54-9876543',
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_washington

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_washington" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\WashingtonRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'WA',
        stateName: 'Washington',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'washington_user',
        amountFees: 100,
        passwordPlainText: 'washington_password',
        jurisdictionSpecificFields: new Components\WashingtonFields(
            mfaCompleted: true,
            businessName: 'Acme Corp Washington',
            waStateTaxId: '600123456',
            exciseAccountLinked: true,
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_west_virginia

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_west_virginia" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\WestVirginiaRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'WV',
        stateName: 'West Virginia',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'west_virginia_user',
        amountFees: 100,
        passwordPlainText: 'west_virginia_password',
        jurisdictionSpecificFields: new Components\WestVirginiaFields(
            mfaCompleted: true,
            registrationType: Components\WestVirginiaRegistrationType::SalesAndUseTax,
            businessName: 'Acme Corp West Virginia',
            wvStateTaxId: 'WV-12345678',
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_wisconsin

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_wisconsin" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\WisconsinRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'WI',
        stateName: 'Wisconsin',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'wisconsin_user',
        amountFees: 100,
        passwordPlainText: 'wisconsin_password',
        jurisdictionSpecificFields: new Components\WisconsinFields(
            mfaCompleted: true,
            registrationType: Components\WisconsinRegistrationType::SalesAndUseTax,
            businessName: 'Acme Corp Wisconsin',
            wiStateTaxId: 'WI-12345678',
            thirdPartyAccessEnabled: true,
        ),
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: regular_wyoming

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="regular_wyoming" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->create(
    requestBody: new Components\WyomingRegistrationPayload(
        registrationDate: LocalDate::parse('2025-02-01'),
        registrationEmail: 'example@domain.com',
        autoRegistered: true,
        countryCode: Components\CountryCodeEnum::Us,
        stateCode: 'WY',
        stateName: 'Wyoming',
        filingFrequency: Components\FilingFrequencyEnum::Monthly,
        username: 'wyoming_user',
        amountFees: 100,
        passwordPlainText: 'wyoming_password',
        jurisdictionSpecificFields: new Components\WyomingFields(
            businessName: 'Acme Corp Wyoming',
            wyStateTaxId: 'WY-ACCT-001',
        ),
        pinPlainText: 'wy-pin-1234',
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```
### Example Usage: sst

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" example="sst" -->
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



$response = $sdk->registrations->create(
    requestBody: new Components\SSTRegistrationCreatePayload(
        passwordPlainText: 'sst_pass',
        passwordMetadataPlainText: '{"q":"a"}',
        username: 'sst_user',
    ),
    xOrganizationId: '<id>'

);

if ($response->registrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      | Type                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           | Required                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       | Description                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `requestBody`                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  | [Components\AlabamaRegistrationPayload\|Components\ArizonaRegistrationPayload\|Components\ArkansasRegistrationPayload\|Components\CaliforniaRegistrationPayload\|Components\ConnecticutRegistrationPayload\|Components\ColoradoRegistrationPayload\|Components\DistrictOfColumbiaRegistrationPayload\|Components\GeorgiaRegistrationPayload\|Components\HawaiiRegistrationPayload\|Components\IdahoRegistrationPayload\|Components\IllinoisRegistrationPayload\|Components\IndianaRegistrationPayload\|Components\IowaRegistrationPayload\|Components\KansasRegistrationPayload\|Components\MassachusettsRegistrationPayload\|Components\MississippiRegistrationPayload\|Components\MichiganRegistrationPayload\|Components\MissouriRegistrationPayload\|Components\TennesseeRegistrationPayload\|Components\TexasRegistrationPayload\|Components\UtahRegistrationPayload\|Components\VermontRegistrationPayload\|Components\VirginiaRegistrationPayload\|Components\WashingtonRegistrationPayload\|Components\WestVirginiaRegistrationPayload\|Components\WisconsinRegistrationPayload\|Components\MaineRegistrationPayload\|Components\MinnesotaRegistrationPayload\|Components\RegistrationCreatePayload\|Components\OSSRegistrationCreatePayload\|Components\SSTRegistrationCreatePayload\|Components\KentuckyRegistrationPayload\|Components\MarylandRegistrationPayload\|Components\NebraskaRegistrationPayload\|Components\NevadaRegistrationPayload\|Components\NewJerseyRegistrationPayload\|Components\NewMexicoRegistrationPayload\|Components\NewYorkRegistrationPayload\|Components\NorthDakotaRegistrationPayload\|Components\SouthCarolinaRegistrationPayload\|Components\OklahomaRegistrationPayload\|Components\LouisianaRegistrationPayload\|Components\OhioRegistrationPayload\|Components\PennsylvaniaRegistrationPayload\|Components\RhodeIslandRegistrationPayload\|Components\SouthDakotaRegistrationPayload\|Components\FloridaRegistrationPayload\|Components\NorthCarolinaRegistrationPayload\|Components\WyomingRegistrationPayload](../../Models/Operations/CreateRegistration.md) | :heavy_check_mark:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             | N/A                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            |
| `xOrganizationId`                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              | *string*                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       | :heavy_check_mark:                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             | N/A                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            |

### Response

**[?Operations\CreateRegistrationV1RegistrationsPostResponse](../../Models/Operations/CreateRegistrationV1RegistrationsPostResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401, 409                                                       | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |

## getJurisdictionSpecificFieldsV1RegistrationsJurisdictionSpecificFieldsGet

Returns the JSON Schema and UI metadata for a state-specific registration form

### Example Usage

<!-- UsageSnippet language="php" operationID="get_jurisdiction_specific_fields_v1_registrations_jurisdiction_specific_fields_get" method="get" path="/v1/registrations/jurisdiction-specific-fields" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->getJurisdictionSpecificFieldsV1RegistrationsJurisdictionSpecificFieldsGet(
    countryCode: 'MH',
    stateCode: '<value>',
    xOrganizationId: 'org_12345'

);

if ($response->jurisdictionSpecificFieldsResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                     | Type                                                          | Required                                                      | Description                                                   | Example                                                       |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| `countryCode`                                                 | *string*                                                      | :heavy_check_mark:                                            | ISO 3166-1 alpha-2 country code (e.g., US).                   |                                                               |
| `stateCode`                                                   | *string*                                                      | :heavy_check_mark:                                            | State/province code (e.g., AL, LA).                           |                                                               |
| `xOrganizationId`                                             | *string*                                                      | :heavy_check_mark:                                            | The unique identifier for the organization making the request | org_12345                                                     |

### Response

**[?Operations\GetJurisdictionSpecificFieldsV1RegistrationsJurisdictionSpecificFieldsGetResponse](../../Models/Operations/GetJurisdictionSpecificFieldsV1RegistrationsJurisdictionSpecificFieldsGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## listRegistrationJurisdictionsV1RegistrationsJurisdictionsGet

Distinct registration jurisdictions (country + state) for filter dropdowns. Non-SST only. Default status__in matches GET /registrations (all statuses).

### Example Usage

<!-- UsageSnippet language="php" operationID="list_registration_jurisdictions_v1_registrations_jurisdictions_get" method="get" path="/v1/registrations/jurisdictions" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->listRegistrationJurisdictionsV1RegistrationsJurisdictionsGet(
    statusIn: 'REGISTERED,PROCESSING,UNREGISTERED,DEREGISTERING,DEREGISTERED,CANCELLED,VALIDATING,AWAITING_CLARIFICATION,SELF_MANAGED',
    xOrganizationId: 'org_12345'

);

if ($response->responseListRegistrationJurisdictionsV1RegistrationsJurisdictionsGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                    | Type                                                                         | Required                                                                     | Description                                                                  | Example                                                                      |
| ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- | ---------------------------------------------------------------------------- |
| `statusIn`                                                                   | *?string*                                                                    | :heavy_minus_sign:                                                           | Filter by registration status (comma-separated); same as GET /registrations. |                                                                              |
| `xOrganizationId`                                                            | *string*                                                                     | :heavy_check_mark:                                                           | The unique identifier for the organization making the request                | org_12345                                                                    |

### Response

**[?Operations\ListRegistrationJurisdictionsV1RegistrationsJurisdictionsGetResponse](../../Models/Operations/ListRegistrationJurisdictionsV1RegistrationsJurisdictionsGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## getById

The Get Registration By ID API retrieves a single registration record
    based on its unique identifier.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_registration_by_id_v1_registrations__registration_id__get" method="get" path="/v1/registrations/{registration_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->getById(
    registrationId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->registrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                              | Type                                                                                   | Required                                                                               | Description                                                                            | Example                                                                                |
| -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| `registrationId`                                                                       | *string*                                                                               | :heavy_check_mark:                                                                     | The unique identifier of the<br/>                                registration to retrieve. |                                                                                        |
| `reveal`                                                                               | *?string*                                                                              | :heavy_minus_sign:                                                                     | Name of field to reveal                                                                |                                                                                        |
| `xOrganizationId`                                                                      | *string*                                                                               | :heavy_check_mark:                                                                     | The unique identifier for the organization making the request                          | org_12345                                                                              |

### Response

**[?Operations\GetRegistrationByIdV1RegistrationsRegistrationIdGetResponse](../../Models/Operations/GetRegistrationByIdV1RegistrationsRegistrationIdGetResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401                                                            | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |

## update

The Update Registration API allows you to modify
    an existing registration using its unique registration_id.

### Example Usage

<!-- UsageSnippet language="php" operationID="update_registration_v1_registrations__registration_id__put" method="put" path="/v1/registrations/{registration_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();

$registrationUpdateAPI = new Components\RegistrationUpdateAPI(
    registrationDate: LocalDate::parse('2025-03-01'),
    registrationEmail: 'example@domain.com',
    registrationRequested: Utils\Utils::parseDateTime('2025-02-18T19:43:32.684802'),
    autoRegistered: true,
    registrationsRegime: Components\RegistrationsRegimeEnum::Standard,
    changeRegimeStatus: Components\ChangeRegimeStatusEnum::Requested,
    username: 'User Name',
    filingFrequency: Components\FilingFrequencyEnum::Monthly,
    createFilingsFrom: LocalDate::parse('2025-03-01'),
    isApproaching: false,
    comment: 'Updated registration for compliance',
    vda: false,
);

$response = $sdk->registrations->update(
    registrationId: '<id>',
    registrationUpdateAPI: $registrationUpdateAPI,
    xOrganizationId: 'org_12345'

);

if ($response->registrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                            | Type                                                                                 | Required                                                                             | Description                                                                          | Example                                                                              |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `registrationId`                                                                     | *string*                                                                             | :heavy_check_mark:                                                                   | The unique identifier of the registration to be updated.                             |                                                                                      |
| `registrationUpdateAPI`                                                              | [Components\RegistrationUpdateAPI](../../Models/Components/RegistrationUpdateAPI.md) | :heavy_check_mark:                                                                   | N/A                                                                                  |                                                                                      |
| `xOrganizationId`                                                                    | *string*                                                                             | :heavy_check_mark:                                                                   | The unique identifier for the organization making the request                        | org_12345                                                                            |

### Response

**[?Operations\UpdateRegistrationV1RegistrationsRegistrationIdPutResponse](../../Models/Operations/UpdateRegistrationV1RegistrationsRegistrationIdPutResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401                                                            | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |

## uploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost

Upload an attachment for a specific registration.

### Example Usage

<!-- UsageSnippet language="php" operationID="upload_registration_attachment_v1_registrations__registration_id__attachments_post" method="post" path="/v1/registrations/{registration_id}/attachments" -->
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

$bodyUploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost = new Components\BodyUploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost(
    file: '<value>',
);

$response = $sdk->registrations->uploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost(
    registrationId: '<id>',
    bodyUploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost: $bodyUploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost,
    xOrganizationId: 'org_12345'

);

if ($response->attachment !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                          | Type                                                                                                                                                                                               | Required                                                                                                                                                                                           | Description                                                                                                                                                                                        | Example                                                                                                                                                                                            |
| -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `registrationId`                                                                                                                                                                                   | *string*                                                                                                                                                                                           | :heavy_check_mark:                                                                                                                                                                                 | N/A                                                                                                                                                                                                |                                                                                                                                                                                                    |
| `bodyUploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost`                                                                                                                     | [Components\BodyUploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost](../../Models/Components/BodyUploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPost.md) | :heavy_check_mark:                                                                                                                                                                                 | N/A                                                                                                                                                                                                |                                                                                                                                                                                                    |
| `xOrganizationId`                                                                                                                                                                                  | *string*                                                                                                                                                                                           | :heavy_check_mark:                                                                                                                                                                                 | The unique identifier for the organization making the request                                                                                                                                      | org_12345                                                                                                                                                                                          |

### Response

**[?Operations\UploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPostResponse](../../Models/Operations/UploadRegistrationAttachmentV1RegistrationsRegistrationIdAttachmentsPostResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## deregister

Deregister an existing registration.

### Example Usage

<!-- UsageSnippet language="php" operationID="deregister_registration_v1_registrations__registration_id__deregister_post" method="post" path="/v1/registrations/{registration_id}/deregister" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->deregister(
    registrationId: 'regs_123456',
    xOrganizationId: 'org_12345'

);

if ($response->registrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                     | Type                                                          | Required                                                      | Description                                                   | Example                                                       |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| `registrationId`                                              | *string*                                                      | :heavy_check_mark:                                            | The unique identifier of the registration to deregister.      | regs_123456                                                   |
| `xOrganizationId`                                             | *string*                                                      | :heavy_check_mark:                                            | The unique identifier for the organization making the request | org_12345                                                     |

### Response

**[?Operations\DeregisterRegistrationV1RegistrationsRegistrationIdDeregisterPostResponse](../../Models/Operations/DeregisterRegistrationV1RegistrationsRegistrationIdDeregisterPostResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401                                                            | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |

## getOssCountriesForRegistrationV1RegistrationsRegistrationIdOssCountriesGet

Get all OSS countries for a specific registration. This endpoint returns
    a list of EU countries that are covered by the OSS registration.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_oss_countries_for_registration_v1_registrations__registration_id__oss_countries_get" method="get" path="/v1/registrations/{registration_id}/oss-countries" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->registrations->getOssCountriesForRegistrationV1RegistrationsRegistrationIdOssCountriesGet(
    registrationId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->responseGetOssCountriesForRegistrationV1RegistrationsRegistrationIdOssCountriesGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                     | Type                                                          | Required                                                      | Description                                                   | Example                                                       |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| `registrationId`                                              | *string*                                                      | :heavy_check_mark:                                            | The unique identifier of the registration.                    |                                                               |
| `xOrganizationId`                                             | *string*                                                      | :heavy_check_mark:                                            | The unique identifier for the organization making the request | org_12345                                                     |

### Response

**[?Operations\GetOssCountriesForRegistrationV1RegistrationsRegistrationIdOssCountriesGetResponse](../../Models/Operations/GetOssCountriesForRegistrationV1RegistrationsRegistrationIdOssCountriesGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |