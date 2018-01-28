 <div class="container">

      <div class = "row">
	  <h1>Features</h1> 
	  
	<div class="input-group-addon"><a href="http://google.com"> <i class="fa fa-plus" aria-hidden="true"></i></a></div>
	 </div>
      <p class="lead">All the features related to the project.</p>
 <ul>
  <div class="row">
        <div class="col-1"><strong>S No.</strong></div>
        <div class="col-2"><strong>Title</strong></div>
        <div class="col-2"><strong>Functionality</strong></div>
        <div class="col-2"><strong>Benefit</strong></div>
        <div class="col-1"><strong>Priority</strong></div>
        <div class="col-1"><strong>Options</strong></div>
   </div>
  </ul>

@foreach ($feature as $index => $efeature)
      <ul>
  <div class="row">
        <div class="col-1">{{$index+1}}</div>
        <div class="col-2">{{$efeature->title}}</div>
        <div class="col-2">{{$efeature->functionality}}</div>
        <div class="col-2">{{$efeature->benefit}}</div>
        <div class="col-1">{{$efeature->priority}}</div>
        <div class="col-1">
		      <a href="/project/feature/edit">edit project</a>
		    </div>
   </div>
  </ul>
  @endforeach
    </div> <!-- /container -->