<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Orphanage;
use Illuminate\Http\Request;

class OrphanangesController extends Controller
{
    public function index()
    {
        $orphanages = Orphanage::all();
        return view('admin.orphanages', compact('orphanages'));
    }

    public function create()
    {
        return view('admin.orphanages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'phone' => 'required|numeric|digits:10',
            'location' => 'required|string|max:255',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $orphanage = new Orphanage([
            'name' => $request->name,
            'image' => $imageName,
            'phone' => $request->phone,
            'location' => $request->location,
        ]);
        $orphanage->save();

        return redirect()->route('admin.orphanages.index')->with('success', 'Orphanage created successfully.');
    }

    public function edit(Orphanage $orphanage)
    {
        return view('admin.orphanages.edit', compact('orphanage'));
    }

    public function update(Request $request, Orphanage $orphanage)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:10',
            'location' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $orphanage->image = $imageName;
        }

        $orphanage->name = $request->name;
        $orphanage->phone = $request->phone;
        $orphanage->location = $request->location;
        $orphanage->save();

        return redirect()->route('admin.orphanages.index')->with('success', 'Orphanage updated successfully.');
    }

    public function destroy(Orphanage $orphanage)
    {
        $orphanage->delete();

        return redirect()->route('admin.orphanages.index')->with('success', 'Orphanage deleted successfully.');
    }
}
