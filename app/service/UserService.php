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
     * @param GetUserRequest $req
     * @return NotFound|object
     */
    public function getUser(GetUserRequest $req) : object
    {
        //business logic
        $userID = $req->getUserID();
        if (!$user = $this->userDao->getUserByCache($userID)) {
            if(!$user = $this->userDao->getUser($userID)) {
                return new NotFound('user not found');
            }else{
                //TODO create cache
            }
        }

        return Transfer::DataToObject($user, GetUserResponse::class);
    }
}