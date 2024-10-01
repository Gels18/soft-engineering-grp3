// Function to fetch user role and requirements status from the server
async function fetchUserRoleAndStatus() {
    try {
        const response = await fetch('/user/status');
        const data = await response.json();
        return data;
    } catch (error) {
        console.error('Error fetching user role and status:', error);
        return null;
    }
}

// Function to update the status in the table based on user role
async function updateTableStatus() {
    const data = await fetchUserRoleAndStatus();
    if (!data) return;

    const { role, status } = data;

    // Update status cells if the user is not an admin
    if (role !== 'admin') {
        document.querySelectorAll('tr[data-requirement]').forEach(row => {
            const requirement = row.getAttribute('data-requirement');
            const statusCell = row.querySelector('.status');
            statusCell.textContent = status[requirement] || 'Pending';
        });
    }
}

// Call the function to update the table status on page load
document.addEventListener('DOMContentLoaded', updateTableStatus);
