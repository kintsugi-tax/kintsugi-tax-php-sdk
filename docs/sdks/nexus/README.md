# Nexus

## Overview

### Available Operations

* [list](#list) - Get nexus for org
* [listPhysical](#listphysical) - Get physical nexus
* [createPhysical](#createphysical) - Create physical nexus
* [getPhysicalNexusCategoriesV1NexusPhysicalNexusCategoriesGet](#getphysicalnexuscategoriesv1nexusphysicalnexuscategoriesget) - Get physical nexus categories
* [delete](#delete) - Delete physical nexus
* [updatePhysical](#updatephysical) - Update physical nexus
* [getNexusDetailsForIdV1NexusNexusIdGet](#getnexusdetailsforidv1nexusnexusidget) - Get nexus details for id

## list

Get a list of all nexuses for the organization.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_nexus_for_org_v1_nexus_get" method="get" path="/v1/nexus" -->
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

$request = new Operations\GetNexusForOrgV1NexusGetRequest(
    statusIn: 'APPROACHING,NOT_EXPOSED,PENDING_REGISTRATION,EXPOSED,APPROACHING,REGISTERED',
    orderBy: 'state_code,country_code',
    xOrganizationId: 'org_12345',
);

$response = $sdk->nexus->list(
    request: $request
);

if ($response->responseGetNexusForOrgV1NexusGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                | Type                                                                                                     | Required                                                                                                 | Description                                                                                              |
| -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                               | [Operations\GetNexusForOrgV1NexusGetRequest](../../Models/Operations/GetNexusForOrgV1NexusGetRequest.md) | :heavy_check_mark:                                                                                       | The request object to use for the request.                                                               |

### Response

**[?Operations\GetNexusForOrgV1NexusGetResponse](../../Models/Operations/GetNexusForOrgV1NexusGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## listPhysical

Retrieve a paginated list of
    physical nexuses for a specific organization.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_physical_nexus_v1_nexus_physical_nexus_get" method="get" path="/v1/nexus/physical_nexus" -->
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

$request = new Operations\GetPhysicalNexusV1NexusPhysicalNexusGetRequest(
    orderBy: 'country_code,state_code,start_date,end_date',
    xOrganizationId: 'org_12345',
);

$response = $sdk->nexus->listPhysical(
    request: $request
);

if ($response->pagePhysicalNexusRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                                              | Type                                                                                                                                   | Required                                                                                                                               | Description                                                                                                                            |
| -------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| `$request`                                                                                                                             | [Operations\GetPhysicalNexusV1NexusPhysicalNexusGetRequest](../../Models/Operations/GetPhysicalNexusV1NexusPhysicalNexusGetRequest.md) | :heavy_check_mark:                                                                                                                     | The request object to use for the request.                                                                                             |

### Response

**[?Operations\GetPhysicalNexusV1NexusPhysicalNexusGetResponse](../../Models/Operations/GetPhysicalNexusV1NexusPhysicalNexusGetResponse.md)**

### Errors

| Error Type                                             | Status Code                                            | Content Type                                           |
| ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ |
| Errors\ErrorResponse                                   | 401, 404                                               | application/json                                       |
| Errors\BackendSrcNexusResponsesValidationErrorResponse | 422                                                    | application/json                                       |
| Errors\ErrorResponse                                   | 500                                                    | application/json                                       |
| Errors\APIException                                    | 4XX, 5XX                                               | \*/\*                                                  |

## createPhysical

The Create Physical Nexus API allows you to create a new physical
    nexus by specifying its attributes, including the location,
    start date, end date, etc.

### Example Usage

<!-- UsageSnippet language="php" operationID="create_physical_nexus_v1_nexus_physical_nexus_post" method="post" path="/v1/nexus/physical_nexus" -->
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

$physicalNexusCreate = new Components\PhysicalNexusCreate(
    countryCode: Components\CountryCodeEnum::Us,
    stateCode: 'CA',
    startDate: LocalDate::parse('2024-01-01'),
    endDate: LocalDate::parse('2025-01-01'),
    category: Components\PhysicalNexusCategory::PhysicalBusinessLocation,
    externalId: 'ext_ABC123',
    source: Components\PhysicalNexusSource::User,
    street1: '123 Main Street',
    street2: 'Suite 100',
    city: 'San Francisco',
    postalCode: '94102',
);

$response = $sdk->nexus->createPhysical(
    physicalNexusCreate: $physicalNexusCreate,
    xOrganizationId: 'org_12345'

);

if ($response->physicalNexusRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                        | Type                                                                             | Required                                                                         | Description                                                                      | Example                                                                          |
| -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- | -------------------------------------------------------------------------------- |
| `physicalNexusCreate`                                                            | [Components\PhysicalNexusCreate](../../Models/Components/PhysicalNexusCreate.md) | :heavy_check_mark:                                                               | N/A                                                                              |                                                                                  |
| `xOrganizationId`                                                                | *string*                                                                         | :heavy_check_mark:                                                               | The unique identifier for the organization making the request                    | org_12345                                                                        |

### Response

**[?Operations\CreatePhysicalNexusV1NexusPhysicalNexusPostResponse](../../Models/Operations/CreatePhysicalNexusV1NexusPhysicalNexusPostResponse.md)**

### Errors

| Error Type                                             | Status Code                                            | Content Type                                           |
| ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ |
| Errors\ErrorResponse                                   | 401                                                    | application/json                                       |
| Errors\BackendSrcNexusResponsesValidationErrorResponse | 422                                                    | application/json                                       |
| Errors\ErrorResponse                                   | 500                                                    | application/json                                       |
| Errors\APIException                                    | 4XX, 5XX                                               | \*/\*                                                  |

## getPhysicalNexusCategoriesV1NexusPhysicalNexusCategoriesGet

Get physical nexus categories

### Example Usage

<!-- UsageSnippet language="php" operationID="get_physical_nexus_categories_v1_nexus_physical_nexus_categories_get" method="get" path="/v1/nexus/physical_nexus/categories" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->nexus->getPhysicalNexusCategoriesV1NexusPhysicalNexusCategoriesGet(
    xOrganizationId: 'org_12345'
);

if ($response->responseGetPhysicalNexusCategoriesV1NexusPhysicalNexusCategoriesGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                 | Type                                                                      | Required                                                                  | Description                                                               | Example                                                                   |
| ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- |
| `countryCode`                                                             | [?Components\CountryCodeEnum](../../Models/Components/CountryCodeEnum.md) | :heavy_minus_sign:                                                        | N/A                                                                       |                                                                           |
| `stateCode`                                                               | *?string*                                                                 | :heavy_minus_sign:                                                        | N/A                                                                       |                                                                           |
| `xOrganizationId`                                                         | *string*                                                                  | :heavy_check_mark:                                                        | The unique identifier for the organization making the request             | org_12345                                                                 |

### Response

**[?Operations\GetPhysicalNexusCategoriesV1NexusPhysicalNexusCategoriesGetResponse](../../Models/Operations/GetPhysicalNexusCategoriesV1NexusPhysicalNexusCategoriesGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |

## delete

The Delete Physical Nexus API allows you to remove an existing
    physical nexus by its unique ID.

### Example Usage

<!-- UsageSnippet language="php" operationID="delete_physical_nexus_v1_nexus_physical_nexus__physical_nexus_id__delete" method="delete" path="/v1/nexus/physical_nexus/{physical_nexus_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->nexus->delete(
    physicalNexusId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->any !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                              | Type                                                                                   | Required                                                                               | Description                                                                            | Example                                                                                |
| -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| `physicalNexusId`                                                                      | *string*                                                                               | :heavy_check_mark:                                                                     | The unique identifier of the physical<br/>                                nexus to delete. |                                                                                        |
| `xOrganizationId`                                                                      | *string*                                                                               | :heavy_check_mark:                                                                     | The unique identifier for the organization making the request                          | org_12345                                                                              |

### Response

**[?Operations\DeletePhysicalNexusV1NexusPhysicalNexusPhysicalNexusIdDeleteResponse](../../Models/Operations/DeletePhysicalNexusV1NexusPhysicalNexusPhysicalNexusIdDeleteResponse.md)**

### Errors

| Error Type                                             | Status Code                                            | Content Type                                           |
| ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ |
| Errors\ErrorResponse                                   | 401, 404                                               | application/json                                       |
| Errors\BackendSrcNexusResponsesValidationErrorResponse | 422                                                    | application/json                                       |
| Errors\ErrorResponse                                   | 500                                                    | application/json                                       |
| Errors\APIException                                    | 4XX, 5XX                                               | \*/\*                                                  |

## updatePhysical

The Update Physical Nexus API allows you to modify the details of
    an existing physical nexus by its unique ID.

### Example Usage

<!-- UsageSnippet language="php" operationID="update_physical_nexus_v1_nexus_physical_nexus__physical_nexus_id__put" method="put" path="/v1/nexus/physical_nexus/{physical_nexus_id}" -->
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

$physicalNexusUpdate = new Components\PhysicalNexusUpdate(
    startDate: LocalDate::parse('2024-01-01'),
    endDate: LocalDate::parse('2025-01-01'),
    category: Components\PhysicalNexusCategory::PhysicalBusinessLocation,
    street1: '123 Main Street',
    street2: 'Suite 100',
    city: 'San Francisco',
    postalCode: '94102',
);

$response = $sdk->nexus->updatePhysical(
    physicalNexusId: '<id>',
    physicalNexusUpdate: $physicalNexusUpdate,
    xOrganizationId: 'org_12345'

);

if ($response->physicalNexusRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                              | Type                                                                                   | Required                                                                               | Description                                                                            | Example                                                                                |
| -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| `physicalNexusId`                                                                      | *string*                                                                               | :heavy_check_mark:                                                                     | The unique identifier of the physical<br/>                                nexus to update. |                                                                                        |
| `physicalNexusUpdate`                                                                  | [Components\PhysicalNexusUpdate](../../Models/Components/PhysicalNexusUpdate.md)       | :heavy_check_mark:                                                                     | N/A                                                                                    |                                                                                        |
| `xOrganizationId`                                                                      | *string*                                                                               | :heavy_check_mark:                                                                     | The unique identifier for the organization making the request                          | org_12345                                                                              |

### Response

**[?Operations\UpdatePhysicalNexusV1NexusPhysicalNexusPhysicalNexusIdPutResponse](../../Models/Operations/UpdatePhysicalNexusV1NexusPhysicalNexusPhysicalNexusIdPutResponse.md)**

### Errors

| Error Type                                             | Status Code                                            | Content Type                                           |
| ------------------------------------------------------ | ------------------------------------------------------ | ------------------------------------------------------ |
| Errors\ErrorResponse                                   | 401, 404                                               | application/json                                       |
| Errors\BackendSrcNexusResponsesValidationErrorResponse | 422                                                    | application/json                                       |
| Errors\ErrorResponse                                   | 500                                                    | application/json                                       |
| Errors\APIException                                    | 4XX, 5XX                                               | \*/\*                                                  |

## getNexusDetailsForIdV1NexusNexusIdGet

Get details for a specific nexus by its ID.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_nexus_details_for_id_v1_nexus__nexus_id__get" method="get" path="/v1/nexus/{nexus_id}" -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use KintsugiTax\SDK;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        '<YOUR_API_KEY_HERE>'
    )
    ->build();



$response = $sdk->nexus->getNexusDetailsForIdV1NexusNexusIdGet(
    nexusId: '<id>',
    xOrganizationId: 'org_12345'

);

if ($response->nexusResponse !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                     | Type                                                          | Required                                                      | Description                                                   | Example                                                       |
| ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- | ------------------------------------------------------------- |
| `nexusId`                                                     | *string*                                                      | :heavy_check_mark:                                            | The unique identifier of the nexus.                           |                                                               |
| `xOrganizationId`                                             | *string*                                                      | :heavy_check_mark:                                            | The unique identifier for the organization making the request | org_12345                                                     |

### Response

**[?Operations\GetNexusDetailsForIdV1NexusNexusIdGetResponse](../../Models/Operations/GetNexusDetailsForIdV1NexusNexusIdGetResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |