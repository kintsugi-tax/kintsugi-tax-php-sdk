# Exemptions
(*exemptions*)

## Overview

### Available Operations

* [list](#list) - Get Exemptions
* [create](#create) - Create Exemption
* [get](#get) - Get Exemption By Id
* [uploadCertificate](#uploadcertificate) - Upload Exemption Certificate
* [getAttachments](#getattachments) - Get Attachments For Exemption

## list

Retrieve a list of exemptions based on filters.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_exemptions_v1_exemptions_get" method="get" path="/v1/exemptions" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();

$request = new Operations\GetExemptionsV1ExemptionsGetRequest(
    searchQuery: 'John',
    countryCode: [
        'U',
        'S',
    ],
    jurisdiction: 'CA',
    startDate: LocalDate::parse('2024-01-01'),
    endDate: LocalDate::parse('2024-01-01'),
    customerId: 'cust_1234',
    transactionId: 'trans_1234',
    xOrganizationId: 'org_12345',
);
$requestSecurity = new Operations\GetExemptionsV1ExemptionsGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->exemptions->list(
    request: $request,
    security: $requestSecurity
);

if ($response->fastapiPaginationDefaultPageExemptionRead2 !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                          | Type                                                                                                               | Required                                                                                                           | Description                                                                                                        |
| ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------ |
| `$request`                                                                                                         | [Operations\GetExemptionsV1ExemptionsGetRequest](../../Models/Operations/GetExemptionsV1ExemptionsGetRequest.md)   | :heavy_check_mark:                                                                                                 | The request object to use for the request.                                                                         |
| `security`                                                                                                         | [Operations\GetExemptionsV1ExemptionsGetSecurity](../../Models/Operations/GetExemptionsV1ExemptionsGetSecurity.md) | :heavy_check_mark:                                                                                                 | The security requirements to use for the request.                                                                  |

### Response

**[?Operations\GetExemptionsV1ExemptionsGetResponse](../../Models/Operations/GetExemptionsV1ExemptionsGetResponse.md)**

### Errors

| Error Type                                                  | Status Code                                                 | Content Type                                                |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| Errors\ErrorResponse                                        | 401                                                         | application/json                                            |
| Errors\BackendSrcExemptionsResponsesValidationErrorResponse | 422                                                         | application/json                                            |
| Errors\ErrorResponse                                        | 500                                                         | application/json                                            |
| Errors\APIException                                         | 4XX, 5XX                                                    | \*/\*                                                       |

## create

The Create Exemption API allows you to create a new exemption record.
    This includes defining details such as exemption type, jurisdiction,
    Country, State, validity dates, etc.

### Example Usage

<!-- UsageSnippet language="php" operationID="create_exemption_v1_exemptions_post" method="post" path="/v1/exemptions" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();

$exemptionCreate = new Components\ExemptionCreate(
    exemptionType: Components\ExemptionType::Wholesale,
    jurisdiction: 'CA',
    countryCode: Components\CountryCodeEnum::Us,
    startDate: LocalDate::parse('2024-01-01'),
    endDate: LocalDate::parse('2026-01-01'),
    customerId: 'cust_001',
    transactionId: 'txn_123',
    reseller: true,
    fein: '12-3456789',
    salesTaxId: 'ST-98765',
    status: Components\ExemptionStatus::Active,
);
$requestSecurity = new Operations\CreateExemptionV1ExemptionsPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->exemptions->create(
    security: $requestSecurity,
    xOrganizationId: 'org_12345',
    exemptionCreate: $exemptionCreate

);

if ($response->backendSrcExemptionsSerializersExemptionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                | Type                                                                                                                     | Required                                                                                                                 | Description                                                                                                              | Example                                                                                                                  |
| ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------ |
| `security`                                                                                                               | [Operations\CreateExemptionV1ExemptionsPostSecurity](../../Models/Operations/CreateExemptionV1ExemptionsPostSecurity.md) | :heavy_check_mark:                                                                                                       | The security requirements to use for the request.                                                                        |                                                                                                                          |
| `xOrganizationId`                                                                                                        | *string*                                                                                                                 | :heavy_check_mark:                                                                                                       | The unique identifier for the organization making the request                                                            | org_12345                                                                                                                |
| `exemptionCreate`                                                                                                        | [Components\ExemptionCreate](../../Models/Components/ExemptionCreate.md)                                                 | :heavy_check_mark:                                                                                                       | N/A                                                                                                                      |                                                                                                                          |

### Response

**[?Operations\CreateExemptionV1ExemptionsPostResponse](../../Models/Operations/CreateExemptionV1ExemptionsPostResponse.md)**

### Errors

| Error Type                                                  | Status Code                                                 | Content Type                                                |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| Errors\ErrorResponse                                        | 401                                                         | application/json                                            |
| Errors\BackendSrcExemptionsResponsesValidationErrorResponse | 422                                                         | application/json                                            |
| Errors\ErrorResponse                                        | 500                                                         | application/json                                            |
| Errors\APIException                                         | 4XX, 5XX                                                    | \*/\*                                                       |

## get

The Get Exemption By ID API retrieves a specific exemption record by
    its unique ID. This API is useful for retrieving detailed information
    about a particular exemption, including its associated
    customer, organisation id, status, etc.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_exemption_by_id_v1_exemptions__exemption_id__get" method="get" path="/v1/exemptions/{exemption_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();


$requestSecurity = new Operations\GetExemptionByIdV1ExemptionsExemptionIdGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->exemptions->get(
    security: $requestSecurity,
    exemptionId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->backendSrcExemptionsModelsExemptionRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                      | Type                                                                                                                                           | Required                                                                                                                                       | Description                                                                                                                                    | Example                                                                                                                                        |
| ---------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                     | [Operations\GetExemptionByIdV1ExemptionsExemptionIdGetSecurity](../../Models/Operations/GetExemptionByIdV1ExemptionsExemptionIdGetSecurity.md) | :heavy_check_mark:                                                                                                                             | The security requirements to use for the request.                                                                                              |                                                                                                                                                |
| `exemptionId`                                                                                                                                  | *string*                                                                                                                                       | :heavy_check_mark:                                                                                                                             | The unique identifier for the exemption being retrieved.                                                                                       |                                                                                                                                                |
| `xOrganizationId`                                                                                                                              | *string*                                                                                                                                       | :heavy_check_mark:                                                                                                                             | The unique identifier for the organization making the request                                                                                  | org_12345                                                                                                                                      |

### Response

**[?Operations\GetExemptionByIdV1ExemptionsExemptionIdGetResponse](../../Models/Operations/GetExemptionByIdV1ExemptionsExemptionIdGetResponse.md)**

### Errors

| Error Type                                                  | Status Code                                                 | Content Type                                                |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| Errors\ErrorResponse                                        | 404                                                         | application/json                                            |
| Errors\BackendSrcExemptionsResponsesValidationErrorResponse | 422                                                         | application/json                                            |
| Errors\ErrorResponse                                        | 500                                                         | application/json                                            |
| Errors\APIException                                         | 4XX, 5XX                                                    | \*/\*                                                       |

## uploadCertificate

The Upload Exemption Certificate API allows you
    to upload a file attachment (e.g., exemption certificate) for a specific exemption.
    This is primarily used to associate supporting documents with an exemption record
    to ensure compliance and facilitate verification.

### Example Usage

<!-- UsageSnippet language="php" operationID="upload_exemption_certificate_v1_exemptions__exemption_id__attachments_post" method="post" path="/v1/exemptions/{exemption_id}/attachments" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();

$bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost = new Components\BodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost(
    file: new Components\File(
        fileName: 'example.file',
        content: file_get_contents('example.file');,
    ),
);
$requestSecurity = new Operations\UploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPostSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->exemptions->uploadCertificate(
    security: $requestSecurity,
    exemptionId: '<id>',
    xOrganizationId: 'org_12345',
    bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost: $bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost

);

if ($response->attachmentRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                  | Type                                                                                                                                                                                       | Required                                                                                                                                                                                   | Description                                                                                                                                                                                | Example                                                                                                                                                                                    |
| ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `security`                                                                                                                                                                                 | [Operations\UploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPostSecurity](../../Models/Operations/UploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPostSecurity.md) | :heavy_check_mark:                                                                                                                                                                         | The security requirements to use for the request.                                                                                                                                          |                                                                                                                                                                                            |
| `exemptionId`                                                                                                                                                                              | *string*                                                                                                                                                                                   | :heavy_check_mark:                                                                                                                                                                         | The unique identifier for the exemption to which the attachment will be associated.                                                                                                        |                                                                                                                                                                                            |
| `xOrganizationId`                                                                                                                                                                          | *string*                                                                                                                                                                                   | :heavy_check_mark:                                                                                                                                                                         | The unique identifier for the organization making the request                                                                                                                              | org_12345                                                                                                                                                                                  |
| `bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost`                                                                                                                     | [Components\BodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost](../../Models/Components/BodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost.md)         | :heavy_check_mark:                                                                                                                                                                         | N/A                                                                                                                                                                                        |                                                                                                                                                                                            |

### Response

**[?Operations\UploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPostResponse](../../Models/Operations/UploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPostResponse.md)**

### Errors

| Error Type                                                  | Status Code                                                 | Content Type                                                |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| Errors\ErrorResponse                                        | 401                                                         | application/json                                            |
| Errors\BackendSrcExemptionsResponsesValidationErrorResponse | 422                                                         | application/json                                            |
| Errors\ErrorResponse                                        | 500                                                         | application/json                                            |
| Errors\APIException                                         | 4XX, 5XX                                                    | \*/\*                                                       |

## getAttachments

The Get Attachments for Exemption API retrieves all
    attachments associated with a specific exemption.
    This is used to view and manage supporting documents
    like exemption certificates uploaded for a particular exemption record.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_attachments_for_exemption_v1_exemptions__exemption_id__attachments_get" method="get" path="/v1/exemptions/{exemption_id}/attachments" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;
use KintsugiTax\SDK\Models\Operations;

$sdk = SDK\SDK::builder()->build();


$requestSecurity = new Operations\GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGetSecurity(
    apiKeyHeader: '<YOUR_API_KEY_HERE>',
);

$response = $sdk->exemptions->getAttachments(
    security: $requestSecurity,
    exemptionId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->response200GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                                                | Type                                                                                                                                                                                     | Required                                                                                                                                                                                 | Description                                                                                                                                                                              | Example                                                                                                                                                                                  |
| ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `security`                                                                                                                                                                               | [Operations\GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGetSecurity](../../Models/Operations/GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGetSecurity.md) | :heavy_check_mark:                                                                                                                                                                       | The security requirements to use for the request.                                                                                                                                        |                                                                                                                                                                                          |
| `exemptionId`                                                                                                                                                                            | *string*                                                                                                                                                                                 | :heavy_check_mark:                                                                                                                                                                       | The unique identifier for the exemption<br/>        whose attachments are being retrieved.                                                                                               |                                                                                                                                                                                          |
| `xOrganizationId`                                                                                                                                                                        | *string*                                                                                                                                                                                 | :heavy_check_mark:                                                                                                                                                                       | The unique identifier for the organization making the request                                                                                                                            | org_12345                                                                                                                                                                                |

### Response

**[?Operations\GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGetResponse](../../Models/Operations/GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGetResponse.md)**

### Errors

| Error Type                                                  | Status Code                                                 | Content Type                                                |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| Errors\ErrorResponse                                        | 401                                                         | application/json                                            |
| Errors\BackendSrcExemptionsResponsesValidationErrorResponse | 422                                                         | application/json                                            |
| Errors\APIException                                         | 4XX, 5XX                                                    | \*/\*                                                       |