# Exemptions.Attachments

## Overview

### Available Operations

* [get](#get) - Get Attachments For Exemption

## get

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
use KintsugiTax\SDK\Models\Components;

$sdk = SDK\SDK::builder()
    ->setSecurity(
        new Components\Security(
            apiKeyHeader: '<YOUR_API_KEY_HERE>',
            customHeader: '<YOUR_API_KEY_HERE>',
        )
    )
    ->build();



$response = $sdk->exemptions->attachments->get(
    exemptionId: '<id>'
);

if ($response->response200GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGet !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                              | Type                                                                                   | Required                                                                               | Description                                                                            |
| -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------- |
| `exemptionId`                                                                          | *string*                                                                               | :heavy_check_mark:                                                                     | The unique identifier for the exemption<br/>        whose attachments are being retrieved. |

### Response

**[?Operations\GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGetResponse](../../Models/Operations/GetAttachmentsForExemptionV1ExemptionsExemptionIdAttachmentsGetResponse.md)**

### Errors

| Error Type                                                  | Status Code                                                 | Content Type                                                |
| ----------------------------------------------------------- | ----------------------------------------------------------- | ----------------------------------------------------------- |
| Errors\ErrorResponse                                        | 401                                                         | application/json                                            |
| Errors\BackendSrcExemptionsResponsesValidationErrorResponse | 422                                                         | application/json                                            |
| Errors\APIException                                         | 4XX, 5XX                                                    | \*/\*                                                       |