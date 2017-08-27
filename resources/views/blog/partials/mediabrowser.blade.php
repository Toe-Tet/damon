<style type="text/css">
	.modal-body{
		position: relative;
	}
	.loading{
		opacity: 0.6;
	}
	.ajax-loader {
	  z-index: 999;
	  width: 50px;
	  position: absolute;
	  left: 50%;
	  top: 50%;
	  margin-left: -32px; /* -1 * image width / 2 */
	  margin-top: -32px; /* -1 * image height / 2 */
	}	
	.media-item:hover{
		border: 1px solid #3C8DBC;
	}
	.media-item{
		cursor: pointer;
		height: 120px;
		width: 135px;			
	}
	.media-img{
		border-right: 1px solid #E7E7E7;

	}
	.modal-header {
	  min-height: 16.42857143px;
	  padding: 15px;
	  border-bottom: 0px; 
	}

</style>

<modal :show="showModal" title="Modal title" effect="zoom" large="true">

	<div slot="modal-header" class="modal-header">
	  	<h4 class="modal-title row">
	  		INSERT MEDIA ( @{{ images.current_page }}/ @{{ images.last_page }} )
	  	</h4>
	  	<button type="button" class="close" @click="showModal=false"><span>&times;</span></button>
	</div>

	<div slot="modal-body" class="modal-body" style="min-height:200px">
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
						<div class="col-lg-12 media-data">
				    		<div class="col-lg-3 col-md-4 col-xs-6 col-sm-6 img-list" v-for="image in images.data" {{-- v-if="!step2" --}}>
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

		<div class="row"></div>	
	</div>

</modal>

