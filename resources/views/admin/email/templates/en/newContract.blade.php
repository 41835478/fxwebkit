<html>
<head>
	<title>{{ $EMAIL_TITLE }}</title>
</head>
<body>
	<p>Hello {{ $TITLE }} {{ $FIRST_NAME }} {{ $LAST_NAME }}</p>
	<p>Name: {{ $NAME }}</p>
	<p>Symbol: {{ $CURRENCY }}</p>
	<p>Exchange: {{ $DATE_OF_BIRTH }}</p>
	<p>Month: {{ $COUNTRY_OF_BIRTH }}</p>
	<p>Year: {{ $NATIONALITY }}</p>
	<p>Start Date: {{ $ADDRESS }}</p>
	<p>Expiry Date: {{ $CITY }}</p>
	<p><a href="{{ $RECOVER_LINK }}">Click here for the new password</a></p>
</body>
</html>
