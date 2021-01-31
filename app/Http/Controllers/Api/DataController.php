<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PrankCategoriesResource;
use App\Models\PrankCategory;
use App\Models\PrankIdea;
use Facades\App\Responder;
use Illuminate\Http\Request;

class DataController extends Controller
{

    public function prankIdeas(Request $request)
    {
        $ideas = PrankIdea::when($request->category_slug , fn($query , $value) =>
            $query->whereHas('categories', fn($query) => $query->whereSlug((string)$value))
        )->paginate((int)$request->limit);

        return response()->json([
            'state' => true,
            'code' => 200,
            'message' => 'Ok',
            'data' => $ideas,
        ]);
    }

    public function prankCategories(Request $request)
    {
        $categories = PrankCategory::when($request->slug, fn($query , $value) => $query->whereSlug((string)$value))
            ->active()
            ->paginate((int)$request->limit);

        return response()->json([
            'state' => true,
            'code' => 200,
            'message' => 'Ok',
            'data' => $categories,
        ]);
    }
}
