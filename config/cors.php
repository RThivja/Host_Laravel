<?php

return [
    'paths' => ['api/*'],  // Apply CORS to the API routes
    'allowed_methods' => ['*'],  // Allow all HTTP methods (GET, POST, PUT, DELETE, etc.)
    'allowed_origins' => ['*'],  // Allow all origins (you can restrict it to your React Native app URL)
    'allowed_origins' => ['*'],  // Allow all origins (for development)
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],  // Allow all headers
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,  // If you need to send cookies or authorization headers
];
