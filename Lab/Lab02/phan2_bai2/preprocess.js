const buttons = document.querySelectorAll('.btn');

buttons.forEach((button) => {
    button.addEventListener('click', () => {
        const value = button.textContent.trim();

        fetch('logic.php', {
            method: 'POST', 
            headers: {
                'Content-type': 'application/json'
            }, 
            body: JSON.stringify({
                value: value
            })
        });
    });
});