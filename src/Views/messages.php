<?php if (isset($_SESSION['errors'])) : ?>
    <div class="form-errors">
        <?php foreach ($_SESSION['errors'] as $error) : ?>
            <p><?php echo $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>