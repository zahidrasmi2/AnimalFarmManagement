<!DOCTYPE html>

<html>
    <head>
        <title>How to Generate QR Code in Laravel 8?</title>
    </head>

    <body>

        <div class="visible-print text-center">
            <h1>Laravel 8 - QR Code Generator Example</h1>

            {!! QrCode::size(250)->generate('getURL()'); !!}

            <p>example by ItSolutionStuf.com.</p>


        </div>
    </body>
</html>
