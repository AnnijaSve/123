<!Doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office"
      style="font-family:helvetica, 'helvetica neue', arial, sans-serif">
<head>
    <meta charset="UTF-8">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta content="telephone=no" name="format-detection">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0">
</head>
<body>
<p>Dashboard</p>
<?php if (!empty($drivers)): ?>
    <?php foreach ($drivers as $driver): ?>
        <?php echo 'Name: ' . $driver['user']['name']; ?>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>