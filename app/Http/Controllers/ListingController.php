<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ListingController extends Controller
{
   public function index(Request $request) {
        return view('listings.index', ['listings' => Listing::latest()->filter(request(['tag', 'search']))-> paginate(4)
    ]);
   }

   public function show(Listing $listing) {
        return view('listings.show', ['listing' => $listing]);
   }

   public function create() {
        return view('listings.create');
   }

   public function store(Request $request){
        // dd($request->file('logo'));
    $formFields = $request->validate([
        "company" => ['required', Rule::unique('listings')],
        "title" => 'required',
        "location" => 'required',
        "email" => ['required', 'email'],
        "website" => 'required',
        "tags" => 'required',
        "description" => 'required',
   ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }

    Listing::create($formFields);

    return redirect('/')->with('message', 'Listing created successfully!');
    }

    public function edit(Listing $listing) {
        return view('listings.edit', ['listing' => $listing]);
    }

    public function update(Request $request, Listing $listing) {
        $formFields = $request->validate([
            "company" => 'required',
            "title" => 'required',
            "location" => 'required',
            "email" => ['required', 'email'],
            "website" => 'required',
            "tags" => 'required',
            "description" => 'required',
       ]);
    
            if ($request->hasFile('logo')) {
                $formFields['logo'] = $request->file('logo')->store('logos', 'public');
            }

        $listing->update($formFields);
    
        return back()->with('message', 'Listing updated successfully!');
    }

    public function destroy(Listing $listing) {
        $listing->delete();
        return redirect('/')->with('message', 'Listing deleted successfully!');
    }
}

