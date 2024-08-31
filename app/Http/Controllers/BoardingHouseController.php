<?php

namespace App\Http\Controllers;

use App\Models\PropertyList;
use App\Models\BoardingHouse;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    public function index(Request $request)
    {
        $bh = BoardingHouse::orderBy('created_at', 'DESC')->get();
        $search = request()->query('search');
        $address = request()->query('address');

        $bh = BoardingHouse::query();

        if ($search) {
            $bh->where(function ($query) use ($search) {
                $query->where('address', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('monthly', 'LIKE', "%{$search}%");
            });
        }

        if ($address) {
            $bh->where('address', $address);
        }

        $bh = $bh->simplePaginate(3);

        return view('welcome', compact('bh'));
    }
 
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'image' => 'required|url',
            'monthly' => 'required|numeric',
        ]);

        $bh = BoardingHouse::create($data);

        return redirect()->route('bh.show', $bh->id);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bh = BoardingHouse::findOrFail($id);
        return view('boardingHouse.show', compact('bh'));
    }
 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
 
        return view('products.edit', compact('product'));
    }

    public function all(Request $request)
    {
        $search = $request->query('search');
        $address = $request->query('address');
    
        $bh = BoardingHouse::query();
    
        if ($search) {
            $bh->where(function ($query) use ($search) {
                $query->where('address', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('monthly', 'LIKE', "%{$search}%");
            });
        }
    
        if ($address) {
            $bh->where('address', 'LIKE', "%{$address}%");
        }
    
        $bh = $bh->paginate(4);
    
        return view('boardingHouse.landing', compact('bh', 'address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->update($request->all());
 
        return redirect()->route('admin/products')->with('success', 'product updated successfully');
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
 
        $product->delete();
 
        return redirect()->route('admin/products')->with('success', 'product deleted successfully');
    }

    public function PropertyList() 
    {
       // Fetch the list of properties
       $properties = PropertyList::all(); 

       // Return the view with the form and properties data
       return view('bordingHouse.property-list', compact('properties'));
    }

    public function storeProperty(Request $request)  
    {
        // Validate form data
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create a new property record in the database
        Property::create([
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
        ]);

        // Redirect back to the property list with a success message
        return redirect()->route('bordingHouse.property-list')->with('success', 'Property added successfully!');
    }
}
