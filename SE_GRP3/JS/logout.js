document.addEventListener('DOMContentLoaded', function() {
    const logoutBtn = document.getElementById('logout-btn');
    const logoutModal = document.getElementById('logout-modal');
    const confirmLogoutBtn = document.getElementById('confirm-logout');
    const cancelLogoutBtn = document.getElementById('cancel-logout');

    logoutBtn.addEventListener('click', function() {
        logoutModal.style.display = 'block';
    });

    confirmLogoutBtn.addEventListener('click', function() {
        window.location.href = 'login.php';
    });

    cancelLogoutBtn.addEventListener('click', function() {
        logoutModal.style.display = 'none';
    });

    // Close the modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === logoutModal) {
            logoutModal.style.display = 'none';
        }
    });
});
