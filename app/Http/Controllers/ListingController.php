<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ListingController extends Controller
{
   public function index(Request $request) {
        return view('listings.index', ['listings' => Listing::latest()->filter(request(['tag', 'search']))->get()]);
   }

   public function show(Listing $listing) {
        return view('listings.show', ['listing' => $listing]);
   }

   public function create() {
        return view('listings.create');
   }

   public function store(Request $request){
    $formFields = $request->validate([
        "company" => ['required', Rule::unique('listings')],
        "title" => 'required',
        "location" => 'required',
        "email" => ['required', 'email'],
        "website" => 'required',
        "tags" => 'required',
        "description" => 'required',
   ]);

    Listing::create($formFields);

    return redirect('/')->with('message', 'New Student was added successfully!');
    }
}

