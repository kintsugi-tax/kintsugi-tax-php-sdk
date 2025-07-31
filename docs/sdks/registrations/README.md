# Registrations
(*registrations*)

## Overview

### Available Operations

* [getRegistrationsV1RegistrationsGet](#getregistrationsv1registrationsget) - Get Registrations
* [createRegistrationV1RegistrationsPost](#createregistrationv1registrationspost) - Create Registration
* [getRegistrationByIdV1RegistrationsRegistrationIdGet](#getregistrationbyidv1registrationsregistrationidget) - Get Registration By Id
* [updateRegistrationV1RegistrationsRegistrationIdPut](#updateregistrationv1registrationsregistrationidput) - Update Registration
* [deregisterRegistrationV1RegistrationsRegistrationIdDeregisterPost](#deregisterregistrationv1registrationsregistrationidderegisterpost) - Deregister Registration

## getRegistrationsV1RegistrationsGet

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

$request = new Operations\GetRegistrationsV1RegistrationsGetRequest();

$response = $sdk->registrations->getRegistrationsV1RegistrationsGet(
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

## createRegistrationV1RegistrationsPost

The Create Registration API allows users to create a new registration
    for tracking and managing tax filings efficiently across multiple jurisdictions.

### Example Usage

<!-- UsageSnippet language="php" operationID="create_registration_v1_registrations_post" method="post" path="/v1/registrations" -->
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

$request = new Components\OSSRegistrationCreatePayload();

$response = $sdk->registrations->createRegistrationV1RegistrationsPost(
    request: $request
);

if ($response->registrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                                                             | Type                                                                                                                                                                  | Required                                                                                                                                                              | Description                                                                                                                                                           |
| --------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                                                            | [Components\RegistrationCreatePayload\|Components\OSSRegistrationCreatePayload\|Components\SSTRegistrationCreatePayload](../../Models/Operations/CreateRegistration.md) | :heavy_check_mark:                                                                                                                                                    | The request object to use for the request.                                                                                                                            |

### Response

**[?Operations\CreateRegistrationV1RegistrationsPostResponse](../../Models/Operations/CreateRegistrationV1RegistrationsPostResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401, 409                                                       | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |

## getRegistrationByIdV1RegistrationsRegistrationIdGet

The Get Registration By ID API retrieves a single registration record
    based on its unique identifier.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_registration_by_id_v1_registrations__registration_id__get" method="get" path="/v1/registrations/{registration_id}" -->
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



$response = $sdk->registrations->getRegistrationByIdV1RegistrationsRegistrationIdGet(
    registrationId: '<id>'
);

if ($response->registrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                              | Type                                                                                   | Required                                                                               | Description                                                                            |
| -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| `registrationId`                                                                       | *string*                                                                               | :heavy_check_mark:                                                                     | The unique identifier of the<br/>                                registration to retrieve. |

### Response

**[?Operations\GetRegistrationByIdV1RegistrationsRegistrationIdGetResponse](../../Models/Operations/GetRegistrationByIdV1RegistrationsRegistrationIdGetResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401                                                            | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |

## updateRegistrationV1RegistrationsRegistrationIdPut

The Update Registration API allows you to modify
    an existing registration using its unique registration_id.

### Example Usage

<!-- UsageSnippet language="php" operationID="update_registration_v1_registrations__registration_id__put" method="put" path="/v1/registrations/{registration_id}" -->
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

$registrationUpdateAPI = new Components\RegistrationUpdateAPI(
    registrationDate: '2025-03-01',
    registrationEmail: 'example@domain.com',
    registrationKey: 'REG-123456',
    registrationRequested: '2025-02-18T19:43:32.684802',
    autoRegistered: true,
    registrationsRegime: Components\RegistrationsRegimeEnum::Standard,
    changeRegimeStatus: Components\ChangeRegimeStatusEnum::Requested,
    username: 'User Name',
    filingFrequency: Components\FilingFrequencyEnum::Monthly,
    createFilingsFrom: '2025-03-01',
    isApproaching: false,
    comment: 'Updated registration for compliance',
    vda: false,
);

$response = $sdk->registrations->updateRegistrationV1RegistrationsRegistrationIdPut(
    registrationId: '<id>',
    registrationUpdateAPI: $registrationUpdateAPI

);

if ($response->registrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                            | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `registrationId`                                                                     | *string*                                                                             | :heavy_check_mark:                                                                   | The unique identifier of the registration to be updated.                             |
| `registrationUpdateAPI`                                                              | [Components\RegistrationUpdateAPI](../../Models/Components/RegistrationUpdateAPI.md) | :heavy_check_mark:                                                                   | N/A                                                                                  |

### Response

**[?Operations\UpdateRegistrationV1RegistrationsRegistrationIdPutResponse](../../Models/Operations/UpdateRegistrationV1RegistrationsRegistrationIdPutResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401                                                            | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |

## deregisterRegistrationV1RegistrationsRegistrationIdDeregisterPost

Deregister an existing registration.

### Example Usage

<!-- UsageSnippet language="php" operationID="deregister_registration_v1_registrations__registration_id__deregister_post" method="post" path="/v1/registrations/{registration_id}/deregister" -->
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



$response = $sdk->registrations->deregisterRegistrationV1RegistrationsRegistrationIdDeregisterPost(
    registrationId: 'regs_123456'
);

if ($response->registrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                | Type                                                     | Required                                                 | Description                                              | Example                                                  |
| -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- | -------------------------------------------------------- |
| `registrationId`                                         | *string*                                                 | :heavy_check_mark:                                       | The unique identifier of the registration to deregister. | regs_123456                                              |

### Response

**[?Operations\DeregisterRegistrationV1RegistrationsRegistrationIdDeregisterPostResponse](../../Models/Operations/DeregisterRegistrationV1RegistrationsRegistrationIdDeregisterPostResponse.md)**

### Errors

| Error Type                                                     | Status Code                                                    | Content Type                                                   |
| -------------------------------------------------------------- | -------------------------------------------------------------- | -------------------------------------------------------------- |
| Errors\ErrorResponse                                           | 401                                                            | application/json                                               |
| Errors\BackendSrcRegistrationsResponsesValidationErrorResponse | 422                                                            | application/json                                               |
| Errors\ErrorResponse                                           | 500                                                            | application/json                                               |
| Errors\APIException                                            | 4XX, 5XX                                                       | \*/\*                                                          |