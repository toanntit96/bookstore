<html>
	<head>
		<title>Upload and Play Videos</title>
		<link rel="stylesheet" href="style.css"/>
	<link href="http://vjs.zencdn.net/4.11/video-js.css" rel="stylesheet">
<script src="http://vjs.zencdn.net/4.11/video.js"></script>
	</head>
<body>

	<?php
		include("ketnoi.php");
	?>
	<div id="box">
		<?php
			$video=$_GET['video'];
		?>
		
        <video id="MY_VIDEO_1" class="video-js vjs-default-skin" controls preload="auto" width="600" height="450" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
	<source src="videos/<?php echo $video; ?>" type='video/mp4'>
	
	
</video>
	</div>
</body>
</html>