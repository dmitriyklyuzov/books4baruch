
	function checkEmail2(email){
		if (email == ""){
			document.getElementById("login_form_div").innerHTML = "";
			return;
		}
		else {
			if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        }
	        else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            	if(xmlhttp.responseText){
	            		document.getElementById("login_form_div").innerHTML = xmlhttp.responseText;	
	            	}
	            }
	        };
	        xmlhttp.open("GET","controller/checkEmailExists2.php?email="+email,true);
	        xmlhttp.send();
		}
	}