<?php


namespace app\service;


use app\controller\request\user\GetUserRequest;
use app\controller\response\user\GetUserResponse;
use app\dao\UserDao;
use app\library\error\NotFound;
use app\library\transfer\Transfer;

class UserService
{
    private $userDao;

    function __construct()
    {
        $this->userDao = new UserDao();
    }

    /**
     * @param GetUserRequest $request
     * @return NotFound|object
     */
    public function getUser(GetUserRequest $request) : object
    {
        //business logic
        $userID = $request->getUserID();
        if (!$user = $this->userDao->getUserByCache($userID)) {
            if(!$user = $this->userDao->getUser($userID)) {
                return new NotFound('user not found');
            }else{
                //TODO create cache
            }
        }
        $user['user_id'] = $user['id'] ?? 0;
        return Transfer::DataToObject($user, GetUserResponse::class);
    }
}