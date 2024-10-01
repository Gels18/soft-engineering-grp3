function updateCalendar() {
    const calendarElement = document.getElementById('calendar');
    const now = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = now.toLocaleDateString(undefined, options);
    calendarElement.textContent = formattedDate;
}

updateCalendar(); // Initial call to set the date immediately
