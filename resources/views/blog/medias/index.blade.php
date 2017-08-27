@extends ('layouts.master')

@section ('styles')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css') }}">
<style>
	.img{}
	.images{
	    height: auto;
	    margin-top: 20px;
	    margin-bottom: 20px;
	    padding: 0px;
	    display: block;
	}

	#image-table img{
	    height: 50px;
	    width: 60px;
		border: 1px solid #ECF0F5;
		cursor: pointer;
	}	

	.images img:hover{
		border:1px solid #00C0EF;
	}
	#media .box-body{
		padding-bottom: 50px;
	}
	.media-img{
		border-right: 1px solid #E7E7E7;
	}
	.gallery{
		min-height: 180px;
		box-shadow: 1px 1px 5px gray;
		padding-bottom: 20px;
		margin-bottom: 20px;
		color: #424242;
	}
	.view-mode{
		font-size: 18px;
	}	
	button {
		cursor: pointer;
	}	
		
</style>
@stop

@section ('content')
<div class="row">
	<div class="col-md-12">
		<div class="box" id="media">
		    
		    <div class="box-header with-border">
		    	<h3 class="box-title">Media Table</h3>
		    	<a class="btn btn-success pull-right" href="{{ route('images.create') }}">Add Media</a>
		    </div><!-- /.box-header -->

		    <div class="box-body">
				
		    		<div class="col-lg-12" style="margin-bottom:10px">
			    		<a href="" @click.prevent="listview" class="view-mode">
			    			<i class="fa fa-list-ul"></i>
			    		</a>
			    		<a href="" @click.prevent="gridview" class="view-mode">
			    			<i class="fa fa-image"></i>
			    		</a>			    			
		    		</div>
				
			    	<div class="col-lg-12 gallery">
		    			<div class="row">
				    		<div class="col-lg-3 col-xs-6 col-sm-4 images" 
				    			 v-for="image in images.data" v-show="normal">
				    			<img :src=" '/' + image.image_thumb_path" 
				    			     @click="showModal=true,current=image" />
				    			@{{ image.image_name }}
				    		</div>
			    		</div>

			    		<div class="col-lg-12" v-show="!normal" style="margin-top:20px">
				    		<table id="image-table" class="table table-responsive table-hover">
				    			<thead>
				    					<th>No</th>
				    					<th >image</th>
				    					<th class="col-lg-6">Name</th>
				    					<th class="col-lg-2">created at</th>
				    			</thead>
				    			<tbody>
		    						<tr v-for="(image, index) in images.data" style="height:70px" >
						    			<td >
							    			@{{ index+1 }}
					    				</td>
					    				<td>
							    			<img :src=" '/' + image.image_thumb_path" 
							    			     @click="showModal=true,current=image" />
					    				</td>
					    				<td>
					    					@{{ image.image_full_name }}
					    				</td>
					    				<td>
					    					@{{ image.created_at }}
					    				</td>
					    			</tr>
				    			</tbody>
				    		</table>
						    			
			    		</div>
			    	</div>
		    		{!! $images->links() !!}
				
			    	<div class="col-lg-12">
				    	<label class="control-label">Select File</label>
						<input id="image" name="image" 
							   type="file" multiple class="file-loading"
							/>
			    		<br/>
			    		<hr/>
			    	</div>
		      	@if(!$images->count()>0)
		      		<h4 v-show="images">No Image found</h4>
		      	@endif

		    </div><!-- /.box-body -->

		    @include('blog.medias.partials.modal')
		    
		</div>
	</div>
</div>
@stop

@section ('footer-scripts')
	<script src="{{ asset('plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js') }}"></script>

	<script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js') }}"></script>

	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.min.js"></script> --}}
	{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.3.4/vue-resource.min.js"></script> --}}

	<script src="{{ asset('plugins/vue-strap2/dist/vue-strap.min.js') }}"></script>

	<script>
		Vue.config.devtools = true;

		$(document).ready(function(){

			// Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content')
			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			new Vue({

				el : '#media',
				
				mounted() {
					@include('blog.medias.partials.fileinput') 
				},

				data : {					
					images : {!! $images->toJson() !!},
					showModal : false,
					current : '',
					imageName : '',
					normal : true
				},

				methods: {
					listview() {
						this.normal = false;
					},

					gridview() {
						this.normal = true;
					},

					deleteImage() {
						axios.delete('{{ url('/blog/images') }}/' + this.current.id)
							 .then( () => {
							 	let index = this.images.data.indexOf(this.current);

							 	this.images.data.splice(index, 1);

							 	this.showModal = false;

							 	this.current = '';
							 });
					},

					updateImage(current) {
						let data = { name: this.imageName };

						axios.patch('{{ url('/blog/images') }}/' + current.id, data)
							 .then( (response) => {
							 	let index = this.images.data.indexOf(current);

							 	this.$set(this.images.data, index, response.data);

							 	this.showModal = false;

							 	this.current = '';

							 	this.imageName = '';

							 	toastr.success('Successfully Updated Slider', 'Status', {timeOut: 2000});
							 });
					}
				},

				components: {
					modal: VueStrap.modal
				},
				
			});

		});
	</script>
@stop