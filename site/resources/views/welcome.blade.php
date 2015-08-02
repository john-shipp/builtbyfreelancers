@extends('main')

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>The <b style="color:green">open</b> marketplace for freelancers and employers.</h1>
        <p>{{{env('APP_NAME')}}} is an open marketplace for freelancers to find jobs, and employers to find freelancers.</p>
        <p><a class="btn btn-primary btn-lg" href="/about" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Find Work</h2>
          <p>Work for the most qualified and trusted employers on the planet. Each employer has a verified LinkedIn profile that you can check out before you begin work.</p>
          <p><a class="btn btn-default" href="/freelancers" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Find Freelancers</h2>
          <p>Easily find the best freelancers on the planet. Each freelancer has a verified LinkedIn profile that you can check out before hiring.</p>
          <p><a class="btn btn-default" href="/employers" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Open Marketplace</h2>
          <p>{{{env('APP_NAME')}}} is the only open marketplace on the planet powered by and built by the freelancers who use it. Our freelancers actively contribute to the development of this marketplace. Go ahead and check out our top contributors and hire them today.</p>
          <p><a class="btn btn-default" href="/leaderboard" role="button">View details &raquo;</a></p>
        </div>
      </div>

    </div> <!-- /container -->
@stop
