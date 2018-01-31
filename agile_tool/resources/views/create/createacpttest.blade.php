<!doctype html>
<html lang="en">
  <head>
      <title>Create a new Acceptance Test</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/check.css" rel="stylesheet">
  </head>
  <body>
    <a href="{{ URL::previous() }}">Go Back</a>
@extends ('layout/header')
<div class="container">
  <div class="form-group row">
  <button type="button" class="btn btn-outline-info"><a href="{{ URL::previous() }}">Go Back</a></button>
</div>
  <form action="/acceptance-tests/{{ $feature->id }}/store" method="post">
  {{ csrf_field() }}
  <div class="form-group row">
    <h1> Create a new Acceptance Test</h1>
  </div>
<div class="form-group row">
  <label for="acpttestdesc" class="col-2 col-form-label">Description</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="description"></textarea>
  </div>
</div>
<div class="form-group row">
  <label for="acpttestresults" class="col-2 col-form-label">Test Results</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="results"></textarea>
  </div>
</div>
  <div class="form-group row">
  <div class="col-8" align="center">
    <br><br><button type="submit" class="btn btn-primary">Submit</button>
  </div>
</div>
</form>
</div>
</body>
</html>