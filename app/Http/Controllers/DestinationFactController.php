<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\DestinationFacts;

use Illuminate\Http\Request;

class DestinationFactController extends Controller
{
    public function index()
    {
        $destination_facts = DestinationFacts::all();
        return view('admin.destination_fact.index', compact('destination_facts'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.destination_fact.create',compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'title' => 'nullable|string',
            
            'description' => 'nullable|string',
        ]);

        DestinationFacts::create($request->all());

        return redirect()->route('destination-facts.index')->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $destination_fact = DestinationFacts::findOrFail($id);
        $destinations = Destination::all();
        return view('admin.destination_fact.edit', compact('destination_fact','destinations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'title' => 'nullable|string',
            'description' => 'nullable|string',
        ]);

        $faq = DestinationFacts::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('destination-facts.index')->with('success', 'Fact updated successfully.');
    }

    public function destroy($id)
    {
        $facts= DestinationFacts::findOrFail($id);
        $facts->delete();

        return redirect()->route('destination-facts.index')->with('success', 'Fact deleted successfully.');
    }

}
