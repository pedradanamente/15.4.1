function detalhe($var) {
	document.getElementById($var).style.display = "block";
}
function openclose($var) {
	//document.getElementById("listar_clientes").style.display = "none";
	$( $var ).slideToggle("slow", function() {});
}

//AJAX POST 
function ajaxRequest(){
 var activexmodes=["Msxml2.XMLHTTP", "Microsoft.XMLHTTP"]
 if (window.ActiveXObject){
  for (var i=0; i<activexmodes.length; i++){
   try{
    return new ActiveXObject(activexmodes[i])
   }
   catch(e){
    //suppress error
   }
  }
 }
 else if (window.XMLHttpRequest)
  return new XMLHttpRequest()
 else
  return false
}
function salvarnotas() {
	var mypostrequest=new ajaxRequest()
	mypostrequest.onreadystatechange=function(){
	 if (mypostrequest.readyState==4){
	  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
	   document.getElementById("resultado").innerHTML=mypostrequest.responseText
	  }
	  else{
	   alert("An error has occured making the request")
	  }
	 }
	}
	var value1=encodeURIComponent(document.getElementById("anotacao").value)
	var value2=encodeURIComponent(document.getElementById("cpf").value)
	var parameters="anotacao="+value1+"&cpf="+value2
	mypostrequest.open("POST", "pp/salvarajax.php", true)
	mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
	mypostrequest.send(parameters)
}
function salvarajax() {
		var mypostrequest=new ajaxRequest()
		mypostrequest.onreadystatechange=function(){
		 if (mypostrequest.readyState==4){
		  if (mypostrequest.status==200 || window.location.href.indexOf("http")==-1){
		   document.getElementById("resultadofin").innerHTML=mypostrequest.responseText
		  }
		  else{
		   alert("An error has occured making the request")
		  }
		 }
		}
		var texto=encodeURIComponent(document.getElementById("texto").value)
		var pagina=encodeURIComponent(document.getElementById("pagina").value)
		var cpf=encodeURIComponent(document.getElementById("cpf").value)
		var parameters="cpf="+cpf+"&pagina="+pagina+"&texto="+texto
		mypostrequest.open("POST", "pp/salvarajax.php", true)
		mypostrequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		mypostrequest.send(parameters)
}
//http://www.javascriptkit.com/dhtmltutors/ajaxgetpost2.shtml