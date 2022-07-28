<!Doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office" style="font-family:helvetica, 'helvetica neue', arial, sans-serif">
<head>
    <meta charset="UTF-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
</head>
<body>
<p>Login</p>
<form method="post" action="/">
    <div>
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" style="display: block;"/>
    </div>
    <div>
        <label for="password">Password</label>
        <input type="text" name="password" id="password" style="display: block;"/>
    </div>
    <p>
        <button type="submit">Login</button>
    </p>
    <?php foreach ($messages as $message): ?>
        <?php echo $message; ?>
    <?php endforeach; ?>
</form>
</body>
</html>