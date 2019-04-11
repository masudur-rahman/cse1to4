//bkLib.onDomLoaded(function(){ nicEditors.allTextAreas() });
bkLib.onDomLoaded(function(){          
    new nicEditor({maxHeight : 115}).panelInstance('description');
});

$(document).ready(function(){

	var tag1="", tag2="", tag3="", title, description;
    $(document).on("submit", "form#uploader", function(event){
    	processTags(document.getElementById('tags').value);
		title = document.getElementById('title').value;
		description = document.getElementById('description').value;
        refresh();
    });
    function processTags(tag){
    	tag+=','; var cnt=0;
    	for (var i = 0; i < tag.length && cnt<3; i++) {
    		if(tag[i]==',') cnt++;
    		else (!cnt)?tag1+=tag[i]:(cnt==1)?tag2+=tag[i]:tag3+=tag[i];
    	}
    }

    function removeLeadingSpace(tag){
        var resultTag="", i;
        for (i = 0; i < tag.length && tag[i]==' '; i++);
        for(; i<tag.length; i++) resultTag+=tag[i];
        return resultTag;
    }
	function refresh(){
        addToDiscussionBoard();
    	$.ajax({
    		type : 'POST',
    		url  : 'setSession.php',
    		data : 'idx=info&value=Discussion_Posted...',
    		success : function(data){
    			setTimeout(function(){
    	    		location.reload();
    	    	}, 800);
    		}
    	});
    }
    
    function addToDiscussionBoard(){
        var ajax = new XMLHttpRequest();
        ajax.open("POST", "uploadingContent.generalPost.discuss.php");
        var discuss = new FormData();
        discuss.append('title', title);
        discuss.append('description', description);
        discuss.append('tag1', removeLeadingSpace(tag1));
        discuss.append('tag2', removeLeadingSpace(tag2));
        discuss.append('tag3', removeLeadingSpace(tag3));

        ajax.send(discuss);
    }
});
