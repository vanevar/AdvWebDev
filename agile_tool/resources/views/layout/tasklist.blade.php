 <div class="container">
<div class="form-group row">
  <button type="button" class="btn btn-outline-info"><a href="{{ URL::previous() }}">Go Back</a></button>
</div>
      <div class = "row">
	  <h1>Tasks</h1> 
	  
	<div class="input-group-addon"><a href="/project/features/tasks/create"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the Tasks related to the project.</p>
 <ul>
  <div class="row">
        <div class="col-1"><strong>S No.</strong></div>
        <div class="col-2"><strong>Description</strong></div>
        <div class="col-2"><strong>Status</strong></div>
        <div class="col-2"><strong>Owner</strong></div>
        <div class="col-1"><strong>Options</strong></div>
   </div>
  </ul>

@foreach ($task as $index => $etask)
      <ul>
  <div class="row">
        <div class="col-1">{{$index+1}}</div>
        <div class="col-2">{{$etask->description}}</div>
        <div class="col-2">{{$etask->task_status}}</div>
        <div class="col-2">{{$etask->owner_name}} {{$etask->owner_last_name}}</div>
        <div class="col-1">
		      <a href="/project/features/tasks/edit">edit task</a>
		    </div>
   </div>
  </ul>
  @endforeach
    </div> <!-- /container -->