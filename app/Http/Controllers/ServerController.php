<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Server;
use App\Events\ServerCreated;
use App\Events\ServerDestroyed;

use Laravel\Forge\ApiProvider;
use Laravel\Forge\Forge;
class ServerController extends Controller
{
  private $forge, $credential;

    public function __construct(){
      $this->forge = new Forge(new ApiProvider(env('FORGE_API')));
      $this->credential = $this->forge->credentialFor('ocean2');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return response()->json($request->user()->servers);
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
      /*  $request->validate([
            'server.name' => 'required|unique:servers|max:255',
            'server.size' => 'required',
            'server.region' => 'required',
        ]);
        */
        $server = $this->forge->create()
          ->droplet($request->input('server.name'))
          ->usingCredential($this->credential)
          ->withMemoryOf($request->input('server.memory.size'))
          ->at($request->input('server.region'))
          ->runningPhp('7.2')
          ->save();
      //  event(new ServerCreated($server))->delay(now()->addMinutes(2));
        return response()->json($request->user()->servers()->create([
          'server_id' => $server->id(),
          'name' => $server->name(),
          'memory' => $server->size(),
          'region' => $server->region(),
          'ip' => $server->ip(),
          'sudopassword' => encrypt($server->sudoPassword()),
          'databasepassword' => encrypt($server->databasePassword())
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
        //$s = $this->forge->get($server->server_id);
        //$s->delete();
        //event(new ServerDestroyed($server));
        return response()->json([
          'deleted' => $server->delete()
        ]);
    }
}
