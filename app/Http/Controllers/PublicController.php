<?php

namespace Freeloaders\Http\Controllers;

use Freeloaders\Category;
use Freeloaders\Post;
use Freeloaders\Subcategory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicController extends Controller
{
    /**
     * @return Factory|View
     */
    public function showCategories()
    {
        return view('categories');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function showSearchPosts(Request $request)
    {
        // validate the data
        $this->validate($request, array(
            'searchValue' => 'required|max:255'
        ));

        $searchValue = $request->searchValue;

        $posts = Post::where("title", 'LIKE', "%{$searchValue}%")->orderBy("id")->get();
        return view('search', compact(['posts', 'searchValue']));
    }

    /**
     * @param Category $category
     *
     * @return Factory|View
     */
    public function showSubcategories(Category $category)
    {
        return view('subcategories', compact('category'));
    }

    /**
     * Create a new controller instance.
     *
     * @param $category_id
     * @param $subcategory_id
     *
     * @return Factory|View
     */
    public function showPosts($category_id, $subcategory_id)
    {
        $category = Category::findOrFail($category_id);
        $subcategory = Subcategory::findOrFail($subcategory_id);

        return view('posts', compact(['category','subcategory']));
    }

    public function showPost($category_id, $subcategory_id, $post_id)
    {
        $category = Category::findOrFail($category_id);
        $subcategory = Subcategory::findOrFail($subcategory_id);
        $post = Post::findOrFail($post_id);

        return view('post', compact(['category','subcategory', 'post']));
    }
}
