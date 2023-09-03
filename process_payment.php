<?php
require_once __DIR__ . '/vendor/autoload.php';


// Initialize Razorpay with your API key and secret key
$razorpayApiKey = getenv('rzp_test_InqF9HsZIjNaZV');
$razorpaySecretKey = getenv('PzvrPMRlcQSIeFSvKt4yMPoa');

use Razorpay\Api\Api;

$razorpay = new Api($razorpayApiKey, $razorpaySecretKey);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle the Razorpay payment here
    if (isset($_POST['razorpay_payment_id'])) {
        $razorpayPaymentId = $_POST['razorpay_payment_id'];

        // Verify the payment using the Razorpay API
        try {
            $payment = $razorpay->payment->fetch($razorpayPaymentId);
            if ($payment->status === 'captured') {
                // Payment is successful, update your order status and show a success message
                echo "Payment successful. Thank you for your order!";
                // You can update your order status and perform other actions here
            } else {
                // Payment failed, show an error message
                echo "Payment failed. Please try again.";
            }
        } catch (Exception $e) {
            // Handle any exceptions from Razorpay API
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Invalid request
        echo "Invalid request.";
    }
} else {
    // Invalid request method
    echo "Invalid request.";
}
?>