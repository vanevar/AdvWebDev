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
  <form action="/acceptancetests/{{ $acceptance_test->id }}/update" method="post">
  {{ csrf_field() }}
  <div class="form-group row">
    <h1> Edit an Acceptance Test</h1>
  </div>
<div class="form-group row">
  <label for="acpttestdesc" class="col-2 col-form-label">Description</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="acpttestdesc">{{ $acceptance_test->description }}</textarea>
  </div>
</div>
<div class="form-group row">
  <label for="acpttestresults" class="col-2 col-form-label">Test Results</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="acpttestresults">{{ $acceptance_test->test_result }}</textarea>
  </div>
</div>
  <div class="form-group row">
    <label for="acpttestbug" class="col-2 col-form-label">Bug Id</label>
    <div class="col-10">
      <a href="/tasks/{{$feature->id}}/store">Create a new Bug</a>
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