<?php
include "src/Views/header.php";
include "src/Views/navigation.php";
?>
<div class="ui text container">
    <?php;
    include "src/Views/messages.php";
    ?>
    <h1>CREATE POST</h1>
    <form class="ui form" method="POST" action="handlePost">
        <input type="hidden" value="<?php echo $_SESSION['id'] ?>" name="id">
        <div class="field">
            <label>Title</label>
            <input type="text" name="postTitle" placeholder="Title">
        </div>
        <div class="field">
            <label>Post Content</label>
            <textarea name="postContent"></textarea>
        </div>
        <button class="ui button" type="submit">Add</button></button>
    </form>
</div>
<?php
include "src/Views/footer.php";
?>