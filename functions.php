<?php

function welcome()
{
    echo '<h2 style = "padding : 20px">Welcome to the best book store</h2>';
}

function currencyValue($totalPrice, $currency)
{

    switch ($currency) {
        case 'USD':
            $totalPrice *=  1;
            break;
        case 'EUR':
            $totalPrice *=  0.90;
            break;
        case 'GBP':
            $totalPrice *=  0.75;
            break;
    }

    return $totalPrice;

}
