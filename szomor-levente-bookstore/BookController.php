<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BookController extends Controller
{
    protected function getBooks(): Collection
    {
        $path = storage_path('books.txt');
        if (!file_exists($path)) {
            return collect();
        }

        $json = file_get_contents($path);
        $data = json_decode($json, true);
        return collect($data ?: []);
    }

    public function index(Request $request)
    {
        $books = $this->getBooks();

        $pagesMin = $request->query('pages_min');
        $pagesMax = $request->query('pages_max');

        if (!is_null($pagesMin)) {
            $books = $books->filter(function ($b) use ($pagesMin) {
                return isset($b['pages']) && $b['pages'] > (int)$pagesMin;
            });
        }

        if (!is_null($pagesMax)) {
            $books = $books->filter(function ($b) use ($pagesMax) {
                return isset($b['pages']) && $b['pages'] < (int)$pagesMax;
            });
        }

        $books = $books->sortBy(function ($b) {
            return $b['price'] ?? 0;
        })->values();

        return response()->json(['data' => $books], 200);
    }

    public function show($id)
    {
        if (!ctype_digit((string)$id)) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $books = $this->getBooks();
        $book = $books->firstWhere('id', (int)$id);

        if (!$book) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json(['data' => $book], 200);
    }

    public function genre(Request $request, $genre)
    {
        $order = $request->query('order', 'desc');

        $books = $this->getBooks()->filter(function ($b) use ($genre) {
            return isset($b['genre']) && strcasecmp($b['genre'], $genre) === 0;
        });

        if ($order === 'asc') {
            $books = $books->sortBy('year')->values();
        } else {
            $books = $books->sortByDesc('year')->values();
        }

        return response()->json(['data' => $books], 200);
    }

    public function mostExpensive()
    {
        $books = $this->getBooks();
        if ($books->isEmpty()) {
            return response()->json(['data' => null], 200);
        }

        $book = $books->sortByDesc('price')->first();

        return response()->json(['data' => $book], 200);
    }

    public function random()
    {
        $books = $this->getBooks();
        if ($books->isEmpty()) {
            return response()->json(['data' => null], 200);
        }

        $book = $books->random();

        return response()->json(['data' => $book], 200);
    }

    public function popular()
    {
        $books = $this->getBooks()->filter(function ($b) {
            return isset($b['rating']) && $b['rating'] >= 4.5;
        })->values();

        return response()->json(['data' => $books], 200);
    }
}
