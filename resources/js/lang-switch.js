// Add a click event listener to language links
$(document).on('click', '.lang-switch', function(e) {
    e.preventDefault();

    // Get the selected language from the data attribute
    const selectedLang = $(this).data('lang');

    // Send an AJAX request to update the language
    $.ajax({
        url: '/change-language', // Create a route for changing the language
        method: 'POST',
        data: { lang: selectedLang },
        success: function(response) {
            // Reload the page or update the UI as needed
            location.reload(); // Reload the page to reflect the new language
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
