@extends('layout.layout')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('content')
    <div class="container">
        <canvas id="averageNoteChart" width="300" height="150"></canvas>
        <div class="container">
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
            <div style="width: 1000px; height: 500px;">
                <canvas id="tagsChart" width="500" height="250"></canvas>
            </div>
            <script>
                // Ensure Chart is available before creating the chart
                if (typeof Chart !== 'undefined') {
                    const tagsChart = new Chart(document.getElementById('tagsChart'), {
                        type: 'pie', // Use 'pie' for a pie chart
                        data: {
                            labels: {!! json_encode($tags->pluck('name')) !!},
                            datasets: [{
                                data: {!! json_encode($tagCounts) !!},
                                backgroundColor: {!! json_encode($tags->pluck('color')) !!}, // Include tag colors here
                                borderColor: 'rgba(255, 255, 255, 0.2)',
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
        </div>
    </div>
@endsection
