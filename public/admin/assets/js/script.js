const sidebarToggle = document.querySelector("#sidebar-toggle");
sidebarToggle.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("collapsed")
})
// theme
document.querySelector(".theme-toggle").addEventListener("click",() => {
toggleLocalStorage();
toggleRootClass();
});
function toggleRootClass() {
    const current = document.documentElement.getAttribute('data-bs-theme');
    const inverted = current == 'dark' ? 'light' : 'dark';
    document.documentElement.setAttribute('data-bs-theme',inverted);
}
function toggleLocalStorage() {
    if(isLight()){
        localStorage.removeItem('light');
    }else{
        localStorage.setItem('light','set');
    }
}
function isLight(){
    return localStorage.getItem('light');
}
if(isLight()){
    toggleRootClass();
}
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

$(document).ready( function () {
    $('#myTable').DataTable({
        columnDefs: [{
            "defaultContent": "",
            "targets": "_all"
        }],
        bLengthChange: true,
        lengthMenu: [[10, 20, -1], [10, 50, "All"]],
        bFilter: true,
        bSort: true,
        bPaginate: true
    });
    read();
} );

function read() {
  $.ajax({
    type: "post",
    url: "http://localhost/e-commerce/admin/ajax/neworder.php",
    data: {
      noti: 1,
    },
    success: function (res) {
        if (res >= 1) {
            $("#order").html(`
              <span class="badge text-bg-info rounded-circle p-2 ms-5">
                <span class="visually-hidden neworder"></span>
              </span>
            `);
            $(".order").html('<span class="badge text-bg-primary rounded-circle ms-2">'+res+'</span>');
          }
    },
  });
}