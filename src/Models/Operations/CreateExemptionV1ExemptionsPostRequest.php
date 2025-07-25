<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace KintsugiTax\SDK\Models\Operations;

use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils\SpeakeasyMetadata;
class CreateExemptionV1ExemptionsPostRequest
{
    /**
     *
     * @var Components\ExemptionCreate $exemptionCreate
     */
    #[SpeakeasyMetadata('request:mediaType=application/json')]
    public Components\ExemptionCreate $exemptionCreate;

    /**
     * The unique identifier for the organization making the request
     *
     * @var ?string $xOrganizationId
     */
    #[SpeakeasyMetadata('header:style=simple,explode=false,name=x-organization-id')]
    public ?string $xOrganizationId;

    /**
     * @param  Components\ExemptionCreate  $exemptionCreate
     * @param  ?string  $xOrganizationId
     * @phpstan-pure
     */
    public function __construct(Components\ExemptionCreate $exemptionCreate, ?string $xOrganizationId = null)
    {
        $this->exemptionCreate = $exemptionCreate;
        $this->xOrganizationId = $xOrganizationId;
    }
}