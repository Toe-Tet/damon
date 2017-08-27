{{-- <modal title="Modal title" :show.sync="showModal" :currentimg="current" effect="zoom" :width="1000">
	<div slot="modal-header" class="modal-header">
	  <h4 class="modal-title">Name : @{{ current.image_name }} <button type="button" class="close" @click="showModal=false"><span>&times;</span></button></h4>
	</div>
	<div slot="modal-body" class="modal-body">
		<div class="row">
			<div class="col-lg-6 media-img" v-if="current!='' ? true : false">
				<img v-bind:src=" '/' + current.image_path" class="img-responsive">
			</div>
			<div class="col-lg-6 media-data">
				<p><strong>Name</strong> : 
					<input 
						type="text" class="form-control" 
						v-bind:value="current.image_name"
						v-model="imageName"
					/> 
				</p>
				<p><strong>Uploaded at</strong> : @{{ current.created_at }}</p>
				<p><strong>Last Modified</strong> : @{{ current.updated_at }}</p>
				<p><strong>Path Name</strong> : @{{ current.image_path }}</p>
				
					<a class="text-danger" @click="delete" href="#">Delete Permanently</a>
				
			</div>						
		</div>
	</div>
	<div slot="modal-footer" class="modal-footer">
		<button 
			type="button" class="btn btn-default" 
			@click='showModal = false'>
				Close
		</button>
		
    		<button 
    			type="button" class="btn btn-success" 
    			@click='saveChanges(current)'>
    				Save Changes
    		</button>
		
	</div>
</modal> --}}


<modal :show="showModal" title="Modal title" effect="zoom" :width="1000" large="true">

  	<div slot="modal-header" class="modal-header bg-primary">
	 	<h4 class="modal-title">
	  		Name : @{{ current.image_name }}
	  	</h4>
	  	<button type="button" class="close" @click="showModal=false"><span>&times;</span></button>
	</div>

	<div slot="modal-body" class="modal-body">
		<div class="row">
			<div class="col-lg-6 media-img" v-if="current != '' ? true : false">
				<img :src=" '/' + current.image_path" class="img-responsive">
			</div>

			<div class="col-lg-6 media-data">
				<p><strong>Name</strong> : 
					<input 
						type="text" class="form-control" 
						:value="current.image_name"					
						v-model="imageName = current.image_name"
					/> 
				</p>
				<p><strong>Uploaded at</strong> : @{{ current.created_at }}</p>
				<p><strong>Last Modified</strong> : @{{ current.updated_at }}</p>
				<p><strong>Path Name</strong> : @{{ current.image_path }}</p>
				
				<a href="#" class="text-danger" @click.prevent="deleteImage">Delete Permanently</a>
			</div>
		</div>
	</div>
	
	<div slot="modal-footer" class="modal-footer">
	    <button type="button" class="btn btn-default" @click="showModal = false">Close</button>
	    <button class="btn btn-info" @click="updateImage(current)">Save Changes</button>
	    <button type="button" class="btn btn-success" >Another Action</button>
	</div>

</modal>


