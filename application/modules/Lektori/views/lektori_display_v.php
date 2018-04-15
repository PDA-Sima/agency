<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url(); ?>Admin/addLektor" class="btn btn-primary ">Pridať lektora</a>
        <br><br>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-stripped table-bordered">
            <thead>
            <th>#</th>
            <th>Lektori</th>
            </thead>
            <tbody>
            <?php
            if($lektori_table !== ""){
                echo $lektori_table;
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