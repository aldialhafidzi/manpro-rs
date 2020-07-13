<div class="content-wrapper">
    <section class="content">
        <?php foreach($medrec as $mrc)  ?>

        <form action="<?php echo base_url().'poliklinik/update_medrec'?>" method="POST">
            <div class="from-group">
                <label>Nama Pasien</label>
                <input type="hidden" name="id_medrec" class="form-control"
                    value="<?php echo $mrc->id_medrec ?> ">
                <input type="text" name="id_pasien" class="form-control"
                    value="<?php echo $mrc->id_pasien ?>" required >
            </div>
            <div class="from-group">
                <label>Diagnosa</label>
                <input type="text" name="diagnosa" class="form-control"
                    value="<?php echo $mrc->diagnosa ?>" required>
            </div>
            <div class="from-group">
                <label>Dokter</label>
                <input type="text" name="dokter_id" class="form-control"
                    value="<?php echo $mrc->dokter_id ?>"required>
            </div>
            <div class="from-group">
                <label>tindakan</label>
                <input type="text" name="tindakan_id" class="form-control"
                    value="<?php echo $mrc->tindakan_id ?>"required>
            </div>
            <div class="from-group">
                <label>Obat</label>
                <input type="text" name="id_drugs" class="form-control"
                    value="<?php echo $mrc->id_drugs ?>"required>
            </div>
            <div class="from-group">
                <label>Dosis</label>
                <input type="text" name="dosis" class="form-control"
                    value="<?php echo $mrc->dosis ?>"required>
            </div>
            <div class="from-group">
                <label>Aturan Pakai</label>
                <input type="text" name="aturan_pakai" class="form-control"
                    value="<?php echo $mrc->aturan_pakai ?>"required>
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>