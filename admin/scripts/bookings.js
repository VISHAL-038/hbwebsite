function get_bookings() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/booking.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            document.getElementById("booking-data").innerHTML = this.responseText;
        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };

    xhr.onerror = function() {
        console.error("An error occurred during the request.");
    };

    xhr.send('get_bookings=1');
}

get_bookings();
