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
                <form action="{{ route('customer.reservation.reserve.product') }}" method="POST" class="reservation-form">
                    @csrf
                    <div class="product-widget">
                        <input type="text" name="productId" value="{{ $product->id }}" hidden>
                        <input type="text" class="priceInput" value="{{ $product->unit_price }}" hidden>
                        <div class="product-image">
                            <img src="{{ asset('assets/img/side-image.jpg') }}" alt="Image">
                        </div>
                        <div class="product-details-container">
                            <div class="product-stock-container">
                                <p class="quantity">Available Stocks: <span>{{ $product->quantity }}</span></p>
                                @if ($product->quantity <= 0) <div class="alert alert-warning" role="alert">
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
                            <button class="btn-add" title="Add Quantity" {{ $product->quantity <= 0 ? 'disabled' : '' }}>+</button>
                            <input type="number" name="quantity" id="quantity" placeholder="Enter Quantity" min="1" class="form-control" required readonly>
                            <button class="btn-minus" title="Minus Quantity" {{ $product->quantity <= 0 ? 'disabled' : '' }}>-</button>
                        </div>
                        <div class="product-btn-container">
                            <div class="reservation-btn-wrapper">
                                <button type="button" class="btn-reserve" title="Reserve" {{ $product->quantity <= 0 ? 'disabled' : '' }}>Reserve</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="reservationModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-success text-white">
                                    <h5 class="modal-title">RESERVATION FORM</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="number" name="quantity" class="form-control quantity" hidden>
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" required min="{{ date('Y-m-d') }}">
                                    <label for="price">Price</label>
                                    <input type="number" name="total" class="form-control total" placeholder="Price" readonly>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn-success">Reserve</button>
                                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    @include('partials.toastr-script')
    <script>
        $(document).ready(() => {
    let pressTimer;
    let longPressDuration = 500;
    

    function startIncrement(productItem, stockText) {
        pressTimer = setInterval(function() {
            let currentStock = parseInt(stockText.text());
            if (currentStock > 0) {
                let quantityInput = productItem.find('#quantity'),
                    currentQuantity = parseInt(quantityInput.val());
                quantityInput.val(currentQuantity + 1);
                stockText.text(currentStock - 1);
                updateReservationButton(productItem, currentStock - 1);
            }
        }, 200);
    }

    function startDecrement(productItem, stockText) {
        pressTimer = setInterval(function() {
            let quantityInput = productItem.find('#quantity'),
                currentQuantity = parseInt(quantityInput.val());
            if (currentQuantity > 1) {
                let currentStock = parseInt(stockText.text());
                quantityInput.val(currentQuantity - 1);
                stockText.text(currentStock + 1);
                updateReservationButton(productItem, currentStock + 1);
            }
        }, 200); // Change the delay (in milliseconds) for the first decrement
    }

    $('.btn-add').click(function(e) {
        e.preventDefault();
        let productItem = $(this).closest('.product-widget'),
            stockText = productItem.find('.quantity span'),
            currentStock = parseInt(stockText.text());

        if (currentStock > 0) {
            let quantityInput = productItem.find('#quantity'),
                currentQuantity = parseInt(quantityInput.val());

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

    $(document).on('click', '.btn-reserve', function() {
        let quantityInput = $(this).closest('.product-widget').find('#quantity'),
            reservationMsg = $(this).closest('.product-widget').find('.reservation-msg');

        if (quantityInput.val() === '') {
            alert('Click the "+" button to have a reservation');
        } else {
            let widget = $(this).closest('.product-widget');
            let quantity = widget.find('#quantity').val();
            let price = widget.find('.priceInput').val();

            let currentDate = new Date();
            let threeDaysLater = new Date(currentDate.setDate(currentDate.getDate() + 4));
            let formattedDate = threeDaysLater.toISOString().split('T')[0];
            $('#reservationModal').on('shown.bs.modal', function(e) {
                $(this).find('.total').val(quantity * price);
                $(this).find('.quantity').val(quantity);
                $(this).find('[name="date"]').attr(formattedDate);
            }).modal('show');
        }
    });

    function updateReservationButton(productItem, stock) {
        let reserveBtn = productItem.find('.btn-reserve');
        if (stock <= -1) {
            reserveBtn.attr('disabled', 'disabled');
        } else {
            reserveBtn.removeAttr('disabled');
        }
    }
});

    </script>
</body>

</html>