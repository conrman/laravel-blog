<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests\PostRequest;
use Blog\Post;
use Blog\Tag;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

    /**
     * Layout that should be used in responses
     * 
     * @var string
     */
    protected $layout = 'layouts.app';

    /**
     * Create a new posts controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Show all posts.
     * 
     * @return Response
     */
    public function index()
    {
        $posts = Post::latest('published_at')->published()->get();

        $page_title = 'Welcome!';

        return view('posts.index', compact('posts', 'page_title'));
    }

    /**
     * Show a single post.
     * 
     * @param int $id
     *
     * @return Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Create a new post.
     * 
     * @return Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('posts.create', compact('tags'));
    }

    /**
     * Save post to database.
     * 
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(PostRequest $request)
    {
        $this->createPost($request);

        flash()->success('Successfully created new post!')->important();

        return redirect('posts');
    }

    /**
     * Delete post row from database table.
     *
     * @author    Connor Freeman
     * @param     Request    $request
     * @return    Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        flash()->info('Successfully deleted post!');

    }

    /**
     * Edit a post.
     * 
     * @param int $id
     *
     * @return Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::lists('name', 'id');

        // User can only edit posts they authored
        if (Auth::id() != $post->user->id) {
            return back();
        }

        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update a post.
     * 
     * @param int         $id
     * @param PostRequest $request
     *
     * @return Response
     */
    public function update(Post $post, PostRequest $request)
    {
        $post->update($request->all());

        $this->syncTags($post, $request->input('tag_list'));

        return redirect('posts');
    }

    /**
     * Sync up the input tags with the database.
     * 
     * @param Post  $post
     * @param array $tags
     */
    private function syncTags(Post $post, array $tags)
    {
        $post->tags()->sync($tags);
    }

    /**
     * Create a new post.
     * 
     * @param PostRequest $request
     *
     * @return Post
     */
    private function createPost(PostRequest $request)
    {
        $post = Auth::user()->posts()->create($request->all());

        $this->syncTags($post, $request->input('tag_list'));

        return $post;
    }
}
