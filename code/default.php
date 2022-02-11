


<?php 

/*
BuildMyString - http://www.buildmystring.com
Copyright (c) 2012-2019
by Jeffrey Bane
http://www.jeffreybane.com
*/



/* Cookie defs

	$cookie_to : TARGET OBJECT ("SC" = Concatenated String, "SB" = StringBuilder, "NO" = None)
	$cookie_tl : TARGET LANGUAGE ("JV" = Java, "CS" = C#, "VB" = VB.NET, "CP" = C++, "SQT" = T-SQL, "SQP" = PL/SQL, "SQM" = MySQL)
	$cookie_trail : TRAILING SPACES ("IG" = Ignore, "RE" = Remove)
	$cookie_opts = : OPTIONS ("NO" = None, "BR" = include <br>, "RN" = include \r\n, "SP" = include space, "CB" = custom begin, "CU" = custom end)
	$cookie_tabs = : TAB HANDLING ("NO" = Ignore, "ST" = Strip out, "ES" = Escape, "SP" = replace w/ space)
	$cookie_MSopts : MICROSOFT OPTIONS ("NO" = None, "AL" = use AppendLine, "VBlf" = vbCrLF)
	$cookie_chkPreserve : PRESERVE BLANK LINES ("on" = perserve, "off" = don't preserve)
	$cookie_nm : VARIABLE NAME (name of string)
	$cookie_cusBeg : BEGIN LINE TEXT (text value to prepend)
	$cookie_cusEnd : END LINE TEXT (text value to append)
	$cookie_chkIndent : INDENT OBJECT ("on" = indent, "off" = don't indent)
	$cookie_chkSingle : USE SINGLE STATEMENT ("on" = single statement, "off" = normal stringbuilder)
	$cookie_chkStrip : STRIP OUT CARRIAGE RETURNS ("on" = remove carriage returns, "off" = preserve carriage returns)
	$cookie_targ : TARGET TYPE ("SQ" = SQL, "LG" = C#, VB, etc.)
	$cookie_tsql : TARGET SQL  ("SQT" = T-SQL, "SQP" = PL/SQL, "SQM" = MySQL)

*/

// Set defaults

	$cookie_to = "SC";
	$cookie_tl = "CS";
	$cookie_trail = "IG";
	$cookie_opts = "NO";
	$cookie_tabs = "NO";
	$cookie_MSopts = "NO";
	$cookie_chkPreserve = "off";
	$cookie_nm = "sb";
	$cookie_cusBeg = "";
	$cookie_cusEnd = "";
	$cookie_chkIndent = "off";
	$cookie_chkSingle = "off";
	$cookie_chkStrip = "off";
	$cookie_targ = "LG";
	$cookie_tsql = "SQT";
    
// Set a "use cookie" cookie

    	if(!isset($_COOKIE["BMSuseCookies"])) {
          		setcookie("BMSuseCookies", "F", time() + (10 * 365 * 24 * 60 * 60), "/");   
        }
        
        if ($_COOKIE["BMSuseCookies"] == "F")
        {
// if use cookies is set to false, "delete" all cookies.
            
        setcookie("BMSCookie062017[to]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[tl]", "", time() - 3600, "/"); 
	    setcookie("BMSCookie062017[trail]", "", time() - 3600, "/"); 	
		setcookie("BMSCookie062017[opts]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[tabs]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[MSopts]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[chkPreserve]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[nm]", "", time() - 3600, "/");
		setcookie("BMSCookie062017[cusBeg]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[cusEnd]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[chkIndent]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[chkSingle]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[chkStrip]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[targ]", "", time() - 3600, "/"); 
		setcookie("BMSCookie062017[tsql]", "", time() - 3600, "/"); 
            
            
        }
    
// If use cookies is true but none are set

if((!isset($_COOKIE["BMSCookie062017"])) && ($_COOKIE["BMSuseCookies"] == "T")) {
		
		setcookie("BMSCookie062017[to]", "SC", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[tl]", "CS", time() + (10 * 365 * 24 * 60 * 60), "/"); 
	    setcookie("BMSCookie062017[trail]", "IG", time() + (10 * 365 * 24 * 60 * 60), "/"); 	
		setcookie("BMSCookie062017[opts]", "NO", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[tabs]", "NO", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[MSopts]", "NO", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[chkPreserve]", "off", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[nm]", "sb", time() + (10 * 365 * 24 * 60 * 60), "/");
		setcookie("BMSCookie062017[cusBeg]", "", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[cusEnd]", "", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[chkIndent]", "off", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[chkSingle]", "off", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[chkStrip]", "off", time() + (10 * 365 * 24 * 60 * 60), "/"); 
		setcookie("BMSCookie062017[targ]", "LG", time() + (10 * 365 * 24 * 60 * 60), "/");
		setcookie("BMSCookie062017[tsql]", "SQT", time() + (10 * 365 * 24 * 60 * 60), "/"); 

	}

// use cookies is true and they are already set
    elseif ($_COOKIE["BMSuseCookies"] == "T") {


		   foreach ($_COOKIE["BMSCookie062017"] as $name => $value) {
			if ($name == "to")
			{
				$cookie_to = $value;

				
			}
			
			
			if ($name == "tl")
			{
				$cookie_tl = $value;

				
			}
			
			if ($name == "trail")
			{
				$cookie_trail = $value;

				
			}
			
			if ($name == "opts")
			{
				$cookie_opts = $value;

				
			}
			
			if ($name == "tabs")
			{
				$cookie_tabs = $value;

				
			}
			
			if ($name == "MSopts")
			{
				$cookie_MSopts = $value;

				
			}
			if ($name == "chkPreserve")
			{
				$cookie_chkPreserve = $value;

				
			}
			if ($name == "nm")
			{
				$cookie_nm = $value;

				
			}
			
			if ($name == "cusBeg")
			{
				$cookie_cusBeg = $value;

				
			}
			
			if ($name == "cusEnd")
			{
				$cookie_cusEnd = $value;
				

				
			}
			
			if ($name == "chkIndent")
			{
				$cookie_chkIndent = $value;

				
			}
			if ($name == "chkSingle")
			{
				$cookie_chkSingle = $value;

				
			}
			if ($name == "chkStrip")
			{
				$cookie_chkStrip = $value;

				
			}
			if ($name == "targ")
			{
				$cookie_targ = $value;
				

			}
			
			if ($name == "tsql")
			{
				$cookie_tsql = $value;
				

			}

		}
	}

	
	
	?>
<html>
<head>


<title>Online Automatic String Escaper Concatenation Code Generator / Online Automatic Stringbuilder Code Generator</title>
<meta name="language" content="en"/>
<meta name="robots" content="all"/>
<meta name="rating" content="general"/>
	<meta name="title" content="Automatic Online String Escaper Concatenation Code Generator Automatic Stringbuilder Code and concatenation Generator Online Stringify"/>
	<meta name="description" content="Online string escaper and concatenation tool for C#, Java, VB, and C++ with many options, stringify online"/>  
<link rel="icon" type="image/png" href="/images/BuildMyString.png">
<link rel="stylesheet" href="styles.css" type="text/css">
	 
<script src="scripts/jquery-3.3.1.min.js" type="text/javascript"></script>
<!-- cookie slide panel uses jquery-ui, possible future use as well -->     
<script src="scripts/jquery-ui.min.js" type="text/javascript"></script>
         
<!-- We seem solid up to this point -->

     
     <script>
	 $(document).ready(function() {
		$('div[id^="huh"]').hide();
		
			
	
		// handler for help div clicks
		function showHelp(event) {
		
		$(event.data.divID).css({left:event.pageX - event.data.offX , top:event.pageY - event.data.offY});
		$(event.data.divID).show();
		
		};
		
		
		// Attach event handler to each help div. offX and OffY are used to position the div 
		
		$("#huhClick1").on("click", null, {divID: "#huh1", offX: 250, offY: 50}, showHelp);
		$("#huhClick2").on("click", null, {divID: "#huh2", offX: 250, offY: 50}, showHelp);
		$("#huhClick3").on("click", null, {divID: "#huh3", offX: 250, offY: 50}, showHelp);
		$("#huhClick4").on("click", null, {divID: "#huh4", offX: 250, offY: 50}, showHelp);		
		$("#huhClick5").on("click", null, {divID: "#huh5", offX: 500, offY: 50}, showHelp);
		$("#huhClick6").on("click", null, {divID: "#huh6", offX: 500, offY: 50}, showHelp);
		$("#huhClick7").on("click", null, {divID: "#huh7", offX: 500, offY: 50}, showHelp);
		$("#huhClick8").on("click", null, {divID: "#huh8", offX: 250, offY: 50}, showHelp);
		$("#huhClick9").on("click", null, {divID: "#huh9", offX: 250, offY: 50}, showHelp);
		$("#huhClick10").on("click", null, {divID: "#huh10", offX: 250, offY: 50}, showHelp);
		$("#huhClick11").on("click", null, {divID: "#huh11", offX: 250, offY: 50}, showHelp);
		$("#huhClick12").on("click", null, {divID: "#huh12", offX: 250, offY: 50}, showHelp);
		$("#huhClick13").on("click", null, {divID: "#huh13", offX: 350, offY: 50}, showHelp);
		$("#huhClick14").on("click", null, {divID: "#huh14", offX: 250, offY: 50}, showHelp);
		$("#huhClick15").on("click", null, {divID: "#huh15", offX: 250, offY: 50}, showHelp);
		$("#huhClick16").on("click", null, {divID: "#huh16", offX: 250, offY: 50}, showHelp);
		$("#huhClick17").on("click", null, {divID: "#huh17", offX: 250, offY: 50}, showHelp);
		$("#huhClick18").on("click", null, {divID: "#huh18", offX: 500, offY: 50}, showHelp);
										
		
		// close handler, close any open on clicking close link
			
		$('a[id^="huhClose"]').click(function() {
        $('div[id^="huh"]').hide();	
		});
		
		

		// Set max length of input here, currently 128k.
	
		
		$('#inputText').bind('change keyup', function() {
		var maxlength = 128000;
		val = $('#inputText').val();
		if (val.length > maxlength) {
        $('#inputText').val(val.substring(0, maxlength));
        alert('Only the first 128,000 characters will be used in the output');
		}
		});
        
        


		// Get and Set routine for cookies
        
        function getCookie(c_name)
        {
           var i,x,y,ARRcookies=document.cookie.split(";");
           for (i=0; i<ARRcookies.length; i++)
           {
              x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
              y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
              x=x.replace(/^\s+|\s+$/g,"");
              if (x==c_name)
              {
                return unescape(y);
              }
           }
        }
        
        function setCookie(c_name,value,exdays)
        {
           var exdate=new Date();
           exdate.setDate(exdate.getDate() + exdays);
           var c_value=escape(value) + ((exdays==null) ? "" : ("; expires="+exdate.toUTCString()));
           document.cookie=c_name + "=" + c_value;
        }
        
        
        // Handle cookie div items
		
		// Slide down panel
        $('#cookieClick').click(function() {
            var useCookies = false;
            
            if (getCookie("BMSuseCookies") == "T") {             
            // have cookie
             useCookies = true;
            } else {
             // no cookie
             useCookies = false;
            }              
            $('#chkCookies').prop('checked', useCookies); 
			$('#test1').slideDown("fast");
		
		});
        
		// Cancel cookie panel
        $('#neverMind').click(function() {
          $('#test1').slideUp("fast");
		});
        
		// Save new use cookies setting
        $('#saveCookieSetting').click(function() {
            
            if ($('#chkCookies').prop('checked') == true) {
            setCookie("BMSuseCookies", "T", 9999);
            }
            else
            {
            setCookie("BMSuseCookies", "F", 9999);   
            }   
			$('#test1').slideUp("fast");         
            location.reload();
		});
        
        
		// End cookie div
		
		
		// New area - Dev language or SQL?
		
		// Change event
		 $('input[type=radio][name=targ]').change(function() {
        if (this.value == 'LG') {
			$('input[name=tsql]').attr("disabled",true);
			$('input[name=tl]').attr("disabled",false);
			$('#tll1').css('color', '#000000');
			$('#tll2').css('color', '#000000');
			$('#tll3').css('color', '#000000');
			$('#tll4').css('color', '#000000');
			$('#tsqll1').css('color', '#B0B0B0');
			$('#tsqll2').css('color', '#B0B0B0');
			$('#tsqll3').css('color', '#B0B0B0');
        }
        else if (this.value == 'SQ') {
			$('input[name=tl]').attr("disabled",true);
			$('input[name=tsql]').attr("disabled",false);
			$('#tll1').css('color', '#B0B0B0');
			$('#tll2').css('color', '#B0B0B0');
			$('#tll3').css('color', '#B0B0B0');
			$('#tll4').css('color', '#B0B0B0');
			$('#tsqll1').css('color', '#000000');
			$('#tsqll2').css('color', '#000000');
			$('#tsqll3').css('color', '#000000');
        }
		});
		
		// Enable / disable based on current value
		var radioValue = $("input[type=radio][name=targ]:checked").val();		
	        if (radioValue == 'LG') {
			$('input[name=tsql]').attr("disabled",true);
			$('input[name=tl]').attr("disabled",false);
			$('#tll1').css('color', '#000000');
			$('#tll2').css('color', '#000000');
			$('#tll3').css('color', '#000000');
			$('#tll4').css('color', '#000000');
			$('#tsqll1').css('color', '#B0B0B0');
			$('#tsqll2').css('color', '#B0B0B0');
			$('#tsqll3').css('color', '#B0B0B0');
        }
        else if (radioValue == 'SQ') {
			$('input[name=tl]').attr("disabled",true);
			$('input[name=tsql]').attr("disabled",false);
			$('#tll1').css('color', '#B0B0B0');
			$('#tll2').css('color', '#B0B0B0');
			$('#tll3').css('color', '#B0B0B0');
			$('#tll4').css('color', '#B0B0B0');
			$('#tsqll1').css('color', '#000000');
			$('#tsqll2').css('color', '#000000');
			$('#tsqll3').css('color', '#000000');
        }

		});	

	 </script>
	 



</head>
<body>


<div><a href="javascript:void(0)" id = "cookieClick" class="cookieTag">COOKIES</a></div>

<!-- cookie slide down div -->
<div id = "test1" class="cookieSelect">
<table width="100%"><tr><td class="cookieHeader" colspan=2>THIS WEBSITE USES COOKIES</td>
</tr>
<tr><td colspan=2>Strings entered into this website for the purpose of concatenation are not persisted or saved. However, this site uses cookies to store your preferences. If you wish to opt out of cookies, you may still use this website, however your preferences will not be stored from session to session. You may always return to this section to change your cookie preference. Clicking "Save Setting" will cause the page to reload.
</td></tr>
<tr><td>

<table cellpadding=0 cellspacing=0><tr><td>
<b>Use Cookies:</b></td><td><input type=checkbox id="chkCookies">
</td></tr></table>

</td></tr>
<tr><td align=left>
<a href="javascript:void(0)" id="saveCookieSetting" class="cookieLink"><b>Save Setting</b></a>
</td><td align=right>

<a href="javascript:void(0)" id="neverMind" class="cookieLink"><b>Don't Save</b></a>
</td>
</tr>
</table>
</div>
<!-- end cookie div -->












<form action="build.php" method="post" accept-charset="UTF-8">

<table width = "100%">
<tr><td align="center"><img src="/images/header.jpg">
<tr><td colspan="10">
<img src="/images/headerBack.gif" height="32px" width="100%">
</td></tr>
</table>
<table "width = 100%" align="center">

<tr><td>
<!--width="1015px"-->
<table  width="100%">
	<tr>
		<td colspan = "3" class="header" align="center">
		<div class="headerTitle">Automatic string escaper concatenation. Automatic Stringbuilder escaper code generation.</div>
		Wouldn't it be great to just paste your massive SQL query or other large block of text somewhere and then have a concatenated string or StringBuilder object magically form around it?
		(Answer: Yes it would be) Now you can automatically create concatenated strings and automatically create StringBuilder objects. BuildMyString.com will take whatever text you input, escape it, and output the results. If you find an issue or want to offer a change or enhancement idea, note it in the comments. Please keep your suggestions coming!!!! Let's turn this string escaper into Skynet!
		BMS will remember your settings if you turn on cookies at the upper left of the site. And no, your strings are not logged or saved in any way - I have no desire to know what people type into this thing.
		

<br><br>

					

		<div class="headerAlert">If you're using IE and this page is broken, see <a target="_blank" class="headerAlert" href="http://help.disqus.com/customer/portal/articles/666084-troubleshooting-disqus-2012-in-internet-explorer-8-9">this</a> to fix it. It's typically one of the first two issues.</div>
		
		</td>
	</tr>
	<tr><td><hr></td></tr>
</table>

<table align="center"> <!-- parent -->
<tr>
<td valign="top">

<table style="border: 1px solid black;" width="320px"><tr><td>


<table border =0>


	<tr><td valign="top" width="20px"><input type="radio" name = "targ" value = "LG" <?php if ($cookie_targ == "LG" ) echo 'checked '; ?>></td>
		<td valign="top" width="100px">
		<b>Target language</b>
		</td>
		<td align="left">
			<table>
				<tr>
					<td>
					<input type="radio" name = "tl" value = "CS" <?php if ($cookie_tl == "CS" ) echo 'checked '; ?>><a id="tll1">C#</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "tl" value = "JV" <?php if ($cookie_tl == "JV" ) echo 'checked '; ?>><a id="tll2">Java</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "tl" value = "VB" <?php if ($cookie_tl == "VB" ) echo 'checked '; ?>><a id="tll3">VB.NET</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "tl" value = "CP" <?php if ($cookie_tl == "CP" ) echo 'checked '; ?>><a id="tll4">C++</a>
					</td>
				</tr>
			</table>
			</td>
			</tr>
			
	<tr><td valign="top"><input type="radio" name = "targ" value = "SQ" <?php if ($cookie_targ == "SQ" ) echo 'checked '; ?>></td>
		<td valign="top">
		<b>Target SQL</b><br>

		<a href="javascript:void(0)" id="huhClick16">Huh?</a>
		</td>
		<td align="left">
			<table>
				
				
				<tr>
				<td>
					<input type="radio" name = "tsql" value = "SQT" <?php if ($cookie_tsql == "SQT" ) echo 'checked '; ?>><a id="tsqll1">Microsoft - T-SQL</a>
					</td>
				</tr>
				<tr>
				<td>
					<input type="radio" name = "tsql" value = "SQP" <?php if ($cookie_tsql == "SQP" ) echo 'checked '; ?>><a id="tsqll2">Oracle - PL / SQL</a>
					</td>
				</tr>
				<tr>
				<td>
					<input type="radio" name = "tsql" value = "SQM" <?php if ($cookie_tsql == "SQM" ) echo 'checked '; ?>><a id="tsqll3">MySql - SQL / PSM</a>
					</td>
				</tr>
				
				
				
				
	
			</table>
		</td>
		
	</tr>
	
	</table>
	
	</td></tr></table>
	
	<table>
	
		<tr><td width="23px"></td>
		<td valign="top" width="100px">
		<b>Target object:</b>
		</td>
		<td align="left" valign="top">
			<table>
				<tr>
					<td>
					<input type="radio" name = "to" value = "SC" <?php if ($cookie_to == "SC" ) echo 'checked '; ?>>String (concatenation)
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "to" value = "SB" <?php if ($cookie_to == "SB" ) echo 'checked '; ?>>Stringbuilder 
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "to" value = "NO" <?php if ($cookie_to == "NO" ) echo 'checked '; ?>>None (output the string only) 
					</td>
				</tr>
			</table>
		</td>
		
	</tr>

	
	
	</table>
	
	<table>

	<tr>
		<td>
		<b>Preserve blank lines in input as output?</b> <input type="checkbox" name="chkPreserve" <?php if ($cookie_chkPreserve == "on" ) echo 'checked '; ?>> <a href="javascript:void(0)" id="huhClick1">Huh?</a>
		</td>
	</tr>
	</table>
	<table>

	<tr>
		<td>
		<b>Variable name (25 max)</b>
		</td>
		<td>
		<input name = "nm" type = "text" value="<?php echo $cookie_nm; ?>" maxlength = "25"><a href="javascript:void(0)" id="huhClick2">Huh?</a>
		</td>
	</tr>
</table>

</td>
<td valign="top"><!-- parent -->


<table border=0>

	<tr>
		<td valign="top">
		<b>Trailing Spaces</b>
		</td>
		<td>
			<table>
				<tr>
					<td>
					<input type="radio" name = "trail" value = "IG"  <?php if ($cookie_trail == "IG" ) echo 'checked '; ?>>Ignore
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "trail" value = "RE" <?php if ($cookie_trail == "RE" ) echo 'checked '; ?>>Remove any spaces found at the end of each line <a href="javascript:void(0)" id="huhClick13">Huh?</a>
					</td>
				</tr>

			</table>
		</td>
		
	</tr>
















	<tr>
		<td valign="top">
		<b>Options</b>
		</td>
		<td>
			<table>
				<tr>
					<td>
					<input type="radio" name = "opts" value = "NO" <?php if ($cookie_opts == "NO" ) echo 'checked '; ?>>None
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "opts" value = "BR"<?php if ($cookie_opts == "BR" ) echo 'checked '; ?>>Include a <?php echo htmlentities("<br>") ?> at the end of each line <a href="javascript:void(0)" id="huhClick3">Huh?</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "opts" value = "RN"<?php if ($cookie_opts == "RN" ) echo 'checked '; ?>>Include \r\n at the end of each line <a href="javascript:void(0)" id="huhClick12">Huh?</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "opts" value = "SP"<?php if ($cookie_opts == "SP" ) echo 'checked '; ?>>Include a space at the end of each line <a href="javascript:void(0)" id="huhClick4">Huh?</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "opts" value = "CB"<?php if ($cookie_opts == "CB" ) echo 'checked '; ?>>Include this at the beginning of each line (25 max)</td><td><input name = "cusBeg" type = "text" value="<?php echo $cookie_cusBeg; ?>" maxlength="25"> <a href="javascript:void(0)" id="huhClick18">Huh?</a></td>			
				</tr>
				<tr>
					<td>
					<input type="radio" name = "opts" value = "CU"<?php if ($cookie_opts == "CU" ) echo 'checked '; ?>>Include this at the end of each line (25 max)</td><td><input name = "cusEnd" type = "text" value="<?php echo $cookie_cusEnd; ?>" maxlength="25"> <a href="javascript:void(0)" id="huhClick5">Huh?</a>
					</td>
				</tr>

			</table>
		</td>
		
	</tr>


	
		<tr>
		<td valign="top">
		<b>Handle Tabs</b>
		</td>
		<td>
			<table>
				<tr>
					<td>
					<input type="radio" name = "tabs" value = "NO" <?php if ($cookie_tabs == "NO" ) echo 'checked '; ?>>Ignore Tabs <a href="javascript:void(0)" id="huhClick8">Huh?</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "tabs" value = "ST" <?php if ($cookie_tabs == "ST" ) echo 'checked '; ?>>Strip out any Tabs <a href="javascript:void(0)" id="huhClick9">Huh?</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "tabs" value = "ES" <?php if ($cookie_tabs == "ES" ) echo 'checked '; ?>>Replace Tabs with \t or vbTAB <a href="javascript:void(0)" id="huhClick10">Huh?</a>
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "tabs" value = "SP" <?php if ($cookie_tabs == "SP" ) echo 'checked '; ?>>Replace Tabs with a space <a href="javascript:void(0)" id="huhClick11">Huh?</a>
					</td>
				</tr>
			</table>
		</td>
		
	</tr>

		<tr>
		<td valign="top">
		<b>MS specific Options</b>
		</td>
		<td>
			<table>
				<tr>
					<td>
					<input type="radio" name = "MSopts" value = "NO" <?php if ($cookie_MSopts == "NO" ) echo 'checked '; ?>>None
					</td>
				</tr>
				<tr>
					<td>
					<input type="radio" name = "MSopts" value = "AL" <?php if ($cookie_MSopts == "AL" ) echo 'checked '; ?>>Use AppendLine instead of Append for the Stringbuilder object <a href="javascript:void(0)" id="huhClick6">Huh?</a>
					</td>
				</tr>
				<tr>
					<td>
					<input id="vbCrLf" type="radio" name = "MSopts" value = "VBlf" <?php if ($cookie_MSopts == "VBlf" ) echo 'checked '; ?>>VB only - include " & vbCrLF &" at the end of each line, OUTSIDE of the string <a href="javascript:void(0)" id="huhClick7">Huh?</a>
					</td>
				</tr>
			</table>
		</td>
		
	</tr>
	
	
	<tr><td colspan="2"><hr></td></tr>
	
	
	
		<tr>
		<td valign="top">
		<b>Beautify</b>
		</td>
		<td cellpadding="0" cellspacing="0">
	<table cellspacing="0" cellpadding="0">

	<tr>
		<td>
		Indent my object <input type="checkbox" name="chkIndent" <?php if ($cookie_chkIndent == "on" ) echo 'checked '; ?>> <a href="javascript:void(0)" id="huhClick14">Huh?</a></td><td>
		</td>
	</tr>
		<tr>
		<td>
		Use a single statement <input type="checkbox" name="chkSingle" <?php if ($cookie_chkSingle == "on" ) echo 'checked '; ?>> <a href="javascript:void(0)" id="huhClick15">Huh?</a></td><td>
		</td>
	</tr>
	
			<tr>
		<td>
		Strip out carriage returns <input type="checkbox" name="chkStrip" <?php if ($cookie_chkStrip == "on" ) echo 'checked '; ?>> <a href="javascript:void(0)" id="huhClick17">Huh?</a></td><td>
		</td>
	</tr>
	
	
	</table>
		</td>
		
	</tr>
	
	
	
	
</table>
	<tr><td colspan="3"><hr></td></tr>

</td>
</tr>
</table><!-- parent -->


<table align = "center">
<tr>
<td>
<b>Enter text</b>
</td>
</tr>
<td>
<textarea class="inputBox" name="inputText" id="inputText"></textarea>
</td>
</tr>
<tr>
<td>
<input type="submit" id="submitButton" value = "Build my String" class="submitButton" />
</td>
</tr>
<tr><td width = "100%"><hr></td></tr>
</table>


   
   
   </td></tr></table>
   

<!-- help divs -->
<div id="huh1" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose1"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
Sometimes, as may be the case with code or a SQL query, you may want to preserve blank lines in your string or Stringbuilder code for readability purposes:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
// Sample code follows<br>
<br>
for(int i=0; i<5; i++)<br> 
  {<br>
  Console.WriteLine("Current Count: " + i.ToString());<br>
  }<br>
<br>
Console.WriteLine("Final Count: " + i.ToString());
</td>
</tr>
<tr>
<td class="divHelpText">
Checking this box will preserve your blank lines in the output:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
StringBuilder sb = new StringBuilder();<br>
<br>
sb.Append("// Sample code follows");<br>
<a class="divHelpTextHighlight">sb.Append("");</a><br>
sb.Append("for(int i=0; i<5; i++) ");<br>
sb.Append("  {");<br>
sb.Append("  Console.WriteLine(\"Current Count: \" + i.ToString());");<br>
sb.Append("  }");<br>
<a class="divHelpTextHighlight">sb.Append("");</a><br>
sb.Append("Console.WriteLine(\"Final Count: \" + i.ToString());");
</td>
</tr>
<tr>
<td class="divHelpText">
Or, leave this box unchecked and blank lines in the input will not be included in the output:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
StringBuilder sb = new StringBuilder();<br>
<br>
sb.Append("// Sample code follows");<br>
sb.Append("for(int i=0; i<5; i++) ");<br>
sb.Append("  {");<br>
sb.Append("  Console.WriteLine(\"Current Count: \" + i.ToString());");<br>
sb.Append("  }");<br>
sb.Append("Console.WriteLine(\"Final Count: \" + i.ToString());");<br>
</td>
</tr>
<td class="divHelpText">
Note that if you select the option to preserve blank lines AND any of the options that include additional characters at the end of each line, the output will append these characters to your blank lines as well.
</td>
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose1"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>



<div id="huh2" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose2"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
By default, the output will use the name of "sb" for your string or stringbuilder. Feel free to change it to anything you prefer:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
StringBuilder greatestObjectEver = new StringBuilder();
</td>
</tr>
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose2"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>


<div id="huh3" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose3"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
If you're outputting text to an HTML doc, you can select this option to have a <?php echo htmlentities("<br>") ?> appended at the end of each line of the input:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
StringBuilder sb = new StringBuilder();<br>
<br>
sb.append("Four score and seven years ago<?php echo htmlentities("<br>") ?>");<br>
sb.append("our fathers brought forth on this continent,<?php echo htmlentities("<br>") ?>");<br>
sb.append("a new nation, conceived in Liberty,<?php echo htmlentities("<br>") ?>");<br>
sb.append("and dedicated to the proposition that<?php echo htmlentities("<br>") ?>");<br>
sb.append("all men are created equal.<?php echo htmlentities("<br>") ?>");<br>
</td>
</tr>
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose3"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>


<div id="huh4" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose4"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
When inputting multiple lines of text, you might be expecting the  words to seperate properly at the line breaks:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Four score and seven years ago<br>
our fathers brought forth on this continent,<br>
a new nation, conceived in Liberty,<br>
and dedicated to the proposition that<br>
all men are created equal.<br>
</tr>
<tr>
<td class="divHelpText">
However, most multi line text will terminate right after the last character of the line creating an unexpected result in the output:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
StringBuilder sb = new StringBuilder();<br>
<br>
sb.Append("Four score and seven years ago");<br>
sb.Append("our fathers brought forth on this continent,");<br>
sb.Append("a new nation, conceived in Liberty,");<br>
sb.Append("and dedicated to the proposition that");<br>
sb.Append("all men are created equal.");<br>
<br>
OUTPUT: Four score and seven years <a class="divHelpTextHighlight">agoour</a> fathers brought forth....
</td>
</tr>
<tr>
<td class="divHelpText">
By checking this box, a space will be appended to the end of each line:</td>
</tr>
<tr>
<td class="divHelpTextDark">
StringBuilder sb = new StringBuilder();<br>
<br>
sb.Append("Four score and seven years ago ");<br>
sb.Append("our fathers brought forth on this continent, ");<br>
sb.Append("a new nation, conceived in Liberty, ");<br>
sb.Append("and dedicated to the proposition that ");<br>
sb.Append("all men are created equal. ");<br>
<br>
OUTPUT: Four score and seven years <a class="divHelpTextHighlight">ago our</a> fathers brought forth....
</td>
</tr>
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose4"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>

<div id="huh5" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose5"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
You may need to append something custom to the end of each line. You can enter a custom suffix here.
(Note if you use a custom suffix, it will NOT be escaped, you must do that yourself.)
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Text::StringBuilder^ sb = gcnew Text::StringBuilder;<br>
<br>
sb->Append("Four score and seven years ago\n");<br>
sb->Append("our fathers brought forth on this continent,\n");<br>
sb->Append("a new nation, conceived in Liberty,\n");<br>
sb->Append("and dedicated to the proposition that\n");<br>
sb->Append("all men are created equal.\n");<br>
</td>
</tr>
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose5"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>

<div id="huh6" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose5"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
For C#, VB.NET, and C++, select this option to use AppendLine instead of Append for the Stringbuilder object.
AppendLine will add the default line terminator to the end of each line:
(This option has no effect if the target object is a concatenated string or if the target language is Java)
</td>
</tr>
<tr>
<td class="divHelpTextDark">
sb.AppendLine("Four score and seven years ago");<br>
sb.AppendLine("our fathers brought forth on this continent,");<br>
<br>
OUTPUT: Four score and seven years ago<br>
our fathers brought forth on this continent,
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose5"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>

<div id="huh7" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose7"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
For a VB.NET concatenated string only, selecting this option will append the VB carriage return constant at the end of each line of the string.
This option only applies if VB.NET is the target language and the target object is a concatenated string.
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Dim sb As String<br>
sb = "Four score and seven years ago" & vbCrLf &<br>
"our fathers brought forth on this continent," & vbCrLf &<br>
"a new nation, conceived in Liberty"<br>
<br>
OUTPUT: Four score and seven years ago<br>
our fathers brought forth on this continent,<br>
a new nation, conceived in Liberty
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose7"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>


<div id="huh8" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose8"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">Tabs can display unpredictably unless they are handled. If you are certain your source text has no Tabs, this option is fine. Otherwise, use one of the options below.
</td>
</tr>


<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose8"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>


<div id="huh9" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose9"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
Strip out any Tabs that are found in the source text. This can be useful to remove unwanted Tabs, but keep in mind anything seperated by a Tab in the source text will no longer be seperated in the output:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Source Text (separated by Tabs):
Column1 Column2 Column3<br>
<br>
OUTPUT: Column1Column2Column3
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose9"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>

<div id="huh10" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose10"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
Replace any Tabs found with \t or, if VB.Net is selected, vbTAB. If there are Tabs in your source text that you wish to preserve, this is the option.
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Source Text (separated by Tabs):<br>
Col1	Col2<br>
Data1	Data2<br>
Data1	Data2<br>
<br>
OUTPUT:<br>
Dim sb As String<br>
sb = "Col1" + vbTab + "Col2" & vbCrLf & <br>
"Data1" + vbTab + "Data2" & vbCrLf & <br>
"Data1" + vbTab + "Data2"<br>
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose10"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>



<div id="huh11" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose11"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
Replace any Tabs found with a space. This can be useful for formatting source text that is Tab delimited or copied from a spreadsheet:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Source Text (separated by Tabs):<br>
Col1	Col2<br>
Data1	Data2<br>
Data1	Data2<br>
<br>
OUTPUT:<br>
string sb = "Col1 Col2\r\n" + <br>
"Data1 Data2\r\n" + <br>
"Data1 Data2\r\n"; <br>
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose11"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>






<div id="huh12" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose12"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
If you're outputting text that's not HTML, you can select this option to have \r\n appended at the end of each line of the input.<br>
(This is ignored for VB.Net. There is an option below to append vbCrLF.)
</td>
</tr>
<tr>
<td class="divHelpTextDark">
StringBuilder sb = new StringBuilder();<br>
<br>
sb.append("Four score and seven years ago\r\n");<br>
sb.append("our fathers brought forth on this continent,\r\n");<br>
sb.append("a new nation, conceived in Liberty,\r\n");<br>
sb.append("and dedicated to the proposition that\r\n");<br>
sb.append("all men are created equal.\r\n");<br>
</td>
</tr>
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose12"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>





<div id="huh13" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose13"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
This option will remove any spaces found at the end of each line. This can be useful when dealing with cut and pasted fixed length data:<br>
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Source Text - data is char(20):<br>
Value1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(^end of line is here)<br>
Another Value&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(^end of line is here)<br>
Yet another value&nbsp;&nbsp;&nbsp;(^end of line is here)<br>
<br>
OUTPUT (no trailing spaces):<br>
string sb = "Value1\r\n" + <br>
"Another Value\r\n" + <br>
"Yet another value\r\n"; <br>
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose13"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>








<div id="huh14" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose14"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
This option will insert a Tab in front of each line of your generated code. This is purely for formatting reasons, as shown:<br>
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Indent off:<br>
sb.Append("Hello World");<br>
sb.Append("Hope you're well!");<br>
<br>
Indent on:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sb.Append("Hello World");<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;sb.Append("Hope you're well!");<br>
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose14"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>




<div id="huh15" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose15"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
For a string builder (C# and Java only), selecting this option will build all the appends as a single statement. This will allow the entire string builder to stepped over all at once in the debugger rather than having to step through each line. When debugging with very large string builders, this option will save a lot of time:
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Standard way:<br>
<br>
	StringBuilder sb = new StringBuilder();<br>
<br>
	sb.Append("Here is my ");<br>
	sb.Append("string builder.");<br>
	sb.Append("Guess I'll");<br>
	sb.Append("have");<br>
	sb.Append("to step through line by line.");<br>
<br>
Single statement:<br>
<br>
	StringBuilder sb = new StringBuilder();<br>
<br>
	sb.Append("Wait, no I wont!")<br>
	.Append("This")<br>
	.Append("whole")<br>
	.Append("thing")<br>
	.Append("debugs as one statement!");<br>
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose15"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>


<div id="huh16" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose16"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
BuildMyString.com will now escape and concatenate SQL strings<br><br>
Some ground rules: When you select any of the SQL languages, you are getting a concatenated string. 
I don't care if you pick 'StringBuilder' or 'None', it's not happening. You are getting a concatenated string. <br><br>
If you are staring at your ceiling right now yelling at the top of your lungs, "But I want to use a StringBuilder in SQL and you can't stop me!!", well I can stop you and you're a very strange person who shouldn't be writing code to begin with.
Similarly, if you are currently screaming at your cat - "But I use SillySQL! They haven't coded support for SillySQL!?!?!". <br><br>Look I can only do so much. I picked 3 common SQL platforms and maybe it's time you upgraded from SillySQL to an industry standard.<br><br>
Also, some of these options obviously make no sense at all in SQL, but are still available should you wish to use them. Weirdo.<br><br>
</td>
</tr>

<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose16"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>



<div id="huh17" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose17"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
Selecting this option will strip out any carriage returns in your text and return a single line as output. Useful if you if you have a large block of text you'd like as a single line in your code or "pivoting" your string.
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Standard way:<br>
<br>

string sb = "1" +<br>
"2" +<br>
"3" +<br>
"4";<br>

<br>
Strip out carriage returns:<br>
<br>
string sb = "1 2 3 4";
	
	<br>
</td>
</tr>
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose17"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>


<div id="huh18" class="divHelp">
<table cellspacing="0">
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose18"><b>Close (X)</b></a>
</td>
</tr>
<tr>
<td class="divHelpText">
You may need to prepend something custom to the beginning of each line. You can enter a custom prefix here.
(Note if you use a custom prefix, it will NOT be escaped, you must do that yourself.)
</td>
</tr>
<tr>
<td class="divHelpTextDark">
Text::StringBuilder^ sb = gcnew Text::StringBuilder;<br>
<br>
sb->Append("\nFour score and seven years ago");<br>
sb->Append("\nour fathers brought forth on this continent,");<br>
sb->Append("\na new nation, conceived in Liberty,");<br>
sb->Append("\nand dedicated to the proposition that");<br>
sb->Append("\nall men are created equal.");<br>
</td>
</tr>
<tr>
<td align="right" class="divHelpText">
<a href="javascript:void(0)" id="huhClose18"><b>Close (X)</b></a>
</td>
</tr>
</table>
</div>





</form>

</body>
</html>