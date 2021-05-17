<?php

namespace app\controller;

use app\BaseController;
use app\controller\request\user\GetUserRequest;
use app\controller\validate\UserValidate;
use app\library\error\InvalidArgument;
use app\library\response\ApiResponse;
use app\library\transfer\Transfer;
use app\service\UserService;
use think\App;
use think\exception\ValidateException;
use think\Request;
use think\response\Json;

class UserController extends BaseController
{
    private $userService;

    function __construct(App $app)
    {
        parent::__construct($app);
        $this->userService = new UserService();
    }

    /**
     * @param Request $request
     * @return Json
     */
    public function getUser(Request $request)
    {
        try {
            //参数校验
            validate(UserValidate::class)
                ->batch(true)
                ->scene('getUser')
                ->check($request->param());
            //dto
            $requestData = Transfer::DataToObject($request->param(), GetUserRequest::class);
            return ApiResponse::handle($this->userService->getUser($requestData));
        } catch (ValidateException $e) {
            return ApiResponse::handle(new InvalidArgument($e->getMessage(), $e->getError()));
        }
    }
}
