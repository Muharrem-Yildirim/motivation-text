<?php

namespace App\Http\Controllers;

use App\Services\TextService;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(TextService $textService)
    {
        return view('select_category', [
            'categories' => $textService->getAll(),
            'selectedCategory' => $textService->getSelectedCategory(),
        ]);
    }

    public function updateCategory()
    {
        Session::put('selected_category', request()->get('category'));

        return redirect('/');
    }
}
