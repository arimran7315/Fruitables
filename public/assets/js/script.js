$(document).ready(function () {
    // Set toastr options
    toastr.options = {
        closeButton: true,
        debug: false,
        newestOnTop: true,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        timeOut: "1000", // 1 second
        extendedTimeOut: "1000", // 1 second
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
    };
    var userId = $("#userId").val();
    read(userId);
});

window.onscroll = function () {
    stickyNavbar();
};

var navbar = document.getElementById("sticky-navbar");
var sticky = navbar.offsetTop;

function stickyNavbar() {
    if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky");
    } else {
        navbar.classList.remove("sticky");
    }
}
(function ($) {
    "use strict";
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });
})(jQuery);
document.getElementById("plusBtn").addEventListener("click", function () {
    var currentValue = parseInt(document.getElementById("numberInput").value);
    document.getElementById("numberInput").value = currentValue + 1;
});

document.getElementById("minusBtn").addEventListener("click", function () {
    var currentValue = parseInt(document.getElementById("numberInput").value);
    document.getElementById("numberInput").value = currentValue - 1;
});

function addtocart(id, user_id) {
    var id = id;
    var quantity = $("#numberInput").val();
    $.ajax({
        url: "/api/orders",
        type: "POST",
        data: {
            product_id: id,
            quantity: quantity,
            status: 0,
            user_id: user_id,
        },
        success: function (response) {
            if (response.status == true) {
                toastr.success(response.message, "Success");
            } else {
                toastr.error(response.message, "Error");
            }
            console.log(response.message);
            // alert(response.message);
            read(user_id);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        },
    });
}

function removeitem(id, proid, qty) {
    var id = id;
    var proid = proid;
    var qty = qty;
    $.ajax({
        url: `/api/orders/${userId}`,
        type: "POST",
        data: {
            id: id,
            proid: proid,
            quantity: qty,
        },
        headers: {
            "X-HTTP-Method-Override": "PUT",
        },
        success: function (response) {
            window.location.reload();
        },
        error: function (xhr, status, error) {
            // Handle error
            console.error(xhr.responseText);
        },
    });
}

function read(id) {
    $.ajax({
        url: `/api/readCart/${id}`,
        type: "GET",
        success: function (response) {
            if (response) {
                $("#cartbadge").html(response);
                // console.log(response);
            }
        },
    });
}
