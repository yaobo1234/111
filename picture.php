<?
	require_once "jssdk.php";
	$sdk = new JSSDK("wx1f4e023379b48bcc","2b12899a5e6a7289235b56d5ffa3a151");
	$config = $sdk -> getSignPackage();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="initial-scale=1">
</head>
<body>
	<button id="pic">pic</button>
</body>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	wx.config({
		debug : true,
		appId : '<?php echo $config["appId"]; ?>',
		timestamp : '<?php echo $config["timestamp"]; ?>',
		nonceStr : '<?php echo $config["nonceStr"]; ?>',
		signature : '<?php echo $config["signature"] ;?>',
		jsApiList : ["chooseImage"]
	});

	wx.ready(function(){
		document.querySelector("#pic").onclick = function(){
			wx.chooseImage({
				success : function(e){
					var path = e.loaclIds[0];
					var img = new Image;
					img.src = path;
					document.body.appendChild(img)
				}
			});
		}
	})

</script>
</html>