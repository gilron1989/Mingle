function logPass() {
    var x = document.getElementById("loginPass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showPass() {
    var x = document.getElementById("signupPass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function register() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("error").innerHTML = request.responseText;
        }
    }

    var data = JSON.stringify({
        email: document.getElementById("email").value,
        firstName: document.getElementById("fname").value,
        lastName: document.getElementById("lname").value,
        password: document.getElementById("psw").value
    });
    request.open("POST", "register.php", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(data)

}

function getZoom(e) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
        }
    }

    var data = JSON.stringify({
        subject: e.dataset.id
    });
    request.open("POST", "https://hook.integromat.com/xxhat5oi54lh8nqntr1wq6vjtcpxl50j", true);
    request.setRequestHeader('Content-type', 'application/json');
    request.send(data)
}

var x = document.querySelectorAll('.grid-item');

window.onload = () => {
    x.forEach(pointer => {
        checkStatus(pointer)
    })
}


function checkStatus(e){
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            updateStatus(response)
        }
    }
    var data = e.dataset.id
    console.log(data)
    request.open("POST", "https://hook.integromat.com/xxhat5oi54lh8nqntr1wq6vjtcpxl50j", true);
    request.setRequestHeader('Content-type', 'application/json');
    request.send(data)
}

function updateStatus(e){
    var res = new XMLHttpRequest();
    res.onreadystatechange = function() {
    if (res.readyState == 4 && res.status == 200) {
    }}
    // var temp = JSON.parse(e)
    // var statusCheck = JSON.stringify({
    //     status: temp['status'],
    //     meetingId: temp['meetingID']
    // });

    res.open("POST", "subject2.php", true);
    res.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    res.send(e)
  
}


function openRoom(e) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var res = new XMLHttpRequest();
            var content = request.responseText;
            var url = request.responseText.substring(0,content.indexOf(','));
            var meetingID = request.responseText.substring(content.indexOf(',')+1);
            var temp = JSON.parse(data)
            console.log(temp['subject'])
            var res2 = JSON.stringify({
                url: url,
                meetingID: meetingID,
                subject: temp['subject']
            });
            res.open("POST", "subject.php", true);
            res.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            res.send(res2)
        }
    }

    var data = JSON.stringify({
        subject: e.dataset.subject
    });
    request.open("POST", "https://hook.integromat.com/rnvzpg3tmppwpofiq0js5vlhf9o1apf2", true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(data)
}




