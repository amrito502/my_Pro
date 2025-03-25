@extends('app.customer.master')

@section('customer')

<style>
    /* General Page Styles */
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
        color: #333;
    }

    /* Section Separator */
    .custom-section-seperator {
        margin-top: 50px;
    }

    .custom-section-seperator-line {
        border-top: 2px solid #ddd;
        margin-top: 20px;
    }

    /* Container */
    .custom-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px 20px;
        margin-bottom: 50px;
    }

    /* Order Confirmation Card */
    .custom-order-confirmation-container {
        background-color: #ffffff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }

    /* Title */
    .custom-order-confirmation-title {
        font-size: 30px;
        font-weight: 700;
        color: #2d3748;
        text-align: center;
        margin-bottom: 40px;
    }

    /* Table Styles */
    .custom-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 50px;
        background-color: #fff;
    }

    .custom-th, .custom-td {
        padding: 20px;
        text-align: left;
        font-size: 16px;
        color: #4a5568;
    }

    .custom-th {
        background-color: #f7fafc;
        font-weight: 600;
    }

    .custom-td {
        border-top: 1px solid #e2e8f0;
    }

    tr:nth-child(even) {
        background-color: #f9fafb;
    }

    .custom-order-details-table th,
    .custom-order-items-table th {
        text-transform: uppercase;
        font-size: 16px;
    }

    /* Action Section */
    .custom-action-container {
        text-align: center;
        margin-top: 50px;
    }

    .custom-thank-you-message {
        font-size: 1.125rem;
        color: #718096;
        margin-bottom: 30px;
    }

    .custom-continue-shopping-button {
        padding: 15px 30px;
        background-color: #3182ce;
        color: white;
        font-size: 15px;
        text-decoration: none;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .custom-continue-shopping-button:hover {
        background-color: #2b6cb0;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .custom-container {
            padding: 20px;
        }

        .custom-order-confirmation-container {
            padding: 20px;
        }

        .custom-order-confirmation-title {
            font-size: 16px;
        }

        .custom-table .custom-th,
        .custom-table .custom-td {
            padding: 15px;
            font-size: 16px;
        }
    }
</style>

    <div class="custom-section-seperator">
        <div class="custom-container">
            <hr class="custom-section-seperator-line">
        </div>
    </div>

    <div class="custom-container custom-order-confirmation-container">
        <div class="custom-order-confirmation-card">
            <!-- Added "Zamanshops" Name -->
            <h2 class="custom-order-confirmation-title">Order Confirmation - Zamanshops</h2>

            <!-- Order Details Table -->
            <div class="table-container">
                <table class="custom-order-details-table custom-table">
                    <thead>
                        <tr>
                            <th class="custom-th">Order Number</th>
                            <th class="custom-th">Order Date</th>
                            <th class="custom-th">Status</th>
                            <th class="custom-th">Total</th>
                            <th class="custom-th">Payment Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="custom-td">{{ $order->id }}</td>
                            <td class="custom-td">{{ $order->created_at }}</td>
                            <td class="custom-td">{{ $order->status }}</td>
                            <td class="custom-td">{{ $order->total }}</td>
                            <td class="custom-td">{{ $order->transaction->mode }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Order Items Table -->
            <div class="table-container">
                <table class="custom-order-items-table custom-table">
                    <thead>
                        <tr>
                            <th class="custom-th">Product</th>
                            <th class="custom-th">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item)
                            <tr>
                                <td class="custom-td">{{ $item->product->name }} x {{ $item->quantity }}</td>
                                <td class="custom-td">{{ $item->price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="custom-td">Shipping</td>
                            <td class="custom-td">Free Shipping</td>
                        </tr>
                        <tr>
                            <td class="custom-td">Subtotal</td>
                            <td class="custom-td">{{ $order->subtotal }}</td>
                        </tr>
                        <tr>
                            <td class="custom-td">Discount</td>
                            <td class="custom-td">{{ $order->discount }}</td>
                        </tr>
                        <tr>
                            <td class="custom-td">VAT</td>
                            <td class="custom-td">{{ $order->tax }}</td>
                        </tr>
                        <tr>
                            <td class="custom-td font-bold">Total</td>
                            <td class="custom-td font-bold">{{ $order->total }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Action Section -->
            <div class="custom-action-container">
                <p class="custom-thank-you-message">Thank you for your purchase! If you have any questions, please contact our support team.</p>
                <a href="{{ route('order.download.pdf', $order->id) }}" class="custom-continue-shopping-button">Download PDF</a>
                <a href="{{ url('/') }}" class="custom-continue-shopping-button">Continue Shopping</a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
