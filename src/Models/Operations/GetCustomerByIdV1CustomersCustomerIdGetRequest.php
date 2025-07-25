<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace KintsugiTax\SDK\Models\Operations;

use KintsugiTax\SDK\Utils\SpeakeasyMetadata;
class GetCustomerByIdV1CustomersCustomerIdGetRequest
{
    /**
     * Unique identifier of the customer
     *
     * @var string $customerId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=customer_id')]
    public string $customerId;

    /**
     * The unique identifier for the organization making the request
     *
     * @var ?string $xOrganizationId
     */
    #[SpeakeasyMetadata('header:style=simple,explode=false,name=x-organization-id')]
    public ?string $xOrganizationId;

    /**
     * @param  string  $customerId
     * @param  ?string  $xOrganizationId
     * @phpstan-pure
     */
    public function __construct(string $customerId, ?string $xOrganizationId = null)
    {
        $this->customerId = $customerId;
        $this->xOrganizationId = $xOrganizationId;
    }
}