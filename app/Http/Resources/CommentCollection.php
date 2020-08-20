<?php

namespace App\Http\Resources;
use App\Comment;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CommentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function($request){
                return [
                    'id' => $request->id,
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'message' => $request->message,
                    'created_at' => (string) $request->created_at,
                    'updated_at' => (string) $request->updated_at,
                ];
            }),
        ];
    }
}
