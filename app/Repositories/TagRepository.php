<?php

namespace App\Repositories;

use App\Models\Tag;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class TagRepository.
 */
class TagRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Tag::class;
    }

    public function allTags()
    {
        return $this->all();
    }

}
