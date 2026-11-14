# TaxTypeEnum

Tax obligation on a nexus, registration, or filing row.

Registrations and filings may be SALES_AND_USE_TAX: one state account and
one return can cover both taxes, and each is stored as a single row.
Nexus rows are SALES_TAX, USE_TAX, RETAIL_DELIVERY_FEE, or
SMALL_PARCEL_VAT. Sales tax, use tax, the retail delivery fee, and the
Swiss small-parcel threshold are separate obligations with their own met
dates and period models. SMALL_PARCEL_VAT is a threshold only. A sales
tax registration covers it, and it has no account and no return of its own.


## Values

| Name                | Value               |
| ------------------- | ------------------- |
| `SalesTax`          | SALES_TAX           |
| `UseTax`            | USE_TAX             |
| `SalesAndUseTax`    | SALES_AND_USE_TAX   |
| `RetailDeliveryFee` | RETAIL_DELIVERY_FEE |
| `SmallParcelVat`    | SMALL_PARCEL_VAT    |