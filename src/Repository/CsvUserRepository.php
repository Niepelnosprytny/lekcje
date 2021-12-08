<?php

namespace App\Repository;

use App\Model\UserCredentials;

class CsvUserRepository implements UserRepositoryInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * @var array
     */
    private $users;

    public function __construct(array $users = []){
        $this->users = $users;
        $this->path = "../data/users.csv";
    }

    /**
     * @param string $username
     * @return UserCredentials|null
     */
    public function findCredentialsByUsername (string $username): ?UserCredentials
    {
        foreach(file($this->path) as $line){
            if(strpos($line, $username) !== false){
                $this->users[$username] = explode(";", $line)[1];
            }
        }
        if (!isset($this->users[$username])) {
            return null;
        }
        return new UserCredentials($username, $this->users[$username]);
    }
}