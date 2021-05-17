<?php


namespace app\controller\request\user;

use Tebru\Gson\Annotation as Gson;
use Tebru\Gson\Annotation\SerializedName;

class GetUserRequest
{
    /**
     * @Gson\Type("int")
     * @SerializedName("user_id")
     */
    private $userID;

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID): void
    {
        $this->userID = $userID;
    }
}