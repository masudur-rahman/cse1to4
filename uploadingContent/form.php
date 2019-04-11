<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>File Upload in PHP</title>
		<!--[if IE]>
			<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/default.css" rel="stylesheet" type="text/css" />
		<link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="jquery.js"></script>
	</head>
	<body>
		<div class="la-anim-10"></div><!-- .corner-preloader -->
		<div id="wrapper">
			<div id="upload-widget">
				<h1>
					<i class="fa fa-cloud-upload"></i> File Uploader
				</h1>

				<form id="file-upload-form">
					<div class="file-input-wrap">
						Browse Files
						<input type="file" name="file" id="file" multiple>
					</div><!-- .file-input-wrap -->
				</form><!-- #file-upload-form -->
			</div><!-- #upload-widget -->

			<div id="upload-result">
			</div><!-- #upload-result -->
		</div><!-- #wrapper -->

		<div id="preloader">
			<img src="img/preloader.gif" alt="files uploading..." />
		</div>
		
		<!-- SCRIPTS -->
		<script type="text/javascript" src="../js/jquery-latest.min.js"></script>
		<script type="text/javascript" src="jquery.js"></script>
	</body>
</html>