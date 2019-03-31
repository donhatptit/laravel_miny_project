function showpass(){
		  var showpass = document.getElementById("pass");
  if (showpass.type === "password") {
      showpass.type = "text";
  } else {
      showpass.type = "password";
  }
	}