<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.header-package')
</head>

<body>
    <div class="wrapper">
        @include('components.sidebar')
        @include('components.dropdown')
        <main class="main-container">
            @include('components.header')
            <h1>List of Products</h1>
            <hr>
            <section class="product-container">
                @forelse ($products as $product)
                    <form action="{{ route('customer.reservation.reserve.product') }}" method="POST">
                        @csrf
                        <div class="product-widget">
                            <input type="text" name="productId" value="{{ $product->id }}" hidden>
                            <div class="product-image">
                                <img src="{{ asset('assets/img/side-image.jpg') }}" alt="Image">
                            </div>
                            <div class="product-details-container">
                                <div class="product-stock-container">
                                    <p class="quantity">Available Stocks: <span>{{ $product->quantity }}</span></p>
                                </div>
                                <div class="product-details-section">
                                    <label for="product-name">Product Name:
                                        <span class="product-name">{{ $product->name }}</span>
                                    </label>
                                    <label for="product-detail">Description:
                                        <span class="product-details">{{ $product->details }}</span>
                                    </label>
                                </div>
                                <div class="product-quantity-container">
                                    <button class="btn-add" title="Add Quantity">+</button>
                                    <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity"
                                        min="1" required>
                                    <button class="btn-minus" title="Minus Quantity">-</button>
                                </div>
                                <div class="product-btn-container">
                                    <button class="btn-reserve" title="Reserve">Reserve</button>
                                </div>
                            </div>
                        </div>
                    </form>
                @empty
                @endforelse
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
</body>

</html>
