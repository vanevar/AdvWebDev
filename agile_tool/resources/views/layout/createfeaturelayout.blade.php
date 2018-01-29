<div class="featurespecial">
  <form  method="POST" action="/features/{{ $project->id }}/store">
      {{ csrf_field() }}
  <div class="form-group row">
    <h1> Create a new Feature</h1>
  </div>
<div class="form-group row">
  <label for="title" class="col-2 col-form-label">Title</label>
  <div class="col-10">
    <input class="form-control" type="text" id="title" name="title">
  </div>
</div>
<div class="form-group row">
  <label for="functionality" class="col-2 col-form-label">Functionality</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="functionality" name="functionality"></textarea>
  </div>
</div>
<div class="form-group row">
  <label for="benefit" class="col-2 col-form-label">Benefit</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="benefit" name="benefit"></textarea>
  </div>
</div>
 <div class="form-group row">
    <label for="priority" class="col-2 col-form-label">Priority</label>
    <div class="col-10">
    <select class="form-control" id="priority" name="priority">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="iteration_id" class="col-2 col-form-label">Iteration</label>
    <div class="col-10">
    <select class="form-control" id="iteration_id" name="iteration_id">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="user_role_id" class="col-2 col-form-label">User Role</label>
    <div class="col-10">
    <select class="form-control" id="user_role_id" name="user_role_id">
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