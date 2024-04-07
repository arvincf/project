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
                    <form action="{{ route('customer.reservation.reserve.product') }}" method="POST"
                        class="reservation-form">
                        @csrf
                        <div class="product-widget">
                            <input type="text" name="productId" value="{{ $product->id }}" hidden>
                            <div class="product-image">
                                <img src="{{ asset('assets/img/side-image.jpg') }}" alt="Image">
                            </div>
                            <div class="product-details-container">
                                <div class="product-stock-container">
                                    <p class="quantity">Available Stocks: <span>{{ $product->quantity }}</span></p>
                                    @if ($product->quantity <= 0)
                                        <div class="alert alert-warning" role="alert">
                                            No stock available
                                        </div>
                                    @endif
                                </div>
                                <div class="product-details-section">
                                    <label for="product-name">Product Name: <br>
                                        <span class="product-name">{{ $product->name }}</span>
                                    </label>
                                </div>
                                <div class="product-quantity-container">
                                    <button class="btn-add" title="Add Quantity"
                                        {{ $product->quantity <= 0 ? 'disabled' : '' }}>+</button>
                                    <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity"
                                        min="1" required readonly>
                                    <button class="btn-minus" title="Minus Quantity"
                                        {{ $product->quantity <= 0 ? 'disabled' : '' }}>-</button>
                                </div>
                                <div class="product-btn-container">
                                    <div class="reservation-btn-wrapper">
                                        <button class="btn-reserve" title="Reserve"
                                            {{ $product->quantity <= 0 ? 'disabled' : '' }}>Reserve</button>
                                        <div class="alert alert-danger reservation-msg" role="alert"
                                            style="display: none;">
                                            Click the "+" button to have a reservation
                                        </div>
                                    </div>
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
    <script>
        $(document).ready(() => {
            $('.btn-add').click(function(e) {
                e.preventDefault();
                let productItem = $(this).closest('.product-widget'),
                    stockText = productItem.find('.quantity span'),
                    currentStock = parseInt(stockText.text());

                if (currentStock > 0) {
                    productItem.find('#quantity').val((i, val) => +val + 1);
                    stockText.text(currentStock - 1);
                    updateReservationButton(productItem, currentStock - 1);
                } else {
                    // Display out-of-stock alert
                    alert('Sorry, the stock is insufficient.');
                }
            });

            $('.btn-minus').click(function(e) {
                e.preventDefault();
                let productItem = $(this).closest('.product-widget'),
                    quantityInput = productItem.find('#quantity'),
                    stockText = productItem.find('.quantity span'),
                    currentQuantity = parseInt(quantityInput.val());

                if (currentQuantity > 1) {
                    quantityInput.val(currentQuantity - 1);
                    stockText.text(parseInt(stockText.text()) + 1);
                    updateReservationButton(productItem, parseInt(stockText.text()) + 1);
                }
            });

            $('.reservation-form').submit(function(e) {
                e.preventDefault();
                let quantityInput = $(this).find('#quantity'),
                    reservationMsg = $(this).find('.reservation-msg');

                if (quantityInput.val() === '') {
                    // Display reservation alert
                    alert('Click the "+" button to have a reservation');
                } else {
                    $(this).unbind('submit').submit();
                }
            });

            function updateReservationButton(productItem, stock) {
                let reserveBtn = productItem.find('.btn-reserve');
                if (stock <= 0) {
                    reserveBtn.attr('disabled', 'disabled');
                } else {
                    reserveBtn.removeAttr('disabled');
                }
            }
        });
    </script>
</body>

</html>
