const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

let tempDiv = document.querySelector('#date-birth');
let tempContent = `<option value="d" style="color: grey;">Day</option>`;
for(let i = 1; i <= 31; i++) {
    tempContent += `<option value="${i}">${i}</option>`;
}
tempDiv.innerHTML = tempContent;

tempDiv = document.querySelector('#year-birth');
tempContent = `<option value="y" style="color: grey;">Year</option>`;
for(let i = 2025; i >= 1900; i --) {
    tempContent += `<option value="${i}">${i}</option>`;
}
tempDiv.innerHTML = tempContent;

function isValidDate(year, month, day) {
    var date = new Date(year, month - 1, day);
    return (
        date.getFullYear() == year &&
        date.getMonth() + 1 == month &&
        date.getDate() == day
    );
}

function birthdateCheck() {
    if(
        $("#month-birth").val() === "m" || 
        $("#date-birth").val() === "d" || 
        $("#year-birth").val() === "y" || 
        !isValidDate($("#year-birth").val(), $("#month-birth").val(), $("#date-birth").val())
    ) {
        $("#month-birth").addClass("is-invalid");
        $("#month-birth").removeClass("is-valid");
        $('label[for="month-birth"]').css({
            "color": "red"
        });

        $("#date-birth").addClass("is-invalid");
        $("#date-birth").removeClass("is-valid");
        $('label[for="date-birth"]').css({
            "color": "red"
        });

        $("#year-birth").addClass("is-invalid");
        $("#year-birth").removeClass("is-valid");
        $('label[for="year-birth"]').css({
            "color": "red"
        });
    } else {            
        $("#month-birth").removeClass("is-invalid");
        $("#month-birth").addClass("is-valid");
        $('label[for="month-birth"]').css({
            "color": "grey"
        });

        $("#date-birth").removeClass("is-invalid");
        $("#date-birth").addClass("is-valid");
        $('label[for="date-birth"]').css({
            "color": "grey"
        });

        $("#year-birth").removeClass("is-invalid");
        $("#year-birth").addClass("is-valid");
        $('label[for="year-birth"]').css({
            "color": "grey"
        });
    }
}

function reset() {
    $("#first-name").val("");
    $("#last-name").val("");
    $("#month-birth").val("m");
    $("#date-birth").val("d");
    $("#year-birth").val("y");
    $("#email").val("");
    $("#password").val("");
    $("#confirm-password").val("");
    $("#about").val("");

    $("#month-birth").removeClass("is-invalid");
    $("#month-birth").removeClass("is-valid");
    $('label[for="month-birth"]').css({
        "color": "grey"
    });

    $("#date-birth").removeClass("is-invalid");
    $("#date-birth").removeClass("is-valid");
    $('label[for="date-birth"]').css({
        "color": "grey"
    });

    $("#year-birth").removeClass("is-invalid");
    $("#year-birth").removeClass("is-valid");
    $('label[for="year-birth"]').css({
        "color": "grey"
    });

    $("#first-name").removeClass("is-invalid");
    $("#first-name").removeClass("is-valid");
    $('label[for="first-name"]').css({
        "color": "grey"
    });

    $("#last-name").removeClass("is-invalid");
    $("#last-name").removeClass("is-valid");
    $('label[for="last-name"]').css({
        "color": "grey"
    });

    $("#email").removeClass("is-invalid");
    $("#email").removeClass("is-valid");
    $('label[for="email"]').css({
        "color": "grey"
    });

    $("#password").removeClass("is-invalid");
    $("#password").removeClass("is-valid");
    $('label[for="password"]').css({
        "color": "grey"
    });

    $("#confirm-password").removeClass("is-invalid");
    $("#confirm-password").removeClass("is-valid");
    $('label[for="confirm-password"]').css({
        "color": "grey"
    });

    $("#about").removeClass("is-invalid");
    $("#about").removeClass("is-valid");
    $('label[for="about"]').css({
        "color": "grey"
    });
}

function isValidEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}

function checkComplete() {    
    var inputs = document.querySelectorAll('input');
        
    for (var i = 0; i < inputs.length; i++) {        
        if (inputs[i].value.trim() === '') {
            alert("Please enter complete and correct data!");
            return;
        }                
    }
        
    alert("Complete!");
}

$(document).ready(function() {
    $('#male').prop('checked', true);

    $("#first-name").on("blur", function() {
        if($("#first-name").val() === "") {
            $("#first-name").addClass("is-invalid");
            $('label[for="first-name"]').css({
                "color": "red"
            });
        } else {
            $("#first-name").removeClass("is-invalid");
            $("#first-name").addClass("is-valid");
            $('label[for="first-name"]').css({
                "color": "grey"
            });
        }
    });

    $("#last-name").on("blur", function() {
        if($("#last-name").val() === "") {
            $("#last-name").addClass("is-invalid");
            $('label[for="last-name"]').css({
                "color": "red"
            });
        } else {            
            $("#last-name").removeClass("is-invalid");
            $("#last-name").addClass("is-valid");
            $('label[for="last-name"]').css({
                "color": "grey"
            });
        }
    });

    $("#month-birth").on("blur", birthdateCheck);
    $("#date-birth").on("blur", birthdateCheck);
    $("#year-birth").on("blur", birthdateCheck);

    $("#email").on("blur", function() {
        if(!isValidEmail($("#email").val())) {
            $("#email").addClass("is-invalid");
            $('label[for="email"]').css({
                "color": "red"
            });
        } else {            
            $("#email").removeClass("is-invalid");
            $("#email").addClass("is-valid");
            $('label[for="email"]').css({
                "color": "grey"
            });
        }
    });

    $("#password").on("blur", function() {
        if($("#password").val().length < 8) {
            $("#password").addClass("is-invalid");
            $('label[for="password"]').css({
                "color": "red"
            });
        } else {            
            $("#password").removeClass("is-invalid");
            $("#password").addClass("is-valid");
            $('label[for="password"]').css({
                "color": "grey"
            });
        }
    });

    $("#confirm-password").on("blur", function() {
        if($("#confirm-password").val().length < 8) {
            $("#confirm-password").addClass("is-invalid");
            $('label[for="confirm-password"]').css({
                "color": "red"
            });
        } if($("#confirm-password").val() != $("#password").val()) {
            $("#confirm-password").addClass("is-invalid");
            $('#invalid-confirm-password span').text('Not same with above password.');
        } else {            
            $("#confirm-password").removeClass("is-invalid");
            $("#confirm-password").addClass("is-valid");
            $('label[for="confirm-password"]').css({
                "color": "grey"
            });
        }
    });

    $("#about").on("blur", function() {
        if($("#about").val() === "") {
            $("#about").addClass("is-invalid");
            $('label[for="about"]').css({
                "color": "red"
            });
        } else {            
            $("#about").removeClass("is-invalid");
            $("#about").addClass("is-valid");
            $('label[for="about"]').css({
                "color": "grey"
            });
        }
    });

    $("#reset-button").click(reset);
    $("#submit-button").click(checkComplete);
});