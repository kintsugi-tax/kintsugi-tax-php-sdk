<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace KintsugiTax\SDK\Models\Operations;

use KintsugiTax\SDK\Models\Components;
use KintsugiTax\SDK\Utils\SpeakeasyMetadata;
class UploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPostRequest
{
    /**
     * The unique identifier for the exemption to which the attachment will be associated.
     *
     * @var string $exemptionId
     */
    #[SpeakeasyMetadata('pathParam:style=simple,explode=false,name=exemption_id')]
    public string $exemptionId;

    /**
     *
     * @var Components\BodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost $bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost
     */
    #[SpeakeasyMetadata('request:mediaType=multipart/form-data')]
    public Components\BodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost $bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost;

    /**
     * The unique identifier for the organization making the request
     *
     * @var ?string $xOrganizationId
     */
    #[SpeakeasyMetadata('header:style=simple,explode=false,name=x-organization-id')]
    public ?string $xOrganizationId;

    /**
     * @param  string  $exemptionId
     * @param  Components\BodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost  $bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost
     * @param  ?string  $xOrganizationId
     * @phpstan-pure
     */
    public function __construct(string $exemptionId, Components\BodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost $bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost, ?string $xOrganizationId = null)
    {
        $this->exemptionId = $exemptionId;
        $this->bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost = $bodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost;
        $this->xOrganizationId = $xOrganizationId;
    }
}