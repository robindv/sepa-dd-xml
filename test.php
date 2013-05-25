<?php
include "SepaDirectDebitFile.php";

$sepaFile = new SepaDirectDebitFile();
$sepaFile -> messageIdentification = 'uniqueFileID';
$sepaFile -> initiatingPartyName = 'Initiating party name';
$sepaFile -> paymentInfoId = '1';
$sepaFile -> IBAN = 'NL44RABO0123456789';
$sepaFile -> BIC = 'RABONL2U';
$sepaFile -> creditorId = $sepaFile->calculateCreditorId('12345678','0000');
$sepaFile -> requestedExecutionDate = '2013-07-10';

$sepaFile -> addTransaction(
    array('end_to_end' => 'endtoend1',
          'amount' => 13.50,
          'ean' => '123456789', /* Ean = unique authorization identifier */
          'signature_date'=>'2013-03-01',
          'consumername'=>'P. PUK',
          'consumeraccount'=>'NL44RABO0123456789',
          'consumerbic'=>'RABONL2U',
          'text'=>'Text about debit')
);

$sepaFile -> addTransaction(
    array('end_to_end' => 'endtoend2', 
          'amount' => 15.20,
          'ean'=>'987654321',
          'signature_date'=>'2013-03-02',
          'consumername'=>'P. PUK',
          'consumeraccount'=>'NL44RABO0123456789',
          'consumerbic'=>'RABONL2U',
          'text'=>'Text about debit')
);

header("Content-type: text/xml; charset=utf-8");

echo $sepaFile -> asXML();
