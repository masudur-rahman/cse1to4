<head>
	<head>
	<link rel="stylesheet" type="text/css" href="../../css/lib/w3.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
	<script type="text/javascript" src="../../js/jquery-latest.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("input[type=file]#contents").change(function(){
				$("#divFiles").html('');
				if(this.files.length>0){
					$("input[type=submit]#submit").prop('disabled', false);
				}
				else $("input[type=submit]#submit").prop('disabled', true);
				//alert(this.files.item(0).name);
				for (var i = 0; i < this.files.length; i++) { //Progress bar and status label's for each file genarate dynamically
     				alert(this.files.item(i).name);
					var fileId = i;
					$("#divFiles").append(
					'<div class="col-md-8" style="width: 50%;">' +
					    '<div style="width:100%; height: 8px; background-color: #ffa;"><div class="progress-bar progress-bar-striped active" id="progressbar_' + fileId + '" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width:0%; height: 8px;"></div>' +
					    '</div></div>' +
					    '<div class="col-md-12">' +
					       '<div class="col-md-6">' +
					          '<input type="button" class="btn btn-danger" style="display: none; line-height:6px; height:25px" id="cancel_' + fileId + '" value="cancel">' +
					    	'</div>' +
				        	'<div class="col-md-6">' +
					            '<p class="progress-status" style="text-align: right; margin-right:-15px; font-weight:bold; color:saddlebrown;" id="status_' + fileId + '"></p>' +
					   		'</div>' +
						'</div>' +
					    '<div class="col-md-12">' +
					    	'<p id="notify_' + fileId + '" style="text-align: right;"></p>' +
	    				'</div>' +
	    			'</div>'
	    			);
				}
			});

		    $("input[type=submit]#submit").click(function(){
				/*$("#divFiles").append('<div>masud'+'<p>masudur rahman</p></div>');*/
				var file = document.getElementById("contents");//All files
				var title = document.getElementById('title').value;
				
				for (var i = 0; i < file.files.length; i++) {
					uploadSingleFile(file.files[i], i, title);
				}
		    });

		    function uploadSingleFile(file, i, title) {
	            var fileId = i;
	            var ajax = new XMLHttpRequest();
	            //Progress Listener
	            ajax.upload.addEventListener("progress", function (e) {
	                var dcml = (e.loaded / e.total);
	                var percent = dcml * 100;
	                var red = 255-255*dcml, green=137, blue=0;
	                $("#status_" + fileId).text(percent.toFixed(2) + "% uploaded, please wait...");
	                $('#progressbar_' + fileId).css("width", percent + "%");
	                $('#progressbar_' + fileId).css("background-color", 'rgb('+red+','+green+','+blue+')');
	                $("#notify_" + fileId).text("Uploaded " + (e.loaded / 1048576).toFixed(3) + " MB of " + (e.total / 1048576).toFixed(3) + " MB ");
	            }, false);
	            //Load Listener
	            ajax.addEventListener("load", function (e) {
	                $("#status_" + fileId).text(event.target.responseText);
	                $('#progressbar_' + fileId).css("width", "100%")

	                //Hide cancel button
	                var _cancel = $('#cancel_' + fileId);
	                _cancel.hide();
	            }, false);
	            //Error Listener
	            ajax.addEventListener("error", function (e) {
	                $("#status_" + fileId).text("Upload Failed");
	            }, false);
	            //Abort Listener
	            ajax.addEventListener("abort", function (e) {
	                $("#status_" + fileId).text("Upload Aborted");
	            }, false);

	            ajax.open("POST", "../file-upload.php"); // Your API .net, php

	            var uploaderForm = new FormData(); // Create new FormData
	            uploaderForm.append("file", file); // append the next file for upload
	            uploaderForm.append('title', title);
	            ajax.send(uploaderForm);

	            //Cancel button
	            var _cancel = $('#cancel_' + fileId);
	            _cancel.show();

	            _cancel.on('click', function () {
	                ajax.abort();
	                _cancel.prop('value', 'Cancelled');
	                _cancel.prop('disabled', true);
	            });
	        }
		});

	</script>
</head>

<body>
	<div class="" style="margin: 20px;">
		<label style="font-size: 22px;">Title: </label>
		<input type="text" name="title" id="title" placeholder="Nothing" style="padding: 5px;">
		<label style="font-size: 22px;">Choose Files: </label>
		<input type="file" name="contents" id="contents" multiple>
		<input type="submit" name="submit" id="submit" disabled="true">
	</div>
	<div>
		
	</div>
	<div id="divFiles" style="">
		'<div class="w3-row" style="border: 2px solid red; padding: 5px 10px 5px 10px;">'+
			'<div class="w3-half">'+
				'<div class="w3-row">'+
					'<div id="fileName' + fileId + '" class="w3-col" style="width: 87%">'+
					'</div>'+
					'<div class="w3-col" style="width: 13%">'+
					'<input type="button" style="background-color: #ff8566; color: white; border: 1px solid #ff471a; width: 85px;" id="cancel_' + fileId + '" name="cancel" value="Cancel" disabled="">'+
					'</div>'+
				'</div>'+
				'<div style="padding: 7px 0px;">'+
					'<div id="progressbar_' + fileId + '" style="background-color: green; height: 8px; width: 100%;">'+
					'</div>'+
				'</div>'+
			'</div>'+
			'<div class="w3-half" style="text-align: right;">'+
				'<div id="status_' + fileId + '" style="font-weight:bold; color:saddlebrown;">'+
				'</div>'+
				'<div id="notify_' + fileId + '">'+
				'</div>'+
			'</div>'+
		'</div>'
	</div>
</body>