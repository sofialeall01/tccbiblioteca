<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Adiciona os cabeçalhos CORS para permitir o acesso de qualquer origem
        return $next($request)
            ->header('Access-Control-Allow-Origin', '*') // Permite todas as origens
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS') // Permite os métodos necessários
            ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization'); // Permite os cabeçalhos necessários
    }
}
