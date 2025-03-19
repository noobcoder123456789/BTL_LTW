const expressionInput = document.querySelector('input[name="expression"]');
const curValInput = document.querySelector('input[name="curVal"]');
const buttons = document.querySelectorAll('button:not([value="="])');

buttons.forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
    
        if (button.textContent.trim() === "AC") {
            expressionInput.value = "";
            curValInput.value = "";
        } else {
            let btnValue = button.getAttribute('value') || button.textContent.trim();
            expressionInput.value += btnValue == "**" || btnValue == "**(-1)" ? "^" : btnValue;
        }
    });
});

document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('logic.php', {
        method: "POST",
        body: formData
    }).then(res => res.text()).then(res => {
        document.querySelector('input[name="curVal"]').value = res;
    }).catch(err => console.log('Error: ', err));
});

document.addEventListener('keydown', (event) => {
    let key = event.key;
    
    if (key === '*') {
        key = 'x';
    } else if (key === 'Enter') {
        key = '=';
    } else if (key === 'Escape') {
        key = 'AC';
    }
    
    const button = Array.from(document.querySelectorAll('.btn')).find(btn => btn.textContent.trim() === key);
    if (button) {
        button.click();
    }
});