<!doctype html>
<html lang="en">
  <head>
      <title>Create a new Iteration</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/css/check.css" rel="stylesheet">
  </head>
  <body>
@extends ('layout/header')
<div class="container">
  <form action="/iterations/{{ $project->id }}/store" method="post">
  {{ csrf_field() }}
  <div class="form-group row">
    <h1> Create a new Iteration</h1>
  </div>
<div class="form-group row">
  <label for="iterationdeadline" class="col-2 col-form-label">Deadline</label>
  <div class="col-10">
    <input class="form-control" type="date" id="iterationdeadline"></textarea>
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