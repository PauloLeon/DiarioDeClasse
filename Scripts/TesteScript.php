<script >
//chamada ajax para teste de jquery

function buscaTeste() { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               document.getElementById("#borevere").innerHTML = xmlhttp.responseText;
             //  console.log("booooooora funcionaaaaa");
			   //Run forest, run...
			   
			   
				 console.log("booooooora funcionaaaaa"+ document.getElementById("Sera").className);
			}
        }
        xmlhttp.open("GET","getTeste.php",true);
        xmlhttp.send();
    
	}
	
	
	$("#BEGIN button[id|='Sera'").click(function() {
					console.log("booooooora funcionaaaaa dois");
				    document.getElementById("Sera").attr('class', 'bs-callout bs-callout-primary'); 
 	});
buscaTeste();
//$(document).on('click', '.MessageList');


</script>