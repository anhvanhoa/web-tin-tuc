<?php

namespace App\Repositories;

use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\User;
use Carbon\Carbon;

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

    public function getUserStatistics()
    {
        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();
        $result = $this->model->selectRaw("
            COUNT(*) as total_users,
            SUM(CASE WHEN created_at BETWEEN ? AND ? THEN 1 ELSE 0 END) as new_users",
            [$startOfMonth, $endOfMonth]
        )->first();
        return [
            'total_users' => $result->total_users,
            'new_users' => $result->new_users,
        ];
    }
}
