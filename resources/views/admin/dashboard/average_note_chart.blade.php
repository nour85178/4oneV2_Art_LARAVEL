<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="averageNoteChart" width="400" height="200"></canvas>

<script>
    const productData = @json($products);

    const productNames = productData.map(product => product.titre); // Assuming you have a 'name' attribute in the Product model
    const averageNotes = productData.map(product => product.review ? (product.review[0] ? product.review[0].average_note : 0) : 0);

    const averageNoteChart = new Chart(document.getElementById('averageNoteChart'), {
        type: 'bar',
        data: {
            labels: productNames,
            datasets: [{
                label: 'Average Note by Product',
                data: averageNotes,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    });
</script>
