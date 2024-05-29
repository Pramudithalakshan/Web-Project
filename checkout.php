<?php

require __DIR__ . '/vendor/autoload.php';

$stripe_secret_key = 'sk_test_51PKw1DInByz2D3KbvJrEU5LdUNlKrf6Iq1Fj2AOvMgioINtsyBJkW9cfSeyV9nWn99TebgijxcDREyIkPXldA89e00egDoUVrp';


\Stripe\Stripe::setApiKey($stripe_secret_key);

$product_name = $_POST['name'];
$product_price = $_POST['price'];

try {

    $checkout_session = \Stripe\Checkout\Session::create([
        "mode" => 'payment',
        "success_url" => "http://localhost/My-Project/success.php",
        "cancel_url" => "http://localhost/My-Project/cancel.php",
        "payment_method_types" => ['card'],

        "line_items" => [
            [
                "price_data" => [
                    "currency" => 'LKR',
                    "unit_amount" => $product_price,
                    "product_data" => [
                        "name" => $product_name,
                    ]
                ],

                "quantity" => 1,
            ]
        ]


    ]);

    http_response_code(303);
    header('Location: ' . $checkout_session->url);

} catch (Exception $e) {

    http_response_code(500);
    echo "Error" .$e->getMessage();
}
