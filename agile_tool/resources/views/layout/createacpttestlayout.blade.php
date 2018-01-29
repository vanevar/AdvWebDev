<div class="container">
  <form action="/projects/Feature/acpttest" method="post">
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