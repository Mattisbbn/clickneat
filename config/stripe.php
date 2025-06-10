<?php

return [
    'publishable_key' => env('STRIPE_KEY', 'pk_test_YOUR_PUBLISHABLE_KEY_HERE'),
    'secret_key' => env('STRIPE_SECRET', 'sk_test_YOUR_SECRET_KEY_HERE'),
    'webhook_secret' => env('STRIPE_WEBHOOK_SECRET', 'whsec_test1234567890abcdefghijklmnopqrstuvwxyz'),
];
