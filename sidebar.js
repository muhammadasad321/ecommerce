function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
	document.getElementById("main").style.display = "none";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
	document.getElementById("main").style.display = "block";
}


function manage_cart(pid,type){
	if(type=='update'){
		var qty=jQuery("#"+pid+"qty").val();
	}else{
		var qty=jQuery("#qty").val();
	}
	jQuery.ajax({
		url:'manage_cart.php',
		type:'post',
		data:'pid='+pid+'&qty='+qty+'&type='+type,
		success:function(result){
			if(type=='update' || type=='remove'){
				window.location.href='cart.php';
			}
			jQuery('.htc__qua').html(result);
		}	
	});	
}

