function validateForm() {
    var firstName = document.forms.registrationForm.firstName.value;
    var lastName = document.forms.registrationForm.lastName.value;
    var email = document.forms.registrationForm.emailAddress.value;
    if (firstName === "") {
        alert("Name must be filled out");
        return false;	
    }
}