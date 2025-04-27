<?php

namespace App\Http\Controllers;

use App\Models\Shoe;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\FrontService;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class FrontController extends Controller
{
    //
    protected $frontService;

    public function __construct(FrontService $frontService)
    {
        $this->frontService = $frontService;
    }

    public function search(Request $request)
    {
        $search = $request->input('keyword');

        $shoes = $this->frontService->searchShoes($search);
        return view('front.search', [
            'shoes' => $shoes,
            'keyword' => $search,
        ]);
    }

    public function index()
    {
        $data = $this->frontService->getFrontPageData();
        return view('front.index', $data);
    }

    public function details(Shoe $shoe){
        return view('front.details', compact('shoe'));
    }

    public function category(Category $category){
        return view('front.category', compact('category'));
    }
}
