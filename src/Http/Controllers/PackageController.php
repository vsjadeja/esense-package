<?php

namespace Esense\Package\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Esense\Package\Models\Package;

class PackageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $packages = Package::latest()->paginate(5);
        return view('package::index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('package::.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Package::create($request->all());

        return redirect()->route('package.index')->with('success', 'Package created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Esense\Package\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package) {
        return view('package::show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Esense\Package\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package) {
        return view('package::edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Esense\Package\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $package->update($request->all());

        return redirect()->route('package.index')->with('success', 'Package updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Esense\Package\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package) {
        $package->delete();

        return redirect()->route('package.index')->with('success', 'Package deleted successfully');
    }

}
