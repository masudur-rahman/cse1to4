//bkLib.onDomLoaded(function(){ nicEditors.allTextAreas() });
bkLib.onDomLoaded(function(){
    new nicEditor({maxHeight : 115}).panelInstance('description');
});
$.ajax({                                                         //TO GET Supervisor SUGGETION
    type : 'GET',
    url  : '../Database/getAvailableTeacher.php',
    data : '',
    dataType: 'json',
    success : function(data)
        {
             //alert(data);
              $( function() {
                var availableTeacher = data;
                //alert(availableTags);
                $( "#supervisor" ).autocomplete({
                  source: availableTeacher
                });
            } );
        }
});

$.ajax({                                                         //TO GET Field SUGGETION
    type : 'GET',
    url  : '../Database/getAvailableTopic.php',
    data : '',
    dataType: 'json',
    success : function(data)
        {
             //alert(data);
              $( function() {
                var availableTopic = data;
                //alert(availableTags);
                $( "#field" ).autocomplete({
                  source: availableTopic
                });
            } );
        }
});
$(document).ready(function(){
    $("#upStatus").html('');
	var title, description, supervisorName, field;
    $(document).on("submit", "form#uploader", function(event){
            $("input[type=file]#proposalPresentation").prop('disabled', true);
            $("input[type=file]#proposalReport").prop('disabled', true);
            $("input[type=file]#finalPresentation").prop('disabled', true);
            $("input[type=file]#finalReport").prop('disabled', true);
        	$("input[type=submit]#upload").prop('disabled', true);
        	$("#divFiles").css("display", 'block');
            var proposalPresentation = document.getElementById("proposalPresentation");
            var proposalReport = document.getElementById("proposalReport");
            var finalPresentation = document.getElementById("finalPresentation");
    		var finalReport = document.getElementById("finalReport");
    		title = document.getElementById('title').value;
            description = document.getElementById('description').value;
    		supervisorName=document.getElementById('supervisor').value;
            field=document.getElementById('field').value;
            refresh(proposalPresentation, proposalReport, finalPresentation, finalReport);
    });

    function uploadProject(proposalPresentation, proposalReport, finalPresentation, finalReport){
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress", function (e) {
            $("#upStatus").html('Uploading, Please wait...');
        }, false);

        ajax.addEventListener("load", function (e) {
            $("#upStatus").text(event.target.responseText);
        }, false);

        ajax.addEventListener("error", function (e) {
            $("#upStatus").text("Upload Failed");
        }, false);

        ajax.open("POST", "uploadProject.component.uploader.php");

        var uploaderForm = new FormData();
        uploaderForm.append("proposalPresentation", proposalPresentation.files[0]);
        uploaderForm.append("finalPresentation", finalPresentation.files[0]);
        uploaderForm.append("proposalReport", proposalReport.files[0]);
        uploaderForm.append("finalReport", finalReport.files[0]);
        uploaderForm.append('title', title);
        uploaderForm.append('description', description);
        uploaderForm.append('supervisorName', supervisorName);
        uploaderForm.append('field', field);

        ajax.send(uploaderForm);

    }
	function refresh(proposalPresentation, proposalReport, finalPresentation, finalReport){
        uploadProject(proposalPresentation, proposalReport, finalPresentation, finalReport);
    	$.ajax({
    		type : 'POST',
    		url  : '../uploadingContent/setSession.php',
    		data : 'idx=info&value=Upload_Completed...',
    		success : function(data){
    			setTimeout(function(){
    	    		window.location='uploadProject.component.php';
    	    	}, 1500);
    		}
    	});
    }

});
