<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Orphan;
use Illuminate\Http\Request;

class OrphanssController extends Controller
{
    public function index()
    {
        $orphans = Orphan::all();
    return view('admin.orphans', compact('orphans'));
    }

    public function create()
    {

        return view('admin.orphans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_orphange' => 'required|numeric',
        ]);


        Orphan::create($request->all());

        return redirect()->route('admin.orphans.index')->with('success', 'Orphan created successfully.');
    }

    public function edit(Orphan $orphan)
    {
        return view('admin.orphans.edit', compact('orphan'));
    }

    public function update(Request $request, Orphan $orphan)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'id_orphanage' => 'required|numeric',
        ]);

        $orphan->update($request->all());

        return redirect()->route('admin.orphans.index')->with('success', 'Orphan updated successfully.');
    }

    public function destroy(Orphan $orphan)
    {
        $orphan->delete();

        return redirect()->route('admin.orphans.index')->with('success', 'Orphan deleted successfully.');
    }
}
