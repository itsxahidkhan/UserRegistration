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
    <a href="/logout">Logout</a>
    <h1>Welcome <?=$_SESSION['user_name']?></h1>

    <?php if (isset($_SESSION['profile_image']) && $_SESSION['profile_image']){ ?>
        <img src="<?=$_SESSION['profile_image']?>" id="profile_image">
    <?php } ?>
    <form id="profile_form" action="/uploadProfileImage" method="POST" enctype="multipart/form-data">
        <input type="file" name="profile_image" id="profile_image_input">
        <input type="submit" value="Upload">
    </form>
</div>
</body>
</html>
