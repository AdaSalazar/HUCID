<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	 "http://www.w3.org/TR/html4/loose.dtd">
	<html>
		<head>
			<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
			<meta http-equiv="Default-Style" content="Main">
			<title>HTML Creator</title>
		<link rel="stylesheet" type="text/css" title="Main" 
		href="css/htmlCreator.css">
		</head>
		<body>
			<div id="wrapper">	
			<a name="goTop"><h1>Please fill the form to get the HTML file:</h1></a>
			
			<form action="htmlcreator.php#get" method="POST">
					<fieldset class="form">
						<!--This is for the Title of the page -->
						<label>Name of the HTML file</label>
						<input class="typing" type="text" size="50" name="fileName" value="">
						
						<!--This is for the Title of the page -->
						<label>Title of the page <br />
						(name apearing on the top in the browser)</label>
						<input class="typing" type="text" size="50" name="pageTitle" value="">
						<br><br>
						<!--This is for the first header -->
						<label>Main Header(H1):</label>
						<input class="typing" type="text" size="50" name="h1" value="">
						<br>
						
						<!--This is for the first header -->
						<p><label>Header (H2):</label>
						<input class="typing" type="text" size="50" name="h2p1" value="">
						<!--This is for the second header-->
						<label>Sub Header (H3):</label>
						<input class="typing" type="text" size="50" name="h3p1" value="">
						<!--This is for the first paragraph-->
						<label>Paragraph One: </label>
						<textarea class="typing" rows="5" cols="40" name="p1"></textarea></p> 
						
						
						<!--This is for the first header -->
						<p><label>Header (H2):</label>
						<input class="typing" type="text" size="50" name="h2p2" value="">
						<!--This is for the second header-->
						<label>Sub Header (H3):</label>
						<input class="typing" type="text" size="50" name="h3p2" value="">
						<!--This is for the second paragraph-->
						<label>Paragraph two: </label>
						<textarea class="typing" rows="5" cols="40" name="p2"></textarea></p>

						
						<!--This is for the first header -->
						<p><label>Header (H2):</label>
						<input class="typing" type="text" size="50" name="h2p3" value="">
						<!--This is for the second header-->
						<label>Sub Header (H3):</label>
						<input class="typing" type="text" size="50" name="h3p3" value="">
						<!--This is for the third paragraph-->
						<label>Paragraph three:  </label>
						<textarea class="typing" rows="5" cols="40" name="p3"></textarea></p>
						

						<!--This is for the first header -->
						<p><label> Header (H2):</label>
						<input class="typing" type="text" size="50" name="h2p4" value="">
						<!--This is for the second header-->
						<label>Sub Header (H3):</label>
						<input class="typing" type="text" size="50" name="h3p4" value="">
						<!--This is for the fourth paragraph-->
						<label>Paragraph four: </label>
						<textarea class="typing" rows="5" cols="40" name="p4"></textarea> </p>
						
					</fieldset>		
					
					<fieldset>					
						<input class="btn" type="submit" name="getCode" value="Get HTML Code">
					</fieldset>
			</form>
				 <a name="get"></a>
		<?php
				//This is going to deal with the submision 
				if(isset($_POST['getCode'])){
					if(isset($_POST['fileName'])&&$_POST['fileName']<>''){
						$fileName = $_POST['fileName'];
						$pageTitle = $_POST['pageTitle'];
						$h1 = $_POST['h1'];
						$h2p1 = $_POST['h2p1'];
						$h3p1 = $_POST['h3p1'];
						$h2p2 = $_POST['h2p2'];
						$h3p2 = $_POST['h3p2'];
						$h2p3 = $_POST['h2p3'];
						$h3p3 = $_POST['h3p3'];
						$h2p4 = $_POST['h2p4'];
						$h3p4 = $_POST['h3p4'];
						$p1 = $_POST['p1'];
						$p2 = $_POST['p2'];
						$p3 = $_POST['p3'];
						$p4 = $_POST['p4'];
						
						
				$html = '
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	 "http://www.w3.org/TR/html4/loose.dtd">
	<html>
		<head>
			<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
			<meta http-equiv="Default-Style" content="Main">
			<title>'.$pageTitle.'</title>
			<link rel="stylesheet" type="text/css" title="Main" href="css/main.css">
		</head>
		<body>
				<a name= "goTop">
					<h1>'.$h1.'</h1> 
				</a>
			<div id="section">
				<h2>'.$h2p1.'</h2>
				<h3>'.$h3p1.'</h3>
				<p>'.$p1.'</p>
			</div>
			<div id="section">	
				<h2>'.$h2p2.'</h2>
				<h3>'.$h3p2.'</h3>
				<p>'.$p2.'</p>
			</div>

			<div id="section">	
				<h2>'.$h2p3.'</h2>
				<h3>'.$h3p3.'</h3>
				<p>'.$p3.'</p>
			</div>

			<div id="section">
				<h2>'.$h2p4.'</h2>
				<h3>'.$h3p4.'</h3>
				<p>'.$p4.'</p>
			</div>
				<br /><br /><br />
				

			<div id="footer">	
				<p>
					<a>&copy; Ada Salazar 2012</a>
					&nbsp;|&nbsp;
					<a href="#goTop">Top of page</a>
				</p>
			</div><!--footer-->
		</body>
	</html>
	';
						//creating the html file
						$htmlFile = $fileName.'.html';
						$handler = fopen($htmlFile, 'w') or die('Cannot open file:  '.$my_file);
						//this is wrinting the html into the file
						fwrite($handler, $html);
						fclose($handler);
						
						//How it woul look like
						echo '<br /><p> Here is an example of how it would look like:</p>
							<iframe src="'.$fileName.'.html"  width="300" height="400">
							  <p>Your browser does not support iframes.</p>
							</iframe>
							';//.$html
							
						
						//This is displaying the text to be able to copy it
						echo '	<br /><br />
						<fieldset>
							<label><p>Here is the HTML code:</p></label>
							<br />
							<textarea class="typing" rows="20" cols="60" name="p4">
								'.$html.'
							</textarea>
						</fieldset>	
							';
						
		 
					}else{
						echo 'Please type a File Name';
					}
					
				}
				

				/*
						<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
						"http://www.w3.org/TR/html4/loose.dtd">
						<html>
							<head>
								<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
								<meta http-equiv="Default-Style" content="Main">
								<title>'.$pageTitle.'/title>
							</head>
							<body>
								<a name= "goTop">
									<h1>'.$h1.'</h1> 
								</a>
								<h2>'.$h2.'</h2>
								<h2>'.$h3.'</h2>
								<br />
								<p>'.$p1.'</p>
								<br />
								<p>'.$p2.'</p>
								<br />
								<p>'.$p3.'</p>
								<br />
								<p>'.$p4.'</p>
								<br /><br /><br />
								
				
							<div id="footer">	
								<p>
								<a>&copy; Ada Salazar 2012</a>
								&nbsp;|&nbsp;
								<a href="#goTop">Top of page</a></p>
							</div><!--footer-->
							</body>
						</html>*/
			
						
	?>	
			</div><!--wrapper-->
			<div id="footer">	
				<p>
					<a>&copy; Ada Salazar 2012</a>
					&nbsp;|&nbsp;
					<a href="#goTop">Top of page</a>
				</p>
			</div><!--footer-->
		</body>
	</html>
	