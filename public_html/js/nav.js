var sidebar = document.querySelector(".sidebar");
var burger = document.querySelector(".burger");

burger.addEventListener("click", () =>{
    sidebar.classList.toggle("hidden");
})

window.addEventListener("resize", () =>{
    if(window.innerWidth >= 700){
        sidebar.classList.add("hidden");
    }
})