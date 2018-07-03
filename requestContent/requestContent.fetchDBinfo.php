<?php
	function fetchAllRequests(){
		$conn=db_connect();
		$sql="SELECT * FROM requests ORDER BY time DESC";
		return $conn->query($sql);
	}
	function fetchRequestInfo($requestID){
		$conn=db_connect();
		$sql="SELECT * FROM requests WHERE request_id=$requestID";
		$rslt=$conn->query($sql);
		if($rslt->num_rows==0) return "nothing";
		return $rslt->fetch_assoc();
	}
	function fetchComments($requestID){
		$conn=db_connect();
		$sql="SELECT * FROM comment WHERE discussion_id=$requestID and what='request' ORDER BY time DESC";
		return $conn->query($sql);
		//return $rslt->fetch_assoc();
	}
	function fetchReplies($commentID){
		$conn=db_connect();
		$sql="SELECT * FROM comment_reply WHERE comment_id=$commentID ORDER BY time DESC";
		return $conn->query($sql);
	}
	function showTime($prev){
		//date_default_timezone_set("America/New_York");
		$d1=time()+3600*4; $d2=strtotime($prev);
		//echo $prev, " ", date("Y-m-d H:i:sa", $d1)," ";
		$moments=$d1-$d2;
		if($moments/86400>5) echo date("M d, Y", $d2);
		else if(floor($moments/86400)>0) echo floor($moments/86400)," day(s) ago";
		else if(floor($moments/3600)>0) echo floor($moments/3600)," hours(s) ago";
		else if(floor($moments/60)>0) echo floor($moments/60)," min(s) ago";
		else echo $moments," second(s) ago";
	}
	function showTags($row){
		if(strlen($row['tag3'])>0) echo '<label style="float: right">'.$row['tag3'].'</label><a class="divider" style="float: right"></a>';
		if(strlen($row['tag2'])>0) echo '<label style="float: right">'.$row['tag2'].'</label><a class="divider" style="float: right"></a>';
		if(strlen($row['tag1'])>0) echo '<label style="float: right">'.$row['tag1'].'</label>';
	}
	function showCourse($row){
		
	}
?>