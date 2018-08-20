<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain;
use GuzzleHttp\Client;
class DomainController extends Controller
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
        return response()->json($request->user()->domains);
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
            'domain' => 'required',
            'server_id' => 'required',
        ]);
        $data = [
          'domain' => $request->domain,
          'project_type' => 'php',
          'directory' =>'/public'
        ];
        $site = $this->forge->createSite($request->server_id, $data, $wait = true);
        $domain = $request->user()->domains()->create([
          'domain' => $data['domain'],
          'site_id' => $site->id,
          'server_id' => $request->server_id
        ]);
        return response()->json($domain);


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
        return response()->json(Domain::findOrFail($id));
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
        $domain = Domain::findOrFail($id);
        $this->forge->deleteSite($domain->server_id, $domain->site_id);
        return response()->json([
          'success' => $domain->delete()
        ]);
    }

    public function checkDomain(Request $request){
      try
        {
        	$config = new \Namecheap\Config();
        	$config->apiUser(env('NAMECHEAP_USERNAME'))
        		->apiKey(env('NAMECHEAP_API_KEY'))
        		->clientIp(request()->server('SERVER_ADDR'))
        		->sandbox(true);
        	$command = \Namecheap\Api::factory($config, 'domains.check');
          $command->domainList($request->domain)->dispatch();
        	if($command->isAvailable($request->domain)){
            return response()->json([
              'success' => true
            ]);
          }
          else{
            return response()->json([
              'success' => false
            ]);
          }
        } catch (\Exception $e) {
        	return response()->json($e->getMessage());
        }
    }

    public function buy(Request $request){

      try
      {
        $config = new \Namecheap\Config();
        $config->apiUser(env('NAMECHEAP_USERNAME'))
          ->apiKey(env('NAMECHEAP_API_KEY'))
          ->clientIp(request()->server('SERVER_ADDR'))
          ->sandbox(true);
      	$command = \Namecheap\Api::factory($config, 'domains.create');
      	$command->setParams(array(
      		'DomainName' => $request->domain,
      		'RegistrantFirstName'	=> $request->user()->name,
      		'RegistrantLastName'	=> $request->user()->name,
          'RegistrantAddress1' => '111 Main St',
          'RegistrantCity' => 'Danville',
          'RegistrantStateProvince' => 'KY',
          'RegistrantPostalCode' => '40422',
          'RegistrantCountry' => 'USA',
          'RegistrantPhone' => '+1.8594024863',
          'RegistrantEmailAddress' => 'jyrone.parker@gmail.com',
          'TechFirstName' => 'Jyrone',
          'TechLastName' => 'Parker',
          'TechAddress1' => '111 main st',
          'TechCity' => 'Danville',
          'TechStateProvince' => 'KY',
          'TechPostalCode' => '40422',
          'TechCountry' => 'USA',
          'TechPhone' => '+1.8594024863',
          'TechEmailAddress' => 'jyrone.parker@gmail.com',
          'AdminFirstName' => 'Jyrone',
          'AdminLastName' => 'Parker',
          'AdminAddress1' => '111 main st',
          'AdminCity' => 'Danville',
          'AdminStateProvince' => 'KY',
          'AdminPostalCode' => '40422',
          'AdminCountry' => 'USA',
          'AdminPhone' => '+1.8594024863',
          'AdminEmailAddress' => 'jyrone.parker@gmail.com',
          'AuxBillingFirstName' => 'Jyrone',
          'AuxBillingLastName' => 'Parker',
          'AuxBillingAddress1' => '111 main st',
          'AuxBillingCity' => 'Danville',
          'AuxBillingStateProvince' => 'KY',
          'AuxBillingPostalCode' => '40422',
          'AuxBillingCountry' => 'USA',
          'AuxBillingPhone' => '+1.8594024863',
          'AuxBillingEmailAddress' => 'jyrone.parker@gmail.com',

      	))->dispatch();
        $res = $this->client->request('POST', 'https://box.jyroneparkeremail.space/admin/mail/users/add', [
            'auth' => [env('MIAB_USERNAME'), env('MIAB_PASSWORD')],
            'form_params' => [
                'email' => $request->email,
                'password' => $request->password,

            ]
        ]);
        $request->user()->newSubscription('yearly-domain', env('STRIPE_YEARLY_DOMAIN_ID'))->create();
        $request->user()->domains()->create([
          'domain' =>$request->domain
        ]);
        return response()->json($command);
      } catch (\Exception $e) {
      	return response()->json($e->getMessage());
      }
    }

    public function renew(Request $request){
      try
      {
        $config = new \Namecheap\Config();
        $config->apiUser(env('NAMECHEAP_USERNAME'))
          ->apiKey(env('NAMECHEAP_API_KEY'))
          ->clientIp(request()->server('SERVER_ADDR'))
          ->sandbox(true);
      	$command = \Namecheap\Api::factory($config, 'domains.renew');
      	$command->setParams(array(
      		'DomainName' => $request->domain,
      		'Years' => 1
      	))->dispatch();
        return response()->json($command);
      } catch (\Exception $e) {
      	return response()->json($e->getMessage());
      }

    }

    public function checkPrice(Request $request){
      try
      {
      	$config = new \Namecheap\Config();
        $config->apiUser(env('NAMECHEAP_USERNAME'))
          ->apiKey(env('NAMECHEAP_API_KEY'))
          ->clientIp(request()->server('SERVER_ADDR'))
          ->sandbox(true);
      	$command = \Namecheap\Api::factory($config, 'users.getPricing');
      	$command->setParams(array(
      		'ProductType'	=> 'DOMAIN',
      		'ProductCategory'	=> 'REGISTER'
      	))->dispatch();
        return response()->json($command);
      } catch (\Exception $e) {
      	return response()->json($e->getMessage());
      }
    }
}
