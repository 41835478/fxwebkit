<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>expiry</title>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
}
</style>
</head>
<body>
	<p>Dear {{ $name }}</p>
        <table>
    <tr>
    <th>Expired</th><th>Symbol</th>
    </tr>
       {!! $expiryHtml !!}
</table>
</body>
</html>
