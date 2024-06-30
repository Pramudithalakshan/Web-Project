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


 

function showPassword(checkboxElement) {
    var spo = document.getElementById("password2");
    if (checkboxElement.checked) {
        spo.type = "text";
    } else {
        spo.type = "password";
    }
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

    var form = new FormData();
    form.append("u", userid.value);

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
    request.send(form);

}

function reload() {
    location.reload();
}

 


 

 

function registerProduct() {

    // alert("ok");

    var pname = document.getElementById("pname");
    var cat = document.getElementById("cat");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pn", pname.value);
    form.append("c", cat.value);
    form.append("s", size.value);
    form.append("d", desc.value);
    form.append("image", file.files[0]);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            alert(this.response);
            location.reload();
        }
    }
    request.open("POST", "addProductProcess.php", true);
    request.send(form);

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

    request.open("POST", "adminStockUpdateProcess.php", true);
    request.send(form);

}

function loadProduct(x) {
    var page = x;
    // alert(x);

    var form = new FormData();
    form.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;

        }
    }

    request.open("POST", "loadProductProcess.php", true);
    request.send(form);

}


function Basicsearch(x) {
    var page = x;
    var psearch = document.getElementById("productsearch");
 
    var form = new FormData();
    form.append("p", page);
    form.append("ps", psearch.value);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            document.getElementById("pid").innerHTML = response;
        }
    }
    request.open("POST", "searchPoductProcess.php", true);
    request.send(form);
}

function printDiv() {
    var originalcontent = document.body.innerHTML;
    var divToPrint = document.getElementById('printarea').innerHTML;

    document.body.innerHTML = divToPrint;

    window.print();

    document.body.innerHTML = originalcontent;
}

function loadCart() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            document.getElementById("cartBody").innerHTML = response;

        }
    }

    request.open("POST", "loadCartProcess.php", true);
    request.send();
}

function signOut() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            swal("Done!", response, "success");
            window.location.href = "index.php";

        }
    };

    request.open("POST", "signoutProcess.php", true);
    request.send();
}

function addtoCart(x) {
    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        var form = new FormData();
        form.append("qty", qty.value);
        form.append("sid", stockId);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if ((request.readyState == 4) & (request.status == 200)) {
                var response = request.responseText;
                // alert(response);
                swal("Good job!", response, "success");
                qty.value = "";
            }
        };
        request.open("POST", "addToCartProcess.php", true);
        request.send(form);
    } else {
        alert("ivalid count");
    }
}

function decrementCartQty(x) {


    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);
    var newQty = parseInt(qty.value) - 1;
    //alert(newQty);

    var form = new FormData();
    form.append("c", cartId);
    form.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                //alert(response);
                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(response);
                }


            }
        };

        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(form);
    }

}


function incrementCartQty(x) {

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);
    var newQty = parseInt(qty.value) + 1;
    //alert(newQty);

    var form = new FormData();
    form.append("c", cartId);
    form.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(response);
            }

        }
    };

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(form);

}






function forgetPassword() {
    //    alert("ok");

    var email = document.getElementById("forgetemail");

    if (email.value != "") {

        var form = new FormData();
        form.append("fe", email.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;

                if (response == "Success") {
                    document.getElementById("msg").innerHTML = "Check your email to reset password";
                    document.getElementById("msg").className = "alert alert-success";
                    document.getElementById("msgDiv").className = "d-block";
                } else {
                    document.getElementById("msg").innerHTML = response;
                    document.getElementById("msg").className = "alert alert-danger";
                    document.getElementById("msgDiv").className = "d-block";
                }
            }
        };

        request.open("POST", "forgetPasswordProcess.php", true);
        request.send(form);

    } else {
        alert("Please enter your email");
    }
}

function resetPassword() {
    //    alert("ok");
    var vc = document.getElementById("vcode");
    var np1 = document.getElementById("newpass1");
    var np2 = document.getElementById("newpass2");

    var form = new FormData();
    form.append("vcode", vc.value);
    form.append("np1", np1.value);
    form.append("np2", np2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msg1").className = "alert alert-danger";
                document.getElementById("msgDiv1").className = "d-block";


            }
        }

    };

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(form);
}

function categoryregister() {
    //   alert("ok");
    var cat = document.getElementById("addnewcategory");
    // alert(cat.value);

    var form = new FormData();
    form.append("c", addnewcategory.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            alert(response);
        }
    };

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(form);
}

function sizeregister() {
    var size = document.getElementById("addnewsize");
    // alert(size.value);

    var form = new FormData();
    form.append("s", addnewsize.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            alert(response);
        }
    };

    request.open("POST", "sizeRegisterProcess.php", true);
    request.send(form);

}

function advSearchProduct(x) {

    var page = x;

    var cat = document.getElementById("cat");
    var size = document.getElementById("size");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    // alert(cat.value);

    var form = new FormData();
    form.append("pg", page);
    form.append("cat", cat.value);
    form.append("s", size.value);
    form.append("min", min.value);
    form.append("max", max.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;

        }
    };
    request.open("POST", "advanceSearchProductProcess.php", true);
    request.send(form);

}



function updateData() {
    //   alert("ok");

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("password");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    var form = new FormData();
    form.append("f", fname.value);
    form.append("l", lname.value);
    form.append("e", email.value);
    form.append("m", mobile.value);
    form.append("p", pw.value);
    form.append("l1", line1.value);
    form.append("l2", line2.value);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
            reload();
        }
    };
    request.open("POST", "userDataUpdateProcess.php", true);
    request.send(form);
}

function removeCart(x) {

    if (confirm("Are You Sure delete this item?")) {
        var form = new FormData();
        form.append("c", x);
        var request = new XMLHttpRequest();

        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                alert(response);
                reload();
            }
        };
        request.open("POST", "removeFromCartProcess.php", true);
        request.send(form);
    }
}


function checkout() {
    // alert("ok");

    var form = new FormData();
    form.append("cart", true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var responce = request.responseText;
            // alert(responce);
            var payment = JSON.parse(responce);
            doCheckout(payment, "checkoutProcess.php");
        }
    }

    request.open("POST", "paymentProcess.php", true);
    request.send(form);
}

function buynow(stockId) {
    // alert(stockId);
    var qty = document.getElementById("qty");
    var oi = document.getElementById("orderid");

    if (qty.value > 0) {

        var form = new FormData();
        form.append("cart", false);
        form.append("stockId", stockId);
        form.append("qty", qty.value);
        

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;
                // alert(responce);

                var payment = JSON.parse(responce);
                payment.stock_id = stockId;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");

            }
        };

        request.open("POST", "paymentProcess.php", true);
        request.send(form);

    } else {
        alert("Please enter valid quantity");
    }
}



function doCheckout(payment, path) {

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var form = new FormData();
        form.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var responce = request.responseText;

                var order = JSON.parse(responce);

                if (order.resp == "success") {
                    // reload();
                   
                    window.location = "invoice.php?orderId="+order.order_id;
                } else {
                    alert("response");
                }
            }
        };

        request.open("POST", path, true);
        request.send(form);

    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };


    // Show the payhere.js popup, when "PayHere Pay" is clicked
    //document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
    //};


}


function updateUserStatus() {
    //    alert("ok");
    var useremail = document.getElementById("uemail");
    //  alert(useremail.value);
    var form = new FormData();
    form.append("ue", useremail.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var response = request.responseText;
            // alert(response);
            if (response == "Deactive") {
                document.getElementById("msg").innerHTML =
                    "User Deactivate Successful.";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
             
            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "User Activate Successful.";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                loadUser();
      
          
            } else {
                //Other responce
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    };

    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(form);


}


function viewFilter() {
    document.getElementById("filterId").className = "d-block";
}

function uploaduserimg() {
    //  alert("ok");

     var img = document.getElementById("imageUpload");

    var form = new FormData();
    form.append("i", img.files[0]);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //  alert(response);
            if (response == "empty") {
                alert("Please select Your Profile Image");

            } else {
                document.getElementById("i").src = response;
                img.value = "";

            }
        }
    };
    request.open("POST", "userProfileImageUploadProcess.php", true);
    request.send(form);

    

}

