<?php

namespace App\Http\Controllers;

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
    // public function show(string $id)
    // {
    //     $product = Product::findOrFail($id);
 
    //     return view('products.show', compact('product'));
    // }
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
            $bh->where('address', 'LIKE', "%{$address}%"); // use LIKE to allow partial matches
        }
    
        // $bh = $bh->simplePaginate(4);
        $bh = $bh->paginate(4);
    
        return view('boardingHouse.landing', compact('bh', 'address')); // pass $address to the view as well
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
}
