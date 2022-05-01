<?php

namespace App\Http\Controllers;


use App\Models\Post\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FavoriteController extends Controller
{
    //
    public function deleteOrCreate(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:' . $request->type,
            'type' => ['required', 'string', Rule::in([Post::class])]
        ]);

        $favorite = auth()->user()->favorites()
            ->where('favoriteable_id', $request->id)
            ->where('favoriteable_type', $request->type)->first();


        if (is_null($favorite)){
            auth()->user()->favorites()->create([
                'favoriteable_id' => $request->id,
                'favoriteable_type' => $request->type,
            ]);
            $action = 'create';
        }else{
            $action = 'delete';
            $favorite->delete();
        }

        return response()->json([
            'action' => $action
        ]);
    }
}
