<?php
return [
    // 项目根命名空间
    'namespace'    =>    'ImiApp',

    // 配置文件
    'configs'    =>    [
        'beans'        =>    __DIR__ . '/beans.php',
    ],

    // 扫描目录
    'beanScan'    =>    [
        'ImiApp\Listener',
        'ImiApp\Task',
    ],

    // 组件命名空间
    'components'    =>  [
    ],

    // 主服务器配置
    'mainServer'    =>    [
        'namespace'    =>    'ImiApp\ApiServer',
        'type'        =>    Imi\Server\Type::HTTP,
        'host'        =>    '0.0.0.0',
        'port'        =>    8080,
        'configs'    =>    [
            // 'worker_num'        =>  8,
            // 'task_worker_num'   =>  16,
        ],
    ],

    // 子服务器（端口监听）配置
    'subServers'        =>    [
        // 'SubServerName'   =>  [
        //     'namespace'    =>    'ImiApp\XXXServer',
        //     'type'        =>    Imi\Server\Type::HTTP,
        //     'host'        =>    '0.0.0.0',
        //     'port'        =>    13005,
        // ]
    ],

    // 连接池配置
    'pools'    =>    [
        // 主数据库
        // 'maindb'    =>    [
        //     'pool' => [
        //         // 同步池类名
        //         'syncClass'     =>    \Imi\Db\Pool\SyncDbPool::class,
        //         // 协程池类名
        //         'asyncClass'    =>    \Imi\Db\Pool\CoroutineDbPool::class,
        //         // 连接池配置
        //         'config' => [
        //            'maxResources' => 10,
        //            'minResources' => 0,
        //         ],
        //     ],
        //     // 连接池资源配置
        //     'resource' => [
        //         'host'        => '127.0.0.1',
        //         'port'        => 3306,
        //         'username'    => 'root',
        //         'password'    => 'root',
        //         'database'    => 'database_name',
        //         'charset'     => 'utf8mb4',
        //     ],
        // ],
        // 'redis'    =>    [
        //     'pool'    =>    [
        //         // 同步池类名
        //         'syncClass'     =>    \Imi\Redis\SyncRedisPool::class,
        //         // 协程池类名
        //         'asyncClass'    =>    \Imi\Redis\CoroutineRedisPool::class,
        //         // 连接池配置
        //         'config'    =>    [
        //             'maxResources'    =>    10,
        //             'minResources'    =>    0,
        //         ],
        //     ],
        //     // 连接池资源配置
        //     'resource'    =>    [
        //         'host'      => '127.0.0.1',
        //         'port'      => 6379,
        //         'password'  => null,
        //     ],
        // ],
    ],

    // 数据库配置
    'db'    =>    [
        // 数默认连接池名
        'defaultPool'    =>    'maindb',
    ],

    // redis 配置
    'redis' =>  [
        // 数默认连接池名
        'defaultPool'   =>  'redis',
    ],

    // 内存表配置
    'memoryTable'   =>  [
        // 't1'    =>  [
        //     'columns'   =>  [
        //         ['name' => 'name', 'type' => \Swoole\Table::TYPE_STRING, 'size' => 16],
        //         ['name' => 'quantity', 'type' => \Swoole\Table::TYPE_INT],
        //     ],
        //     'lockId'    =>  'atomic',
        // ],
    ],

    // 锁
    'lock'  =>[
        // 'list'  =>  [
        //     'atomic' =>  [
        //         'class' =>  'AtomicLock',
        //         'options'   =>  [
        //             'atomicName'    =>  'atomicLock',
        //         ],
        //     ],
        // ],
    ],

    // atmoic 配置
    'atomics'    =>  [
        // 'atomicLock'   =>  1,
    ],
];