<?php

namespace App\Exceptions\Traits;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Validation\ValidationException;

/**
 * 
 */
trait ApiException
{
  /**
   * Trata as Exceções da API
   *
   * @param [type] $request
   * @param [type] $e
   * @return void
   */
  public function getJsonException($request, $e)
  {
    if ($e instanceof ModelNotFoundException) {
      return $this->notFoundException();
    }
    if ($e instanceof HttpException) {
      return $this->httpException($e);
    }
    if ($e instanceof ValidationException) {
      return $this->validationException($e);
    }
    return $this->genericException();
  }

  /**
   * retorna o erro 404
   *
   * @return void
   */
  public function notFoundException()
  {
    return $this->getResponse(
      "Recurso não encontrado",
      "01",
      404
    );
  }

  /**
   * retorna o erro 500
   *
   * @return void
   */
  public function genericException()
  {
    return $this->getResponse(
      "Erro interno no servidor",
      "02",
      500
    );
  }


  /**
   * retorna o erro de HTTP
   *
   * @return void
   */
  public function httpException($e)
  {
    $messages = [
      405 => [
        "code" => "03",
        "messsage" => "Verbo HTTP nao permitido"
      ]
    ];

    return $this->getResponse(
      $messages[$e->getStatusCode]["message"],
      $messages[$e->getStatusCode()]["code"],
      $e->getStatusCode()
    );
  }

  /**
   * retorna erro de validacao
   *
   * @param [type] $e
   * @return void
   */
  public function validationException($e)
  {
    return response()->json($e->errors(), $e->status);
  }

  /**
   *
   * Monta a Resposta em Json
   *
   * @param [type] $message
   * @param [type] $code
   * @param [type] $status
   * @return void
   */
  public function getResponse($message, $code, $status)
  {
    return response()->json([
      "errors" => [
        [
          "status" => $status,
          "code" => $code,
          "message" => $message
        ]
      ]
    ], $status);
  }
}
