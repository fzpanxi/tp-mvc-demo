<?php


namespace app\library\error;



use app\library\response\ApiResponse;
use think\exception\Handle;
use think\exception\HttpException;
use think\facade\Env;
use think\Response;
use Throwable;

class ExceptionHandle extends Handle
{
    public function render($request, Throwable $e): Response
    {
        // 调试模式直接业务处理
        if (Env::get('APP_DEBUG')) {
            return parent::render($request, $e);
        }
        if ($e instanceof HttpException) {
            if ($e->getStatusCode() == 404) {
                return ApiResponse::handle(new NotFound('not found'));
            } else if ($e->getStatusCode() == 500) {
                return ApiResponse::handle(new Internal('internal error'));
            }
        }
        return ApiResponse::handle(new Internal('internal error'));
    }

}