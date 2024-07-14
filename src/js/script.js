document.addEventListener('DOMContentLoaded', function () {
    const modalOverlay = document.getElementById('modal-overlay');
    const openModalBtn = document.getElementById('open-modal');
    const closeModalBtn = document.getElementById('close-modal');
    const confirmActionBtn = document.getElementById('confirm-action');
    const sidebar = document.getElementById('application-sidebar-brand');

    openModalBtn.addEventListener('click', () => {
        modalOverlay.classList.remove('hidden');
        document.body.classList.add('no-scroll', 'disable-pointer-events');
        modalOverlay.classList.remove('disable-pointer-events');
        sidebar.classList.remove('z-[999]');
    });

    closeModalBtn.addEventListener('click', () => {
        modalOverlay.classList.add('hidden');
        document.body.classList.remove('no-scroll', 'disable-pointer-events');
        sidebar.classList.add('z-[999]');
    });

    modalOverlay.addEventListener('click', (e) => {
        if (e.target === modalOverlay) {
            modalOverlay.classList.add('hidden');
            document.body.classList.remove('no-scroll', 'disable-pointer-events');
            sidebar.classList.add('z-[999]');
        }
    });

    // confirmActionBtn.addEventListener('click', () => {
    //     // Add your confirmation action here
    //     modalOverlay.classList.add('hidden');
    //     document.body.classList.remove('no-scroll', 'disable-pointer-events');
    //     sidebar.classList.add('z-[999]');
    // });
});

document.addEventListener("DOMContentLoaded", function() {
    var forms = document.querySelectorAll("form[id^='siramanForm']");

    forms.forEach(function(form) {
        var submitButton = form.querySelector('button[type="submit"]');
        submitButton.addEventListener("click", function(event) {
            event.preventDefault(); // Prevent default form submission

            var formData = new FormData(form);
            
            // Get ID from URL action form
            var urlParams = new URLSearchParams(form.action.split('?')[1]);
            var id = urlParams.get('id');
            console.log("ID from URL:", id); // Debugging
            showAlert('BEHASIL DI SIRAM!!!');
            // Send form data to insert.php
            fetch(form.action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log("Success message:", data.success);

                    // Set timeout for update_status.php
                    setTimeout(function() {
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "../view/update_status.php", true);
                        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                console.log(xhr.responseText); // Display server response
                            }
                        };
                        xhr.send("id=" + encodeURIComponent(id));
                    }, 10000); // 10000 milliseconds = 10 seconds
                } else {
                    console.error("Error:", data.error);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
});

function showAlert(message) {
    console.log("showAlert called with message:", message); // Debugging

    var alertBox = document.createElement('div');
    alertBox.className = 'bg-teal-400 border text-sm text-teal-500 rounded-sm p-4 flex justify-between';
    alertBox.role = 'alert';
    alertBox.id = 'alert-box';

    var alertContent = `
        <div>
            <span class="font-bold">${message}</span>
        </div>
        <div>
            <button onclick="closeAlert()">
                <i class="ti ti-x"></i>
            </button>
        </div>
    `;

    alertBox.innerHTML = alertContent;

    // Append the alert to a specific element in the body
    var alertPlaceholder = document.getElementById('alert-placeholder');
    if (!alertPlaceholder) {
        alertPlaceholder = document.createElement('div');
        alertPlaceholder.id = 'alert-placeholder';
        document.body.appendChild(alertPlaceholder);
    }
    alertPlaceholder.appendChild(alertBox);

    setTimeout(closeAlert, 7000); // Auto-close after 5 seconds
}

function closeAlert() {
    var alertBox = document.getElementById('alert-box');
    if (alertBox) {
        alertBox.remove();
    }
}








