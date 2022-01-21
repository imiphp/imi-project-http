# 说明

imi 框架：https://www.imiphp.com

## 安装

### 方法一

* git 拉取下本项目

* 在本项目目录中，执行命令：`composer update`

### 方法二

* `composer create-project imiphp/project-http:~2.1.0`

## Swoole

为 Windows 系统用户兼容考虑，默认没有引入 Swoole 组件，如有需要请手动引入：`composer require imiphp/imi-swoole:~2.1.0`

## RoadRunner

默认没有引入 RoadRunner 组件，如有需要请手动引入：`composer require imiphp/imi-roadrunner:~2.1.0`

> RoadRunner 二进制文件请自行下载！

## 启动命令

PHP-FPM：`vendor/bin/imi-cli fpm/start`

建议在 FPM 模式下生成缓存：`vendor/bin/imi-cli imi/buildRuntime --app-namespace "ImiApp" --runtimeMode=Fpm`

Swoole：`vendor/bin/imi-swoole swoole/start`

Workerman：`vendor/bin/imi-workerman workerman/start`

RoadRunner：`vendor/bin/imi-cli rr/start`

> 切换环境运行前建议删除运行时文件目录：`rm -rf .runtime/*runtime`

## 权限

`.runtime` 目录需要有可写权限
