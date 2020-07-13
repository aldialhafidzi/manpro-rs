<div class="content-wrapper">
    <section class="content">
        <?php foreach($obat as $obt)  ?>

        <form action="<?php echo base_url().'poliklinik/update_obat'?>" method="POST">
            <div class="from-group">
                <label>Nama Obat</label>
                <input type="hidden" name="id_drugs" class="form-control"
                    value="<?php echo $obt->id_drugs ?> ">
                <input type="text" name="nama" class="form-control"
                    value="<?php echo $obt->nama ?>" required >
            </div>
            <div class="from-group">
                <label>Merk</label>
                <input type="text" name="merk" class="form-control"
                    value="<?php echo $obt->merk ?>" required>
            </div>
            <div class="from-group">
                <label>Type</label>
                <input type="text" name="jenis" class="form-control"
                    value="<?php echo $obt->type ?>"required>
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>