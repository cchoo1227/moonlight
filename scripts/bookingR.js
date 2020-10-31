let seats = document.getElementsByName("seats");

for (let i = 0; i < seats.length; i++) {
    seats[i].addEventListener("change", addSeats);
}

let ticketType = document.getElementById("ticketType");

ticketType.addEventListener("change", addTickets);

let submit = document.querySelector("button[type='submit']");

submit.addEventListener("click", checkForm);