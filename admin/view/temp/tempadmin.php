<?php
include_once ('tempheader.php');
?>

<div class="header">
    <a class="logo" href="<?php echo BASE_URL . LIST_USER; ?>">
        <img src="<?php echo includeImage('', 'logo.png') ?>" alt="NTQ Solution - Admin Control Panel" title="NTQ Solution - Admin Control Panel"/>
    </a>

</div>

<div class="menu">

    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">Hi, <?=$_SESSION['username']; ?></div>
    </div>

    <div class="admin">
        <div class="image">
            <img src="<?php getImage(User::getUser(User::getIdAdmin())['user_img']);?>" class="img-polaroid"/>
        </div>
        <ul class="control">
            <li><span class="icon-cog"></span> <a href="<?php echo BASE_URL . EDIT_USER . '/' . User::getIdAdmin();?>">Update Profile</a></li>
            <li><span class="icon-share-alt"></span> <a href="<?php echo BASE_URL . LOGOUT; ?>">Logout</a></li>
        </ul>
    </div>

    <ul class="navigation">
        <li>
            <a href="<?php echo BASE_URL . LIST_USER; ?>">
                <span class="isw-user"></span><span class="text">Users</span>
            </a>
        </li>
    </ul>

</div>
<div class="content">
    <?=$content;?>
</div>
<?php getFooter(); ?>