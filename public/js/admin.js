/*!
 * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2022 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//
// form validations using ajax
function validation() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    // contact form submit
    $("#service-form").on("submit", function (e) {
        // prevent default form submit
        e.preventDefault();
        $(".message-block").text("");
        // get form data
        var name = $("#name").val();
        var description = $("#description").val();
        var details = $("#details").val();
        var serviceimage = $("#serviceimage").val();
        // send ajax request
        $.ajax({
            url: $(this).attr("action"),
            type: $("#method-type").val(),
            dataType: "json",
            data: {
                name: name,
                description: description,
                details: details,
                serviceimage: serviceimage,
            },
            success: function (response) {
                // clear form
                $("#service-form")[0].reset();
                $(".success-message").text(response.success);
                $(".fail-message").text(response.error);
                $("#notification").modal("show");
                setTimeout(function () {
                    $("#notification").modal("hide");
                }, 2000);
            },
            error: function (response) {
                // get error messages
                $.each(response.responseJSON.errors, function (key, value) {
                    $("." + key + "_error").text(value);
                });
            },
        });
    });
}

$(document).ready(function () {
    // Call the dataTables jQuery plugin
    $("#portfolioTable").DataTable();
    $("#testimonialsTable").DataTable();
    $("#servicesTable").DataTable();
    $("#messagesTable").DataTable();
    $("#FAQsTable").DataTable();

    // call validation function
    // validation();
});

window.addEventListener("DOMContentLoaded", function (event) {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener("click", function (event) {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});
