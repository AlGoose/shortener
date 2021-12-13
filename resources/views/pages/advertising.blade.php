<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Shortener</title>

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100vw;
            height: 100vh;
        }

        .advertising-container {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Ready!')
            setTimeout(() => window.location.replace('<?= $source_link ?>'), 5000);
        });
    </script>
</head>

<body>
    <div class="advertising-container">
        <img src="<?= $picture_url ?>" alt="ads">
    </div>
</body>

</html>