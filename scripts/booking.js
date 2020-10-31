function addSeats(event) {

    let selectedSeats = document.querySelectorAll("input[name='seats']:checked");
    let printSeats = "";

    if (selectedSeats.length > 5) {
        alert("Only 5 seats allowed!");
        event.currentTarget.checked = false;
    }

    else {

        for (let i = 0; i < selectedSeats.length; i++) {
            printSeats += selectedSeats[i].id + " ";
    }
    
    document.getElementById("printedSeats").innerHTML = printSeats;

    if (document.getElementById("ticketType").selectedIndex == 0) { 

        document.getElementById("totalCost").innerHTML = "$" + (10*selectedSeats.length).toFixed(2);

    }

    else if (document.getElementById("ticketType").selectedIndex == 1) {

        document.getElementById("totalCost").innerHTML = "$" + (6*selectedSeats.length).toFixed(2);

    }

    else {
        document.getElementById("totalCost").innerHTML = "-";
    }

    }

}

function addTickets(event) {

    let selectedIndex = event.currentTarget.options.selectedIndex;

    let selectedSeatsNo = document.querySelectorAll("input[name='seats']:checked").length;

    if (event.currentTarget.options[selectedIndex].value == "adult") { 

        document.getElementById("totalCost").innerHTML = "$" + (10*selectedSeatsNo).toFixed(2);

    }

    else if (event.currentTarget.options[selectedIndex].value == "student") {

        document.getElementById("totalCost").innerHTML = "$" + (6*selectedSeatsNo).toFixed(2);

    }

    else {
        document.getElementById("totalCost").innerHTML = "-";
    }


}

function checkForm(event) {

    let selectedSeatsNo = document.querySelectorAll("input[name='seats']:checked").length;

    if (selectedSeatsNo < 1) {
        event.preventDefault();
        alert('Please select at least one seat!');
        return false;
    }

}