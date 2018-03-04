@extends('layouts.app')

@section('content')
<div class="container">

  <!--Section: Features v.1-->
  <section class="text-center">

    <!--Section heading-->
    <h1 class="py-5 font-weight-bold">Why choose {{env('APP_NAME')}}?</h1>
    <!--Section description-->
    <p class="px-5 mb-5 pb-3 lead grey-text">Besides the fact that we are awesome?</p>

    <!--Grid row-->
    <div class="row">

    <!--Grid column-->
    <div class="col-md-4">
        <i class="fa fa-comments fa-3x red-text"></i>
        <h5 class="font-weight-bold mt-3">Real Time Notifications</h5>
        <p class="grey-text">Every event from server creation to git deployments are sent to you via
          various notification channels.
        </p>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-4">
        <i class="fa fa-folder fa-3x cyan-text"></i>
        <h5 class="font-weight-bold mt-3">Unlimited Domains</h5>
        <p class="grey-text">Run one or one thousand sites on your server!
        </p>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-4">
        <i class="fa fa-comments-o fa-3x orange-text"></i>
        <h5 class="font-weight-bold mt-3">Support</h5>
        <p class="grey-text">Support is always available 24/7!
        </p>
    </div>
    <!--Grid column-->

    </div>
    <!--Grid row-->


    <!--Grid row-->
    <div class="row">

    <!--Grid column-->
    <div class="col-md-4">
        <i class="fa fa-lock fa-3x red-text"></i>
        <h5 class="font-weight-bold mt-3">Secure</h5>
        <p class="grey-text">All servers are accessible only with SSH keys and a firewall is configured out of the box. Oh did I mention free SSL certs?
        </p>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-4">
        <i class="fa fa-server fa-3x cyan-text"></i>
        <h5 class="font-weight-bold mt-3">The Best Servers</h5>
        <p class="grey-text">With uptimes guarenteed at 99.9999%, and flexible pricing, no one will offer you better PHP servers.
        </p>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-4">
        <i class="fa fa-code fa-3x orange-text"></i>
        <h5 class="font-weight-bold mt-3">Open API</h5>
        <p class="grey-text">Want to start your own hosting company? Let us be your backbone, all users have access to the API that allows
          you to create and manage your servers, domains, email accounts and more! All for FREE!
        </p>
    </div>
    <!--Grid column-->

    </div>
    <!--Grid row-->

  </section>
  <!--Section: Features v.1-->

</div>
@endsection
