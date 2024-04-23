const adminBtn = document.querySelector("li a input");
const adminLogin = document.querySelector("#adminLogin");
const gradasi = document.querySelector("#gradasi");
// const luarAdminLogin = document.querySelectorAll("!:(#adminLogin)");
const luarAdminLogin = !adminLogin.contains;
adminBtn.addEventListener("click", function (e) {
    if (adminBtn.checked == true) {
        adminLogin.classList.remove("hidden");
        gradasi.classList.remove("hidden");

        // luarAdminLogin.addEventListener("click", function () {
        //     adminBtn.checked == false;
        // });
    }
    if (adminBtn.checked == false) {
        adminLogin.classList.add("hidden");
        gradasi.classList.add("hidden");
    }
});

gradasi.addEventListener("click", function () {
    gradasi.classList.add("hidden");
    adminLogin.classList.add("hidden");
    adminBtn.checked = false;
});
