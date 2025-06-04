<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sortable; // モデルのパスに注意！

class SortableController extends Controller
{
    public function index()
    {
        $sortable = Sortable::orderBy('id', 'asc')->get();

        return view('sortable', [
            'sortables' => $sortable
        ]);
    }

    public function register(Request $request)
    {
        $sortable = new Sortable;
        $sortable->name = $request->inputName;
        $sortable->save();

        return redirect('/');
    }

    public function update(Request $request)
    {
        $inputs = $request->all(); // Ajaxで送られてきたデータ全部取得

        $sortable = Sortable::find($inputs['id']); // idで1件取得
        if ($sortable) {
            $sortable->left_x = $inputs['left'];
            $sortable->top_y = $inputs['top'];
            $sortable->save();
        }

        return response()->json(['status' => 'success']);
    }
}
