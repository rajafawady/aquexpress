<?php

namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (!$request->expectsJson()) {
            $path = $request->path();
            // Check if the request path starts with '/supplier'
            if (strpos($path, 'supplier') === 0) {
                return route('supplier.login'); // Redirect to supplier login route
            } else {
                return route('customer.login'); // Redirect to customer login route
            }
        }
    }
}
