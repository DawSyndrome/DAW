
function getFormData(form){
	var result = {};
	for (var i = 0; i < form.length-1; i++)
		result[form[i].name] = form[i].value;
	return result;
}

function setError(form, color, error){
	var errorcode = form.getElementsByTagName("span")[0];
	errorcode.style["color"] = color;
	errorcode.innerText = error;
}

function attemptOperation(form, url, pre_message){
	setError(form, "black", pre_message);
	$.ajax({
		type: 'POST',
		url: url,
		data: getFormData(form),
		success: function(data) {
			if(data === "true")
				location.reload();
			else
				setError(form, "red", data);
		},
		error: function(jqXHR, text_status, error_thrown){
			var error = 0;
			if(jqXHR.readyState == 4)
				error = "server said you can't do that, maye u doin something shifty?";
			else
				error = "couldn't get to the server, check your connection?";
			setError(form, "red", error);
		}
	});
}

function attemptLogin(form){
	attemptOperation(form, '/store/login', "Logging in...");
	return false;
}

function attemptRegister(form){
	attemptOperation(form, '/store/register', "Registering and Logging in...");
	return false;
}

function clickCartIcon(){
	var display = document.getElementById('staplesbmincart').style["display"]; 
	var hidden = display == "none" || display == "";
	console.log("click " + hidden);
	document.getElementById('staplesbmincart').style["display"] = hidden?"block":"none";
}

function sure(offto){
	if(confirm("Do you want to place the order?")){
		window.location.href = offto;
	}
}