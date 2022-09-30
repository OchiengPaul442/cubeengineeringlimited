/*!
 * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2022 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
//
// Scripts
//

$(document).ready(function () {
    // Call the dataTables jQuery plugin
    $("#portfolioTable").DataTable();
    $("#testimonialsTable").DataTable();
    $("#servicesTable").DataTable();
    $("#messagesTable").DataTable();
    $("#FAQsTable").DataTable();

    // hide notifications after 2s
    setTimeout(function () {
        $('#notification_message').hide(200);
    }, 2500);
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
