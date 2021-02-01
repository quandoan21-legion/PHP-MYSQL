<?php
include "src/Views/header.php";
include "src/Views/navigation.php";

?>

<table class="ui striped table">
    <?php
    // echo "<pre>";
    // var_dump($_SESSION["result"]);
    // echo "</pre>";
    // echo 'lmao';
    // die;
    ?>
    <thead>
        <tr>
            <th>Id</th>
            <th>Post Title</th>
            <th>Post Content</th>
            <th>Author Id</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($_SESSION["results"] as $value) : ?>
            <tr>
                <th> <?php echo $value->id ; ?></th>
                <th> <?php echo $value->postTitle; ?></th>
                <th> <?php echo $value->postContent; ?></th>
                <th> <?php echo $value->author; ?></th>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>

<?php
include "src/Views/footer.php";
?>