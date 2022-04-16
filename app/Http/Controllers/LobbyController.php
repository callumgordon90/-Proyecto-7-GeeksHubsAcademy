<?php

namespace App\Http\Controllers;

use App\Models\Lobby;
use Illuminate\Http\Request;

class LobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $people = Lobby::all();
        return response()->json($people);
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

    public function store(Request $request)
    {
        $person = Lobby::where([
            ['user_id', '=', $request->user_id],
            ['party_id', '=', $request->party_id],
        ])->first();
        if ($person != null) {
            return response()->json(['message' => 'This person is already in the Lobby!'], 400);
        } else {
            $person = new Lobby;
            $person->user_id = $request->user_id;
            $person->party_id = $request->party_id;
            $person->save();
            return response()->json($person);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lobby  $lobby
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $person = Lobby::find($id);
        return response()->json($person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lobby  $lobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Lobby $lobby)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lobby  $lobby
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lobby $lobby)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lobby  $lobby
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $person = Lobby::find($id);
        $person->delete();
        return response()->json($person);
    }
}
