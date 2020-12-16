<?php if (count($errors) > 0): ?>
<div class="alert alert-danger">
<?php foreach ($errors as $error): ?>
<li>
<?php echo $error; ?>
</li>
<?php endforeach;?>
</div>
<?php endif;?>
<?php if (isset($_SESSION['message'])): ?>
        <div class="alert <?php echo $_SESSION['type'] ?>">
          <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            unset($_SESSION['type']);
          ?>
        </div>
<?php endif;?>