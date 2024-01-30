<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/dynamsoft-javascript-barcode@7.3.0-v0/dist/dbr.js"
        data-productKeys="t0068NQAAAAYe5rtv/EEICK+bjDKnHsSZi4eRCBF7rQoo4BhbwBvsLTRt1TobT/J1jN00GtxRIdWW9OLEX3k889MgSuF1n5k=">
    </script>
    <script>
        let scanner = null;
            (async()=>{
                scanner = await Dynamsoft.BarcodeScanner.createInstance();

                let settings = await scanner.getRuntimeSettings();
                /*
                 * 1 means true
                 * Using a percentage is easier
                 * The following code ignores 25% to each side of the video stream
                 */
                settings.region.regionMeasuredByPercentage = 1;
                settings.region.regionLeft = 25;
                settings.region.regionTop = 25;
                settings.region.regionRight = 75;
                settings.region.regionBottom = 75;
                await scanner.updateRuntimeSettings(settings);

                scanner.onFrameRead = results => {console.log(results);};
                scanner.onUnduplicatedRead = (txt, result) => {alert(txt);};
                await scanner.show();
            })();
    </script>
</body>
</html>
