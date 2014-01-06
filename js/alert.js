
function showAlert(){
	document.getElementById("notice").innerHTML="<div id=\"fail\" class=\"alert alert-danger\"><p>No matches found !</p></div>";	
}	

function foundresults(count){
	if(count==1){
		document.getElementById("notice").innerHTML="<div id=\"results\" class=\"alert alert-info\">"+count+" result found !</p></div>";
	}
	else{
		document.getElementById("notice").innerHTML="<div id=\"results\" class=\"alert alert-info\"><p>"+count+" results found !</p></div>";
	}	
}

function showsimplealert(){
	alert(123);	
}

function word(){
	document.write("cat");	
}