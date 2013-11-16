<?php
include "SepaDirectDebitFile.php";

$sepaFile = new SepaDirectDebitFile();
$sepaFile -> messageIdentification = 'uniqueFileID';
$sepaFile -> initiatingPartyName = 'Initiating party name';
$sepaFile -> paymentInfoId = '1';
$sepaFile -> IBAN = 'NL44RABO0123456789';
$sepaFile -> BIC = 'RABONL2U';
$sepaFile -> creditorId = $sepaFile->calculateCreditorId('12345678','0000');
$sepaFile -> requestedExecutionDate = '2013-12-10';

$sepaFile -> addTransaction(
    array('end_to_end' => 'endtoend1',
          'amount' => 13.50,
          'mandate_id' => '123456789',
          'mandate_signature_date'=>'2013-03-01',
          'consumername'=>'P. PUK',
          'consumeraccount'=>'NL44RABO0123456789',
          'consumerbic'=>'RABONL2U',
          'text'=>'Text about debit',
          'sequence_type' => 'OOFF')
);

$sepaFile -> addTransaction(
    array('end_to_end' => 'endtoend2', 
          'amount' => 15.20,
          'mandate_id'=>'987654321',
          'mandate_signature_date'=>'2013-03-02',
          'consumername'=>'P. PUK',
          'consumeraccount'=>'NL44RABO0123456789',
          'consumerbic'=>'RABONL2U',
          'text'=>'Text about debit2',
          'sequence_type' => 'FRST')
);

$sepaFile -> addTransaction(
    array('end_to_end' => 'endtoend3', 
          'amount' => 1.20,
          'mandate_id'=>'999654321',
          'mandate_signature_date'=>'2013-03-03',
          'consumername'=>'P. PUK',
          'consumeraccount'=>'NL44RABO0123456789',
          'consumerbic'=>'RABONL2U',
          'text'=>'Text about debit3',
          'sequence_type' => 'OOFF')
);


header("Content-type: text/xml; charset=utf-8");

echo $sepaFile -> asXML();
