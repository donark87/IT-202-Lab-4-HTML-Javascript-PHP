function validate()
{
  var firstName = document.getElementById("firstName").value; 
  var lastName = document.getElementById("lastName").value; 
  var password = document.getElementById("password").value;
  var userId  = document.getElementById("PatientID").value;
  
  
  
  if(!validateName(firstName)){return false;}
  if(!validateName(lastName)){return false;}
  if(!validatePassword(password)){return false;}
  if(!validateID(userId)){return false;};
  
  
  
  
  
}
// validates the name input
function validateName(name)
{

  if(name.length < 1)
  {
  		alert("Please enter your name");
  		return false;

  }
  return true;

}
// validates the ID input
function validateID(id)
{

  errors = [];
  if(id.length < 8)
  {
    errors.push("Enter ID number. \nID number must be 8 digit");
  }
  if (id.length > 8)
  {
    errors.push("Enter ID number \nID number must be 8 digit");
  }
  if (id.length == 8)
  {

    if(id.search(/[A-Z]/) > 0)
    {
      errors.push("Enter ID number cannot contain any characters");
    }

  }
  if (errors.length > 0) {
      alert(errors.join("\n"));
      return false;
  }

  return true;

}
// validates the password input
function validatePassword(passw) {

        errors = [];
    if (passw.length < 8) {
        errors.push("Your password must be at least 8 characters");
    }
    if (passw.search(/[A-Z]/) < 0) {
        errors.push("Your password must contain at least one upper case letter.");
    }
    if (passw.search(/[0-9]/) < 0) {
        errors.push("Your password must contain at least one digit.");
    }
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }
    return true;
}
