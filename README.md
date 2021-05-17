基于ThinkPHP 6.0 实施的MVC项目布局方案。
===============

## 介绍
这是基于ThinkPHP 6.0 实施的MVC项目布局方案。

> 运行环境要求PHP7.1+，兼容PHP8.0。

## 安装
```python
git clone this project
composer install
```

## 目录结构

```python
├─ app
|____controller             控制器层目录
| |____request              请求对象定义目录
|   |_____user              用户请求对象目录
|     |_GetUserRequest.php  获取用户请求对象
| |____response             响应对象定义目录
|   |_____user              用户响应对象目录
|     |_GetUserReponse.php  获取用户响应对象
| |____validate             验证器目录
|   |_____UserValidate.php  用户相关验证器
| |____UserController.php   用户相关控制器文件
|____service                服务层目录
| |____UserService.php      用户服务（业务逻辑处理）
|____dao                    dao层目录
| |____UserDao.php          用户dao层（存储、基础组件、调用外部API等）
|____model                  model层目录
| |____UserModel.php        用户dao层（存储、基础组件、调用外部API等）
|____library                公共库目录
| |____error                全局错误定义
| |____response             Response Helper
| |____transfer             数据传输helper（dto->do,do->dto）
|____TP框架相关目录、文件
```