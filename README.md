# 说明

imi 框架：https://www.imiphp.com

## 安装

创建项目：`composer create-project imiphp/project-http:~2.1.0`

如果你希望在 Swoole 运行 imi：`composer require imiphp/imi-swoole:~2.1.0`

如果你希望在 RoadRunner 运行 imi：`composer require imiphp/imi-roadrunner:~2.1.0`

> RoadRunner 二进制文件请自行下载！

## 启动命令

Swoole：`vendor/bin/imi-swoole swoole/start` （强烈推荐）

Workerman：`vendor/bin/imi-workerman workerman/start` （推荐）

RoadRunner：`vendor/bin/imi-cli rr/start` （尝鲜）

> 切换环境运行前建议删除运行时文件目录：`rm -rf .runtime/*runtime`

PHP-FPM：`vendor/bin/imi-cli fpm/start`（不推荐）

建议在 FPM 模式下生成缓存：`vendor/bin/imi-cli imi/buildRuntime --app-namespace "ImiApp" --runtimeMode=Fpm`

## 权限

`.runtime` 目录需要有可写权限
