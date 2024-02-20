<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFile;
use Illuminate\Http\Request;

class TemporaryFileController extends Controller
{
    public function upload(Request $request): \Illuminate\Http\JsonResponse|string
    {
        $inputName = $request->input('name');

        if ($request->hasFile($inputName)){
            $temp = TemporaryFile::create();

            $temp
                ->addMediaFromRequest($request->input('name'))
                ->toMediaCollection('images');

            return response()->json([
                'id' => $temp->id
            ]);
        }
        return '';
    }

    public function delete(Request $request): \Illuminate\Http\Response
    {
           $id = json_decode($request->getContent())->id;

            $temp = TemporaryFile::find($id);
            $temp->getMedia('images')->first()->delete();
            $temp->delete();

        return response()->noContent();
    }
}
