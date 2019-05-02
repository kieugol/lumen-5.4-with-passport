<?php

namespace App\Exceptions;

use App\Helpers\CommonHelper;
use App\Libraries\Api;
use ErrorException;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use ReflectionException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use CommonHelper;
    
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];
    
    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     *
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }
    
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception               $e
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // Customize response when exception is instance of ValidationException
        if ($e instanceof ValidationException && $e->getResponse()) {
            $arrError = json_decode($e->getResponse()->getContent(), true);
            
            return Api::response([MESSAGE_KEY => $this->formatErrorsMessage($arrError)], Response::HTTP_BAD_REQUEST);
        }
        
        if ($e instanceof NotFoundHttpException) {
            return Api::response([MESSAGE_KEY => trans("message.page_not_found")], Response::HTTP_NOT_FOUND);
        }
        
        if ($e instanceof HttpException) {
            return Api::response([MESSAGE_KEY => $e->getMessage()], $e->getStatusCode());
        }
        
        if ($e instanceof QueryException || $e instanceof ErrorException || $e instanceof ReflectionException) {
            return Api::response([MESSAGE_KEY => trans("message.server_error")], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
        
        return parent::render($request, $e);
    }
}
