<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * ------------------------------------------------------------------
     * Retorno de erro
     * ------------------------------------------------------------------
     *
     * Response a solicitação com o status 400 e uma descrição do erro
     * em formato json.
     *
     * @param  string $error
     * @param  boolean|string $log
     * @return JsonResponse
     */
    public function fails($error, $log = false)
    {

        if($log){
            //todo implement loggin
        }

        return response()->json(['message' => trans($error)],400);

    }

    /**
     * ------------------------------------------------------------------
     * Retorno de sucesso
     * ------------------------------------------------------------------
     *
     * Response a solicitação com o status 200 e opcionalmente pode
     * incluir loggin e informações adicionais.
     *
     * @param $message
     * @param bool $redirect
     * @param mixed $content
     * @param boolean|string $log
     * @return JsonResponse
     */
    public function success($message, $redirect = false, $content = [], $log = false)
    {

        if($log){
            //todo implement logger
        }

        //retorna o json de sucesso
        return response()->json([
            'message'  => trans($message),
            'redirect' => $redirect,
            'content'  => $content
        ], 200);

    }

}
