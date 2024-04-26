(function() {
    function toggleSeen(sr_no, seen) {
        let newSeen = seen == 0 ? 1 : 0;
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/update_seen.php", true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                let button = document.querySelector(`.seen-button[data-sr_no='${sr_no}']`);
                if (button) {
                    button.innerText = newSeen == 0 ? 'Mark as Seen' : 'Mark as Unseen';
                    button.classList.remove(newSeen == 0 ? 'btn-success' : 'btn-danger');
                    button.classList.add(newSeen == 0 ? 'btn-danger' : 'btn-success');
                    button.dataset.seen = newSeen;
                } else {
                    console.error("Button not found.");
                }
            } else {
                console.error("Failed to update 'seen' value. Status code: " + xhr.status);
                console.error(xhr.responseText);
            }
        };
        xhr.onerror = function() {
            console.error("Error updating 'seen' value.");
        };
        xhr.send(`sr_no=${sr_no}&seen=${newSeen}`);
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
                    console.log(xhr.responseText);
                } else {
                    console.error("Element with id 'message' not found.");
                }
            } else {
                console.error("Failed to retrieve messages.");
            }
        };
        xhr.onerror = function() {
            console.error("Error fetching messages.");
        };
        xhr.send('get_message');
    }

    window.get_message = get_message;
    window.toggleSeen = toggleSeen;

    // Initial call to get_message
    get_message();
})();
