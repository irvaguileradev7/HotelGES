let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");
const overlay = document.getElementById("overlay");

btn.onclick = function () {
    sidebar.classList.toggle("active");
};

overlay.addEventListener("click", () => {
    if (sidebar.classList.contains("active")) {
        sidebar.classList.remove("active");
    }
});

const darkModeToggle = document.getElementById("darkModeToggle");
const body = document.body;

// Función para activar o desactivar el modo oscuro
function toggleDarkMode() {
    body.classList.toggle("dark-mode");
    const isDarkMode = body.classList.contains("dark-mode");
    // Guardar el estado del modo oscuro en localStorage
    localStorage.setItem("darkMode", isDarkMode);
}

darkModeToggle.addEventListener("click", toggleDarkMode);

document.addEventListener("DOMContentLoaded", function () {
    // Verificar el estado almacenado en localStorage al cargar la página, sesion para
    //Dark mode
    const isDarkMode = localStorage.getItem("darkMode") === "true";

    if (isDarkMode) {
        body.classList.add("dark-mode");
    } else {
        body.classList.remove("dark-mode");
    }

});

document.addEventListener("DOMContentLoaded", function () {
    const elementoContenido = document.querySelector(".main-content");
    elementoContenido.classList.add("mostrar");
});
