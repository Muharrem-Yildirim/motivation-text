<?php

namespace App\Http\Controllers;

use App\Services\TextService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TextController extends Controller
{
    public function index(TextService $textService)
    {
        if (is_null($textService->getSelectedCategory())) {
            return view('select_category', [
                'categories' => $textService->getAll(),
                'selectedCategory' => $textService->getSelectedCategory(),
            ]);
        }

        return view('show_text', [
            'selectedCategory' => $textService->getSelectedCategory(),
            'text' => $textService->getSelectedCategoryTexts()->random(),
        ]);
    }
}
