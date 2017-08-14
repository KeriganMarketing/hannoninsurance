<?php

$formsubmitted = ( isset($_GET['quotetype']) ? true : false );

if($formsubmitted){

    $quotetype = ( $_GET['quotetype'] == 'auto' ? '/quote-request/auto-insurance-quote-request/' : null );
    $quotetype = ( $_GET['quotetype'] == 'homeowners' ? '/quote-request/homeowners-insurance-quote-request/' : $quotetype );

    ?>
    <script>
        window.location = "<?php echo $quotetype; ?>";
    </script>
    <?php
}

?>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <a href="/quote-request/auto-insurance-quote-request/" >
                <img src="/wp-content/uploads/2017/08/hannon-auto-insurance.jpg" alt="Auto Insurance" class="card-img-top img-fluid">
            </a>
            <div class="button-overlay text-center">
                <a class="btn btn-info btn-pill" href="/quote-request/auto-insurance-quote-request/">Auto Quote</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <a href="/quote-request/homeowners-insurance-quote-request/" >
                <img src="/wp-content/uploads/2017/08/homeowners-renters-fire-flood-insurance.jpg" alt="Auto Insurance" class="card-img-top img-fluid">
            </a>
            <div class="button-overlay text-center">
                <a class="btn btn-info btn-pill" href="/quote-request/homeowners-insurance-quote-request/">Homeowners Quote</a>
            </div>
        </div>
    </div>
</div>
