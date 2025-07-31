# OSSRegistrationCreatePayload


## Fields

| Field                                                                     | Type                                                                      | Required                                                                  | Description                                                               |
| ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- | ------------------------------------------------------------------------- |
| `registrationImportType`                                                  | *?string*                                                                 | :heavy_minus_sign:                                                        | Specifies this is an OSS registration import.                             |
| `passwordPlainText`                                                       | *?string*                                                                 | :heavy_minus_sign:                                                        | The plaintext password for accessing the tax registration account.        |
| `passwordMetadataPlainText`                                               | *?string*                                                                 | :heavy_minus_sign:                                                        | Metadata related to the password.                                         |
| `memberStateOfIdentificationCode`                                         | [?Components\CountryCodeEnum](../../Models/Components/CountryCodeEnum.md) | :heavy_minus_sign:                                                        | N/A                                                                       |
| `imported`                                                                | *?bool*                                                                   | :heavy_minus_sign:                                                        | Whether the registration was imported from another system.                |