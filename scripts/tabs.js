function tabToggle(event) {

    let classList = event.currentTarget.classList;
    let tabType;

    //get tab type
    for (var i=0; i < classList.length; i++) {
        if (classList.item(i) == "active") {
            break;
        }
        else {
            tabType = classList.item(i);
        }
    }

    //set tabs to active/inactive
    let toggles = document.getElementsByClassName(tabType);
    for (var i = 0; i < toggles.length; i++) {

        if (toggles[i].id == event.currentTarget.id) {
            toggles[i].classList.add('active');
        }
        else {
            toggles[i].classList.remove('active');
        }
    }

    //show or hide tab items
    var tabItems = document.getElementsByClassName(tabType + "-tab");
    let activeTab = event.currentTarget.id + "-tab";

    for (var i = 0; i < tabItems.length; i++) {
        if (tabItems[i].id == activeTab) {
            tabItems[i].style.display = "flex";
        }
        else {
            tabItems[i].style.display = "none";
        }
    }
    
}
