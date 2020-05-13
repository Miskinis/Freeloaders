<?php

namespace Freeloaders\Http\Controllers;

use Freeloaders\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Image;
use Purifier;
use Session;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $posts = Post::where('user_id', \Auth::id())->orderBy('id', 'desc')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('posts.create');
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
            'title'          => 'required|max:255',
            'subcategory_id' => 'required|integer',
            'featured_img'   => 'required|image',
            'body'           => 'required'
        ));

        // store in the database
        $post = new Post;

        $post->title = $request->title;
        $post->user_id = Auth::id();
        $post->subcategory_id = $request->subcategory_id;
        $post->body = Purifier::clean($request->body);

        if ($request->hasFile('featured_img')) {
            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $post->featured_img = $filename;
        }

        $post->save();

        Session::flash('success', 'The offer post was successfully created!');

        return redirect()->route('posts.show', $post->id);
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
        $post = Post::find($id);
        return view('posts.show', compact('post'));
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
        // find the post in the database and save as a var
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
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
        $post = Post::find($id);

        // validate the data
        $this->validate($request, array(
            'title'          => 'required|max:255',
            'subcategory_id' => 'required|integer',
            'body'           => 'required'
        ));

        $post->title = $request->title;
        $post->user_id = Auth::id();
        $post->subcategory_id = $request->subcategory_id;
        $post->body = Purifier::clean($request->body);

        if ($request->hasFile('featured_img'))
        {
            // validate image
            $this->validate($request, array(
                'featured_img'   => 'image'
            ));

            $image = $request->file('featured_img');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldImagePath = $post->featured_img;
            $post->featured_img = $filename;

            Storage::delete($oldImagePath);
        }

        $post->save();

        // set flash data with success message
        Session::flash('success', 'This post was successfully edited.');

        return redirect()->route('posts.index', $post->id);
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
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
