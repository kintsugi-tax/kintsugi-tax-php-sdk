# TaxTypeEnum

Tax obligation on a nexus, registration, or filing row.

Registrations and filings may be SALES_AND_USE_TAX: one state account and
one return can cover both taxes, and each is stored as a single row.
Nexus rows are only SALES_TAX or USE_TAX. Sales and use tax exposure are
separate obligations with their own met dates, period models, and liability
accrual.


## Values

| Name              | Value             |
| ----------------- | ----------------- |
| `SalesTax`        | SALES_TAX         |
| `UseTax`          | USE_TAX           |
| `SalesAndUseTax`  | SALES_AND_USE_TAX |