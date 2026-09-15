# CustomerTaxRegistration

## Overview

### Available Operations

* [upsertCustomerTaxRegistrationV1CustomersCustomerIdTaxRegistrationsPost](#upsertcustomertaxregistrationv1customerscustomeridtaxregistrationspost) - Upsert customer tax registration

## upsertCustomerTaxRegistrationV1CustomersCustomerIdTaxRegistrationsPost

Creates or updates a customer tax registration record. If a registration already exists
    for this customer with the same tax type and country code, it will be updated.

### Example Usage

<!-- UsageSnippet language="php" operationID="upsert_customer_tax_registration_v1_customers__customer_id__tax_registrations_post" method="post" path="/v1/customers/{customer_id}/tax-registrations" -->
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

$customerTaxRegistrationCreateUpdate = new Components\CustomerTaxRegistrationCreateUpdate(
    taxId: '1234567890',
);

$response = $sdk->customerTaxRegistration->upsertCustomerTaxRegistrationV1CustomersCustomerIdTaxRegistrationsPost(
    customerId: '<id>',
    customerTaxRegistrationCreateUpdate: $customerTaxRegistrationCreateUpdate,
    xOrganizationId: 'org_12345'

);

if ($response->customerTaxRegistrationRead !== null) {
    // handle response
}
```

### Parameters

| Parameter                                                                                                        | Type                                                                                                             | Required                                                                                                         | Description                                                                                                      | Example                                                                                                          |
| ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- | ---------------------------------------------------------------------------------------------------------------- |
| `customerId`                                                                                                     | *string*                                                                                                         | :heavy_check_mark:                                                                                               | N/A                                                                                                              |                                                                                                                  |
| `customerTaxRegistrationCreateUpdate`                                                                            | [Components\CustomerTaxRegistrationCreateUpdate](../../Models/Components/CustomerTaxRegistrationCreateUpdate.md) | :heavy_check_mark:                                                                                               | N/A                                                                                                              |                                                                                                                  |
| `xOrganizationId`                                                                                                | *string*                                                                                                         | :heavy_check_mark:                                                                                               | The unique identifier for the organization making the request                                                    | org_12345                                                                                                        |

### Response

**[?Operations\UpsertCustomerTaxRegistrationV1CustomersCustomerIdTaxRegistrationsPostResponse](../../Models/Operations/UpsertCustomerTaxRegistrationV1CustomersCustomerIdTaxRegistrationsPostResponse.md)**

### Errors

| Error Type                 | Status Code                | Content Type               |
| -------------------------- | -------------------------- | -------------------------- |
| Errors\HTTPValidationError | 422                        | application/json           |
| Errors\APIException        | 4XX, 5XX                   | \*/\*                      |