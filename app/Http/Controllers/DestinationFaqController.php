<?php

namespace App\Http\Controllers;
use App\Models\DestinationFaq;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationFaqController extends Controller
{
    public function index()
    {
        $faqs = DestinationFaq::all();
        return view('admin.destination_faq.index', compact('faqs'));
    }

    public function create()
    {
        $destinations = Destination::all();
        return view('admin.destination_faq.create',compact('destinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        DestinationFaq::create($request->all());

        return redirect()->route('destination-faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $faq = DestinationFaq::findOrFail($id);
        $destinations = Destination::all();
        return view('admin.destination_faq.edit', compact('faq','destinations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $faq = DestinationFaq::findOrFail($id);
        $faq->update($request->all());

        return redirect()->route('destination-faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        $faq = DestinationFaq::findOrFail($id);
        $faq->delete();

        return redirect()->route('destination-faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
