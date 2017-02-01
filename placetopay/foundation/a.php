<?php


Class Attribute {
	string $name;
	string $value;
}

Class ArrayOfAttribute {
	Attribute $item;
}

Class Authentication {
	string $login;
	string $tranKey;
	string $seed;
	ArrayOfAttribute $additional;
}

Class getBankList {
	Authentication $auth;
}

Class Bank {
	string $bankCode;
	string $bankName;
}

Class ArrayOfBank {
	Bank $item;
}

Class getBankListResponse {
	ArrayOfBank $getBankListResult;
}

Class Person {
	string $documentType;
	string $document;
	string $firstName;
	string $lastName;
	string $company;
	string $emailAddress;
	string $address;
	string $city;
	string $province;
	string $country;
	string $phone;
	string $mobile;
}

Class PSETransactionRequest {
	string $bankCode;
	string $bankInterface;
	string $returnURL;
	string $reference;
	string $description;
	string $language;
	string $currency;
	double $totalAmount;
	double $taxAmount;
	double $devolutionBase;
	double $tipAmount;
	Person $payer;
	Person $buyer;
	Person $shipping;
	string $ipAddress;
	string $userAgent;
	ArrayOfAttribute $additionalData;
}

Class createTransaction {
	Authentication $auth;
	PSETransactionRequest $transaction;
}

Class PSETransactionResponse {
	string $returnCode;
	string $bankURL;
	string $trazabilityCode;
	int $transactionCycle;
	int $transactionID;
	string $sessionID;
	string $bankCurrency;
	float $bankFactor;
	int $responseCode;
	string $responseReasonCode;
	string $responseReasonText;
}

Class createTransactionResponse {
	PSETransactionResponse $createTransactionResult;
}

Class CreditConcept {
	string $entityCode;
	string $serviceCode;
	double $amountValue;
	double $taxValue;
	string $description;
}

Class ArrayOfCreditconcept {
	CreditConcept $item;
}

Class PSETransactionMultiCreditRequest {
	ArrayOfCreditconcept $credits;
	string $bankCode;
	string $bankInterface;
	string $returnURL;
	string $reference;
	string $description;
	string $language;
	string $currency;
	double $totalAmount;
	double $taxAmount;
	double $devolutionBase;
	double $tipAmount;
	Person $payer;
	Person $buyer;
	Person $shipping;
	string $ipAddress;
	string $userAgent;
	ArrayOfAttribute $additionalData;
}

Class createTransactionMultiCredit {
	Authentication $auth;
	PSETransactionMultiCreditRequest $transaction;
}

Class createTransactionMultiCreditResponse {
	PSETransactionResponse $createTransactionMultiCreditResult;
}

Class getTransactionInformation {
	Authentication $auth;
	int $transactionID;
}

Class TransactionInformation {
	int $transactionID;
	string $sessionID;
	string $reference;
	string $requestDate;
	string $bankProcessDate;
	boolean $onTest;
	string $returnCode;
	string $trazabilityCode;
	int $transactionCycle;
	string $transactionState;
	int $responseCode;
	string $responseReasonCode;
	string $responseReasonText;
}

Class getTransactionInformationResponse {
	TransactionInformation $getTransactionInformationResult;
}
?>