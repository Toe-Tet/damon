<ul class="nav nav-tabs" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" data-toggle="tab" href="#home" role="tab">Home</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
	</li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
	<div class="tab-pane active" id="home" role="tabpanel">Hello</div>
	<div class="tab-pane" id="profile" role="tabpanel">world</div>
	<div class="tab-pane" id="messages" role="tabpanel">laravel</div>
	<div class="tab-pane" id="settings" role="tabpanel">vue</div>
</div>


		  	<!-- Nav tabs -->
		  	<ul class="nav nav-tabs" role="tablist">
		    	<li class="nav-item" role="presentation">
		    		<a href="#home1" aria-controls="home" role="tab" data-toggle="tab" class="nav-link active">Media Library</a>
		    	</li>
		    	<li class="nav-item">
		    		<a href="#profile1" aria-controls="profile" role="tab" data-toggle="tab" class="nav-link">Upload Image</a>
		    	</li>
		  	</ul>

		  	<!-- Tab panes -->
		  	<div class="tab-content" 
		  		  
		  		>
		    	<div role="tabpanel" class="tab-panel active" id="home1">
					{{-- <div style="margin-top: 10px">
						<input type="text" class="form-control pull-left" style="width: 40%"
							 placeholder="Filter image by name">
						<button class="btn btn-default pull-left">Filter</button>
					</div> --}}

					<div class="row">
						<div class="col-lg-12 media-data" style="padding:0px">
				    		<div class="col-md-3 images" v-for="image in images.data" {{-- v-if="!step2" --}}>
			    				<img class="media-item img-responsive" 
			    				     :src=" '/' + image.image_thumb_path"
			    					 @click="select(image)"/>
				    		</div>
						</div>	
						<div class="col-md-12" style="margin-top:20px;">
							<button class="btn btn-primary" @click="fetchPrev"
									v-show="images.prev_page_url==null ? false : true"
							>
									Previous
							</button>
							<button class="btn btn-primary pull-right" @click="fetchNext" 
									v-show="images.next_page_url==null ? false : true">
									Next
							</button> 
						</div>												
					</div>			    		
		    	</div>
		    	<div role="tabpanel" class="tab-pane" id="profile1">
			    	<div class="row">
			    		<div class="col-lg-12" style="margin-top:50px">
							<input id="input" name="image" type="file"  class="file-loading input-705">
			    		</div>
			    	</div>
		    	</div>
		  	</div>