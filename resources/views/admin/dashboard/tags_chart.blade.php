<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="tagsChart" width="400" height="200"></canvas>

<script>
    // Ensure Chart is available before creating the chart
    if (typeof Chart !== 'undefined') {
        const tagsChart = new Chart(document.getElementById('tagsChart'), {
            type: 'pie', // Use 'pie' for a pie chart
            data: {
                labels: {!! json_encode($tags->pluck('name')) !!},
                datasets: [{
                    data: {!! json_encode($tagCounts) !!},
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        // Add more colors as needed
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 205, 86, 1)',
                        // Add more colors as needed
                    ],
                    borderWidth: 1,
                }]
            },
            options: {
                // You can customize the options for your pie chart here
            }
        });
    } else {
        console.error('Chart.js is not defined. Make sure it is properly included.');
    }
</script>
