<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.3/html2canvas.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Div as JPG</title>
</head>
<body>
    <div id="downloadableDiv">
        <!-- Your content goes here -->
        <p>This is the content of the div you want to download as JPG.</p>
    </div>
    <button id="downloadButton">Download as JPG</button>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const downloadButton = document.getElementById('downloadButton');
    const downloadableDiv = document.getElementById('downloadableDiv');

    downloadButton.addEventListener('click', function () {
        html2canvas(downloadableDiv, { 
            useCORS: true, 
            allowTaint: true 
        }).then(function(canvas) {
            const imgData = canvas.toDataURL('image/jpeg');
            
            // Create a temporary link element
            const a = document.createElement('a');
            a.href = imgData;
            a.download = 'div_as_jpg.jpg';
            
            // Trigger a simulated click to initiate the download
            a.click();
        });
    });
});

</script>
</body>
</html>
