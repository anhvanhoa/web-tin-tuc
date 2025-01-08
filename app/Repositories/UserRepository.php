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
    public function updateUser(int $id, array $data)
    {
        return $this->updateById($id, $data);
    }

    public function getByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }
}
