<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;
use Symfony\Component\HttpKernel\Exception\GoneHttpException;
use Symfony\Component\HttpKernel\Exception\LengthRequiredHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotAcceptableHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\PreconditionFailedHttpException;
use Symfony\Component\HttpKernel\Exception\PreconditionRequiredHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
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
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($e != null) return view('error', ['error' => $this::getExceptionMessage($e)]);
        return parent::render($request, $e);
    }

    public static function getExceptionMessage(Exception $exception){
        if (is_null($exception)) return null;

        $message = $exception->getMessage();

        if (isset($message) && trim($message) !== '') return $message;

        switch(true){
            case ($exception instanceof NotFoundHttpException):
                return "Not Found";
            case ($exception instanceof UnauthorizedHttpException):
                return "Unauthorized";
            case ($exception instanceof AccessDeniedHttpException):
                return "Access Denied";
            case ($exception instanceof BadRequestHttpException):
                return "Bad Request";
            case ($exception instanceof ConflictHttpException):
                return "Conflict";
            case ($exception instanceof GoneHttpException):
                return "Gone";
            case ($exception instanceof LengthRequiredHttpException):
                return "Length Required";
            case ($exception instanceof MethodNotAllowedHttpException):
                return "Method Not Allowed";
            case ($exception instanceof NotAcceptableHttpException):
                return "Not Acceptable";
            case ($exception instanceof PreconditionFailedHttpException):
                return "Precondition Failed";
            case ($exception instanceof PreconditionRequiredHttpException):
                return "Precondition Required";
            case ($exception instanceof ServiceUnavailableHttpException):
                return "Service Unavailable";
            default:
                return null;
        }
    }
}
