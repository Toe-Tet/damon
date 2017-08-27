@extends('layouts.master')

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-fileinput/css/fileinput.min.css') }}"
@endsection

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div class="card" id="image">
				<div class="card-header">
					<i class="fa fa-edit"></i>Create Posts
				</div>
				
				<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
				<div class="card-block">
					{{ csrf_field() }}

					<div class="form-group row">
						<label for="title" class="form-control-label col-md-3">Title:</label>
						<div class="col-md-9">
							<input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
						</div>

						@if($errors->has('title'))
							<div class="text-danger">{{ $errors->first('title') }}</div>
						@endif
					</div>

					<div class="form-group row">
						<label for="image" class="col-md-3 form-control-label">Image:</label>
						<div class="col-md-9">
							<button class="btn btn-default btn-large imagebtn"
									@click.prevent="showModal=true" v-if="!featureImg">
								<span class="fa fa-plus text-muted"></span>
							</button>
							<img :src=" '/' + featureImg.image_thumb_path" v-else height="80" />
							<a class="btn btn-danger" href="#" @click.prevent="featureImg=''" v-if="featureImg">x</a>		
						</div>

						<input type="hidden" name="image" v-el:img-id :value="featureImg.id">
					</div>

					<div class="form-group row">
						<label for="body" class="col-md-3 form-control-label">Body:</label>
						<div class="col-md-9">
							<textarea name="body" id="body" type="text" rows="10" class="form-control">{{ old('body') }}</textarea>
						</div>

						@if($errors->has('body'))
							<div class="text-danger">{{ $errors->first('body') }}</div>
						@endif
					</div>

				</div>

				<div class="card-footer">
					<button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>Submit</button>
					<a href="{{ route('posts.index') }}" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i>Cancle</a>
				</div>
				</form>
			@include ('blog.partials.mediabrowser')
			</div>
		</div>
	</div>
@endsection

@section('footer-scripts')

	<script src="{{ asset('plugins/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js') }}"></script>

	<script src="{{ asset('plugins/bootstrap-fileinput/js/fileinput.min.js') }}"></script>

	<script src="{{ asset('plugins/vue-strap2/dist/vue-strap.min.js') }}"></script>

	<script>
		Vue.config.devtools = true;
		Vue.config.debug = true;

		$(document).ready(function () {

			$.ajaxSetup({
			    headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});

			let imageUrl = "{{ url('/blog/images') }}";

			new Vue({
				el: "#image",

				mounted() {
					axios.get(imageUrl).then((response) => {
						this.images = response.data;
					});

					$('.input-705').fileinput({
	                    uploadUrl: "{{ url('blog/images') }}", // server upload action
	                    uploadAsync: false,
	                    showUpload: false, // hide upload button
	                    showRemove: false, // hide remove button
	                    showPreview: false,
	                    minFileCount: 1,
	                    maxFileCount: 5,
	                    showCaption:false,
	                    browseIcon: '<i class="fa fa-camera"></i>',

	                }).on("filebatchselected", function(event, files) {
	                    // trigger upload method immediately after files are selected
	                    $('.input-705').fileinput("upload");

	                }).on('filebatchuploadsuccess', function(event, data, previewId, index) {
						this.images.data.unshift(data.response);	                        
						$('.nav-tabs .home').tab('show');
	                });	
				},

				data: {
					images: '',
					showModal: false,
					featureImg: '',
				},

				methods: {
					select(image) {
						this.showModal = false;

						this.featureImg = image;

						// this.$els.imgId.value=image.id;
					},

					fetchNext() {
						axios.get(this.images.next_page_url).then(response => {
							this.images = response.data;
						});
					},

					fetchPrev() {
						axios.get(this.images.prev_page_url).then(response => {
							this.images = response.data;
						});
					}

				},

				components: {
					modal: VueStrap.modal,
					'tabset': VueStrap.tabset,
					'tab': VueStrap.tab
				}

			})

		});
	</script>

@endsection