//bkLib.onDomLoaded(function(){ nicEditors.allTextAreas() });
bkLib.onDomLoaded(function(){          
    new nicEditor({maxHeight : 115}).panelInstance('description');
});

$(document).ready(function(){
	var title, description, courseNo, level, term;
    $(document).on("submit", "form#uploader", function(event){
		title = document.getElementById('title').value;
		description = document.getElementById('description').value;
        courseNo = document.getElementById('courseNo').value;
        level = $('#level').find(":selected").val();
        term = $('#term').find(":selected").val();
        refresh();
    });

	function refresh(){
        addToDiscussionBoard();
        $.ajax({
            type : 'POST',
            url  : '../uploadingContent/setSession.php',
            data : 'idx=info&value=Request_Received...',
            success : function(data){
                setTimeout(function(){
                    location.reload();
                }, 800);
            }
        });
    }
    
    
    function addToDiscussionBoard(){
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "requestContent.component.discuss.php");
        var discuss = new FormData();

        discuss.append('title', title);
        discuss.append('description', description);
        discuss.append('level', level);
        discuss.append('term', term);
        discuss.append('courseNo', courseNo);
        ajax.send(discuss);
    }
});
