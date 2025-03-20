<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>QR Code Scanner</title>
        <script src="https://unpkg.com/html5-qrcode"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </head>
    <body>
        <h1>Scan QR Code</h1>
        <div id="reader" style="width: 500px"></div>
        <p>Result: <span id="result"></span></p>

        <!-- Tambahkan elemen audio -->
        <audio
            id="successSound"
            src="https://www.soundjay.com/buttons/sounds/button-1.mp3"
            
        ></audio>

        <script>
            function onScanSuccess(decodedText, decodedResult) {
                document.getElementById("result").textContent = decodedText;

                const successSound = document.getElementById('successSound');
                successSound.play();
    
                // Handle on success condition with the decoded text or result.
                console.log(`Scan result: ${decodedText}`, decodedResult);
            }

            function onScanError(errorMessage) {
                // handle on error condition, with error message
            }

            var html5QrcodeScanner = new Html5QrcodeScanner("reader", {
                fps: 10,
                qrbox: 250,
            });
            html5QrcodeScanner.render(onScanSuccess, onScanError);
        </script>
    </body>
</html>
