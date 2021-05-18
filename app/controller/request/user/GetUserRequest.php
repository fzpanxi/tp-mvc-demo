<?php


namespace app\controller\request\user;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class GetUserRequest
{
    /**
     * @Type("int")
     * @SerializedName("user_id")
     */
    private $userID;

    /**
     * @return mixed
     */
    public function getUserID() : int
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID(int $userID): void
    {
        $this->userID = $userID;
    }
}