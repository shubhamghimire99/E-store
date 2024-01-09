function validateForm(){
   
    // var name = document.getElementById("name").value;
    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;

    if (email == null || email == "") {
        document.getElementById('emailError').innerHTML = 'Email is required';
        return false;
    }

    if (password == null || password == "") {
        document.getElementById('passwordError').innerHTML = 'Password is required';
        return false;
    }

    if (password.length < 8) {
        document.getElementById('passwordError').innerHTML = 'Password must be at least 8 characters';
        return false;
    }

    if (password.length > 15) {
        document.getElementById('passwordError').innerHTML = 'Password must be less than 15 characters';
        return false;
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      document.getElementById('emailError').innerHTML = 'Invalid email format';
      return false;
    }

    return true;
}