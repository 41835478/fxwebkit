<html>
<head>
	<title>{{ $EMAIL_TITLE }}</title>
</head>
<body>
<p>Hello {{ $TITLE }} {{ $FIRST_NAME }} {{ $LAST_NAME }}</p>
<p>Username: {{ $USERNAME }}</p>
<p>Currency: {{ $CURRENCY }}</p>
<p>Date of birth: {{ $DATE_OF_BIRTH }}</p>
<p>Country of birth: {{ $COUNTRY_OF_BIRTH }}</p>
<p>Nationality: {{ $NATIONALITY }}</p>
<p>Address: {{ $ADDRESS }}</p>
<p>City: {{ $CITY }}</p>
<p>Country: {{ $COUNTRY }}</p>
<p>Postal Code: {{ $POSTAL_CODE }}</p>
<p>Phone: {{ $PHONE }}</p>
<p>Amount: {{ $AMOUNT }}</p>
<p>Bank: {{ $BANK }}</p>
<p>Status: {{ HTML::status($STATUS) }}</p>
<p>Request Comments: {{ $REQUEST_COMMENT }}</p>
<p>Process Comments: {{ $PROCESS_COMMENT }}</p>
</body>
</html>
