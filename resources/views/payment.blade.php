<!DOCTYPE html>
<html>
<head>
    <title>Payment - StayEase Hotel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: Arial;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .payment-box {
            background: white;
            padding: 40px;
            border-radius: 15px;
            width: 400px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            background: #1d4ed8;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #2563eb;
        }
    </style>
</head>
<body>

<div class="payment-box">
    <h1>Payment</h1>

    <form>
        <input type="text" placeholder="Card Holder Name">

        <input type="text" placeholder="Card Number">

        <input type="text" placeholder="Expiry Date">

        <input type="text" placeholder="CVV">

        <button type="submit">Pay Now</button>
    </form>
</div>

</body>
</html>