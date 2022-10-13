<?php

declare(strict_types=1);

namespace ImiApp\Module\Test\ApiController;

use Imi\Aop\Annotation\Inject;
use Imi\App;
use Imi\Db\Db;
use Imi\Redis\Redis;
use Imi\Server\Http\Controller\HttpController;
use Imi\Server\Http\Route\Annotation\Action;
use Imi\Server\Http\Route\Annotation\Controller;
use Imi\Server\Http\Route\Annotation\Route;
use Imi\Server\View\Annotation\HtmlView;
use Imi\Server\View\Annotation\View;
use ImiApp\Module\Test\Service\TestService;

/**
 * @Controller("/")
 * @HtmlView(baseDir="Test/template/index/")
 */
class IndexController extends HttpController
{
    /**
     * @Inject
     */
    protected TestService $testService;

    /**
     * @Action
     * @Route("/")
     * @View(renderType="html")
     *
     * @return array
     */
    public function index()
    {
        return [
            'hello' => $this->testService->getImi(),
            'time'  => date('Y-m-d H:i:s', time()),
        ];
    }

    /**
     * @Action
     *
     * @return array
     */
    public function api()
    {
        return [
            'mode'  => App::getApp()->getType(),
            'hello' => 'imi',
            'time'  => date('Y-m-d H:i:s', time()),
        ];
    }

    /**
     * @Action
     *
     * @return array
     */
    public function db()
    {
        return [
            'mode'         => App::getApp()->getType(),
            'mysqlVersion' => Db::getInstance()->query('select VERSION()')->fetchColumn(),
        ];
    }

    /**
     * @Action
     *
     * @return array
     */
    public function redis()
    {
        return [
            'mode' => App::getApp()->getType(),
            'info' => Redis::info(),
        ];
    }
}
