<div class="content-wrapper">
    <section class="content">
        <?php foreach($tindakan as $trmnt)  ?>

        <form action="<?php echo base_url().'poliklinik/update_tindakan'?>" method="POST">
            <div class="from-group">
                <label>Nama tindakan</label>
                <input type="hidden" name="tindakan_id" class="form-control"
                    value="<?php echo $trmnt->tindakan_id ?> ">
                <input type="text" name="tindakan" class="form-control"
                    value="<?php echo $trmnt->tindakan ?>" required >
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>