function toggleModifyMovieList(event) {

    let selectedIndex = event.currentTarget.options.selectedIndex;
        
    if (event.currentTarget.options[selectedIndex].value == "movies") {
        document.getElementById("modify-comingSoonMovies").style.display = "none";
        document.getElementById("modify-nowShowingMovies").style.display = "block";
    }

    else if (event.currentTarget.options[selectedIndex].value == "comingSoon") {
        document.getElementById("modify-comingSoonMovies").style.display = "block";
        document.getElementById("modify-nowShowingMovies").style.display = "none";
    }

}