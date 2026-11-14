# FeeTypeEnum

Label for ``Filing.amount_fees`` — penalty vs interest vs other.

Nullable on the row: existing fees predate the label and stay blank until
Tax Ops classifies them. Does not change arithmetic.


## Values

| Name       | Value      |
| ---------- | ---------- |
| `Penalty`  | PENALTY    |
| `Interest` | INTEREST   |
| `Other`    | OTHER      |