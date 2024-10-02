<div class="">
    <?php  if(isset($valid)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $valid ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    <?php elseif(isset($erreur)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $erreur ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
    <?php endif;?>
</div>