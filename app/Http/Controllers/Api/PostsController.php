<?php
/** @noinspection ALL */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index()
    {
        $sortField = request('sort_field', 'created_at');
        if ( ! in_array($sortField, ['title', 'post_text', 'created_at'])) {
            $sortField = 'created_at';
        }
        $sortDirection = request('sort_direction', 'desc');
        if ( ! in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'desc';
        }

        $filled = array_filter(
            request()->only(
                [
                    'category_id',
                    'title',
                    'post_text',
                    'created_at',
                ]
            )
        );

        $posts = Post::when(count($filled) > 0, function ($query) use ($filled) {
                foreach ($filled as $column => $filled) {
                    if ($column == 'category_id') {
                        $query->where($column, $filled);
                    } else {
                        $query->where($column, 'LIKE', '%'.$filled.'%');
                    }
                }
            }
        )->orderBy($sortField, $sortDirection)->paginate(3);

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePostRequest  $request
     *
     * @return PostResource
     */
    public function store(StorePostRequest $request) : PostResource
    {
        if ($request->hasFile('thumbnail')) {
            $fileName = $request->thumbnail->getClientOriginalName();
            info($fileName);
        }
        $post = Post::create($request->validated());

        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post  $post
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return response()->noContent();
    }
}
