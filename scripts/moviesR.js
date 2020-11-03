let nowShowingToggle = document.getElementById("now-showing");
let comingSoonToggle = document.getElementById("coming-soon");

nowShowingToggle.addEventListener("click", tabToggle, false);
comingSoonToggle.addEventListener("click", tabToggle, false);

let tabItems = document.getElementsByClassName("movie-tab");

for (let i=1; i < tabItems.length; i++) {
    tabItems[i].style.display = "none";
}
