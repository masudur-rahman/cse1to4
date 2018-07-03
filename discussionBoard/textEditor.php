<head>
	<script type="text/javascript" src="../cse1to4/js/jquery-3.1.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#comment").keyup(function(){
				var comment = $(this).val();
				$("#comment").html(comment);
			});
		});
	</script>
</head>
<button>B</button><br>
<label>Enter Comment: </label>
<input type="text" id="comment" name="comment">
<hr>
<label>Preview:</label>
<div style="width: 50%">
    <span id="comment"></span>
</div>
<br>
<hr>