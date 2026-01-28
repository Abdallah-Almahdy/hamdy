<!DOCTYPE html>
<html>

<head>
    <title>Payment</title>
</head>

<body>
    <form action="/payment" method="POST">
        @csrf
        <input type="number" name="amount" placeholder="Enter amount" required>
        <button type="submit">Pay</button>
    </form>
</body>

</html>
