<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Events\ServerCreated;
use App\Events\ServerDestroyed;
class ServerController extends Controller
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
        return $request->user()->servers;
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
            'name' => 'required|unique:servers|max:255',
            'size' => 'required',
            'database' => 'required',
            'region' => 'required',
        ]);

        $server = $this->forge->createServer([
            "provider"=> "ocean2",
            "credential_id"=> 1,
            "name"=> $request->name,
            "size"=> $request->size,//"512MB"
            "database"=> $request->database,
            "php_version"=> "php71",
            "region"=> $request->region
        ]);
        event(new ServerCreated($server))>delay(now()->addMinutes(2));
        return response()->json($request->user()->servers()->create([
          'server_id' => $server->id,
          'name' => $server->name
        ]));

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
        $server = Server::findOrFail($id);
        return response()->json($this->forge->server($server->server_id));
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
        $server = Server::findOrFail($id);
        $this->forge->deleteServer($server->server_id);
        event(new ServerDestroyed($server));
        return response()->json([
          'deleted' => $server->delete()
        ]);
    }
}
