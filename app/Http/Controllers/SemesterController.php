<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
{
    $query = Semester::query();

    // Check if there's a search term
    if ($request->has('search')) {
        $searchTerm = $request->search;
        $query->where(function($q) use ($searchTerm) {
            $q->where('title', 'like', "%$searchTerm%")
              ->orWhere('desc', 'like', "%$searchTerm%");
        });
    }

    // Get paginated results
    $items = $query->paginate(10);

    // Pass the search term to the view
    $searchTerm = $request->search;

    return view('schoolsettings.semester.index', compact('items', 'searchTerm'));
}

    public function create()
    {
        return view('schoolsettings.semester.create');
    }
    public function store(Request $request)
    {
        $item = Semester::create($request->only(['title', 'desc']));
        return redirect()->route('semester.index')->with(['function'=>'store']);
    }
    public function edit($id)
    {
        $item = Semester::find($id);
        return view('schoolsettings.semester.edit', compact('item'));
    }
    public function update(Request $request, $id)
    {
        $item = Semester::find($id);
        $item->update($request->only(['title', 'desc']));

        return redirect()->route('semester.index')->with(['function'=>'update']);
    }
    public function destroy($id)
    {
        $item = Semester::find($id);
        $item->delete();
return 'success';
    }
}
