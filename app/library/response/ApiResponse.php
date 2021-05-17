<?php


namespace app\library\response;


use app\library\error\Error;
use Tebru\Gson\Gson;
use think\response\Json;

class ApiResponse
{
    /**
     * @param mixed $data
     * @return Json
     */
    public static function handle(object $data) : Json {
        if($data instanceof Error) {
            return self::error($data);
        }
        return self::success($data);
    }
    /**
     * API成功返回
     * @param mixed $data
     * @return Json
     */
    private static function success(object $data) : Json
    {
        $jsonBuilder = Gson::builder()->build();
        return json($jsonBuilder->toNormalized($data), 200);
    }

    /**
     * 错误输出
     * @param object $error
     * @return Json
     */
    private static function error(object $error) : Json
    {
        $jsonBuilder = Gson::builder()->build();
        return json($jsonBuilder->toNormalized($error), $error->getHttp());
    }

}