function showAdditionalFields() {
    var role = document.getElementById('role').value;
    var studentFields = document.getElementById('studentFields');
    var teacherFields = document.getElementById('teacherFields');
    var container = document.querySelector('.container');
    var section = document.querySelector('section');
    
    container.style.height = "auto";
    section.style.minHeight = "400px";

    if (role == "1") {
        studentFields.classList.remove('hidden');
        teacherFields.classList.add('hidden');
        section.style.minHeight = "600px";
    } else if (role == "2") {
        teacherFields.classList.remove('hidden');
        studentFields.classList.add('hidden');
        section.style.minHeight = "600px";
    } else {
        studentFields.classList.add('hidden');
        teacherFields.classList.add('hidden');
        section.style.minHeight = "400px";
    }
}

document.querySelector("form").addEventListener("submit", function(event) {
    let isValid = true;

    const email = document.querySelector('input[name="email"]');
    const phone = document.querySelector('input[name="phone_number"]');
    const password = document.querySelector('input[name="password"]');

    clearErrorMessages();

    if (!validateEmail(email.value)) {
        showError(email, "Email tidak valid.");
        isValid = false;
    }

    if (!/^\d+$/.test(phone.value) && phone.value.trim() !== "") {
        showError(phone, "Nomor telepon hanya boleh berisi angka.");
        isValid = false;
    }

    if (!validatePassword(password.value)) {
        showError(password, "Password harus 8-12 karakter dengan kombinasi huruf besar, kecil, angka, dan karakter khusus.");
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePassword(password) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,12}$/;
    return passwordRegex.test(password);
}

function showError(inputElement, message) {
    const errorDiv = document.createElement("div");
    errorDiv.className = "error-message";
    errorDiv.style.color = "red";
    errorDiv.style.fontSize = "12px";
    errorDiv.textContent = message;
    inputElement.parentNode.insertBefore(errorDiv, inputElement.nextSibling);
}

function clearErrorMessages() {
    const errorMessages = document.querySelectorAll(".error-message");
    errorMessages.forEach(function(msg) {
        msg.remove();
    });
}