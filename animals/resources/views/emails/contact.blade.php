<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Animal+</title>
</head>
<body>
    <h1>Formulaire de contact Animal+</h1>
    <p>Nom : {{ $mailData['name'] }}</p>
    <p>Email : {{ $mailData['email'] }}</p>
    <p>Téléphone : {{ $mailData['phone'] }}</p>
    <p>Message : {{ $mailData['message'] }}</p>
</body>
</html>
