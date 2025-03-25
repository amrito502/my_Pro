@extends('app.customer.master')
@section('customer')
<style>
    .custom-section-seperator {
        margin-top: 50px;
    }

    .custom-section-seperator-line {
        border-top: 2px solid #ddd;
        margin-top: 20px;
    }

    .custom-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    .custom-order-container {
        max-width: 1200px;
        margin: 0 auto;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .custom-order-title {
        font-size: 2rem;
        font-weight: 700;
        color: #2d3748;
        text-align: center;
        margin-bottom: 20px;
    }

    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .custom-table th,
    .custom-table td {
        padding: 12px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .custom-table th {
        background-color: #f7fafc;
        font-weight: 600;
    }

    .custom-table tr:nth-child(even) {
        background-color: #f9fafb;
    }

    .custom-form-group {
        margin-bottom: 20px;
    }

    .custom-form-group label {
        display: block;
        font-weight: 600;
        margin-bottom: 8px;
        color: #4a5568;
    }

    .custom-form-group input,
    .custom-form-group textarea,
    .custom-form-group select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 18px;
        transition: border-color 0.3s ease;
    }

    .custom-form-group input:focus,
    .custom-form-group textarea:focus,
    .custom-form-group select:focus {
        border-color: #3182ce;
        outline: none;
    }

    .custom-form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .custom-form-group input[type="checkbox"] {
        width: auto;
        margin-right: 10px;
    }

    .custom-button {
        background-color: #3182ce;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .custom-button:hover {
        background-color: #2b6cb0;
    }

    .custom-order-summary {
        margin-top: 30px;
        padding: 20px;
        background-color: #f7fafc;
        border-radius: 5px;
    }

    .custom-order-summary h4 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 15px;
        color: #2d3748;
    }

    .custom-order-summary table {
        width: 100%;
        border-collapse: collapse;
    }

    .custom-order-summary th,
    .custom-order-summary td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    .custom-order-summary th {
        background-color: #e2e8f0;
    }

    .custom-payment-options {
        margin-top: 20px;
    }

    .custom-payment-options input[type="radio"] {
        margin-right: 10px;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .custom-container {
            padding: 10px;
        }

        .custom-order-container {
            padding: 15px;
        }

        .custom-order-title {
            font-size: 1.5rem;
        }

        .custom-table th,
        .custom-table td {
            padding: 8px;
        }

        .custom-form-group input,
        .custom-form-group textarea,
        .custom-form-group select {
            font-size: 0.9rem;
        }

        .custom-button {
            width: 100%;
            padding: 10px;
        }

        .custom-order-summary {
            padding: 15px;
        }

        .custom-order-summary h4 {
            font-size: 1.2rem;
        }
    }
</style>

<div class="custom-section-seperator">
    <div class="custom-container">
        <hr class="custom-section-seperator-line">
    </div>
</div>

<div class="custom-container">
    <div class="custom-order-container">
        <h2 class="custom-order-title">Add New Address</h2>

        <form action="{{ route('store.checkout') }}" method="POST" class="p-4">
            @csrf

            <h1 class="mb-4" style="font-size: 19px;">Shipping Address</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            @if ($address)
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>State</th>
                                            <th>Country</th>
                                            <th>ZIP</th>
                                            <th>Type</th>
                                            <th>Default?</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $address->name }}</td>
                                            <td>{{ $address->phone }}</td>
                                            <td>
                                                {{ $address->locality }}, {{ $address->address }}
                                                @if ($address->landmark)
                                                    <br><small>Landmark: {{ $address->landmark }}</small>
                                                @endif
                                            </td>
                                            <td>{{ $address->city }}</td>
                                            <td>{{ $address->state }}</td>
                                            <td>{{ $address->country }}</td>
                                            <td>{{ $address->zip }}</td>
                                            <td>{{ ucfirst($address->type) }}</td>
                                            <td>
                                                @if ($address->is_default)
                                                    <span class="text-green-600 font-bold">Yes</span>
                                                @else
                                                    <span class="text-gray-600">No</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <!-- Name -->
                                <div class="custom-form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" value="{{ old('name') }}" required>
                                </div>

                                <!-- Phone -->
                                <div class="custom-form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
                                </div>

                                <!-- Locality -->
                                <div class="custom-form-group">
                                    <label for="locality">Locality</label>
                                    <input type="text" name="locality" id="locality" value="{{ old('locality') }}" required>
                                </div>

                                <!-- Address -->
                                <div class="custom-form-group">
                                    <label for="address">Shipping Address</label>
                                    <textarea name="address" id="address" required>{{ old('address') }}</textarea>
                                </div>

                                <!-- City -->
                                <div class="custom-form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" id="city" value="{{ old('city') }}" required>
                                </div>

                                <!-- State -->
                                <div class="custom-form-group">
                                    <label for="state">State</label>
                                    <input type="text" name="state" id="state" value="{{ old('state') }}" required>
                                </div>

                                <!-- Country -->
                                <div class="custom-form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" value="{{ old('country') }}" required>
                                </div>

                                <!-- Landmark -->
                                <div class="custom-form-group">
                                    <label for="landmark">Landmark (Optional)</label>
                                    <input type="text" name="landmark" id="landmark" value="{{ old('landmark') }}">
                                </div>

                                <!-- ZIP Code -->
                                <div class="custom-form-group">
                                    <label for="zip">ZIP Code</label>
                                    <input type="text" name="zip" id="zip" value="{{ old('zip') }}" required>
                                </div>

                                <!-- Address Type -->
                                <div class="custom-form-group">
                                    <label for="type">Address Type</label>
                                    <select name="type" style="font-size: 16px;" id="type">
                                        <option value="home" {{ old('type') == 'home' ? 'selected' : '' }}>Home</option>
                                        <option value="office" {{ old('type') == 'office' ? 'selected' : '' }}>Office</option>
                                    </select>
                                </div>

                                <!-- Default Address -->
                                <div class="custom-form-group">
                                    <label for="is_default">Set as Default Address</label>
                                    <input type="checkbox" name="is_default" id="is_default" {{ old('is_default') ? 'checked' : '' }}>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <div class="custom-order-summary">
                                <h4>Your Order</h4>
                                <table>
                                    <tr>
                                        <th>Product</th>
                                        <th>Subtotal</th>
                                    </tr>
                                    @foreach (Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->content() as $item)
                                        <tr>
                                            <td>{{ $item->name }} x {{ $item->qty }}</td>
                                            <td>{{ $item->subtotal() }}</td>
                                        </tr>
                                    @endforeach
                                    @if (Session::has('discounts'))
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->subtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Discount {{ Session::get('coupon')['code'] }}</td>
                                            <td>{{ Session::get('discounts')['discount'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Subtotal After Discount</td>
                                            <td>{{ Session::get('discounts')['subtotal'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td>Free Shipping</td>
                                        </tr>
                                        <tr>
                                            <td>VAT</td>
                                            <td>{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->tax() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->total() }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->subtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping</td>
                                            <td>Free Shipping</td>
                                        </tr>
                                        <tr>
                                            <td>VAT</td>
                                            <td>{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->tax() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->total() }}</td>
                                        </tr>
                                    @endif
                                </table>

                                <h3 class="mt-3">Bkash Number</h3>
                                @if ($orderirem_seller)
                                    <h4>{{ $orderirem_seller->seller->phone }}</h4>
                                @else
                                    <p>No store information available.</p>
                                @endif

                                <div class="custom-payment-options">
                                    <div class="form-group my-3">
                                        <label for="">payment_number</label>
                                        <input type="text" name="payment_number" placeholder="payment_number" class="form-control mt-2">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">payment_trxid</label>
                                        <input type="text" name="payment_trxid" placeholder="payment_trxid" class="form-control mt-2">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">payment_screenshot</label>
                                        <input type="file" name="payment_screenshot" class="form-control mt-2">
                                    </div>
                                    <input type="radio" name="mode" value="cod" required> Cash on Delivery
                                    <input type="radio" name="mode" value="card" required> Card
                                    <input type="radio" name="mode" value="paypal" required> PayPal
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="custom-button">Place Order</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Add client-side validation or other JavaScript functionality here
</script>
@endsection
