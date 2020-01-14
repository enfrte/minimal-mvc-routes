<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Subscribers</title>
</head>
<body>
  <a href="home">Home</a>
  <h1>Subscribers</h1>
  <p>Add email</p>
  <form action="subscribers" method="POST">
    <input name="email" type="email" placeholder="Email address">
    <button type="submit">Submit</button>
  </form>
  <?php foreach ($data as $key) : ?>
      <p><?= $key->email ?></p>
  <?php endforeach ?>
</body>
</html>