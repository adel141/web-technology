<!DOCTYPE html>
 
<html>
 
<body>
 
<h1 id="new" > "This is the JS Intro class" </h1>
 
<h2 id="new2">" "</h2>
 
<p id="para">  Today we will learn about Dom and form validation </p>
 
<button onclick="greet()"> click me </button>
 
<script>
var para=document.getElementById("para");
 
 

 
function greet()
{
    
document.getElementById("new").innerHTML="Welcome to AIUB";
document.getElementById("new2").innerHTML="This the DOM Class";
     
para.style.color="red";
para.style.backgroundColor="yellow";
para.style.fontWeight="bold";

}
 
</script>
</body>
 
 
</html>