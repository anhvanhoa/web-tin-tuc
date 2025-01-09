<?php

namespace App\Repositories;

use App\Models\Category;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Category::class;
    }

    public function allCategories()
    {
        return $this->where('status', 'active')->get();
    }

    public function getCategoryBySlugs(string $slugs)
    {
        $category = $this->where('status', 'active')->where('slugs', $slugs)->first();
        return $category;
    }
}
