<?php

namespace App\Http\Controllers\Api\V1\todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\todo\TodoRequest;
use App\Http\Resources\V1\TodoCollection;
use App\Http\Resources\V1\TodoResource;
use App\Models\Todo;
use Illuminate\Http\Request;


class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        return new TodoCollection($user->todos()->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        return new TodoResource(Todo::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Todo $todo)
    {
        if($request->user()->cannot('view',$todo)){
            return response()->json([
                "message"=>"Forbidden"
            ],403);
        }
        return new TodoResource($todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, Todo $todo)
    {
        if($request->user()->cannot('update',$todo)){
            return response()->json([
                "message"=>"Forbidden"
            ],403);
        }

        $todo->update($request->all());
        return new TodoResource($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Todo $todo)
    {
        if($request->user()->cannot('update',$todo)){
            return response()->json([
                "message"=>"Forbidden"
            ],403);
        }
        $todo->delete();
        return response()->json([
            "msg" => "Todo Deleted"
        ],204);
    }
}
