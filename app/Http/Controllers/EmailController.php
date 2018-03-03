<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Email;
use GuzzleHttp\Client;
class EmailController extends Controller
{
   private $client;

   public function __construct(){
     $this->client = new Client();
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        return response()->json($request->user()->emails);
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
            'email' => 'required',
            'password' => 'required',
        ]);
        $url = 'https://box.jyroneparkeremail.space/admin/mail/users/add';
        $result = $this->client->post($url,['auth' => [env('MAIL_API_USERNAME'),env('MAIL_API_PASSWORD')], [
            'json' => [
                'email' => $request->email,
                'password' => $request->password
                    ]
                ]);

            $email = $request->user()->emails()->create([
              'email' => $request->email
            ]);
            return response()->json($email);
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
        return response()->json(Email::findOrFail($id));
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
        $url = 'https://box.jyroneparkeremail.space/admin/mail/users/remove';
        $result = $this->client->post($url,['auth' => [env('MAIL_API_USERNAME'),env('MAIL_API_PASSWORD')], [
            'json' => [
                'email' => $request->email
                    ]
                ]);
            return response()->json([
              'success' => Email::delete($id)
            ]);
    }
}
