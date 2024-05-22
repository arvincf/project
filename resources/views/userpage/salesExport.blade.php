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
                <th>CUSTOMER NAME</th>
                <th>PRODUCT NAME</th>
                <th>PRODUCT QUANTITY</th>
                <th>PRICE</th>
                <th>DATE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groupedSales as $sale)
                <tr>
                    <td data-column="Customer Name">{{ $sale->customer_name }}</td>
                    <td data-column="Product Name">{{ $sale->product_name }}</td>
                    <td data-column="Product Quantity">{{ $sale->product_quantity }}</td>
                    <td data-column="Price">{{ $sale->price }}</td>
                    <td data-column="Date">{{ \Carbon\Carbon::parse($sale->date)->format('F j, Y') }}</td>
            @endforeach
        </tbody>
    </table>
</body>

</html>
