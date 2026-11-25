# CustomerJurisdictionSpecificFieldsResponse

Customer import fields, including the tax types that jurisdiction allows.

The partner and public jurisdiction-fields routes stay on the base response.
Allowed tax types depend on the organization, and those contracts do not.


## Fields

| Field                                                                                      | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `countryCode`                                                                              | *string*                                                                                   | :heavy_check_mark:                                                                         | N/A                                                                                        |
| `stateCode`                                                                                | *string*                                                                                   | :heavy_check_mark:                                                                         | N/A                                                                                        |
| `defaultForm`                                                                              | *bool*                                                                                     | :heavy_check_mark:                                                                         | True when no state-specific schema exists and the generic form should be used.             |
| `jurisdictionFieldsJsonSchema`                                                             | array<string, *mixed*>                                                                     | :heavy_check_mark:                                                                         | JSON Schema for the jurisdiction-specific fields, or empty dict when default_form is True. |
| `metadata`                                                                                 | array<string, *mixed*>                                                                     | :heavy_check_mark:                                                                         | UI metadata (help articles, portal URL, filing frequencies, etc.).                         |
| `taxTypes`                                                                                 | array<[Components\TaxTypeEnum](../../Models/Components/TaxTypeEnum.md)>                    | :heavy_check_mark:                                                                         | Tax types that can be imported for this jurisdiction.                                      |