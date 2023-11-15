<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    public function store(Request $request) {

        $userId = auth()->user()->id;

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
        ]);

        $formFields['user_id'] = auth()->user()->id;
        Listing::create($formFields);
        // $user = User::create($formFields);

        // auth()->login($user);

         return redirect('/');

    }

    public function update(Request $request, Listing $listing) {

        $userId = auth()->user()->id;

        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
        ]);

       
        $listing->update($formFields);
        // $user = User::create($formFields);

        // auth()->login($user);

         return redirect('/');

    }

    public function destroy(Listing $listing) {
        $listing->delete();
         return redirect('/');
    }


    public function get() {
        return response()->json(Listing::all(), 200);
    }

    public function getById($id) {

        $listing = Listing::findOrFail($id);

        if(is_null($listing)) {
            return response()->json(['message'=> 'Not found'], 404);
        }
        return response()->json($listing, 200);
    }

    public function addNew(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
        ]);

        $formFields['user_id'] = auth('')->user()->id;
        Listing::create($formFields);
        // $user = User::create($formFields);

        // auth()->login($user);

         return response($formFields, 201);
    }

    public function updateApi(Request $request, $id) {

        
        $listing = Listing::findOrFail($id);

        if(is_null($listing)) {
            return response()->json(['message'=> 'Not found'], 404);
        }

        $listing->update($request->all());

        return response()->json($listing, 200);
    }

    public function delete($id) {
        $listing = Listing::findOrFail($id);
        $listing->delete();
        return response()->json(200);
    }
}
