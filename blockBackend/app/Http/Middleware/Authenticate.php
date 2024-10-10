<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $token = $request->header('Authorization');
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 401);
        }
        $decodedToken = base64_decode(str_replace('Bearer ', '', $token));
        list($userId, $expirationTime) = explode('|', $decodedToken);
        $_SESSION['user_id'] = $userId;
        if (time() > $expirationTime || is_integer($expirationTime)) {
            return response()->json(['message' => 'Token has expired'], 401);
        }

        return $next($request);
    }
}
