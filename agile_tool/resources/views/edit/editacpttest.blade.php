<!doctype html>
<html lang="en">
  <head>
      <title>Editing Acceptance Test</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/check.css" rel="stylesheet">
  </head>
  <body>
@extends ('layout/header')
<div class="container">
  <form action="{{url('projects/Feature/acpttest', [$project->id])}}" method="post">
  {{ csrf_field() }}
  <div class="form-group row">
    <h1> Create a new Acceptance Test</h1>
  </div>
<div class="form-group row">
  <label for="acpttestdesc" class="col-2 col-form-label">Description</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="acpttestdesc"></textarea>
  </div>
</div>
<div class="form-group row">
  <label for="acpttestresults" class="col-2 col-form-label">Test Results</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="acpttestresults"></textarea>
  </div>
</div>
 <div class="form-group row">
    <label for="acpttestfeature" class="col-2 col-form-label">Feature</label>
    <div class="col-10">
    <select class="form-control" id="acpttestfeature">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="acpttestbug" class="col-2 col-form-label">Bug Id</label>
    <div class="col-10">
    <select class="form-control" id="acpttestbug">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
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