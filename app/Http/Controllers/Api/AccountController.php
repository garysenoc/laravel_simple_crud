<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountRequest;
use App\Models\Account;
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
        $accounts = Account::all();

        return response()->json([
            'status' => true,
            'accounts' => $accounts
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
     * Login with the specified username and password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $account = Account::where('username', $username)->first();

        if (!$account || $password !== $account->password) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'account' => $account
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAccountRequest $request)
    {
        $account = Account::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Post Created successfully!",
            'account' => $account
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
    $account = Account::find($id);

    if (!$account) {
        return response()->json([
            'status' => false,
            'message' => 'Account not found'
        ], 404);
    }

    return response()->json([
        'status' => true,
        'post' => $account
    ]);
}

public function getAccount($id)
{
    $account = Account::find($id);

    if (!$account) {
        return response()->json([
            'status' => false,
            'message' => 'Account not found'
        ], 404);
    }

    return response()->json([
        'status' => true,
        'post' => $account
    ]);
}



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAccountRequest $request, Account $account)
    {
        $account->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Account Updated successfully!",
            'post' => $account
        ], 200);
    }

    public function updateAccount(StoreAccountRequest $request, Account $account)
    {
        $account->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Account Updated successfully!",
            'post' => $account
        ], 200);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();

        return response()->json([
            'status' => true,
            'message' => "Account Deleted successfully!",
        ], 200);
    }
}