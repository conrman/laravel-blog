<?php

namespace Blog\Http\Controllers;

use Blog\Tag;

class TagsController extends Controller
{
    /**
     * Show posts with specific tag.
     *
     * @author Connor Freeman
     *
     * @param Tag $name
     *
     * @return Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts;

        return view('posts.index', compact('posts'));
    }

    /**
     * Save tag to the database.
     *
     * @author Connor Freeman
     *
     * @param TagRequest $request
     *
     * @return Response
     */
    public function store(TagRequest $request)
    {
        $this->createTag($request);

        flash()->success('Successfully create a new post!')->important();
    }

    /**
     * Create a new tag.
     *
     * @author    Connor Freeman
     * @param    TagRequst    $request
     * @return    Tag
     */
    private function createTag($request)
    {
        // code
    }
}
