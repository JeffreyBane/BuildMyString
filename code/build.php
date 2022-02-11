<?php



/*
BuildMyString - http://www.buildmystring.com
Copyright (c) 2012-2019
by Jeffrey Bane
http://www.jeffreybane.com
*/

		// Grab form data
		
		$targetObject = htmlentities($_POST["to"]);
		$variableName = htmlentities($_POST["nm"]);
		$varLineOption = htmlentities($_POST["opts"]);
		$varMSLineOption = htmlentities($_POST["MSopts"]);
		$varTabOption = htmlentities($_POST["tabs"]);
		$varTrailingSpaces = htmlentities($_POST["trail"]);
		$targetLanguage = htmlentities($_POST["tl"]);
		$varcusBeg = htmlentities($_POST["cusBeg"]);
		$varcusEnd = htmlentities($_POST["cusEnd"]);
		$targetType = htmlentities($_POST["targ"]);
		$targetSQL = htmlentities($_POST["tsql"]);
		
		
		$preserveBlankLines = "off";
		$indent = "off";
		$single = "off";
		$strip = "off";
		
		
		if (isset($_POST["chkPreserve"]))
		{
		$preserveBlankLines = htmlentities($_POST["chkPreserve"]);
		}
		
		if (isset($_POST["chkIndent"]))
		{
		$indent = htmlentities($_POST["chkIndent"]);
		}
		
		if (isset($_POST["chkSingle"]))
		{
		$single = htmlentities($_POST["chkSingle"]);
		}
		
		if (isset($_POST["chkStrip"]))
		{
		$strip = htmlentities($_POST["chkStrip"]);
		}
		
		
		$targetObject = htmlentities($_POST["to"]);
		$variableName = htmlentities($_POST["nm"]);
		
		// End get form data
		
		
		// Save values into cookie
		
	if(isset($_COOKIE["BMSCookie062017"])) {
		
		
		setcookie("BMSCookie062017[to]", $targetObject, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[tl]", $targetLanguage, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[trail]", $varTrailingSpaces, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[opts]", $varLineOption, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[tabs]", $varTabOption, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[MSopts]", $varMSLineOption, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[chkPreserve]", $preserveBlankLines, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[nm]", $variableName, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[cusBeg]", $varcusBeg, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[cusEnd]", $varcusEnd, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[chkIndent]", $indent, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[chkSingle]", $single, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[chkStrip]", $strip, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[targ]", $targetType, time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[tsql]", $targetSQL, time() + (10 * 365 * 24 * 60 * 60), "/"); 
	   
	   
		
	}
		
	

		// I may need to know if the user selected a dev language or sql for some reason, but for now just set the target language to the sql type
		
		if ($targetType == "SQ")
		{
			$targetLanguage = $targetSQL;
			// force concatenated string object if a type of SQL is selected, we don't want a SQL Stringbuilder or the like.
			$targetObject = "SC";
		}	
		
?>
		
		







<html>

<head>


<title>Automatic String Concatenation Code Generator / Automatic Stringbuilder Code Generator - Results</title>
<meta name="language" content="en"/>
<meta name="robots" content="all"/>
<meta name="rating" content="general"/>
	<meta name="title" content="Automatic String Escaper Concatenation Code Generator / Automatic Stringbuilder Code and concatenation Generator"/>
	<meta name="description" content="Online string escaper and concatenation tool for C#, Java, VB, and C++ with many options"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
<link rel="icon" type="image/png" href="/Images/BuildMyString.png">	
     <link rel="stylesheet" href="styles.css" type="text/css">
	 <script src="jq.js" type="text/javascript"></script>
	 <script>
	 $(document).ready(function() {
	 $('#outputTA').focus();
	 });
	 </script>
	 



</head>

<body>

<table width="100%">
	<tr>
		<td>Copy the contents of the text area to your clipboard (Control-A then Control-C).
		
		</td>
	</tr>
	<tr>
		<td>
		<input type="button" value = "Build another" onclick="top.location.href='default.php'";>
		</td>
	</tr>
		
	<tr>
		<td colspan = "2">

		<textarea class="outputBox" name="outputTA" id="outputTA"><?php 
		

		// There will be several iterations over the input text to escape: $prePreLines ==> $prelines ==> $lines
		
		
		$prePreLines = $_POST["inputText"];
		
		// Strip carriage returns
		if ($strip == "on")
		{	
		$prePreLines =  preg_replace("#\r\n#", " ", $prePreLines);				
		}


		// create an array of lines by splitting on carriage returns		
		$prelines = preg_split("#\r\n#", substr($prePreLines, 0, 128000));
				

		// preserve or remove blank lines, end result will be $lines array which is what all the escaping logic will be applied to.
		$lines = array();
		if ($preserveBlankLines == "off")
		{
					
			foreach($prelines as $checkLine) 
			{
			if ($checkLine != "")
				{
				$lines[] = $checkLine;
				}
			}
		}	
		else
		{
			
			$lines = $prelines;
		}
		
		$mySQLlines = count($lines);




// Handle "smart quotes" and escape backslashes if necessary.
// There's some redundancy here, but I like having seperate blocks of replace logic for dev languages vs. SQL for future items.
		
		
// Dev languages
		if ($targetType == "LG")
		{

			if ($targetLanguage == "VB")
			{
			// handle smart quotes
				$search = array(chr(145), 
								chr(146), 
								chr(147), 
								chr(148), 
								chr(151));
								
			 
				$replace = array("'", 
								 "'", 
								 '"', 
								 '"', 
								 '-');
			}
			else
			{
			// handle smart quotes and escape backslashes
				$search = array(chr(145), 
								chr(146), 
								chr(147), 
								chr(148), 
								chr(151),
								chr(92)); 
			 
				$replace = array("'", 
								 "'", 
								 '"', 
								 '"', 
								 '-',
								 '\\\\'); 
			}		 		
		}
		
// SQL
		
		if(($targetType =="SQ") && (($targetLanguage == "SQT") || ($targetLanguage == "SQP"))) // MS or Oracle
			{
				// handle smart quotes
				$search = array(chr(145), 
				chr(146), 
				chr(147), 
				chr(148), 
				chr(151));
				

			$replace = array("'", 
				 "'", 
				 '"', 
				 '"', 
				 '-');
			}
			
		if(($targetType =="SQ") && ($targetLanguage == "SQM")) // mySQL
			{
				// handle smart quotes and escape backslashes
				$search = array(chr(145), 
								chr(146), 
								chr(147), 
								chr(148), 
								chr(151),
								chr(92)); 
			 
				$replace = array("'", 
								 "'", 
								 '"', 
								 '"', 
								 '-',
								 '\\\\'); 
			}

// Now do the replace
$lines =  str_replace($search, $replace, $lines); 
			

// Set up appropriate line prefix, suffix and terminator based on object type

		$varLineSuffix = "";
		$varLinePrefix = "";
		$varLineTerm = "";

		switch ($varLineOption)
		{
		case "NO":
			$varLineSuffix = "";
		  break;
		case "BR":
			$varLineSuffix = htmlentities("<br>");
		  break;
		case "RN":
			$varLineSuffix = htmlentities('\r\n');			
		  break;
		case "SP":
			$varLineSuffix = " ";
		  break;
		case "CU":
			$varLineSuffix = $varcusEnd;
		  break;
		case "CB":
			$varLinePrefix = $varcusBeg;
		  break;
		  
		  
		default:
		  echo "NO LINE OPTION SELECTED";
		  }
		  
		 // If VB and \r\n selected, clear out the line suffix
		 
		 if (($targetLanguage == "VB") && ($varLineOption == "RN"))
		 {
		 $varLineSuffix = "";
		 }
		 
		 
		 // Set up tab replace variable
		 
		$varTabReplace = "";
		switch ($varTabOption)
		{
		case "NO": // Do nothing
			$varTabReplace = "Wont Be Used";
		  break;
		case "ST": // Strip out
			$varTabReplace = "";
		  break;
		case "ES": // Escape
			if ($targetLanguage == "VB")
			{
			$varTabReplace = '" + vbTab + "';	
			}
			else
			{
			$varTabReplace = htmlentities('\t');	
			}
					
		  break;
		case "SP": // Space
			$varTabReplace = " ";
		  break;
		default:
		  echo "NO TAB OPTION SELECTED";
		  }
		 
		  
// The guts of building the output is two blocks, one for a StringBuilder objects here and the other for concatenated strings which follows.
		
		if ($targetObject == "SB") // String builder
		
			{
				
			
			
			// If the single statement option is used with a Stringbuilder, I need the first and last lines for later in the block
				
	        $firstLineNumber = array_shift(array_keys($lines));
			$lastLineNumber = array_pop(array_keys($lines));
				
			
			if ($indent == "on")
			{
				echo "\t";
				
			}
				
				
            // Site attribution and silly comment based on language
			if ($targetLanguage == "VB")
			{
			echo " ' BuildMyString.com generated code. Please enjoy your string responsibly." . PHP_EOL;
			}
			else
			{
			echo " // BuildMyString.com generated code. Please enjoy your string responsibly." . PHP_EOL;
			}



			echo PHP_EOL;


			$varDim = "";

			// Set various things based on language, dim statement, line terminators, etc.
			
			switch ($targetLanguage)
			{
			case "VB":
				$varDim = "Dim " . $variableName . " As New StringBuilder()";
				$varEscapeReplace = "\"\"";
				$varBeginLine = $variableName . (($varMSLineOption == "AL") ? ".AppendLine" : ".Append");
				$varLineTerm = "";
			  break;
			case "JV":
				$varDim = "StringBuilder " . $variableName . " = new StringBuilder();";
				$varEscapeReplace = "\\\"";
				$varBeginLine = $variableName . ".append";
				$varLineTerm = ";";
			  break;
			case "CS":
				$varDim = "StringBuilder " . $variableName . " = new StringBuilder();";
				$varEscapeReplace = "\\\"";
				$varBeginLine = $variableName . (($varMSLineOption == "AL") ? ".AppendLine" : ".Append");
				$varLineTerm = ";";
			  break;
			case "CP":
				$varDim = "Text::StringBuilder^ " . $variableName . " = gcnew Text::StringBuilder;";
				$varEscapeReplace = "\\\"";
				$varBeginLine = $variableName . (($varMSLineOption == "AL") ? "->AppendLine" : "->Append");
				//$varBeginLine = $variableName . "->Append";
				$varLineTerm = ";";
			  break;
			default:
			  echo "NO TARGET LANGUAGE SELECTED";
			}

			// Insert a tab in front of the dim statement if appropriate.
			if ($indent == "on")
			{
				$varDim = "\t" . $varDim;
				
			}


			echo $varDim . PHP_EOL;
			echo PHP_EOL;
			
			// Main loop for Stringbuilder block
		    foreach($lines as $key => $line) 
					{
				
						// Swap out double quotes first
						$lineNew1 = preg_replace("/\"/", $varEscapeReplace, $line);
										
						// Strip trailing spaces if indicated
						if ($varTrailingSpaces == "RE")
						{
						$lineNew1 = rtrim($lineNew1);
						}
						
						// Now handle tabs
						if ($varTabOption == "NO")
						{
						// Ignore, don't do anything just copy above string
						$lineNew2 = $lineNew1;
						}
						else
						// Do tab swap. This comes after double quote swap because vbTAB needs double quotes and it was doubling them up.
						{
					    $lineNew2 = preg_replace('/\t+/', $varTabReplace, $lineNew1);
						}

						// html encode the string	
						$lineNew2 = htmlspecialchars($lineNew2, ENT_QUOTES, "UTF-8");
						
						
						if ($indent == "on")
						{
							echo "\t";
							
						}


						// Handle single statement object for Stringbuilder
						
						if ((($single == "on") && ($lastLineNumber > 0)) && (($targetLanguage=="JV") || ($targetLanguage=="CS")))
						
						{
							
							if ($key == $firstLineNumber)
							{
							// For single object, the line terminator is only on the last line
							echo /* "FIRST " .*/ $varBeginLine . "(\"" . $varLinePrefix . $lineNew2 . $varLineSuffix . "\")" /*. $varLineTerm */ . PHP_EOL; 	
								
							}
							elseif ($key == $lastLineNumber)
														
							{
							// For single object, the object name is only on the first line
							echo /*"LAST " .*/ str_replace($variableName, "", $varBeginLine) . "(\"" . $varLinePrefix . $lineNew2 . $varLineSuffix . "\")" . $varLineTerm . PHP_EOL;	
								
							}
							else
							{
							// For single object, the object name is only on the first line
							// For single object, the line terminator is only on the last line
							echo  str_replace($variableName, "", $varBeginLine) . "(\"" . $varLinePrefix . $lineNew2 . $varLineSuffix . "\")" /*. $varLineTerm*/ . PHP_EOL;
							}
							
							
						}
						
						else
							
						{
						// No single statement option
						echo $varBeginLine . "(\"" . $varLinePrefix . $lineNew2 . $varLineSuffix . "\")" . $varLineTerm . PHP_EOL;
						}
											
					
			}
			
		}
		
		// Second block, concatenated string 
		if (($targetObject == "SC") || ($targetObject == "NO")) 
		
			{
				
						if ($indent == "on")
						{
							echo "\t";
							
						}

						
					   // Site attribution and silly comment based on language and / or SQL
						if ($targetType == "LG")
							{			
						
								if ($targetLanguage == "VB")
								{
								echo " ' BuildMyString.com generated code. Please enjoy your string responsibly." . PHP_EOL;
								}
								else
								{
								echo " // BuildMyString.com generated code. Please enjoy your string responsibly." . PHP_EOL;
								}
			
							}
							
						if(($targetType =="SQ")) 
							{
								echo " -- BuildMyString.com generated SQL. Please enjoy your string responsibly." . PHP_EOL;
							}
							
						



			echo PHP_EOL;


			$varDim = "";
			$firstLine = 1;


			// Set various things based on language, dim statement, line terminators, etc. Also handle SQL items.

			switch ($targetLanguage)
			{
			case "VB":
			// V1.1
				$varDim = "Dim " . $variableName . " As String" . PHP_EOL . (($indent == "on") ? "\t" : "") . $variableName . " = ";
				$varEscapeReplace = "\"\"";
				$varBeginLine = "";
				//$varLineTerm = " &";
				$varLineTerm = (($varMSLineOption == "VBlf") ? " & vbCrLf &" : " &");
			  break;
			case "JV":
				$varDim = "String " . $variableName . " = ";
				$varEscapeReplace = "\\\"";
				$varBeginLine = "";
				$varLineTerm = " +";
			  break;
			case "CS":
				$varDim = "string " . $variableName . " = ";
				$varEscapeReplace = "\\\"";
				$varBeginLine = "";
				$varLineTerm = " +";
			  break;
			case "CP":
				$varDim = "std::string " . $variableName . " = ";
				$varEscapeReplace = "\\\"";
				$varBeginLine = "";
				$varLineTerm = "";
			  break;
			  case "SQT":
			  	$varDim = "DECLARE @" . $variableName . " VARCHAR(MAX);\r\n". (($indent == "on") ? "\t" : "") . "SELECT @" . $variableName . " = ";
				$varEscapeReplace = "''";
				$varBeginLine = "";
				$varLineTerm = " + ";
			  break;
			  case "SQP":
			  	$varDim = "DECLARE\r\n" . (($indent == "on") ? "\t" : "") . $variableName . " varchar2(1000);\r\n" . (($indent == "on") ? "\t" : "") . "begin\r\n" . (($indent == "on") ? "\t" : "") . $variableName . " := ";
				$varEscapeReplace = "''";
				$varBeginLine = "";
				$varLineTerm = " || ";
			  break;
			  case "SQM":			  
			    $varDim = "SET @" . $variableName . " = " .(($mySQLlines > 1) ? "CONCAT(" : "");
				$varEscapeReplace = "''";
				$varBeginLine = "";
				$varLineTerm = ",";
				

			  break;
			  
			  
			default:
			  echo "NO TARGET LANGUAGE SELECTED";
			}


	
			if ($indent == "on")
			{
				$varDim = "\t" . $varDim;
				
			}
	
			
		// Target object "none" = no Dim, only output for concatenated string.
		if ($targetObject == "SC") 
		{

			echo $varDim; 

		}

			// Main loop for concatenated string
			
			foreach($lines as $key => $line)
			{
				
				
			$lastLine = "No";
			end($lines);
			if ($key === key($lines)) {
				$lastLine = "Yes";
			}

		
					
					// Begin swap out quotes 
					if ($targetType == "LG")
					{
						// Swap out double quotes first
						$lineNew1 = preg_replace("/\"/", $varEscapeReplace, $line);
					}
					
					if(($targetType =="SQ")) //&& (($targetLanguage == "SQT") || ($targetLanguage == "SQP") || ($targetLanguage == "SQM"))) 
						// All 3 sqls escape singles with a double single, good here but save above syntax.
					{
						
						// Swap out single quotes first
						$lineNew1 = preg_replace("/'/", $varEscapeReplace, $line);
						
						
					}
							
						// Strip trailing spaces if indicated
						
						if ($varTrailingSpaces == "RE")
						{
						$lineNew1 = rtrim($lineNew1);
						}
						
						// Now handle tabs
						if ($varTabOption == "NO")
						{
						// Ignore, don't do anything just copy above string
						$lineNew2 = $lineNew1;
						}
						else
						// Do tab swap. This comes after double quote swap because vbTAB needs double quotes and it was doubling them up.
						{
					    $lineNew2 = preg_replace('/\t+/', $varTabReplace, $lineNew1);
						}
						// html encode the string
						
						$lineNew2 = htmlspecialchars($lineNew2, ENT_QUOTES, "UTF-8");
						
					
						if ($indent == "on")
						{
							
							if ($firstLine == 0)
							{
								echo "\t";
							}
					
								
							
							elseif (($firstLine == 1) && ($targetObject == "SC"))
							{
								echo "";
								$firstLine = 0;
								
							}
							else
							{
								echo "\t";
								$firstLine = 0;
								
							}
							

							
								
							
						}
	
						
						// Output each line based on type
						if ($targetType == "LG")
							{
								echo $varBeginLine . "\"" . $varLinePrefix . $lineNew2 . $varLineSuffix . "\"" . (($lastLine == "Yes") ? "" : $varLineTerm) . ((($lastLine == "Yes") && ($targetLanguage != "VB")) ? ";" : ""). PHP_EOL;

							}
						if(($targetType =="SQ") && (($targetLanguage == "SQT")))
							{
								echo $varBeginLine . "'" . $varLinePrefix . $lineNew2 . $varLineSuffix . "'" . (($lastLine == "Yes") ? "" : $varLineTerm) . ((($lastLine == "Yes") && ($targetLanguage != "VB")) ? ";" : ""). PHP_EOL;

						
							}
							
						if(($targetType =="SQ") && (($targetLanguage == "SQP")))
							{
								echo $varBeginLine . "'" . $varLinePrefix . $lineNew2 . $varLineSuffix . "'" . (($lastLine == "Yes") ? ";\r\n" . (($indent == "on") ? "\t" : "") . "end;" : $varLineTerm) . PHP_EOL;

						
							}
							
							
						if(($targetType =="SQ") && (($targetLanguage == "SQM")))
							{

							echo $varBeginLine . "'" . $varLinePrefix . $lineNew2 . $varLineSuffix . "'" . ((($lastLine == "Yes") && ($mySQLlines > 1)) ? ")" : "" ) . (($lastLine == "Yes") ? ";" : $varLineTerm) . PHP_EOL;

						
							}
						
					
			}
		}
		?></textarea>		
		</td>
	</tr>
</table>
</body>
</html>