<?php include_once '../php/proj2.php'; 



?>
<div id='sidebarLeft'>
<nav>
<?php include_once 'sidebarLeft.php'; ?>
</nav>
</div>
<div id='itemDisplay'>
<section>
	<head>
		<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>

		<script>
			function compute_winner($localChoice)
			{
				var remote = Math.floor(Math.random()*(2-0+1)+0);
				if(remote == 0)
					$remoteChoice = 'rock';
				else if(remote == 1)
					$remoteChoice = 'paper';
				else
					$remoteChoice = 'scissors';

				if($localChoice == 'rock')
				{
					if($remoteChoice == 'rock')
						draw_images($localChoice,$remoteChoice,'draw');
					else if($remoteChoice == 'paper')
						drawImage($localChoice,$remoteChoice,'lose');
					else
						drawImage($localChoice,$remoteChoice,'win');
				}
				else if($localChoice == 'paper')
				{
					if($remoteChoice == 'rock')
						draw_images($localChoice,$remoteChoice,'win');
					else if($remoteChoice == 'paper')
						drawImage($localChoice,$remoteChoice,'draw');
					else
						drawImage($localChoice,$remoteChoice,'lose');
				}
				else
				{
					if($remoteChoice == 'rock')
						draw_images($localChoice,$remoteChoice,'lose');
					else if($remoteChoice == 'paper')
						drawImage($localChoice,$remoteChoice,'win');
					else
						drawImage($localChoice,$remoteChoice,'draw');
				}
			}

			function draw_images($localChoice, $remoteChoice, $result) {
				if($localChoice == 'rock')
					draw_image_rock('left');
				else if($localChoice == 'paper')
					draw_image_paper('left');
				else if($localChoice == 'scissors')
					draw_image_scissors('left');
				if($remoteChoice == 'rock')
					draw_image_rock('right');
				else if($remoteChoice == 'paper')
					draw_image_paper('right');
				else if($remoteChoice == 'scissors')
					draw_image_scissors('right');
				draw_image_winner($result);
			}
			// function play_again_image() {
			// 	vvar a_canvas = document.getElementById("a");
   // 				var a_context = a_canvas.getContext("2d");
   // 				var base_image = new Image();
			// 	base_image.src = "img/playAgain.png";
			// 	a_context.drawImage(base_image2, 280, 75, 150, 150 * base_image2.height / base_image2.width);
			// }
			function draw_image_rock($location) {
    			var a_canvas = document.getElementById("a");
   				var a_context = a_canvas.getContext("2d");
    			var img = document.getElementById("rock");
    			if($location == 'left')
    				a_context.drawImage(img, 100, 175, 150, 150 * img.height / img.width);
    			else
    				a_context.drawImage(img, 440, 175, 150, 150 * img.height / img.width);
			}
			function draw_image_paper($location) {
    			var a_canvas = document.getElementById("a");
   				var a_context = a_canvas.getContext("2d");
    			var img = document.getElementById("paper");
    			if($location == 'left')
    				a_context.drawImage(img, 100, 175, 150, 150 * img.height / img.width);
    			else
    				a_context.drawImage(img, 440, 175, 150, 150 * img.height / img.width);
			}
			function draw_image_scissors($location) {
    			var a_canvas = document.getElementById("a");
   				var a_context = a_canvas.getContext("2d");
    			var img = document.getElementById("scissors");
				if($location == 'left')
    				a_context.drawImage(img, 100, 175, 150, 150 * img.height / img.width);
    			else
    				a_context.drawImage(img, 440, 175, 150, 150 * img.height / img.width);
    		}
			function draw_image_winner($result){
				var a_canvas = document.getElementById("a");
   				var a_context = a_canvas.getContext("2d");
   				var base_image = new Image();
				base_image.src = "img/winner.png";
				var base_image2 = new Image();
				base_image2.src = "img/draw.png";
				if($result == 'win')
					a_context.drawImage(base_image, 10, 100, 150, 150 * base_image.height / base_image.width);
				else if($result == 'lose')
					a_context.drawImage(base_image, 350, 100, 150, 150 * base_image.height / base_image.width);
				else
					a_context.drawImage(base_image2, 280, 75, 150, 150 * base_image2.height / base_image2.width);
			}
			function setup() {
				var a_canvas = document.getElementById("a");
   				var a_context = a_canvas.getContext("2d");
   				var base_image = new Image();
				base_image.src = "img/boom.png";
				var base_image1 = new Image();
				base_image1.src = "img/boom.png";
				a_context.drawImage(base_image1, 10, 50, 350, 350 * base_image1.height / base_image1.width);
				a_context.drawImage(base_image, 350, 50, 350, 350 * base_image.height / base_image.width);
			}
			function reset() {
				var a_canvas = document.getElementById("a");
				a_canvas.width = a_canvas.width;
				setup();
			}
		</script>
	</head>
	<body onload="setup()" >
		<center>
			<h1>Play Rock, Paper, Scissors!</h1>
		</center>
		<center> 
			<canvas id="a" width="700" height="450" style="border:1px solid #d3d3d3;">Your browser doesn't support Canvas</canvas> 
		</center>
		<br/><br/>
		<center>
		<img align="middle" onclick="compute_winner('rock')" id="rock" src="img/rocks.png" alt="rock" width="277" height="210"> <!-- add the onclick="draw_images()" part to each img --> 
		<!-- onclick="draw_images('rock','scissors','win')" -->
		<img align="middle" onclick="compute_winner('rock')" id="paper" src="img/paper.png" alt="paper" width="277" height="210">

		<img align="middle" onclick="compute_winner('rock')" id="scissors" src="img/scissors.png" alt="scissors" width="277" height="210">
		</center>
		<br/>	
		<center>
			<a href="#" onclick="reset()">Play Again!</a>
		</center>	
	</body>


<?php
session_start();
?>
</section>
</div>
<div id='sidebarRight'>
<section>
<?php include_once 'sidebarRight.php'; ?>
</section>
</div>
<script src='p3.js'></script>
<script>
 //console.log("UserName: "+results['userName']+"<br/>");
 //console.log("Display Name: "+results['displayName']+"<br/>");
 //console.log("Win: "+results['win']+"<br/>");
 //console.log("Loss: "+results['loss']+"<br/>");
</script>
