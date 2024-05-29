function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}

function signup() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var mobile = document.getElementById("mobile");
    var gender = document.getElementById("gender");

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("m", mobile.value);
    form.append("g", gender.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;

            if (response == "succes") {
                document.getElementById("msg").innerHTML = "Registration Successfull";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgdiv").className = "d-block";
            }


        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}

function signin() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var form = new FormData();
    form.append("e", email.value);
    form.append("p", password.value);
    form.append("r", rememberme.checked);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;

            if (response == "success") {
                window.location = "home.php";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("magdiv1").className = "d-block";
            }


        }
    }
    request.open("POST", "signInProcess.php", true);
    request.send(form);
}

function adminSingin() {
    var ae = document.getElementById("adminemail");
    var ap = document.getElementById("adminpassword");


    var form = new FormData();
    form.append("e", ae.value);
    form.append("p", ap.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "adminDashboard.php";
            } else {
                document.getElementById("adminmsg").innerHTML = response;
                document.getElementById("adminmsgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "adminSigninProcess.php", true);
    request.send(form);
}



function loadUser() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            document.getElementById("tb").innerHTML = response;
        }
    }
    request.open("POST", "loaduserProcess.php", true);
    request.send();
}

function showPassword(checkboxElement) {
    var spo = document.getElementById("password2");
    if (checkboxElement.checked) {
        spo.type = "text";
    } else {
        spo.type = "password";
    }
}

function upDateUserStatus() {
    var sc = document.getElementById("statuschange");

    form.append = new XMLHttpRequest();

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
        }
    }
    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);
}

function loadcategory() {
    //  alert("hi");

    var cat = document.getElementById("category").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;

            document.getElementById("brand").innerHTML = response;

        }
    }

    request.open("GET", "loadBrandProcess.php?cid=" + cat, true);
    request.send();
}



function updatestock() {
    // alert("OK");

    var sp = document.getElementById("selectproduct");
    var sq = document.getElementById("stockqty");
    var up = document.getElementById("unitprice");

    var form = new FormData();
    form.append("sp", pname.value);
    form.append("sq", stockqty.value);
    form.append("up", unitprice.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            alert(response);
        }
    };

    request.open("POST", "updateStockProcess,php", ture);
    request.send(form);
}

function registerProduct() {
    var pname = document.getElementById("pname");
    var cat = document.getElementById("cat");
    var des = document.getElementById("des");
    var file = document.getElementById("img");

    var form = new FormData();
    form.append("pn", pname.value);
    form.append("c", cat.value);
    form.append("d", des.value);
    form.append("image", file.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "success") {
                alert(response);
                window.location.reload();
            } else {
                alert(response);
            }
        }
    };

    request.open("POST", "addProductProcess.php", true);
    request.send(form);
}


function loadProduct(x) {
    var page = x;

    var form = new FormData();
    form.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            alert(response);
        }
    };

    request.open("POST", "loadProductProcess.php", ture);

}