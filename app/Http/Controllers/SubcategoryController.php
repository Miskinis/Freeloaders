<?php

namespace Freeloaders\Http\Controllers;

use Freeloaders\Subcategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Image;
use Session;

class SubcategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'title'        => 'required|max:255',
            'category_id'  => 'required|integer',
            'featured_img' => 'required|image',
        ));

        // store in the database
        $subcategories = new Subcategory;

        $subcategories->title = $request->title;
        $subcategories->category_id = $request->category_id;

        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $subcategories->featured_img = $filename;
        }

        $subcategories->save();

        Session::flash('success', 'The subcategory was successfully created!');

        return redirect()->route('subcategories.show', $subcategories->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Factory|View
     */
    public function show($id)
    {
        $subcategory = Subcategory::find($id);
        return view('subcategories.show', compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Factory|View
     */
    public function edit($id)
    {
        // find the subcategory in the database and save as a var
        $subcategory = Subcategory::find($id);

        // return the view and pass in the var we previously created
        return view('subcategories.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int     $id
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        // Validate the data
        $subcategory = Subcategory::find($id);

        $this->validate($request, array(
            'title'        => 'required|max:255',
            'category_id'  => 'required|integer'
        ));

        $subcategory->title = $request->title;
        $subcategory->subcategory_id = $request->category_id;

        if ($request->hasFile('featured_img'))
        {
            $this->validate($request, array(
                'featured_img' => 'image'
            ));

            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldImagePath = $subcategory->featured_img;
            $subcategory->featured_img = $filename;

            Storage::delete($oldImagePath);
        }

        $subcategory->save();

        // set flash data with success message
        Session::flash('success', 'This subcategory was successfully edited.');

        return redirect()->route('subcategories.index', $subcategory->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();

        Session::flash('success', 'The subcategory was successfully deleted.');
        return redirect()->route('subcategories.index');
    }
}
