<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\User;


/**
 * Class UserRepository.
 */
class UserRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model user
     */
    public function model()
    {
        return User::class;
    }

    public function createUser(array $data)
    {
        return $this->create($data);
    }

    public function updateUser(int $id, array $data)
    {
        return $this->updateById($id, $data);
    }

    public function findUser($email)
    {
        return $this->where('email', $email)->first();
    }
}
