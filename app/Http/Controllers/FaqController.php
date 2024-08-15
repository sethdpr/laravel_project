<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index() {
        $faqs = Faq::all();
        return view('faq', compact('faqs'));
    }

    public function create() {
        return view('faq.create');
    }

    public function store(Request $request) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        Faq::create($request->all());
        return redirect()->route('faq')->with('success', 'FAQ added successfully');
    }

    public function edit($id) {
        $faq = Faq::findOrFail($id);
        return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $faq = Faq::findOrFail($id);
        $faq->update($request->all());
        return redirect()->route('faq')->with('success', 'FAQ updated successfully');
    }

    public function destroy($id) {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->route('faq')->with('success', 'FAQ deleted successfully');
    }
}