<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InertiaTest;
use Inertia\Inertia;

class InertiaTestController extends Controller
{
    public function index()
    {
        return Inertia::render('Inertia/Index', [
            'blogs' => InertiaTest::all()
        ]);
    }

    public function create()
    {
        return Inertia::render(('Inertia/Create'));
    }

    public function show($id)
    {
        return Inertia::render('Inertia/Show', [
            'id' => $id,
            'blog' => InertiaTest::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:20'],
            'content' => ['required'],
        ]);

        $inertiaTest = new InertiaTest;
        $inertiaTest->title = $request->title;
        $inertiaTest->content = $request->content;
        $inertiaTest->save();

        return to_route('inertia.index')
            ->with([
                'message' => '登録しました'
            ]);
    }

    public function delete($id)
    {
        InertiaTest::findOrFail($id)->delete();

        return to_route('inertia.index')
            ->with([
                'message' => '削除しました'
            ]);
    }
}
