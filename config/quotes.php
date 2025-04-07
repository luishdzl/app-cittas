<?php

return [
    'api_url' => env('QUOTES_API_URL', 'https://dummyjson.com'),
    'max_requests' => env('QUOTES_MAX_REQUESTS', 10),
    'window_duration' => env('QUOTES_WINDOW_DURATION', 60),
];