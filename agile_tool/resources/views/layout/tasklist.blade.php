 <div class="container">

      <div class = "row">
	  <h1>Tasks</h1> 
	  
	<div class="input-group-addon"><a href="http://google.com"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the Tasks related to the project.</p>

@foreach ($task as $etask)
      <ul>
  <div class="row">
        <div class="col-2">{{$etask->title}}</div>
        <div class="col-2">{{$etask->description}}</div>
        <div class="col-2">{{$etask->status_id}}</div>
        <div class="col-1">{{$etask->owner_id}}</div>
        <div class="col-1">
		      <a href="/project/feature/edit">edit project</a>
		    </div>
   </div>
  </ul>
  @endforeach
    </div> <!-- /container -->