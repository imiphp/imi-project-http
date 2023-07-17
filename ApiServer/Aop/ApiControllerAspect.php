<?php

declare(strict_types=1);

namespace ImiApp\ApiServer\Aop;

use Imi\Aop\AfterReturningJoinPoint;
use Imi\Aop\Annotation\AfterReturning;
use Imi\Aop\Annotation\Aspect;
use Imi\Aop\Annotation\PointCut;
use Imi\Aop\PointCutType;
use Imi\Server\Http\Route\Annotation\Action;
use Psr\Http\Message\ResponseInterface;

/**
 * 接口返回值处理.
 *
 * 注入带 Action 注解的控制器方法.
 *
 * @Aspect
 */
class ApiControllerAspect
{
    /**
     * @PointCut(
     *         type=PointCutType::ANNOTATION,
     *         allow={
     *             Action::class
     *         }
     * )
     *
     * @AfterReturning
     */
    public function parse(AfterReturningJoinPoint $joinPoint)
    {
        $returnValue = $joinPoint->getReturnValue();
        // 控制器中返回的是Response对象，则不处理
        if ($returnValue instanceof ResponseInterface)
        {
            return;
        }
        // 返回数组或对象，且没有code字段，则补上
        if (null === $returnValue || (\is_array($returnValue) && !isset($returnValue['code'])))
        {
            $returnValue['message'] = '';
            $returnValue['code'] = 0;
        }
        // 返回对象，且没有code字段，则补上
        elseif (\is_object($returnValue) && !isset($returnValue->code))
        {
            $returnValue->message = '';
            $returnValue->code = 0;
        }
        else
        {
            return;
        }
        // 设置返回值
        $joinPoint->setReturnValue($returnValue);
    }
}
