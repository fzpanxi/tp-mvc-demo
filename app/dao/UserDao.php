<?php


namespace app\dao;


use app\domain\entity\UserEntity;
use app\model\User;
use app\model\UserModel;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;
use think\facade\Cache;

class UserDao
{
    const USER_INFO_CACHE_KEY = 'userInfo:';
    private $userModel;
    private $userCache;

    function __construct()
    {
        $this->userModel = new UserModel();
        $this->userCache = Cache::store('redis')->handler();
    }

    /**
     * 获取单个用户信息(db)
     * @param int $userID
     * @return array
     */
    public function getUser(int $userID) : array
    {
        $user = null;
        try {
            $user = $this->userModel
                ->where('id', $userID)
                ->field('id,mobile,password,nickname,avatar,create_time,update_time')
                ->find();
        } catch (DataNotFoundException $e) {
            //TODO handle DataNotFoundException
        } catch (ModelNotFoundException $e) {
            //TODO handle ModelNotFoundException
        } catch (DbException $e) {
            //TODO handle DbException
        }
        return $user ? $user->toArray() : [];
    }

    /**
     * 获取单个用户信息(cache)
     * @param int $userID
     * @return array
     */
    public function getUserByCache(int $userID) : array
    {
        return $this->userCache->hGetAll(self::USER_INFO_CACHE_KEY . $userID);
    }
}