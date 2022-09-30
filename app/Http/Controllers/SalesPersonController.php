<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesPerson;

class SalesPersonController extends Controller
{
    /**
     * Show Sales Person grid
     */
    public function index()
    {
       $salespersons = SalesPerson::latest()->paginate(5);
       return view('salesPersons.Index',compact('salespersons'))
       ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show Sales Person Create page
     */
    public function create()
    {
        return view('salesPersons.Create');
    }

    /**
     * Save sales person
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'telephone' => 'required|numeric',
            'join_date' => 'required',
            'email' => 'required|email',
                       
        ]);

        SalesPerson::create($request->all());

        return redirect()->route('salesperson.index')
            ->with('success','Sales Person Saved Successfully');
    }

    /**
     * Display Sales person
     */
    public function show(SalesPerson $salesperson)
    {
        return view('salespersons.display',compact('salesperson'));
    }

    /**
     * Edit sales person
     */
    public function edit(SalesPerson $salesperson)
    {
        return view('salespersons.edit',compact('salesperson'));
    }

    /**
     * Update Sales person 
     *
     */
    public function update(Request $request, SalesPerson $salesperson)
    {
        $request->validate([
            'name' => 'required',
            'telephone' => 'required|numeric',
            'join_date' => 'required',
            'email' => 'required|email',
        ]);

        $salesperson->update($request->all());

        return redirect()->route('salesperson.index')
            ->with('success','Sales Person updated successfully');        

    }

    /**
     *Delete Sales person from database
     *
     */
    public function destroy(SalesPerson $salesperson)
    {
        $salesperson->delete();

        return redirect()->route('salesperson.index')
            ->with('success','Sales person deleted successfully');
    }
}
