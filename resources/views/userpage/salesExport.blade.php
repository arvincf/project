<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sales Data</title>
</head>

<body>
    <p>Casile-Guinting Upland Marketing Cooperative</p>
    <table class="table">
        <thead>
            <tr>
                <th>PRODUCT NAME</th>
                <th>PERIOD START</th>
                <th>TOTAL COST</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupedSales as $sale)
                <tr>
                    <td data-column="Product Name">{{ $sale->product_name }}</td>
                    <td data-column="Date">{{ \Carbon\Carbon::parse($sale->period_start)->format('F j, Y') }}</td>
                    <td data-column="Total Cost">{{ $sale->total_cost }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
