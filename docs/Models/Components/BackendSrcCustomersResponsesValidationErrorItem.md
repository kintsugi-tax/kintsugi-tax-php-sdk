# BackendSrcCustomersResponsesValidationErrorItem


## Fields

| Field                    | Type                     | Required                 | Description              |
| ------------------------ | ------------------------ | ------------------------ | ------------------------ |
| `type`                   | *string*                 | :heavy_check_mark:       | Type of validation error |
| `loc`                    | array<*string*>          | :heavy_check_mark:       | Location of error        |
| `msg`                    | *string*                 | :heavy_check_mark:       | Error message            |
| `input`                  | *mixed*                  | :heavy_check_mark:       | Invalid input value      |
| `ctx`                    | array<string, *mixed*>   | :heavy_check_mark:       | Additional context       |