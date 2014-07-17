<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	
<!-- Load jQuery -->
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- AJAX call to getuser.php to display user info -->
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","get-user.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
	
<body>

<p><form>
<select name="users" onchange="showUser(this.value)">
<option value="">Select a person:</option>
<option value="198">Donald O'Connell</option>
<option value="199">Douglas Grant</option>
<option value="200">Jennifer Whalen</option>
<option value="201">Michael Hartstein</option>
</select>
</form>
<br>
<div id="txtHint">Employee info will be listed here.</div></p>

</body>
</html>