<?php

namespace App\Http\Controllers;

use App\Event\KeyCreated;
use App\Event\KeyDestroyed;
use Illuminate\Http\Request;
use App\Key;

class KeyController extends Controller
{
  private $forge;

    public function __construct(){
      $this->forge = new Themsaid\Forge\Forge(env('FORGE_TOKEN'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return response()->json($request->user()->keys);
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
        //
        $request->validate([
            'name' => 'required',
            'key' => 'required',
        ]);
        $data = [
          'name' => $request->name,
          'key' => $request->key
        ];

        $this->forge->createSSHKey($request->serverId, $data, $wait = true);
        $key = $request->user()->keys()->create($data);
        event(new KeyCreated($key));
        return response()->json($key);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return response()->json(Key::findOrFail($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $key = Key::findOrFail($id);
        $this->forge->deleteSSHKey($key->serverId, $key->keyId);
        event(new KeyDestroyed($key));
        return response()->json([
          'success' => $key->delete()
        ]);
    }
}
