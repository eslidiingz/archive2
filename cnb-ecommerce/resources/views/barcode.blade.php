<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> Ler Barcode </title>
    </head>

    <body>
        <style>
            /* In order to place the tracking correctly */
            canvas.drawing,
            canvas.drawingBuffer {
                position: absolute;
                left: 0;
                top: 0;
            }
        </style>

        <div id="resultado"></div>
        <div id="camera" style="cursor: pointer">scan barcode</div>
        <div id="cancel" hidden style="cursor: pointer">Cancel</div>


        <script src="/js/quagga.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>


        <script type="application/javascript">
                var scannerIsRunning = false;


                $('#camera').on('click', function () {
                    barcode();
                    $('#cancel').removeAttr('hidden');
                });


                document.getElementById("cancel").addEventListener("click", function () {
                    if (scannerIsRunning) {
                        Quagga.stop();
                    } else {
                        barcode();
                    }
                }, false);



                function barcode() {
                    Quagga.init({
                                inputStream: {
                                    name: "Live",
                                    type: "LiveStream",
                                    target: document.querySelector('#camera'), // Or '#yourElement' (optional)
                                    constraints: {
                                        width: {max: 640},
                                        height: {max: 480},
                                        facingMode: "environment",
                                        aspectRatio: {min: 1,max: 2}
                                    }

                                },
                                locator: {
                                    patchSize: "medium",
                                    halfSample: true
                                },
                                numOfWorkers: 2,
                                frequency: 10,
                                decoder: {
                                    readers: [{
                                        format: "ean_reader",
                                        config: {}
                                    }]
                                },


                            locate: true,
                            lastResult : null
                        },
                        function (err) {
                            if (err) {
                                console.log(err);
                                return
                            }
                            // console.log("Initialization finished. Ready to start");
                            Quagga.start();
                        });

                Quagga.onProcessed(function (result) {
                    var drawingCtx = Quagga.canvas.ctx.overlay,
                        drawingCanvas = Quagga.canvas.dom.overlay;

                    if (result) {
                        if (result.boxes) {
                            drawingCtx.clearRect(0, 0, parseInt(drawingCanvas.getAttribute("width")),
                                parseInt(drawingCanvas.getAttribute("height")));
                            result.boxes.filter(function (box) {
                                return box !== result.box;
                            }).forEach(function (box) {
                                Quagga.ImageDebug.drawPath(box, {
                                    x: 0,
                                    y: 1
                                }, drawingCtx, {
                                    color: "green",
                                    lineWidth: 2
                                });
                            });
                        }

                        if (result.box) {
                            Quagga.ImageDebug.drawPath(result.box, {
                                x: 0,
                                y: 1
                            }, drawingCtx, {
                                color: "#00F",
                                lineWidth: 2
                            });
                        }

                        if (result.codeResult && result.codeResult.code) {
                            Quagga.ImageDebug.drawPath(result.line, {
                                x: 'x',
                                y: 'y'
                            }, drawingCtx, {
                                color: 'red',
                                lineWidth: 3
                            });
                        }
                    }
                });



                Quagga.onDetected(function (data) {
                    document.querySelector('#resultado').innerText = data.codeResult.code;

                    return scannerIsRunning = true;

                });
                }
        </script>



    </body>

</html>
