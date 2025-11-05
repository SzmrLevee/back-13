<?php

namespace App\Http\Controllers;

use App\Models\Macbook;
use Illuminate\Http\Request;

class MacbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Macbook::query();

        $orderBy = $request->query('orderBy');
        $order = $request->query('order');

        if (in_array($orderBy, ['introduced', 'base_ram'])) {
            if (in_array($order, ['asc', 'desc'])) {
                $query->orderBy($orderBy, $order);
            }
        }

        $macbooks = $query->get();

        return response()->json([
            'data' => $macbooks
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $macbook = Macbook::find($id);

        if (!$macbook) {
            return response()->json([
                'message' => 'MacBook not found'
            ], 404);
        }

        return response()->json([
            'data' => $macbook
        ]);
    }
}
