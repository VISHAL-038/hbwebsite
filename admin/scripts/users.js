
function get_users() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        document.getElementById("users-data").innerHTML = this.responseText;
    }
    xhr.send('get_users');
}

// function toggleStatus(id, value) {
//     let xhr = new XMLHttpRequest();
//     xhr.open("POST", "ajax/rooms.php", true);
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

//     xhr.onload = function() {
//         if (this.response == 1) {
//             alert('success', 'status toggled');
//             get_all_rooms();
//         } else {
//             alert('error', 'not toggled');
//         }
//     }
//     xhr.send('toggleStatus=' + id + '&value=' + value);
// }


// function remove_room(room_id) {
//     if (confirm('Are you sure you want to delete the room?')) {
//         let data = new FormData();
//         data.append('room_id', room_id);
//         data.append('remove_room', '');
//         let xhr = new XMLHttpRequest();
//         xhr.open("POST", "ajax/rooms.php", true);

//         xhr.onload = function() {
//             if (this.responseText == 1) {
//                 alert('success', 'Room removed!');
//                 get_all_rooms();
//             } else {
//                 alert('error', 'room  not removed');
//             }
//         }
//         xhr.send(data);
//     }
// }



window.onload = function() {
    get_users();
}
