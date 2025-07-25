<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace KintsugiTax\SDK\Models\Components;


class CustomerUpdate
{
    /**
     *
     * @var ?AddressStatus $addressStatus
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('address_status')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\AddressStatus|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?AddressStatus $addressStatus = null;

    /**
     * Phone number associated with the customer.
     *
     * @var ?string $phone
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('phone')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $phone = null;

    /**
     * Primary street address.
     *
     * @var ?string $street1
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('street_1')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $street1 = null;

    /**
     * Additional street address details, such as an apartment or suite number.
     *
     * @var ?string $street2
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('street_2')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $street2 = null;

    /**
     * City where the customer resides.
     *
     * @var ?string $city
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('city')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $city = null;

    /**
     * County or district of the customer.
     *
     * @var ?string $county
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('county')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $county = null;

    /**
     * State or province of the customer.
     *
     * @var ?string $state
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('state')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $state = null;

    /**
     * ZIP or Postal code of the customer.
     *
     * @var ?string $postalCode
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('postal_code')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $postalCode = null;

    /**
     * Country code in ISO 3166-1 alpha-2 format
     *
     * @var ?CountryCodeEnum $country
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('country')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\CountryCodeEnum|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?CountryCodeEnum $country = null;

    /**
     * Complete address string of the customer, which can be used as an alternative to individual fields.
     *
     * @var ?string $fullAddress
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('full_address')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $fullAddress = null;

    /**
     * Name of the customer.
     *
     * @var ?string $name
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('name')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $name = null;

    /**
     * Status of the customer.
     *
     * @var ?StatusEnum $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\StatusEnum|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?StatusEnum $status = null;

    /**
     * Email address of the customer.
     *
     * @var ?string $email
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('email')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $email = null;

    /**
     * Source of the customer's record
     *
     * @var ?SourceEnum $source
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('source')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\SourceEnum|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?SourceEnum $source = null;

    /**
     * External identifier associated with the customer
     *
     * @var ?string $externalId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('external_id')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $externalId = null;

    /**
     * @param  ?AddressStatus  $addressStatus
     * @param  ?string  $phone
     * @param  ?string  $street1
     * @param  ?string  $street2
     * @param  ?string  $city
     * @param  ?string  $county
     * @param  ?string  $state
     * @param  ?string  $postalCode
     * @param  ?CountryCodeEnum  $country
     * @param  ?string  $fullAddress
     * @param  ?string  $name
     * @param  ?StatusEnum  $status
     * @param  ?string  $email
     * @param  ?SourceEnum  $source
     * @param  ?string  $externalId
     * @phpstan-pure
     */
    public function __construct(?AddressStatus $addressStatus = null, ?string $phone = null, ?string $street1 = null, ?string $street2 = null, ?string $city = null, ?string $county = null, ?string $state = null, ?string $postalCode = null, ?CountryCodeEnum $country = null, ?string $fullAddress = null, ?string $name = null, ?StatusEnum $status = null, ?string $email = null, ?SourceEnum $source = null, ?string $externalId = null)
    {
        $this->addressStatus = $addressStatus;
        $this->phone = $phone;
        $this->street1 = $street1;
        $this->street2 = $street2;
        $this->city = $city;
        $this->county = $county;
        $this->state = $state;
        $this->postalCode = $postalCode;
        $this->country = $country;
        $this->fullAddress = $fullAddress;
        $this->name = $name;
        $this->status = $status;
        $this->email = $email;
        $this->source = $source;
        $this->externalId = $externalId;
    }
}