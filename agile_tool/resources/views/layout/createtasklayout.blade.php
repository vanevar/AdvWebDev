<div class="container">
    <form action="/projects/feature/task" method="post">
  {{ csrf_field() }}
  <div class="form-group row">
    <h1> Create a new Task</h1>
  </div>
<div class="form-group row">
  <label for="tasktitle" class="col-2 col-form-label">Title</label>
  <div class="col-10">
    <input class="form-control" type="text" id="tasktitle">
  </div>
</div>
<div class="form-group row">
  <label for="taskdesc" class="col-2 col-form-label">Description</label>
  <div class="col-10">
    <textarea class="form-control" rows="3" id="taskdesc"></textarea>
  </div>
</div>
 <div class="form-group row">
    <label for="taskfeature" class="col-2 col-form-label">Feature</label>
    <div class="col-10">
    <select class="form-control" id="taskfeature">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="taskstatus" class="col-2 col-form-label">Status</label>
    <div class="col-10">
    <select class="form-control" id="taskstatus">
      <option>1</option>
      <option>2</option>
      <option>3</option>
    </select>
  </div>
  </div>
  <div class="form-group row">
    <label for="taskowner" class="col-2 col-form-label">Owner</label>
    <div class="col-10">
    <select class="form-control" id="taskstatus">
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