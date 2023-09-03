<?php
// Include the Razorpay PHP library
require 'razorpay-php/Razorpay.php';

use Razorpay\Api\Api;

// Your Razorpay API Key ID and Key Secret
$api_key_id = 'YOUR_API_KEY_ID';
$api_key_secret = 'YOUR_API_KEY_SECRET';

// Initialize the Razorpay API
$api = new Api($api_key_id, $api_key_secret);

// Get the payment amount from the form
$amount = $_POST['amount'] * 100; // Convert to paisa (Indian currency)

// Create a Razorpay order
$order = $api->order->create(array(
    'amount' => $amount,
    'currency' => 'INR',
));

// Display the payment page
?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h2>Payment Page</h2>
    <button id="rzp-button">Pay Now</button>
    <script>
        var options = {
            "key": "<?php echo $api_key_id; ?>",
            "amount": "<?php echo $amount; ?>",
            "currency": "INR",
            "name": "Your Company Name",
            "description": "Payment for Products/Services",
            "order_id": "<?php echo $order->id; ?>",
            "handler": function (response) {
                alert("Payment successful! Payment ID: " + response.razorpay_payment_id);
                // You can handle the payment success here (e.g., update your database).
            },
        };
        var rzp = new Razorpay(options);
        document.getElementById('rzp-button').onclick = function () {
            rzp.open();
        };
    </script>
</body>
</html>
