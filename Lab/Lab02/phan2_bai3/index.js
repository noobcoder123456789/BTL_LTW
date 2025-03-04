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
            $('label[for="last-name"]').css({
                "color": "grey"
            });
        }
    });

    $("#email").on("blur", function() {        
        if($("#email").val() === "") {
            $("#email").addClass("is-invalid");
            $('label[for="email"]').css({
                "color": "red"
            });
        } else {            
            $("#email").removeClass("is-invalid");
            $('label[for="email"]').css({
                "color": "grey"
            });
        }
    });

    $("#password").on("blur", function() {        
        if($("#password").val() === "") {
            $("#password").addClass("is-invalid");
            $('label[for="password"]').css({
                "color": "red"
            });
        } else {            
            $("#password").removeClass("is-invalid");
            $('label[for="password"]').css({
                "color": "grey"
            });
        }
    });

    $("#confirm-password").on("blur", function() {        
        if($("#confirm-password").val() === "") {
            $("#confirm-password").addClass("is-invalid");
            $('label[for="confirm-password"]').css({
                "color": "red"
            });
        } else {            
            $("#confirm-password").removeClass("is-invalid");
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
            $('label[for="about"]').css({
                "color": "grey"
            });
        }
    });
});