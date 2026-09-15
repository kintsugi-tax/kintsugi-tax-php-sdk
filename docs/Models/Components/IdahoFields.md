# IdahoFields

State-specific fields for Idaho TAP portal registration import.


## Fields

| Field                                                                                | Type                                                                                 | Required                                                                             | Description                                                                          |
| ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------ |
| `registrationType`                                                                   | [Components\IdahoRegistrationType](../../Models/Components/IdahoRegistrationType.md) | :heavy_check_mark:                                                                   | N/A                                                                                  |
| `mfaCompleted`                                                                       | *?bool*                                                                              | :heavy_minus_sign:                                                                   | Whether the customer has completed MFA setup in their Idaho tax account.             |
| `businessName`                                                                       | *string*                                                                             | :heavy_check_mark:                                                                   | Business name as registered with the Idaho State Tax Commission.                     |
| `salesTaxId`                                                                         | *string*                                                                             | :heavy_check_mark:                                                                   | Idaho State Tax ID.                                                                  |
| `accessCode`                                                                         | *?string*                                                                            | :heavy_minus_sign:                                                                   | Customers add this in registration credentials after the Idaho                       |