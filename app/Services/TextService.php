<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class TextService
{
    public function getAll()
    {
        $categoriesJson = storage_path('app/texts.json');

        $categories = collect(File::json($categoriesJson))->map(function ($category) {
            return (object) $category;
        });

        return $categories;
    }

    public function getSelectedCategoryTexts()
    {
        $selectedCategory = Session::get('selected_category');

        $category = $this->getAll()->filter(function ($category) use ($selectedCategory) {
            return $category->name == $selectedCategory;
        })->first();

        if (is_null($category)) {
            return null;
        }

        return collect($category->texts);
    }

    public function isCategoryValid($category)
    {
        return $this->getAll()->contains('name', $category);
    }

    public function getSelectedCategory()
    {
        $selectedCategory = Session::get('selected_category');

        if (!is_null($selectedCategory) && !$this->isCategoryValid($selectedCategory)) {
            return null;
        }

        return $selectedCategory;
    }
}
