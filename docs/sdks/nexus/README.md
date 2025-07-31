# Nexus
(*nexus*)

## Overview

### Available Operations

* [list](#list) - Get Nexus For Org

## list

Get a list of all nexuses for the organization.

### Example Usage

<!-- UsageSnippet language="php" operationID="get_nexus_for_org_v1_nexus_get" method="get" path="/v1/nexus" -->
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

$request = new Operations\GetNexusForOrgV1NexusGetRequest();

$response = $sdk->nexus->list(
    request: $request
);

if ($response->pageNexusResponse !== null) {
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