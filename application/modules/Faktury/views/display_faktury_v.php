<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>Admin/addFaktura" class="btn btn-primary">Pridať faktúru</a>
        <br><br>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th>ID</th>
            <th>Firma</th>
            <th>IČO</th>
            <th>DIČ</th>
            <th>IČ_DPH</th>
            <th>Adresa</th>
            <th>Účastník</th>
            <th>Kurz</th>
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
        <?php echo $this->pagination->create_links(); ?>
    </div>
</div>