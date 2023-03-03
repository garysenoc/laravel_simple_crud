<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();

        return response()->json([
            'status' => true,
            'accounts' => $contacts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {
        $contact = Contact::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Post Created successfully!",
            'contact' => $contact
        ], 200);
    }

  /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $contact = Contact::find($id);

    if (!$contact) {
        return response()->json([
            'status' => false,
            'message' => 'contact not found'
        ], 404);
    }

    return response()->json([
        'status' => true,
        'post' => $contact
    ]);
}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactRequest $request, Contact $contact)
    {
        $contact->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Account Updated successfully!",
            'post' => $contact
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $account)
    {
        $contact->delete();

        return response()->json([
            'status' => true,
            'message' => "Account Deleted successfully!",
        ], 200);
    }
}