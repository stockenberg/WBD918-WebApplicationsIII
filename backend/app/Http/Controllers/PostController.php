<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): \Illuminate\Http\Response
    {
        return response(\App\Post::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules());

        $post = new Post($request->all());
        $post->save();
        return response(['message' => 'entry was saved', 'code' => 201]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): \Illuminate\Http\Response
    {
        return response(\App\Post::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request): \Illuminate\Http\Response
    {
        $request->validate($this->validationRules());

        $post = \App\Post::find($request->id);
        $post->update($request->all());
        return response(['message' => 'entry updated', 'code' => 200]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id): \Illuminate\Http\Response
    {
        \App\Post::destroy($id);
        return response(['message' => 'delete successfull', 'code' => 200]);
    }

    /**
     * Validation rules for new posts
     * @return array
     */
    private function validationRules() : array
    {
        return [
            'headline' => 'required',
            'content' => 'required',
            'author_id' => 'required|integer',
            'teaser' => 'required|max:120'
        ];
    }
}
