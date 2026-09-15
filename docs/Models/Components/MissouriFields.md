# MissouriFields

State-specific fields for Missouri portal registration import (MyTax Missouri).


## Fields

| Field                                                                                      | Type                                                                                       | Required                                                                                   | Description                                                                                |
| ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------ |
| `registrationType`                                                                         | [Components\MissouriRegistrationType](../../Models/Components/MissouriRegistrationType.md) | :heavy_check_mark:                                                                         | N/A                                                                                        |
| `businessName`                                                                             | *string*                                                                                   | :heavy_check_mark:                                                                         | State-registered business name as shown in MyTax Missouri.                                 |
| `moStateTaxId`                                                                             | *string*                                                                                   | :heavy_check_mark:                                                                         | Missouri state-issued tax identification number (MO State Tax ID).                         |
| `thirdPartyAccessEnabled`                                                                  | *?bool*                                                                                    | :heavy_minus_sign:                                                                         | Whether third-party access has been granted to Kintsugi in MyTax Missouri.                 |