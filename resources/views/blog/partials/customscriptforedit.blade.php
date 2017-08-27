
<script>
	Vue.config.devtools = true;

	$(document).ready(function () {
		
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		let imageUrl = "{{ url('/backend/images') }}";

		new Vue({
			el: "#post",

			mounted() {
				axios.get(imageUrl).then((response) => {
					this.images = response.data;
				});

				$('.input-705').fileinput({
                    uploadUrl: "{{ url('backend/images') }}", // server upload action
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
				featureImg: {
					image_thumb_path: '{{ isset($image->image_thumb_path) ? 
												$image->image_thumb_path : '' }}',
					image_id: '{{ isset($image->id) ? $image->id : '' }}'
				}
				
			},

			computed: {
				hasFeatureImg() {
					return this.featureImg.image_thumb_path != '';
				},

			},

			methods: {
				select(image) {
					this.showModal = false;

					this.featureImg = image;

					this.featureImg.image_id = image.id;
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
				},

				remove() {
					this.featureImg.image_thumb_path = '';
					this.featureImg.image_id = '';
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