<?php

use Carbon\Carbon;

if (!function_exists('carbon')) {
    function carbon($val = null)
    {
        return new Carbon($val);
    }
}

if (class_exists('\Laravel\Cashier\Cashier')) {
    if (!function_exists('money')) {
        function money($amount, $currency = null, $locale = null)
        {
            return \Laravel\Cashier\Cashier::formatAmount(round($amount, 2) * 100, $currency, $locale);
        }
    }
}