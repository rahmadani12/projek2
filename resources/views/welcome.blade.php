<!DOCTYPE html>
<html>
<head>

    <title>QR Generator</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body style="background:#f5f5f5;">

<div class="container mt-5">

    <div class="row">

        <div class="col-md-6">

            <div class="card p-4 shadow">

                <h1>QR Code Generator</h1>

                <form action="/generate" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label>Isi QR</label>

                        <input
                            type="text"
                            name="content"
                            class="form-control"
                            placeholder="Masukkan URL">

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

                    <div class="mt-3">
                        {!! $qr !!}
                    </div>

                @endisset

            </div>

        </div>

    </div>

</div>

</body>
</html>