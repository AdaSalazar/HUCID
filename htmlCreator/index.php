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
			
			<form action="index.php#getForm" method="GET">
					<fieldset class="form">
						<!--This is for the first header -->
						<label>How many paragraphs do you want?</label>
						<input class="typing" type="text" size="50" name="numOfChapters" value="">
					</fieldset>		
					
					<fieldset>					
						<input class="btn" type="submit" name="getP" value="Get Form">
					</fieldset>
			</form>
				 
		<?php
			
			if(isset($_GET['getP']) && $_GET['numOfChapters']>0){
				$numOfChapters = $_GET['numOfChapters'];
					//creating the form
					echo '
						<form action="index.php?numOfChapters='.$numOfChapters.'&getP=Get+Form#getCode" method="POST">
							<fieldset class="form">
								<!--This is for the Title of the page and name of the file -->
								<label><a name="getForm">HTML File Name</a></label>
								<input class="typing" type="text" size="50" name="htmlName" value="">
								<br><br>
					';
					//creating the paragraphs Form
					for ($i=1; $i<=$_GET['numOfChapters']; $i++){
						echo '
						<p>
							<!--This is for the first header -->
							<label>Main Header(H1):</label>
							<input class="typing" type="text" size="50" name="h1p'.$i.'" value="">
							<br>
							
							<!--This is for the first header -->
							<label>Header (H2):</label>
							<input class="typing" type="text" size="50" name="h2p'.$i.'" value="">
							<!--This is for the second header-->
							<label>Sub Header (H3):</label>
							<input class="typing" type="text" size="50" name="h3p'.$i.'" value="">
							<!--This is for the first paragraph-->
							<label>Paragraph Number '.$i.': </label>
							<textarea class="typing" rows="5" cols="40" name="p'.$i.'"></textarea>
						</p> ';
					}
					
					echo '
							</fieldset>		
								
							<fieldset>					
								<input class="btn" type="submit" name="getCode" value="Get HTML Code">
							</fieldset>
						</form>
					';

			} else if(isset($_GET['getP'])){
				echo '<p class="notice">Please enter a positive value for the Number of Paragraphs ';
			}


				//This is going to deal with the submision 
				if(isset($_POST['getCode'])){
					if(isset($_POST['htmlName']) && $_POST['htmlName']<>''){					
						
						$htmlName = $_POST['htmlName'];
						//Changing the htmlName to lowercase, removing spaces at the end of the string and replacing spaces for _
						$bookName = str_replace(" ", "_", trim(strtolower($htmlName)));
$header = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
		<meta http-equiv="Default-Style" content="Main">
		<title>'.$htmlName.'</title>
		<link rel="stylesheet" type="text/css" title="Main" 
		href="css/main.css">
	</head>';
$body = '
	<body>
		<a name= "goTop"><h1>'.$htmlName.'</h1> </a>
		<h2>Table Of Contents</h2>
		<table>
			<tr>
				<td>	
				<!--In here it goes the number of the chapter "chapter#" This is for the Index links later!-->';
				
	for ($i=1; $i<=$numOfChapters; $i++){
		$h1Name='h1p'.$i;
		$body= $body.'
				<a name= "'.$i.'"><a href= "'.$bookName.'.html#chapter'.$i.'">'.$_POST[$h1Name].'</a></a><br>';
	}
				
	$body = 
		$body.'	</td>
			</tr>
		</table>';
	
	for ($i=1; $i<=$numOfChapters; $i++){
	$h1Name='h1p'.$i;
	$h2Name='h2p'.$i;
	$h3Name='h3p'.$i;
	$pName='p'.$i;

		$body= $body.'	
		<h1><a name= "chapter'.$i.'">'.$_POST[$h1Name].'</h1></a>
		<h2>'.$_POST[$h2Name].'</h2>
		<h3>'.$_POST[$h3Name].'</h3>
							<!--Link for the index-->
							<p align="right"><a href="#goTop">Index</a></p>
		<div id="section">	
			<p>'.$_POST[$pName].'</p><br />
				<!--Link for the index "chapter#" # is the chapter number-->
				<p align="right"><a href="#'.$i.'">Index</a></p>
		</div>
		
		';
	}				
		$footer = '
				<br /><br /><br />
				

		<div id="footer">	
			<p>
				<a>&copy; Ada Salazar 2012</a>
				&nbsp;|&nbsp;
				<a href="#goTop">Top of page</a>
			</p>
		</div><!--footer-->
	</body>
</html>';
						
					} else {
						echo '<p class="notice">Please type a File Name</p>';
					}
				
						//creating the html file
						$htmlFile = $bookName.'.html';
						$handler = fopen($htmlFile, 'w') or die('Cannot open file:  '.$htmlFile);
						$html= $header.$body.$footer;
						//this is wrinting the html into the file
						fwrite($handler, $html);
						fclose($handler);
						
						//How it woul look like
						echo '<br /><p><a name="getCode">Here is an example of how it would look like:</a></p>
							<iframe src="'.$bookName.'.html"  width="350" height="400">
								<p>Your browser does not support iframes.
							</iframe><br />
							<a href="index.php">Create another HTML File</a></p>
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
						<br /><br /><br />
						<a href="index.php">Create another HTML File</a>';
				}						
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
	