<?php

namespace App\Http\Controllers;

use App\Http\Controllers\StoreController;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class StoreViewController extends Controller
{
    private $storeController;

    public function __construct()
    {
        $this->storeController = new StoreController();
    }

    public function index()
    {
        $categories = Category::all();
        return view('loja.index', compact('categories'));
    }

    public function checkout($id)
    {
        try {
            $produto = Products::findOrFail($id);
            return view('loja.checkout', compact('produto'));
        } catch (\Exception $e) {
            return redirect('/');
        }
    }
}
