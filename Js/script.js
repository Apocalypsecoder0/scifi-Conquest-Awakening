document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            let valid = true;
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    valid = false;
                    input.classList.add('error');
                } else {
                    input.classList.remove('error');
                }
            });
            if (!valid) {
                event.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    });

    // Show/Hide elements
    const toggles = document.querySelectorAll('.toggle');
    toggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const target = document.querySelector(this.dataset.target);
            if (target) {
                target.classList.toggle('hidden');
            }
        });
    });

    // AJAX requests
    function sendAjaxRequest(url, data, callback) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                callback(JSON.parse(xhr.responseText));
            }
        };
        xhr.send(data);
    }

    // Example usage of AJAX request
    const exampleButton = document.getElementById('exampleButton');
    if (exampleButton) {
        exampleButton.addEventListener('click', function() {
            const data = 'key=value&anotherKey=anotherValue';
            sendAjaxRequest('exampleEndpoint.php', data, function(response) {
                console.log('Server Response:', response);
                alert('Server Response: ' + response.message);
            });
        });
    }
});
