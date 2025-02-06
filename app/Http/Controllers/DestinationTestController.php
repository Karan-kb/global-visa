<?php

namespace App\Http\Controllers;
use App\Models\DestinationTest;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationTestController extends Controller
{
    public function index()
    {
        $tests = DestinationTest::all();
        return view('admin.destination_test.index', compact('tests'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.destination_test.create',compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'title' => 'required|string',
            'value' => 'required|string',
        ]);

        DestinationTest::create($request->all());

        return redirect()->route('destination-tests.index')->with('success', 'Test created successfully.');
    }

    public function edit($id)
    {
        $test = DestinationTest::findOrFail($id);
        $destinations = Destination::all();
        return view('admin.destination_test.edit', compact('test','destinations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'title' => 'required|string',
            'value' => 'required|string',
        ]);

        $test = DestinationTest::findOrFail($id);
        $test->update($request->all());

        return redirect()->route('destination-tests.index')->with('success', 'Test updated successfully.');
    }

    public function destroy($id)
    {
        $test = DestinationTest::findOrFail($id);
        $test->delete();

        return redirect()->route('destination-tests.index')->with('success', 'Test deleted successfully.');
    }
}
