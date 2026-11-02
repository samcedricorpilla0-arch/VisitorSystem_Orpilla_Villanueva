<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitor;

class VisitorController extends Controller
{
    /**
     * Display a listing of all visitors.
     */
    public function index()
    {
        $visitors = Visitor::all();

        return view('visitors.index', compact('visitors'));
    }

    /**
     * Show the form for creating a new visitor.
     */
    public function create()
    {
        return view('visitors.create');
    }

    /**
     * Store a newly created visitor.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);

        Visitor::create([
            'name' => $request->name,
            'address' => $request->address,
            'position' => $request->position,
        ]);

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor added successfully!');
    }

    /**
     * Display the specified visitor.
     */
    public function show(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('visitors.show', compact('visitor'));
    }

    /**
     * Show the form for editing a visitor.
     */
    public function edit(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        return view('visitors.edit', compact('visitor'));
    }

    /**
     * Update the specified visitor.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'position' => 'required',
        ]);

        $visitor = Visitor::findOrFail($id);

        $visitor->update([
            'name' => $request->name,
            'address' => $request->address,
            'position' => $request->position,
        ]);

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor updated successfully!');
    }

    /**
     * Remove the specified visitor.
     */
    public function destroy(string $id)
    {
        $visitor = Visitor::findOrFail($id);

        $visitor->delete();

        return redirect()->route('visitors.index')
            ->with('success', 'Visitor deleted successfully!');
    }
}