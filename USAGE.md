<!-- Start SDK Example Usage [usage] -->
```php
declare(strict_types=1);

require 'vendor/autoload.php';

use OpenAPI\OpenAPI;
use OpenAPI\OpenAPI\Models\Components;
use OpenAPI\OpenAPI\Models\Operations;

$sdk = OpenAPI\SDK::builder()->build();

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