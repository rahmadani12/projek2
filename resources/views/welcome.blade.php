<!DOCTYPE html>
<html>
<head>

    <title>QR Generator</title>

    <link rel="icon" href="{{ asset('favicon.ico') }}?v=2">

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('style.css') }}">

</head>

<body>

<div class="container mt-5">

    <div class="row">

        <div class="col-md-6">

            <div class="card p-4 shadow">

                <h1>QR Code Generator</h1>

                <form action="/generate" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label>Tipe QR</label>

                        <select name="type" class="form-control">

                            <option value="text">
                                Text / URL
                            </option>

                            <option value="payment">
                                QR Payment
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Isi QR</label>

                        <input
                            type="text"
                            name="content"
                            class="form-control"
                            placeholder="Masukkan URL"
                            value="{{ old('content', $content ?? '') }}">
                            
                    </div>

                    <button class="btn btn-primary">
                        Generate QR
                    </button>

                </form>

            </div>

        </div>

        <div class="col-md-6">

            <div class="card p-4 shadow text-center">

                <h2>Hasil QR Code</h2>

                @isset($qr)

                    <div class="qr-box mt-3"  id="qr-container">

                        {!! $qr !!}

                    </div>

                    <div class="mt-4">
                        <button class="btn btn-success" onclick="downloadQR()">
                            Download QR
                        </button>

                @endisset

            <script>

                function downloadQR() {

                    let svg = document.querySelector("#qr-container svg");

                    let serializer = new XMLSerializer();

                    let source = serializer.serializeToString(svg);

                    let image = new Image();

                    image.src = 'data:image/svg+xml;charset=utf-8,' + encodeURIComponent(source);

                    image.onload = function () {

                        let canvas = document.createElement('canvas');

                        canvas.width = image.width;

                        canvas.height = image.height;

                        let context = canvas.getContext('2d');

                        context.fillStyle = "#ffffff";
                        context.fillRect(0, 0, canvas.width, canvas.height);

                        context.drawImage(image, 0, 0);

                        let a = document.createElement('a');

                        a.download = 'qrcode.png';

                        a.href = canvas.toDataURL('image/png');

                        a.click();

                    };

                    }

                </script>
            </div>

        </div>

    </div>

</div>

</body>
</html>