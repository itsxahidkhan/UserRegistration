<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="public/assets/css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="register">
    <h1>Welcome <?=$_SESSION['user_name']?></h1>
    <form id="login_form" action="/" method="POST" autocomplete="off">
        <input type="submit" value="Logout">
    </form>
</div>
</body>
</html>
