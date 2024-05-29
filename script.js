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


 



function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    //alert (fname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(f);
}

function signIn() {
    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    //alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    };

    request.open("POST", "signInProcess.php", true);
    request.send(f);
}

function adminSignIn() {
    // alert("ok");

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    // alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "adminDashboard.php";
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);
}

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("tb").innerHTML = response;
        }
    }

    request.open("POST", "loadUserProcess.php", true);
    request.send();
}

function updateUserStatus() {
    var userid = document.getElementById("uid");
    // alert(userid.value);

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Deactive") {
                document.getElementById("msg").innerHTML = "User Deactivate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "User Activate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    }
    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);

}

function reload() {
    location.reload();
}

function brandReg() {

    // alert("ok");
    var brand = document.getElementById("brand");

    var f = new FormData();
    f.append("b", brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Brand Register Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msg1").className = "alert alert-danger";
                document.getElementById("msgDiv1").className = "d-block";
            }

        }
    }

    request.open("POST", "brandRegisterProcess.php", true);
    request.send(f);

}

function categoryReg() {
    // alert("ok");
    var category = document.getElementById("category");

    var f = new FormData();
    f.append("b", category.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Category Register Successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msg2").className = "alert alert-danger";
                document.getElementById("msgDiv2").className = "d-block";
            }

        }
    }

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(f);
}

function colorReg() {
    // alert("ok");
    var color = document.getElementById("color");

    var f = new FormData();
    f.append("b", color.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Color Register Successfully";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msg3").className = "alert alert-danger";
                document.getElementById("msgDiv3").className = "d-block";
            }

        }
    }

    request.open("POST", "colorRegisterProcess.php", true);
    request.send(f);
}

function sizeReg() {
    // alert("ok");
    var size = document.getElementById("size");

    var f = new FormData();
    f.append("b", size.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);

            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "Size Register Successfully";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";
            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msg4").className = "alert alert-danger";
                document.getElementById("msgDiv4").className = "d-block";
            }

        }
    }

    request.open("POST", "sizeRegisterProcess.php", true);
    request.send(f);
}

function  registerProduct() {

    // alert("ok");

    var pname = document.getElementById("pname");
    var cat = document.getElementById("cat");
    var sub_cat = document.getElementById("sub_cat");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pn", pname.value);
    form.append("c", cat.value);
    form.append("sub_cat", sub_cat.value);
    form.append("s", size.value);
    form.append("d", desc.value);
    form.append("image", file.files[0]);


    var req = new XMLHttpRequest();
    req.onreadystatechange = function () {
        if (req.readyState == 4 && req.status == 200) {
            var resp = req.responseText;
            alert(resp);
            location.reload();
        }
    }
    req.open("POST", "addProductProcess.php", true);
    req.send(form);

}

function updateStock() {

    var pname = document.getElementById("selectproduct");
    var qty = document.getElementById("stockqty");
    var price = document.getElementById("unitprice");

    // alert(pname.value)

    var form = new FormData();
    form.append("p", pname.value);
    form.append("q", qty.value);
    form.append("up", price.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
            location.reload();
        }
    }

    request.open("POST","adminStockUpdateProcess.php",true);
    request.send(form);
 
}

function loadProduct(x) {
    var page = x;
    // alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
          
        }
    }

    request.open("POST", "loadProductProcess.php", true);
    request.send(f);

}


