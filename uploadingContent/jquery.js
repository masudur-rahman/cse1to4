$(function() {
	// grab the file input and bind a change event onto it
    $('#file').bind("change", function() {
		// new html5 formdata object.
        var formData = new FormData();
        formData.append("tag1", "machine learning");
        //for each entry, add to formdata to later access via $_FILES["file" + i]
        for (var i = 0, len = document.getElementById('file').files.length; i < len; i++) {
            formData.append("file" + i, document.getElementById('file').files[i]);
        }

        //send formdata to server-side
        $.ajax({
            url: "file-upload.php", // our php file
            type: 'post',
            data: formData,
            dataType: 'html', // we return html from our php file
            async: true,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType
            success : function(data) {
                $('#upload-result').append('<div class="alert alert-success"><p>File(s) uploaded successfully!</p><br />');
                $('#upload-result .alert').append(data);
            },
            error : function(request) {
                console.log(request.responseText);
            }
        });
    });
});