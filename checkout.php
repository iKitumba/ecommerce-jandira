<?php
session_start();
require_once('lib/stripe-php/init.php');

$carrinho = $_SESSION["carrinho"];
$stripe = new Stripe\StripeClient("sk_test_51NFrF5A31164qptK64BWUAxgpd134LgFQ9lLL1O0h8ANDd8LO4VjczttniF5CEH7feu3utdSEEDG9tQrW8PoAmED006FRjaipf");
$lineItems = array();

foreach ($carrinho as $item) {
    $lineItem = array(
        'price_data' => array(
            'currency' => 'usd',
            'product_data' => array(
                'name' => $item['produto']['nome_produto'],
                'description' => $item['produto']['descricao_produto']
            ),
            'unit_amount' => floatval($item['produto']['preco_produto']) * 100
        ),
        'quantity' => $item['quantidade_produto']
    );

    $lineItems[] = $lineItem;
}

$session = $stripe->checkout->sessions->create([
    "success_url" => "http://localhost/ecommerce/sucesso.php",
    "cancel_url" => "http://localhost/ecommerce/index.php",
    "payment_method_types" => ['card'],
    "mode" => 'payment',
    "line_items" => $lineItems
]);

header('Content-Type: application/json');
echo json_encode($session);
?>
