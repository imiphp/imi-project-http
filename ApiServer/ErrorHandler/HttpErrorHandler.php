<?php

declare(strict_types=1);

namespace ImiApp\ApiServer\ErrorHandler;

use Imi\App;
use Imi\RequestContext;
use Imi\Server\Http\Error\IErrorHandler;
use Imi\Server\View\Annotation\View;

/**
 * Http 异常处理类.
 */
class HttpErrorHandler implements IErrorHandler
{
    protected View $viewAnnotation;

    public function __construct()
    {
        $this->viewAnnotation = new View();
    }

    public function handle(\Throwable $throwable): bool
    {
        // 是否不抛出异常
        $cancelThrow = false;
        $data = [
            'code'    => $throwable->getCode(),
            'message' => $throwable->getMessage(),
        ];
        // 调试模式下显示详细信息
        if (App::isDebug())
        {
            $data['exception'] = [
                'message'   => $throwable->getMessage(),
                'code'      => $throwable->getCode(),
                'file'      => $throwable->getFile(),
                'line'      => $throwable->getLine(),
                'trace'     => explode(\PHP_EOL, $throwable->getTraceAsString()),
            ];
        }
        $requestContext = RequestContext::getContext();
        /** @var \Imi\Server\View\Handler\Json $jsonView */
        $jsonView = $requestContext['server']->getBean('JsonView');
        $jsonView->handle($this->viewAnnotation, null, $data, $requestContext['response'] ?? null)->send();

        return $cancelThrow;
    }
}
