sepa-dd-xml
===========

Sepa Direct Debit XML

The successor of CLIEOP03, Sepa Direct Debit, (PAIN.008.001.02) for usage in the Netherlands.

Please be careful, the code hasn't been fully tested yet.

Succesfully tested with:
 - Rabobank: Rabo SEPA TestService 
 - ING Bank: Format Validation Tool
 - Equens: Equens Corporate Payment Services (CPS) Format Validation Tool
 - ABN AMRO: E-mail test service
 - BNG Bank: E-mail test service

If you modify/fix this code, please send me your changes.

Update 16 november 2013:
------------------------
Now each transaction can have its own sequence type (OOFF/FRST/RCUR/FNAL).
Transactions are grouped by sequence type.
Warning: API has changed, please check the example