<?php

namespace App\Http\Controllers;
use App\Models\DestinationKeyFacts;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationKeyFactController extends Controller
{
    public function index()
    {
        $facts = DestinationKeyFacts::all();
        return view('admin.destination_key_fact.index', compact('facts'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.destination_key_fact.create',compact('destinations'));
    }

    public function store(Request $request)
{
    // Validate the request
    $request->validate([
        'destination_id' => 'required|exists:destinations,id', 
        'language' => 'required|string|max:255',
        'required_exams' => 'nullable|string',
        'degrees' => 'nullable|string',
        'intakes' => 'nullable|string',
        'visa' => 'nullable|string',
        'cost_of_study' => 'nullable|string',
        'source_of_funding' => 'nullable|string',
    ]);

    // Create the destination key fact
    DestinationKeyFacts::create([
        'destination_id' => $request->destination_id,
        'language' => $request->language,
        'required_exams' => $request->required_exams,
        'degrees' => $request->degrees,
        'intakes' => $request->intakes,
        'visa' => $request->visa,
        'cost_of_study' => $request->cost_of_study,
        'source_of_funding' => $request->source_of_funding,
    ]);

    return redirect()->route('destination-key-facts.index')->with('success', 'Destination Key Fact created successfully.');
}

    public function edit($id)
    {
        $destinationKeyFact = DestinationKeyFacts::findOrFail($id);
        $destinations = Destination::all();
        return view('admin.destination_key_fact.edit', compact('destinationKeyFact','destinations'));
    }

    public function update(Request $request, DestinationKeyFacts $destinationKeyFact)
    {
        // Validate the request
        $request->validate([
            'destination_id' => 'required|exists:destinations,id', // Ensure the destination exists
            'language' => 'required|string|max:255',
            'required_exams' => 'nullable|string',
            'degrees' => 'nullable|string',
            'intakes' => 'nullable|string',
            'visa' => 'nullable|string',
            'cost_of_study' => 'nullable|string',
            'source_of_funding' => 'nullable|string',
        ]);
    
        // Update the destination key fact
        $destinationKeyFact->update([
            'destination_id' => $request->destination_id,
            'language' => $request->language,
            'required_exams' => $request->required_exams,
            'degrees' => $request->degrees,
            'intakes' => $request->intakes,
            'visa' => $request->visa,
            'cost_of_study' => $request->cost_of_study,
            'source_of_funding' => $request->source_of_funding,
        ]);
    
        return redirect()->route('destination-key-facts.index')->with('success', 'Destination Key Fact updated successfully.');
    }
    
    public function destroy($id)
    {
        $keyFact = DestinationKeyFacts::findOrFail($id);
        $keyFact->delete();

        return redirect()->route('destination-key-facts.index')->with('success', 'Key Fact deleted successfully.');
    }
}
