
// References to selects
const daySelect = document.getElementById('day');
const monthSelect = document.getElementById('month');
const yearSelect = document.getElementById('year');

// Function to get number of days in a month
function getDaysInMonth(year, month) {
    return new Date(year, month, 0).getDate(); // month is 1-based for user, but 0-based in Date()
}

// Function to populate day dropdown
function populateDays(year, month) {
    // Clear current options
    daySelect.innerHTML = '';

    if (!year || !month) return;

    const daysInMonth = getDaysInMonth(year, month);
    for (let i = 1; i <= daysInMonth; i++) {
        const option = document.createElement('option');
        option.value = i < 10 ? '0' + i : i;
        option.textContent = i;
        daySelect.appendChild(option);
    }
}

// Populate year dropdown
const currentYear = new Date().getFullYear();
for (let i = currentYear; i >= 1900; i--) {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    yearSelect.appendChild(option);
}

// Populate initial day dropdown (with defaults if needed)
populateDays(yearSelect.value, monthSelect.value);

// Update days when month or year changes
monthSelect.addEventListener('change', () => {
    populateDays(yearSelect.value, monthSelect.value);
});
yearSelect.addEventListener('change', () => {
    populateDays(yearSelect.value, monthSelect.value);
});

// Toggle password visibility logic
document.addEventListener("DOMContentLoaded", function () {
    function togglePassword(inputId, toggleId) {
        const passwordField = document.getElementById(inputId);
        const toggleButton = document.getElementById(toggleId);

        if (passwordField && toggleButton) {
            toggleButton.addEventListener("click", function () {
                passwordField.type = passwordField.type === "password" ? "text" : "password";
                toggleButton.classList.toggle("fa-eye");
                toggleButton.classList.toggle("fa-eye-slash");
            });
        }
    }

    togglePassword("password", "togglePassword");
    togglePassword("confirmPassword", "toggleConfirmPassword");
});


/*
// Populate the day dropdown
const daySelect = document.getElementById('day');
for (let i = 1; i <= 31; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    daySelect.appendChild(option);
}

//Populate the year dropdown
const yearSelect = document.getElementById('year');
const currentYear = new Date().getFullYear();
for (let i = currentYear; i >= 1900; i--) {
    const option = document.createElement('option');
    option.value = i;
    option.textContent = i;
    yearSelect.appendChild(option);
}

document.addEventListener("DOMContentLoaded", function () {
    function togglePassword(inputId, toggleId) {
        const passwordField = document.getElementById(inputId);
        const toggleButton = document.getElementById(toggleId);

        if (passwordField && toggleButton) {
            toggleButton.addEventListener("click", function () {
                passwordField.type = passwordField.type === "password" ? "text" : "password";
                toggleButton.classList.toggle("fa-eye");
                toggleButton.classList.toggle("fa-eye-slash");
            });
        }
    }

    togglePassword("password", "togglePassword");
    togglePassword("confirmPassword", "toggleConfirmPassword");
});
*/