<?php


namespace app\library\error;


abstract class Error
{
    abstract protected function getCode(): int;
    abstract protected function setCode(int $code): void;
    abstract protected function getHttp(): int;
    abstract protected function setHttp(int $http): void;
    abstract protected function getStatus(): string;
    abstract protected function setStatus(string $status): void;
    abstract protected function getMessage(): string;
    abstract protected function setMessage(string $message): void;
}