<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Technology;
use App\Http\Requests\StoreTechnologyRequest;
use App\Http\Requests\UpdateTechnologyRequest;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        if (!empty($request->query('search'))) {
            $search = $request->query('search');
            $technologies = Technology::where('name', 'like', $search . '%')->get();

        } else {
            $technologies = Technology::all();
        }
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTechnologyRequest $request)
    {

        $form_data = $request->validated();
        $slug = Technology::getSlug($form_data['name']);
        $form_data['slug'] = $slug;
        $newTechnology = Technology::create($form_data);

        return to_route('admin.technologies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        $form_data = $request->validated();
        $form_data['slug'] = $technology->slug;
        if ($technology->name !== $form_data['name']) {
            $slug = Technology::getSlug($form_data['name']);
            $form_data['slug'] = $slug;
        }
        $technology->update($form_data);
        return redirect()->route('admin.technologies.show', $technology->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('message', "The technology '$technology->name' has been deleted");
    }
}
