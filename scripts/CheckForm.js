function checkPassword(str)
{
  var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
  return re.test(str);
}
 
  
 function checkForm(form)
  {

    if(form.Password.value != "" && form.Password.value == form.Password-repeat.value) {
        if(!checkPassword(form.Password.value)) {
            alert("The password you have entered is not valid!");
            form.Password.focus();
            return false;
      }
    }
    else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.Password.focus();
      return false;
    }

    alert("You entered a valid password: " + form.Password.value);
    return true;
 
  }
