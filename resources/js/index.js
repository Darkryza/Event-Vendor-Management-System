function validateForm() {
  var name = document.forms["editprofileform"]["name"].value;
  var IC_number = document.forms["editprofileform"]["IC_number"].value;
  var phone_number = document.forms["editprofileform"]["phone_number"].value;
  var email = document.forms["editprofileform"]["email"].value;
  var username = document.forms["editprofileform"]["username"].value;

  // Regular expressions for validation
  var icRegex = /^\d{12}/;
  var emailRegex = /^\S+@\S+\.\S+$/;
  // var phoneRegex = /^\d{3}-\d{3}-\d{4}$/;

  // Check if any field is empty
  if (name == "" || IC_number == "" || phone_number == "" || email == "" || username == "") {
      alert("All fields must be filled out");
      return false;
  }

  // Check IC number format
  if (!icRegex.test(IC_number)) {
      alert("Invalid IC number format. Please enter in XXXXXXXXXXXX format");
      return false;
  }

  // Check email format
  if (!emailRegex.test(email)) {
      alert("Invalid email format");
      return false;
  }

  // Check phone number format
  // if (!phoneRegex.test(phone_number)) {
  //     alert("Invalid phone number format. Please enter in XXX-XXX-XXXX format");
  //     return false;
  // }
}
