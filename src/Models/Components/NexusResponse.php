<?php

/**
 * Code generated by Speakeasy (https://speakeasy.com). DO NOT EDIT.
 */

declare(strict_types=1);

namespace KintsugiTax\SDK\Models\Components;

use Brick\DateTime\LocalDate;
use KintsugiTax\SDK\Utils;
class NexusResponse
{
    /**
     *
     * @var CountryCodeEnum $countryCode
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('country_code')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\CountryCodeEnum')]
    public CountryCodeEnum $countryCode;

    /**
     *
     * @var string $stateCode
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('state_code')]
    public string $stateCode;

    /**
     *
     * @var string $stateName
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('state_name')]
    public string $stateName;

    /**
     *
     * @var TreatmentEnum $treatmentOfExemptTransactions
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('treatment_of_exempt_transactions')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\TreatmentEnum')]
    public TreatmentEnum $treatmentOfExemptTransactions;

    /**
     *
     * @var string $trigger
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('trigger')]
    public string $trigger;

    /**
     *
     * @var SalesOrTransactionsEnum $salesOrTransactions
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('sales_or_transactions')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\SalesOrTransactionsEnum')]
    public SalesOrTransactionsEnum $salesOrTransactions;

    /**
     *
     * @var int $thresholdSales
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('threshold_sales')]
    public int $thresholdSales;

    /**
     *
     * @var LocalDate $startDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('start_date')]
    public LocalDate $startDate;

    /**
     *
     * @var PeriodModelEnum $periodModel
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('period_model')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\PeriodModelEnum')]
    public PeriodModelEnum $periodModel;

    /**
     *
     * @var LocalDate $periodStartDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('period_start_date')]
    public LocalDate $periodStartDate;

    /**
     *
     * @var LocalDate $periodEndDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('period_end_date')]
    public LocalDate $periodEndDate;

    /**
     *
     * @var string $id
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('id')]
    public string $id;

    /**
     *
     * @var \DateTime $createdAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('created_at')]
    public \DateTime $createdAt;

    /**
     *
     * @var \DateTime $updatedAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('updated_at')]
    public \DateTime $updatedAt;

    /**
     *
     * @var string $organizationId
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('organization_id')]
    public string $organizationId;

    /**
     *
     * @var bool $isVdaEligible
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('is_vda_eligible')]
    public bool $isVdaEligible;

    /**
     *
     * @var NexusTypeEnum $nexusType
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('nexus_type')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\NexusTypeEnum')]
    public NexusTypeEnum $nexusType;

    /**
     *
     * @var int $totalTransactions
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('total_transactions')]
    public int $totalTransactions;

    /**
     *
     * @var int $totalTransactionsIncluded
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('total_transactions_included')]
    public int $totalTransactionsIncluded;

    /**
     *
     * @var int $totalTransactionsExempted
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('total_transactions_exempted')]
    public int $totalTransactionsExempted;

    /**
     *
     * @var int $totalTransactionsMarketplace
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('total_transactions_marketplace')]
    public int $totalTransactionsMarketplace;

    /**
     *
     * @var ?NexusStatusEnum $processingStatus
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('processing_status')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\NexusStatusEnum|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?NexusStatusEnum $processingStatus = null;

    /**
     *
     * @var ?NexusStateEnum $status
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('status')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\NexusStateEnum|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?NexusStateEnum $status = null;

    /**
     *
     * @var ?int $thresholdTransactions
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('threshold_transactions')]
    public ?int $thresholdTransactions;

    /**
     *
     * @var ?LocalDate $previousPeriodStartDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('previous_period_start_date')]
    public ?LocalDate $previousPeriodStartDate;

    /**
     *
     * @var ?LocalDate $previousPeriodEndDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('previous_period_end_date')]
    public ?LocalDate $previousPeriodEndDate;

    /**
     *
     * @var ?bool $marketplaceIncluded
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('marketplace_included')]
    public ?bool $marketplaceIncluded;

    /**
     *
     * @var ?string $calculatedTaxLiability
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('calculated_tax_liability')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $calculatedTaxLiability = null;

    /**
     *
     * @var ?string $importedTaxLiability
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('imported_tax_liability')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $importedTaxLiability = null;

    /**
     *
     * @var ?LocalDate $nexusMetDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('nexus_met_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?LocalDate $nexusMetDate = null;

    /**
     *
     * @var ?LocalDate $economicNexusMetDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('economic_nexus_met_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?LocalDate $economicNexusMetDate = null;

    /**
     *
     * @var ?LocalDate $physicalNexusMetDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('physical_nexus_met_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?LocalDate $physicalNexusMetDate = null;

    /**
     *
     * @var ?bool $collectedTaxNexusMet
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('collected_tax_nexus_met')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $collectedTaxNexusMet = null;

    /**
     *
     * @var ?LocalDate $collectedTaxNexusMetDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('collected_tax_nexus_met_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?LocalDate $collectedTaxNexusMetDate = null;

    /**
     *
     * @var ?\DateTime $earliestTransactionDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('earliest_transaction_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $earliestTransactionDate = null;

    /**
     *
     * @var ?\DateTime $mostRecentTransactionDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('most_recent_transaction_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $mostRecentTransactionDate = null;

    /**
     *
     * @var ?int $predictedMonthFromToday
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('predicted_month_from_today')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $predictedMonthFromToday = null;

    /**
     *
     * @var ?bool $vdaEligible
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('vda_eligible')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $vdaEligible = null;

    /**
     *
     * @var ?float $confidenceLevel
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('confidence_level')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?float $confidenceLevel = null;

    /**
     *
     * @var ?\DateTime $lastProcessedAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('last_processed_at')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $lastProcessedAt = null;

    /**
     *
     * @var ?\DateTime $lastTaxLiabilityProcessedAt
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('last_tax_liability_processed_at')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $lastTaxLiabilityProcessedAt = null;

    /**
     * $periods
     *
     * @var ?array<array<string, mixed>> $periods
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('periods')]
    #[\Speakeasy\Serializer\Annotation\Type('array<array<string, mixed>>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $periods = null;

    /**
     * Currency code for the nexus (e.g., USD, CAD).
     *
     * @var ?CurrencyEnum $currency
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('currency')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\CurrencyEnum|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?CurrencyEnum $currency = null;

    /**
     * $registration
     *
     * @var ?array<string, mixed> $registration
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('registration')]
    #[\Speakeasy\Serializer\Annotation\Type('array<string, mixed>|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?array $registration = null;

    /**
     *
     * @var ?RegistrationsRegimeEnum $registrationRegime
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('registration_regime')]
    #[\Speakeasy\Serializer\Annotation\Type('\KintsugiTax\SDK\Models\Components\RegistrationsRegimeEnum|null')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?RegistrationsRegimeEnum $registrationRegime = null;

    /**
     *
     * @var ?int $transactionCount
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('transaction_count')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $transactionCount = null;

    /**
     *
     * @var ?string $transactionsAmount
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('transactions_amount')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $transactionsAmount = null;

    /**
     * Deprecated: transaction_count now includes both current and previous period values when period_model is CURRENT_OR_PREVIOUS
     *
     * @var ?int $previousTransactionCount
     * @deprecated  field: This will be removed in a future release, please migrate away from it as soon as possible.
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('previous_transaction_count')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?int $previousTransactionCount = null;

    /**
     * Deprecated: transactions_amount now includes both current and previous period values when period_model is CURRENT_OR_PREVIOUS
     *
     * @var ?string $previousTransactionsAmount
     * @deprecated  field: This will be removed in a future release, please migrate away from it as soon as possible.
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('previous_transactions_amount')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $previousTransactionsAmount = null;

    /**
     *
     * @var ?string $taxLiability
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('tax_liability')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?string $taxLiability = null;

    /**
     *
     * @var ?bool $nexusMet
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('nexus_met')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $nexusMet = null;

    /**
     *
     * @var ?bool $economicNexusMet
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('economic_nexus_met')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $economicNexusMet = null;

    /**
     *
     * @var ?bool $physicalNexusMet
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('physical_nexus_met')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $physicalNexusMet = null;

    /**
     *
     * @var ?bool $collectedTaxEnabled
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('collected_tax_enabled')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?bool $collectedTaxEnabled = null;

    /**
     *
     * @var ?\DateTime $earliestCollectedDate
     */
    #[\Speakeasy\Serializer\Annotation\SerializedName('earliest_collected_date')]
    #[\Speakeasy\Serializer\Annotation\SkipWhenNull]
    public ?\DateTime $earliestCollectedDate = null;

    /**
     * @param  CountryCodeEnum  $countryCode
     * @param  string  $stateCode
     * @param  string  $stateName
     * @param  TreatmentEnum  $treatmentOfExemptTransactions
     * @param  string  $trigger
     * @param  SalesOrTransactionsEnum  $salesOrTransactions
     * @param  int  $thresholdSales
     * @param  LocalDate  $startDate
     * @param  PeriodModelEnum  $periodModel
     * @param  LocalDate  $periodStartDate
     * @param  LocalDate  $periodEndDate
     * @param  string  $id
     * @param  \DateTime  $createdAt
     * @param  \DateTime  $updatedAt
     * @param  string  $organizationId
     * @param  bool  $isVdaEligible
     * @param  NexusTypeEnum  $nexusType
     * @param  int  $totalTransactions
     * @param  int  $totalTransactionsIncluded
     * @param  int  $totalTransactionsExempted
     * @param  int  $totalTransactionsMarketplace
     * @param  ?NexusStatusEnum  $processingStatus
     * @param  ?NexusStateEnum  $status
     * @param  ?int  $thresholdTransactions
     * @param  ?int  $transactionCount
     * @param  ?string  $transactionsAmount
     * @param  ?int  $previousTransactionCount
     * @param  ?string  $previousTransactionsAmount
     * @param  ?string  $taxLiability
     * @param  ?bool  $nexusMet
     * @param  ?bool  $economicNexusMet
     * @param  ?bool  $physicalNexusMet
     * @param  ?bool  $collectedTaxEnabled
     * @param  ?LocalDate  $previousPeriodStartDate
     * @param  ?LocalDate  $previousPeriodEndDate
     * @param  ?\DateTime  $earliestCollectedDate
     * @param  ?bool  $marketplaceIncluded
     * @param  ?string  $calculatedTaxLiability
     * @param  ?string  $importedTaxLiability
     * @param  ?LocalDate  $nexusMetDate
     * @param  ?LocalDate  $economicNexusMetDate
     * @param  ?LocalDate  $physicalNexusMetDate
     * @param  ?bool  $collectedTaxNexusMet
     * @param  ?LocalDate  $collectedTaxNexusMetDate
     * @param  ?\DateTime  $earliestTransactionDate
     * @param  ?\DateTime  $mostRecentTransactionDate
     * @param  ?int  $predictedMonthFromToday
     * @param  ?bool  $vdaEligible
     * @param  ?float  $confidenceLevel
     * @param  ?\DateTime  $lastProcessedAt
     * @param  ?\DateTime  $lastTaxLiabilityProcessedAt
     * @param  ?array<array<string, mixed>>  $periods
     * @param  ?CurrencyEnum  $currency
     * @param  ?array<string, mixed>  $registration
     * @param  ?RegistrationsRegimeEnum  $registrationRegime
     * @phpstan-pure
     */
    public function __construct(CountryCodeEnum $countryCode, string $stateCode, string $stateName, TreatmentEnum $treatmentOfExemptTransactions, string $trigger, SalesOrTransactionsEnum $salesOrTransactions, int $thresholdSales, LocalDate $startDate, PeriodModelEnum $periodModel, LocalDate $periodStartDate, LocalDate $periodEndDate, string $id, \DateTime $createdAt, \DateTime $updatedAt, string $organizationId, bool $isVdaEligible, NexusTypeEnum $nexusType, int $totalTransactions, int $totalTransactionsIncluded, int $totalTransactionsExempted, int $totalTransactionsMarketplace, ?NexusStatusEnum $processingStatus = null, ?NexusStateEnum $status = null, ?int $thresholdTransactions = null, ?LocalDate $previousPeriodStartDate = null, ?LocalDate $previousPeriodEndDate = null, ?bool $marketplaceIncluded = null, ?string $calculatedTaxLiability = null, ?string $importedTaxLiability = null, ?LocalDate $nexusMetDate = null, ?LocalDate $economicNexusMetDate = null, ?LocalDate $physicalNexusMetDate = null, ?bool $collectedTaxNexusMet = null, ?LocalDate $collectedTaxNexusMetDate = null, ?\DateTime $earliestTransactionDate = null, ?\DateTime $mostRecentTransactionDate = null, ?int $predictedMonthFromToday = null, ?bool $vdaEligible = null, ?float $confidenceLevel = null, ?\DateTime $lastProcessedAt = null, ?\DateTime $lastTaxLiabilityProcessedAt = null, ?array $periods = null, ?CurrencyEnum $currency = null, ?array $registration = null, ?RegistrationsRegimeEnum $registrationRegime = null, ?int $transactionCount = 0, ?string $transactionsAmount = '0.00', ?int $previousTransactionCount = 0, ?string $previousTransactionsAmount = '0.00', ?string $taxLiability = '0.00', ?bool $nexusMet = false, ?bool $economicNexusMet = false, ?bool $physicalNexusMet = false, ?bool $collectedTaxEnabled = false, ?\DateTime $earliestCollectedDate = Utils\Utils::parseDateTime('2018-01-01T00:00:00'))
    {
        $this->countryCode = $countryCode;
        $this->stateCode = $stateCode;
        $this->stateName = $stateName;
        $this->treatmentOfExemptTransactions = $treatmentOfExemptTransactions;
        $this->trigger = $trigger;
        $this->salesOrTransactions = $salesOrTransactions;
        $this->thresholdSales = $thresholdSales;
        $this->startDate = $startDate;
        $this->periodModel = $periodModel;
        $this->periodStartDate = $periodStartDate;
        $this->periodEndDate = $periodEndDate;
        $this->id = $id;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->organizationId = $organizationId;
        $this->isVdaEligible = $isVdaEligible;
        $this->nexusType = $nexusType;
        $this->totalTransactions = $totalTransactions;
        $this->totalTransactionsIncluded = $totalTransactionsIncluded;
        $this->totalTransactionsExempted = $totalTransactionsExempted;
        $this->totalTransactionsMarketplace = $totalTransactionsMarketplace;
        $this->processingStatus = $processingStatus;
        $this->status = $status;
        $this->thresholdTransactions = $thresholdTransactions;
        $this->previousPeriodStartDate = $previousPeriodStartDate;
        $this->previousPeriodEndDate = $previousPeriodEndDate;
        $this->marketplaceIncluded = $marketplaceIncluded;
        $this->calculatedTaxLiability = $calculatedTaxLiability;
        $this->importedTaxLiability = $importedTaxLiability;
        $this->nexusMetDate = $nexusMetDate;
        $this->economicNexusMetDate = $economicNexusMetDate;
        $this->physicalNexusMetDate = $physicalNexusMetDate;
        $this->collectedTaxNexusMet = $collectedTaxNexusMet;
        $this->collectedTaxNexusMetDate = $collectedTaxNexusMetDate;
        $this->earliestTransactionDate = $earliestTransactionDate;
        $this->mostRecentTransactionDate = $mostRecentTransactionDate;
        $this->predictedMonthFromToday = $predictedMonthFromToday;
        $this->vdaEligible = $vdaEligible;
        $this->confidenceLevel = $confidenceLevel;
        $this->lastProcessedAt = $lastProcessedAt;
        $this->lastTaxLiabilityProcessedAt = $lastTaxLiabilityProcessedAt;
        $this->periods = $periods;
        $this->currency = $currency;
        $this->registration = $registration;
        $this->registrationRegime = $registrationRegime;
        $this->transactionCount = $transactionCount;
        $this->transactionsAmount = $transactionsAmount;
        $this->previousTransactionCount = $previousTransactionCount;
        $this->previousTransactionsAmount = $previousTransactionsAmount;
        $this->taxLiability = $taxLiability;
        $this->nexusMet = $nexusMet;
        $this->economicNexusMet = $economicNexusMet;
        $this->physicalNexusMet = $physicalNexusMet;
        $this->collectedTaxEnabled = $collectedTaxEnabled;
        $this->earliestCollectedDate = $earliestCollectedDate;
    }
}