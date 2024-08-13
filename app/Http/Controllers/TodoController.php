<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index(Request $request)
    {
        $page = 5;
        if ($request->search) {
            $data = Todo::where('task', 'like', '%' . $request->search . '%')->paginate($page)->withQueryString();
        } else {
            $data = Todo::orderBy('task', 'asc')->paginate($page)->withQueryString();
        }
        return view('app', compact('data'));
    }

    function store(Request $request)
    {
        $request->validate([
            'task' => 'required|min:3'
        ]);

        $data = [
            'task' => $request->input('task'),
            'is_done' => false
        ];

        Todo::create($data);

        return redirect()->route('todo')->with('success', 'Task added successfully');
    }

    function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|min:3',
            'is_done' => 'required'
        ]);

        $data = [
            'task' => $request->input('task'),
            'is_done' => $request->input('is_done')
        ];

        Todo::where('id', $id)->update($data);

        return redirect()->route('todo');
    }

    function destroy($id)
    {
        Todo::where('id', $id)->delete();
        return redirect()->route('todo')->with('success', 'Task deleted successfully');
    }
}
