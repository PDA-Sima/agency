<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>Admin/addFaktura" class="btn btn-primary pull-right">Pridať faktúru</a>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th>#</th>
            <th>Firma</th>
            <th>Adresa</th>
            <th>id Účastníka</th>
            <th>id Kurzu</th>
            <th>Počet hodín</th>
            <th>Cena hodiny</th>
            <th>Celková suma</th>
            <th>Zaplatená</th>
            </thead>
            <tbody>
            <?php
            if($faktury_table !== ""){
                echo $faktury_table;
            }
            else{
                ?>
                <tr>
                    <td colspan="9"><center>No data</center></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>