var types = {
    REGULAR: 200,
    PREMIUM: 1000,
    ENTERPRISE: 5000
};

$(function() {
  $('a[href*="#"]:not([href="#"])').click(function(event) {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


$( ".subcontact" ).click(function( e ) {
    e.preventDefault();
    var _RETURN = true;
    var name = document.forms["contactform"]["name"].value;
    var email = document.forms["contactform"]["email"].value;
    var subject = document.forms["contactform"]["subject"].value;
    var message = document.forms["contactform"]["message"].value;
    $(".contacterrors").html("");
    $("#name").css("box-shadow", "");
    $("#subject").css("box-shadow", "");
    $("#mail").css("box-shadow", "");
    $("#message").css("box-shadow", "");
     if (name === "" || name === null) {
        _RETURN = false;
        $(".contacterrors").append("Error: Fill in name.<br />");
        $("#name").css("box-shadow", "0 0 10px red");
    } 
    if (subject === "" || subject === null) {
        _RETURN = false;
        $(".contacterrors").append("Error: Fill in subject.<br />");
        $("#subject").css("box-shadow", "0 0 10px red");
    } 
    if (message === "" || message === null) {
        _RETURN = false;
        $(".contacterrors").append("Error: Fill in message.<br />");
        $("#message").css("box-shadow", "0 0 10px red");
    } 
    if (email === "" || email === null) {
        _RETURN = false;
        $(".contacterrors").append("Error: Fill in email adress.<br />");
        $("#mail").css("box-shadow", "0 0 10px red");
    }  else {
        if (!validateEmail(email)) {
            _RETURN = false;
            $(".contacterrors").append("Error: Fill in a valid email adress.<br />");
            $("#mail").css("box-shadow", "0 0 10px red");
        }
    }
    if (_RETURN) {
        saveStateInfo(name, email, subject, message);
    }
});

$( ".cancelForm" ).click(function( e ) {
    e.preventDefault();
    $(".detailpage").hide();
    $(".productlist").show();
    $(".checkoutForm").hide();
});

$(".productlist a").click(function(e) {
    e.preventDefault();
});


$( ".goback" ).click(function( e ) {
    e.preventDefault();
    $(".detailpage").hide();
    $(".productlist").show();
});

function buyNow(type) {
    $(".detailpage").hide();
    $(".productlist").hide();
    $(".checkoutForm").show();
    $(".checkoutType").html(type);
    $(".checkoutPrice").html(types[type]);
}

$(".checkoutSub").click(function(e) {
    e.preventDefault();
    $(".checkouterrors").html("");
    var _RETURN = "true";
    var fname = document.forms["checkout"]["fname"].value;
    var lname = document.forms["checkout"]["lname"].value;
    var bday = document.forms["checkout"]["bday"].value;
    var company = document.forms["checkout"]["company"].value;
    var street = document.forms["checkout"]["street"].value;
    var city = document.forms["checkout"]["city"].value;
    var country = document.forms["checkout"]["country"].value;
    var email = document.forms["checkout"]["email"].value;
    var payType = document.forms["checkout"]["payType"].value;
    var product = document.forms["checkout"]["product"].value;
    
    $("#fname").css("box-shadow", "");
    $("#lname").css("box-shadow", "");
    $("#bday").css("box-shadow", "");
    $("#street").css("box-shadow", "");
    $("#city").css("box-shadow", "");
    $("#country").css("box-shadow", "");
    $("#email").css("box-shadow", "");
    
    if (fname === "" || fname === null) {
        _RETURN = false;
        $(".checkouterrors").append("Error: Fill in first name.<br />");
        $("#fname").css("box-shadow", "0 0 10px red");
    } 
    if (lname === "" || lname === null) {
        _RETURN = false;
        $(".checkouterrors").append("Error: Fill in last name.<br />");
        $("#lname").css("box-shadow", "0 0 10px red");
    } 
    if (bday === "" || bday === null) {
        _RETURN = false;
        $(".checkouterrors").append("Error: Fill in Birth date.<br />");
        $("#bday").css("box-shadow", "0 0 10px red");
    } 
    if (street === "" || street === null) {
        _RETURN = false;
        $(".checkouterrors").append("Error: Fill in street name.<br />");
        $("#street").css("box-shadow", "0 0 10px red");
    } 
    if (city === "" || city === null) {
        _RETURN = false;
        $(".checkouterrors").append("Error: Fill in city.<br />");
        $("#city").css("box-shadow", "0 0 10px red");
    } 
    if (country === "" || country === null) {
        _RETURN = false;
        $(".checkouterrors").append("Error: Fill in country.<br />");
        $("#country").css("box-shadow", "0 0 10px red");
    } 
    if (email === "" || email === null) {
        _RETURN = false;
        $(".checkouterrors").append("Error: Fill in email adress.<br />");
        $("#email").css("box-shadow", "0 0 10px red");
    }  else {
        if (!validateEmail(email)) {
            _RETURN = false;
            $(".checkouterrors").append("Error: Fill in a valid email adress.<br />");
            $("#email").css("box-shadow", "0 0 10px red");
        }
    }
    if (payType === "" || payType === null) {
        _RETURN = false;
        $(".checkouterrors").append("Error: Select the wanted pay type.<br />");
    } 
    
    if (_RETURN) {
        submitCheckout(fname, lname, bday, company, street, city, country);
    }
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function submitCheckout(fname, lname, bday, company, street, city, country) {
    
}

function saveStateInfo(name, email, subject, message){

	$.ajax({
        type: "POST",
		url: "contact.php",
		data: {
		      'name' : name,
		      'email' : email,
		      'subject' : subject,
		      'message' : message
          }
	}).done(function(data){
		console.log("Sending message ...");
        console.log("Message sent.");
        console.log(data);
	});
}

function showDiv(detail) {
    $(".productlist").hide();
    $(".detailpage__" + detail).show();
    var swiper = new Swiper('.swiper-container', {
        pagination: '.swiper-pagination',
        paginationClickable: true,
        nextButton: '.swiper-button-next',
        prevButton: '.swiper-button-prev',
        spaceBetween: 30
    });
}

$(document).scroll(function(e) {
if (window.innerWidth > 550) {    
  if ($(this).scrollTop() > 56) {
    $("#nav").addClass("fixed");
    $(".home").css("background-image", "none").css("padding-top", "0");
    $(".shop").css("background-image", "none").css("padding-top", "0");
    $(".about-us").css("background-image", "none").css("padding-top", "0");
    $(".contact").css("background-image", "none").css("padding-top", "0");
    $(".navbar__logo .logo").css("background-size", "30px").css("padding-top", "0").css("margin-top", "0").css("background-position", "0px -10px").css("background-position", "0 2px").css("height", "36px");
    $("header").css("margin-top", "91px");
  } else {
      if (window.innerWidth > 550) {    
        $("#nav").removeClass("fixed");
        $(".home").css("background-image", "url('images/Home%20icon.png')").css("padding-top", "55px");
        $(".shop").css("background-image", "url('images/shop.png')").css("padding-top", "55px");
        $(".about-us").css("background-image", "url('images/about-us icon.png')").css("padding-top", "55px");
        $(".contact").css("background-image", "url('images/contact.png')").css("padding-top", "55px");
        $(".navbar__logo .logo").css("background-size", "65px").css("padding-top", "55px").css("margin-top", "10px").css("background-position", "0px 0px").css("height", "auto");
        $("header").css("margin-top", "0px");
      }
  }
} else {
    if ($("#nav").hasClass("fixed")) {
    } else {
        $("#nav").addClass("fixed");
    }
}
});