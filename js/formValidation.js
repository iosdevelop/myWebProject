function validateForm() {
    var firstName = document.forms.registrationForm.firstName.value;
    var lastName = document.forms.registrationForm.lastName.value;
    var emailAddress = document.forms.registrationForm.emailAddress.value;
    var phoneNumber = document.forms.registrationForm.phoneNumber.value;
    var letters = /^[A-Za-z]+$/;
    var phone = /^\d{10}$/;
    var email = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

    if ((firstName === "") || (firstName.value.match(letters))) {
        alert("First Name must be filled out");
        return false;	
    }
    if ((lastName === "") || (lastName.value.match(letters)))  {
        alert("Last Name must be filled out");
        return false;	
    }
    if ((emailAddress === "") || (emailAddress.value.match(email))) {
        alert("Email address must be filled out");
        return false;	
    }
    if ((phoneNumber === "") || (phoneNumber.value.match(phone))) {
        alert("Telephone number must be filled out");
        return false;	
    }
  }
