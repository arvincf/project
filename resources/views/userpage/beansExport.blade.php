<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Coffee Beans Data</title>
</head>

<body>
    <p>Casile-Guinting Upland Marketing Cooperative</p>
    <table class="table">
        <thead>
            <tr>
                <th>COFFEE NAME</th>
                <th>SUPPLIER NAME</th>
                <th>QUANTITY</th>
                <th>PERIOD START</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupedBeans as $beans)
                <tr>
                    <td data-column="Coffee Name">{{ $beans->coffee_name }}</td>
                    <td data-column="Supplier Name">{{ $beans->supplier_name }}</td>
                    <td data-column="Quantity">{{ $beans->total_quantity }}</td>
                    <td data-column="Date">{{ \Carbon\Carbon::parse($beans->period_start)->format('F j, Y') }}</td>
            @endforeach
        </tbody>
    </table>
</body>

</html>
