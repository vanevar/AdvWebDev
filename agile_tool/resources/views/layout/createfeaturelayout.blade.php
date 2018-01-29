<div class="featurespecial">
    <form action="/projects/feature" method="post">
  {{ csrf_field() }}
  <div class="form-group row">
    <h1> Create a new Feature</h1>
  </div>
<div class="form-group row">
  <label for="featuretitle" class="col-2 col-form-label">Title</label>
  <div class="col-10">
    <input class="form-control" type="text" id="featuretitle">
  </div>
</div>
<div class="form-group row">
  <label for="featurefunc" class="col-2 col-form-label">Functionality</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="featurefunc"></textarea>
  </div>
</div>
<div class="form-group row">
  <label for="featurebenefit" class="col-2 col-form-label">Benefit</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="featurebenefit"></textarea>
  </div>
</div>
 <div class="form-group row">
    <label for="featurepriority" class="col-2 col-form-label">Priority</label>
    <div class="col-10">
    <select class="form-control" id="featurepriority">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="featurepriority" class="col-2 col-form-label">Iteration</label>
    <div class="col-10">
    <select class="form-control" id="featurepriority">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="featurepriority" class="col-2 col-form-label">Project</label>
    <div class="col-10">
    <select class="form-control" id="featurepriority">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="featurepriority" class="col-2 col-form-label">User Role</label>
    <div class="col-10">
    <select class="form-control" id="featurepriority">
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