bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
bkLib.onDomLoaded(function() {
    new nicEditor({maxHeight : 200}).panelInstance('textArea');
});

var rplyClick=false;
function showEditor(clicked, divId){
	if(clicked) $(divId).css('display', 'block');
	else $(divId).css('display', 'none');
}

var flagClick=false;
function addFlag(clicked, divId){

}

function processReply(identifier){
	//alert(identifier);
	// var elements=document.getElementsByClassName(identifier);
	// document.write(elements[0].innerText);
	document.write(document.getElementById('textArea').textContent);
}