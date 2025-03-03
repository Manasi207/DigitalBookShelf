<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentMethod = $_POST['payment_method'];

    // Redirect based on payment method (example logic)
    switch ($paymentMethod) {
        case 'gpay':
            header('Location: gpay_payment_gateway.php');
            break;
        case 'razorpay':
            header('Location: razorpay_payment_gateway.php');
            break;
        case 'amazonpay':
            header('Location: amazonpay_payment_gateway.php');
            break;
        case 'paytm':
            header('Location: paytm_payment_gateway.php');
            break;
        case 'phonepe':
            header('Location: phonepe_payment_gateway.php');
            break;
        default:
            echo "Invalid payment method selected.";
    }
}
?>
