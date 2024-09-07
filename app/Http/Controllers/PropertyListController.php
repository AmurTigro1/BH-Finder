<?php

namespace App\Http\Controllers;

use App\Models\PropertyList;
use Illuminate\Http\Request;

class PropertyListController extends Controller
{
    public function index() 
    {
       // Fetch the list of properties
       $properties = PropertyList::all(); 

       // Return the view with the form and properties data
       return view('propertyList.index', compact('properties'));
    }

    public function store (Request $request)  
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new property record in the database
        PropertyList::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        // Redirect back to the property list with a success message
        return redirect()->route('propertyList.index')->with('success', 'Property added successfully!');
    }
}
