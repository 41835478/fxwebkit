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
{{--$name--}}
{{--$ids--}}
{{--$names--}}
{{--$symbols--}}
{{--$exchanges--}}
{{--$months--}}
{{--$years--}}
{{--$start_dates--}}
{{--$expiry_dates--}}
	<p>Dear {{ $name }}</p>
        <table>
    <tr>
    <th>Expired</th><th>Symbol</th><th>Rest Data</th>
    </tr>
            @for($i=0;$i<count($ids);$i++)
                <tr>
                <td>{{ $expiry_dates[$i] }}</td>
                <td>{{ $symbols[$i] }}</td>
                <td>{{ $ids[$i] }}/{{ $names[$i] }}/{{ $exchanges[$i] }}/{{ $months[$i] }}/{{ $years[$i] }}/{{ $start_dates[$i] }}</td>
                </tr>
            @endfor
</table>
</body>
</html>
