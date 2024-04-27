function toggleSeen(sr_no, value) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/message.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            if (xhr.responseText == 1) {
                console.log('Status toggled successfully.');
                get_message();
            } else {
                console.error('Failed to toggle status.');
            }
        } else {
            console.error('Failed to toggle status. Status code: ' + xhr.status);
        }
    };
    xhr.onerror = function() {
        console.error('Error toggling status.');
    };
    xhr.send('toggleSeen=' + sr_no + '&value=' + value);
}

function get_message() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/message.php", true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            let messageElement = document.getElementById("message");
            if (messageElement) {
                messageElement.innerHTML = xhr.responseText;
                console.log("Messages retrieved successfully.");
            } else {
                console.error("Element with id 'message' not found.");
            }
        } else {
            console.error("Failed to retrieve messages. Status code: " + xhr.status);
        }
    };
    xhr.onerror = function() {
        console.error("Error fetching messages.");
    };
    xhr.send('get_message');
}
