<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index(Request $request)
    {
        $query = Role::query();

        // Check if there's a search term
        if ($request->has('search')) {
            $searchTerm = $request->search;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', "%$searchTerm%");

            });
        }

        // Get paginated results
        $items = $query->paginate(10);

        // Pass the search term to the view
        $searchTerm = $request->search;

        return view('accesscontrol.role.index', compact('items', 'searchTerm'));
    }

    public function create()
    {
        return view('accesscontrol.role.create');
    }
    public function store(Request $request)
    {
        Role::create($request->only(['name']));

        return redirect()->route('role.index')->with(['function' => 'store']);
    }
    public function edit($id)
    {
        $item = Role::find($id);
        return view('accesscontrol.role.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = Role::find($id);
        $item->update($request->only(['title',  'desc']));

        return redirect()->route('role.index')->with(['function' => 'update']);
    }
    public function destroy($id)
    {
        $item = Role::find($id);
        $item->delete();
        return 'success';
    }
}
