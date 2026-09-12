<!-- Start SDK Example Usage [usage] -->
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