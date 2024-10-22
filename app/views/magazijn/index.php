<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het boodstrap grid -->
<div class="container">

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h3><?php echo $data['title']; ?></h3>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Naam</th>
                        <th>Verpakkingseenheid</th>
                        <th>Aantal aanwezig</th>
                        <th>Allergenen Info</th>
                        <th>Leverantie Info</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (is_null($data['magazijnProducts'])) { ?>
                              <tr>
                                <td colspan='7' class='text-center'>Er zijn geen landen bekent in de database</td>
                              </tr>
                    <?php } else {                              
                              foreach ($data['magazijnProducts'] as $product) { ?>
                                <tr>
                                <td><?= $product->Barcode ?></td>
                                <td><?= $product->Naam ?></td>
                                <td><?= $product->VerpakkingsEenheid ?></td>
                                <td><?= $product->AantalAanwezig ?></td>
                                <td class='text-center'>
                                    <a href='<?= URLROOT . "/countries/update/$product->ProductId" ?>'>
                                        <i class='bi bi-x-lg'></i>
                                    </a>
                                </td>
                                <td class='text-center'>
                                    <a href='<?= URLROOT . "/countries/delete/$product->ProductId" ?>'>
                                        <i class='bi bi-question-lg'></i>
                                    </a>
                                </td>            
                                </tr>
                    <?php } } ?>
                </tbody>
            </table>
            <a href="<?= URLROOT; ?>/homepages/index">Homepage</a>
        </div>
        <div class="col-2"></div>
    </div>

</div>




<?php require_once APPROOT . '/views/includes/footer.php'; ?>