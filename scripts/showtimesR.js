let dateTabs = document.getElementsByClassName('date');

for (let i=0; i < dateTabs.length; i++) {
    dateTabs[i].addEventListener("click", tabToggle, false);
}

let tabItems = document.getElementsByClassName("date-tab");

for (let i=1; i < tabItems.length; i++) {
    tabItems[i].style.display = "none";
}
