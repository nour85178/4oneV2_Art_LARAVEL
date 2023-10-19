<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Bidding</title>
    <link rel="stylesheet" href="css/bids.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
</head>
<body>
<button id="participateButton">Participate in Bid</button>
<div id="popup" class="hidden">
    <div id="character"></div>
    <div id="bidForm">
        <input type="number" id="bidAmount" placeholder="Your Bid Amount">
        <button id="submitBidButton">Submit Bid</button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const participateButton = document.getElementById('participateButton');
        const popup = document.getElementById('popup');
        const character = document.getElementById('character');
        const bidAmountInput = document.getElementById('bidAmount');
        const submitBidButton = document.getElementById('submitBidButton');

        // Event listener for the "Participate in Bid" button
        participateButton.addEventListener('click', function () {
            // Show the popup
            popup.classList.remove('hidden');
        });

        // Event listener for the "Submit Bid" button
        submitBidButton.addEventListener('click', function () {
            const bidAmount = bidAmountInput.value;
            // Handle the bid (you can send it to the server here)
            // Perform animations or other actions
            // Close the popup if needed
            popup.classList.add('hidden');
        });
    });
</script>



</body>
</html>
