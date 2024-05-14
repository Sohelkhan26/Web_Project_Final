<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Http\Exceptions\ThrottleRequestsException;

class CustomThrottleRequests extends ThrottleRequests
{
    public function handle($request, Closure $next, $maxAttempts = 3, $decayMinutes = 1, $prefix = '')
    {
        $key = $this->resolveRequestSignature($request);

        $maxAttempts = $this->resolveMaxAttempts($request, $maxAttempts);

        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            throw $this->buildException($key, $maxAttempts);
        }

        $this->limiter->hit($key, $decayMinutes);

        $response = $next($request);

        $response->headers->add(
            $this->getHeaders(
                $maxAttempts,
                $this->calculateRemainingAttempts($key, $maxAttempts)
            )
        );

        return $response;
    }

    protected function buildException($request, $key, $maxAttempts, $responseCallback = null): ThrottleRequestsException
    {
        $retryAfter = $this->getTimeUntilNextRetry($key);

        $headers = $this->getHeaders(
            $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts, $retryAfter),
            $retryAfter
        );

        return new ThrottleRequestsException('Too Many Attempts.', null, $headers);
    }
}
