//validation function

function validation(elementId, elementName) {
    var element = document.getElementById(elementId);
    if (element.value === "") {
        alert(elementName + " Can't Empty!Please fill the details..");
        element.focus();
        return false;
    }
    return true;
}

//payment gateway function
function paynow() {
    var result =
        validation("name", "Name") && validation("address", "Address") && validation("email", "Email") && validation("phone", "Phone") && validation("ev_date", "Event date") &&
        validation("end_ev_date", "Event End date") && validation("ev_type", "Event Name") &&
        validation("theme", "Theme name") && validation("price", "Event price") && validation("t_price", "Theme price");
    if (result) {

        if (status || emailValidation("email")) {
            Swal.fire({
                position: "center",
                icon: "success",
                title: "Payment Done",
                showConfirmButton: false,
                timer: 1500
            });

        }

    }
    return false;
}

//email validation

function emailValidation(userEmail) {
    let Email = document.getElementById(userEmail);
    let regex = new RegExp(/\S+@\S+\.\S+/);
    let isValid = regex.test(Email.value);
    if (!isValid) {
        alert("Email is not valid");
        Email.focus();
        return false;
    }
    return true;
}
