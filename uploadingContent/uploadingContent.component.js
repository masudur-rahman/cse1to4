//bkLib.onDomLoaded(function(){ nicEditors.allTextAreas() });
bkLib.onDomLoaded(function(){          
    new nicEditor({maxHeight : 115}).panelInstance('description');
});

$(document).ready(function(){
	$("input[type=file]#contents").change(function(){
		$("#divFiles").html('');		

		for (var i = 0; i < this.files.length; i++) {			
			var fileId = i;
			$("#divFiles").append(
			'<div class="w3-row" style="border: outset cyan; border-width: 0px 0px 2px 0px; border-radius: 13px 7px; padding: 5px 10px 5px 10px;">'+
				'<div class="w3-half">'+
					'<div class="w3-row">'+
						'<div id="fileName_' + fileId + '" class="w3-col" style="width: 84.5%">'+
						'</div>'+
						'<div class="w3-col" style="width: 13%">'+
						'<input type="button" style="background-color: #ff471a; color: white; border: 1px solid #ff471a; width: 85px;" id="cancel_' + fileId + '" name="cancel" value="Cancel">'+
						'</div>'+
					'</div>'+
					'<div style="margin: 7px 0px; background-color: #ffa;">'+
						'<div id="progressbar_' + fileId + '" style="height: 8px;">'+
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
			);
			$("#fileName_" + fileId).text(this.files.item(i).name);
		}
	});

	var uploadCount = 0, totalCount, tag1="", tag2="", tag3="", title, description, courseNo, level, term, requestID;
    $(document).on("submit", "form#uploader", function(event){
        // $("input[type=submit]#submit").click(function(){
        	processTags(document.getElementById('tags').value);
            $("input[type=file]#contents").prop('disabled', true);
        	$("input[type=submit]#submit").prop('disabled', true);
        	$("#divFiles").css("display", 'block');
    		var file = document.getElementById("contents");//All files
    		title = document.getElementById('title').value;
    		description = document.getElementById('description').value;
            courseNo = document.getElementById('courseNo').value;
            level = $('#level').find(":selected").val();
            term = $('#term').find(":selected").val();
            requestID=document.getElementById("requestID").value;
    		totalCount = file.files.length;

    		for (var i = 0; i < file.files.length; i++) {
    			var wrongInfo = wrongFileDetection(file.files[i]);
    			if(wrongInfo != "ok"){
                    totalCount--;
                    showWrongInformation(file.files[i], i, wrongInfo);
                }
    			else uploadSingleFile(file.files[i], i);
    		}
            if(totalCount==0) refresh(0);
        // });
    });
    function wrongFileDetection(file){
    	if(file.size>52428800) return "File size too long..."
    	var fileType = file['type'];
    	var validTypes = ["image/gif", "image/jpeg", "image/jpg", "image/png", "application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document", "application/msword", "application/vnd.ms-powerpoint", "application/vnd.openxmlformats-officedocument.presentationml.presentation"];
    	if($.inArray(fileType, validTypes)<=0) return "Unsupported file types...";
    	return "ok";
    }
    function showWrongInformation(file, fileId, wrongInfo){
    	$("#status_" + fileId).text(wrongInfo);
    	$("#notify_" + fileId).text("Uploaded 0.000 MB");
    	var _cancel = $('#cancel_' + fileId);
            _cancel.css("background-color", 'rgb(255, 133, 102)');
            _cancel.css("border", '1px solid rgb(255, 133, 102)');
            _cancel.prop('value', 'Discarded');
            _cancel.prop('disabled', true);
    }
    function processTags(tag){
    	tag+=','; var cnt=0;
    	for (var i = 0; i < tag.length && cnt<3; i++) {
    		if(tag[i]==',') cnt++;
    		else (!cnt)?tag1+=tag[i]:(cnt==1)?tag2+=tag[i]:tag3+=tag[i];
    	}
    }

    function uploadSingleFile(file, i) {
        var fileId = i;
        var ajax = new XMLHttpRequest();

        ajax.upload.addEventListener("progress", function (e) {
            var dcml = (e.loaded / e.total);
            var percent = dcml * 100;
            var red = 255-255*dcml, green=137, blue=0;
            $("#status_" + fileId).text(percent.toFixed(2) + "% uploaded, please wait...");
            $('#progressbar_' + fileId).css("width", percent + "%");
            $('#progressbar_' + fileId).css("background-color", 'rgb('+red+','+green+','+blue+')');
            $("#notify_" + fileId).text("Uploaded " + (e.loaded / 1048576).toFixed(3) + " MB of " + (e.total / 1048576).toFixed(3) + " MB ");
        }, false);

        ajax.addEventListener("load", function (e) {
            $("#status_" + fileId).text(event.target.responseText);
            $('#progressbar_' + fileId).css("width", "100%")
            var _cancel = $('#cancel_' + fileId);
            _cancel.css("background-color", 'rgb(102, 255, 102)');
            _cancel.css("border", '1px solid rgb(102, 255, 102)');
            _cancel.prop('value', 'Finished');
            _cancel.prop('disabled', true);
            uploadCount++;
            if(uploadCount==totalCount) refresh(uploadCount);
        }, false);

        ajax.addEventListener("error", function (e) {
            $("#status_" + fileId).text("Upload Failed");
        }, false);

        ajax.addEventListener("abort", function (e) {
            $("#status_" + fileId).text("Upload Aborted");
        }, false);

        ajax.open("POST", "uploadingContent.component.uploader.php");

        var uploaderForm = new FormData();
        uploaderForm.append("file", file);
        uploaderForm.append('title', (fileId)?title+fileId:title);
        uploaderForm.append('tag1', removeLeadingSpace(tag1));
        uploaderForm.append('tag2', removeLeadingSpace(tag2));
        uploaderForm.append('tag3', removeLeadingSpace(tag3));
        uploaderForm.append('description', description);
        uploaderForm.append('courseNo', courseNo);
        uploaderForm.append('level', level);
        uploaderForm.append('term', term);
        //alert(discussion_id);
        uploaderForm.append('discussion_id', discussion_id);

        ajax.send(uploaderForm);

        var _cancel = $('#cancel_' + fileId);
        _cancel.show();

        _cancel.on('click', function () {
            ajax.abort();
            _cancel.css("background-color", 'rgb(255, 133, 102)');
            _cancel.css("border", '1px solid rgb(255, 133, 102)');
            _cancel.prop('value', 'Cancelled');
            _cancel.prop('disabled', true);
            uploadCount++;
            if(uploadCount==totalCount) refresh(uploadCount);
        });
    }
    function removeLeadingSpace(tag){
        var resultTag="", i;
        for (i = 0; i < tag.length && tag[i]==' '; i++);
        for(; i<tag.length; i++) resultTag+=tag[i];
        return resultTag;
    }
	function refresh(uploadCount){
        if(uploadCount>0){
            addToDiscussionBoard();
        	$.ajax({
        		type : 'POST',
        		url  : 'setSession.php',
        		data : 'idx=info&value=Upload_Completed...',
        		success : function(data){
        			setTimeout(function(){
        	    		window.location='uploadingContent.component.php';
        	    	}, 1500);
        		}
        	});
        }
        else{
            $.ajax({
                type : 'POST',
                url  : 'setSession.php',
                data : 'idx=info&value=Nothing_to_Upload...',
                success : function(data){
                    setTimeout(function(){
                        location.reload();
                        window.location='uploadingContent.component.php';
                    }, 5000);
                }
            });
        }
    }
    
    function addToDiscussionBoard(){
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "uploadingContent.component.discuss.php");
        var discuss = new FormData();
        //alert(discussion_id);
        discuss.append('discussion_id', discussion_id);
        discuss.append('title', title);
        discuss.append('description', description);
        discuss.append('tag1', removeLeadingSpace(tag1));
        discuss.append('tag2', removeLeadingSpace(tag2));
        discuss.append('tag3', removeLeadingSpace(tag3));
        //alert(requestID);
        discuss.append('requestID', requestID);

        ajax.send(discuss);
    }
});
