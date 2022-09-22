<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page_specific_css") ?>
<link rel="stylesheet" href="/css/log.css">
<?php $this->stop() ?>

<?php $this->start("page") ?>
<!------ Include the above in your HEAD tag ---------->
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->
        <!-- Icon -->
        <div class="fadeIn first">
            <img src="https://media.istockphoto.com/photos/popcorn-in-bucket-picture-id497857462?k=20&m=497857462&s=612x612&w=0&h=K52Js9yjuJypB2IErGa-AjQ4OY7WI6HYakcIcjfPmx0=" id="icon" alt="User Icon" />
        </div>
        <!-- Login Form -->
        <form>
            <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
            <input type="text" id="password" class="fadeIn third" name="login" placeholder="password">
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>
    </div>
</div>
<?php $this->stop() ?>
