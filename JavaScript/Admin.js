const Titulos_Menu_Admin = document.querySelectorAll(".Titulos_Menu_Admin");

Titulos_Menu_Admin.forEach(Titulos_Menu_Admin =>{
    Titulos_Menu_Admin.addEventListener("click", event =>{
            Titulos_Menu_Admin.classList.toggle("active");
    });
});