function changedate($val){
	// document.getElementById('end').value=";
	var myDate = new Date($val); 
	myDate.setFullYear(myDate.getFullYear() + 1); 
	document.getElementById('end').value=myDate.toISOString().substring(0, 10);
}
