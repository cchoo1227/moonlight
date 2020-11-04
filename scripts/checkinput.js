var nameNode = document.getElementById("customername");
var dateNode = document.getElementById("dateofbirth");
var contactNode = document.getElementById("contactnumber");
var emailNode = document.getElementById("email");
	  
nameNode.addEventListener("change", chkName, false);
dateNode.addEventListener("change", chkDate, false);
contactNode.addEventListener("change", chkContact, false);
emailNode.addEventListener("change", chkEmail, false);



function chkName(event){
	var name = event.currentTarget;
	var pos = name.value.search(/^[A-Za-z ]+$/);
	if (pos != 0){
		alert("Name can only include alphabets and spaces!");
		name.focus();
		name.value="";
		return false;
	}
}

function chkDate(event){
	var date = event.currentTarget;
	var pos = new Date(date.value);
	
	var currentDate = new Date();
	if (pos <= currentDate){
	if (currentDate.getFullYear() - pos.getFullYear() < 16) {
        alert("Customers must be at least 16 years old to book!");
		date.focus();
		date.value="";
    }
 
    if (currentDate.getFullYear() - pos.getFullYear() == 16) {
        if (currentDate.getMonth() < pos.getMonth()) {
            alert("Customers must be at least 16 years old to book!");
		    date.focus();
		    date.value="";
            }
        if (currentDate.getMonth() == pos.getMonth()) {
            if (currentDate.getDate() < pos.getDate()) {
                alert("Customers must be at least 16 years old to book!");
		        date.focus();
		        date.value="";
                    }
                }
            }
	}
	if (pos >= currentDate){
		alert("Future dates cannot be selected!");
		date.focus();
		date.value="";
	}
}

function chkContact(event){
	var contact = event.currentTarget;
	var pos = contact.value.search(/^[0-9]{8}$/);
	var pos1 = contact.value.search(/^8+[0-9]{7}$/);
	var pos2 = contact.value.search(/^9+[0-9]{7}$/);
	if (pos != 0){
		alert("Contact number must be in 8 digit format!");
		contact.focus();
		contact.value="";
		return false;
	}
	if (pos1 !=0 && pos2 !=0){
		alert("Contact number must start with 8 or 9!");
		contact.focus();
		contact.value="";
		return false;
	}
}

function chkEmail(event){
	var email = event.currentTarget;
	var pos = email.value.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/);
	var pos1 = email.value.search(/^\w+@\w+(\.\w{2,3})?(\.\w{2,3})?(\.\w{2,3})?$/)
	if (pos != 0 || pos1 !=0){
		alert("Email should be username@domain.com!");
		email.focus();
		email.value="";
		return false;
	}
}

