<?php require('includes/header.php'); ?>

	<script type="text/javascript">
	$(document).ready(function()
	{
		$('.person').hover(function()
		{
			 $(this).animate({
				width: '+=10',
				left: '-=5',
				top: '-=5',
				height: '+=10'
				}, 200, function() {
				// Animation complete.
			});	
			
			 $(this).children().animate({
				width: '+=5',
				left: '+=5',
				top: '-=0',
				height: '+=5'
				}, 200, function() {
				// Animation complete.
			});	
			
		},function()
		{
			 $(this).animate({
				width: '-=10',
				left: '+=5',
				top: '+=5',
				height: '-=10'
				}, 400, function() {
				// Animation complete.
			});
			
			 $(this).children().animate({
				width: '-=5',
				left: '-=5',
				top: '+=0',
				height: '-=5'
				}, 400, function() {
				// Animation complete.
			});
			
		}); 
	});
</script>

<style type="text/css">
.person
{
	position: relative; 
	border: solid 1px red; 
	border-radius: 150px; 
	background-color: #ff4; 
	width: 180px; 
	height: 180px; 
	margin-left: 20px;
	float: left;
}

.person img
{
	width: 90px; 
	border-radius: 100px; 
	position: relative; 
	left: 46px; 
	top: 10px;
}

.person div
{
	width: 180px;
	text-align: center;
	font-size: 28px;
	color: black;
	margin-top: 20px;
}
</style>

	<div class="span8 offset2" style="margin-top: 50px; text-align: center;">
		<img src="img/congrats.png" style="height: 90px;" />
		<p>&nbsp;</p>
		<p style="font-size: 28pt;">You have:</p>
		<p style="font-size: 170pt; line-height: 200px; font-weight: bold; color: #ff0;">6</p>
		<p style="font-size: 28pt;">friends with benefits!</p>
	</div>
	
	</div>
	
	<div style="width: 100%; margin-top: 50px;">
	
	<table style="margin: auto;">
		<tr>
			<td>
	
		<a href="#">
			<div class="person">
				<img src="img/paul.jpg" />
				<div>Paul<br /><span style="font-size: 12px;">$12.00 - $24.50</span></div>
			</div>
		</a>
		
		<a href="#">
			<div class="person">
				<img src="img/paul.jpg" />
				<div>Paul<br /><span style="font-size: 12px;">$12.00 - $24.50</span></div>
			</div>
		</a>

		<a href="#">
			<div class="person">
				<img src="img/paul.jpg" />
				<div>Paul<br /><span style="font-size: 12px;">$12.00 - $24.50</span></div>
			</div>
		</a>

		<a href="#">
			<div class="person">
				<img src="img/paul.jpg" />
				<div>Paul<br /><span style="font-size: 12px;">$12.00 - $24.50</span></div>
			</div>
		</a>
		
		<a href="#">
			<div class="person">
				<img src="img/paul.jpg" />
				<div>Paul<br /><span style="font-size: 12px;">$12.00 - $24.50</span></div>
			</div>
		</a>

		<a href="#">
			<div class="person">
				<img src="img/paul.jpg" />
				<div>Paul<br /><span style="font-size: 12px;">$12.00 - $24.50</span></div>
			</div>
		</a>
	</td>
	</tr>
	</table>
		
	</div>
	
	</div>	
	
<?php require('includes/footer.php'); ?>