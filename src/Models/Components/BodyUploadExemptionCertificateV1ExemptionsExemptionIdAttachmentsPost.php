<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace KintsugiTax\SDK\Models\Components;

use KintsugiTax\SDK\Utils\SpeakeasyMetadata;
class BodyUploadExemptionCertificateV1ExemptionsExemptionIdAttachmentsPost
{
    /**
     * The file to be uploaded. Supported format: PDF. Max size: 10 MB.
     *
     * @var File $file
     */
    #[SpeakeasyMetadata('multipartForm:file=true,name=file')]
    public File $file;

    /**
     * @param  File  $file
     * @phpstan-pure
     */
    public function __construct(File $file)
    {
        $this->file = $file;
    }
}