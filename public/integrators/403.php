<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forbidden - Origami</title>
    <link rel="stylesheet" href="../origami/zen.css">
    <link rel="stylesheet" href="../origami/error.css">
</head>

<body class="text-center">
<a href='/' class="logo width-large">
</a>

<img class="banner" src="../origami/403/background.svg">
<h1 class="margin-t-main">ACCESS DENIED</h1>
<p>
    You don't have sufficient privileges to access this data.
</p>

@if ($emergency_access)

<p>
    It seems like you can access this data in emergency access cases.
</p>

<a href="/" class="button">Emergency Access</a>


@endif

</body>

</html>
