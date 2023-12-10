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
