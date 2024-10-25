<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .header, .footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 28px;
            margin: 0;
        }
        .invoice-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .invoice-info div {
            width: 45%;
        }
        .invoice-info h2 {
            font-size: 18px;
            color: green;
        }
        .invoice-info address {
            font-size: 14px;
            line-height: 1.5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .summary {
            text-align: right;
        }
        .summary table {
            width: auto;
            margin-left: auto;
        }
        .summary table th, .summary table td {
            border: none;
            padding: 8px;
        }
        .buttons {
            text-align: right;
            margin-top: 20px;
        }
        .buttons button {
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pharmacare</h1>
            <h3>Dynamic Admin Panel</h3>
            <p>Invoice No: {{ $invoice->invoice_no }}</p>
        </div>
        
        <div class="invoice-info">
            <div>
                <h2>BILLING FROM</h2>
                <address>
                    Dynamic Admin Panel<br>
                    123/A, Street, State-12345, Demo<br>
                    Email: info@bdtask.com<br>
                    Phone: 0129348341
                </address>
            </div>
            <div>
                <h2>BILLING TO</h2>
                <address>
                John Doe<br>
                    Phone: <br>
                    Date: {{ $invoice->date }}
                </address>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->name }} ({{ $item->dosage }})</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="summary">
            <table>
                <tr>
                    <th>Sub Total:</th>
                    <td>{{ number_format($invoice->sub_total, 2) }}</td>
                </tr>
                <tr>
                    <th>Total VAT:</th>
                    <td>{{ number_format($invoice->vat, 2) }}</td>
                </tr>
                <tr>
                    <th>Grand Total:</th>
                    <td>{{ number_format($invoice->grand_total, 2) }}</td>
                </tr>
                <tr>
                    <th>Due Amount:</th>
                    <td>{{ number_format($invoice->due_amount, 2) }}</td>
                </tr>
            </table>
        </div>

        <div class="buttons">
            <button onclick="window.print()">Print Invoice</button>
        </div>
    </div>
</body>
</html>
