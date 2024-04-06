<?php

namespace App\Http\Controllers\Kitsu;

use App\Http\Controllers\Controller;
use App\Models\Kitsu;
use Illuminate\Http\Request;

class KitsuController extends Controller
{
    public function show(Request $request)
    {
        $columns = collect(['ID', 'Content Type', 'Title', 'Description', 'Type', 'Status', 'Age rating', 'Start date', 'End date']);
        $filters = [
            'status' => Kitsu::select('status')->pluck('status')->unique()->toArray(),
            'type' => Kitsu::select('type')->pluck('type')->unique()->toArray()
        ];

        $data = Kitsu::query();

        foreach ($request->all() as $key => $value) {
            if ($request->filled($key) && array_key_exists($key, $filters)) $data->where($key, $value);
        }

        $data = $data->paginate(10)->withQueryString();
        return view('kitsu.index', compact('data', 'columns', 'filters'));
    }
}
