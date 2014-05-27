
<!-- ################  main navigation section     ######################### -->
<nav>
    <ol>
        <?php
        if ($path_parts['filename'] == "index") {
            print '<li class="activePage">Home</li>';
        } else {
            print '<li><a href="index.php">Home</a></li>';
        }
        if ($path_parts['filename'] == "form") {
            print '<li class="activePage">Register</li>';
        } else {
            print '<li><a href="form.php">Register</a></li>';
        }
        ?>
    </ol>
</nav>
