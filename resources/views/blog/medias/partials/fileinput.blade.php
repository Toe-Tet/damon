	var that=this;

	$("#image").fileinput({				
		theme: "fa", 
	    uploadUrl: "{{ route('images.index') }}", // server upload action
	    uploadAsync: true,
	    maxFileCount: 5,
	    allowedFileTypes: ['image'],
	    layoutTemplates :
	    {
		    main1: '{preview}\n' +
		        '<div class="kv-upload-progress hide"></div>\n' +
		        '<div class="input-group {class}">\n' +
		        '   {caption}\n' +
		        '   <div class="input-group-btn">\n' +
		        '       {remove}\n' +
		        '       {cancel}\n' +
		        '       {upload}\n' +
		        '       {browse}\n' +
		        '   </div>\n' +
		        '</div>',
		    main2: '{preview}\n<div class="kv-upload-progress hide"></div>\n{remove}\n{cancel}\n{upload}\n{browse}\n',
		    preview: '<div class="file-preview {class}">\n' +
		        '    {close}\n' +
		        '    <div class="{dropClass}">\n' +
		        '    <div class="file-preview-thumbnails">\n' +
		        '    </div>\n' +
		        '    <div class="clearfix"></div>' +
		        '    <div class="file-preview-status text-center text-success"></div>\n' +
		        '    </div>\n' +
		        '</div>',
		    icon: '<span class="glyphicon glyphicon-file kv-caption-icon"></span>',
		    caption: '<div tabindex="-1" class="form-control file-caption {class}">\n' +
		        '   <div class="file-caption-name"></div>\n' +
		        '</div>',
		    btnDefault: '<button type="{type}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</button>',
		    btnLink: '<a href="{href}" tabindex="500" title="{title}" class="{css}"{status}>{icon}{label}</a>',
		    btnBrowse: '<div tabindex="500" class="{css}"{status}>{icon}{label}</div>',
		    modal: '<div id="{id}" class="modal fade">\n' +
		        '  <div class="modal-dialog modal-lg">\n' +
		        '    <div class="modal-content">\n' +
		        '      <div class="modal-header">\n' +
		        '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>\n' +
		        '        <h3 class="modal-title">Detailed Preview <small>{title}</small></h3>\n' +
		        '      </div>\n' +
		        '      <div class="modal-body">\n' +
		        '        <textarea class="form-control" style="font-family:Monaco,Consolas,monospace; height: {height}px;" readonly>{body}</textarea>\n' +
		        '      </div>\n' +
		        '    </div>\n' +
		        '  </div>\n' +
		        '</div>',
		    zoom: '<button type="button" class="btn btn-default btn-sm btn-block" title="{zoomTitle}: {caption}" onclick="{dialog}">\n' +
		        '   {zoomInd}\n' +
		        '</button>\n',
		    progress: '<div class="progress">\n' +
		        '    <div class="progress-bar progress-bar-success progress-bar-striped text-center" role="progressbar" aria-valuenow="{percent}" aria-valuemin="0" aria-valuemax="100" style="width:{percent}%;">\n' +
		        '        {percent}%\n' +
		        '     </div>\n' +
		        '</div>',
		    footer: '<div class="file-thumbnail-footer">\n' +
		        '    <div class="file-caption-name" style="width:{width}">{caption}</div>\n' +
		        '    {progress} {actions}\n' +
		        '</div>',
		    actions: '<div class="file-actions">\n' +
		        '    <div class="file-footer-buttons">\n' +
		        '        {upload}{delete}' +
		        '    </div>\n' +
		        '    <div class="file-upload-indicator" tabindex="-1" title="{indicatorTitle}">{indicator}</div>\n' +
		        '    <div class="clearfix"></div>\n' +
		        '</div>',
		    actionDelete: '<button type="button" class="fa fa-trash {removeClass}" title="{removeTitle}"{dataUrl}{dataKey}>{removeIcon}</button>\n',
		    actionUpload: '<button type="button" class="fa fa-upload {uploadClass}" title="{uploadTitle}">{uploadIcon}</button>\n'
						 
		}					     

	});

	$('#image').on('fileuploaded', function(event, data, previewId, index) {
		that.images.data.push(data.response);	
	}).on('fileuploaderror', function(event, data, msg) {
	   alert('unable to upload');
	});