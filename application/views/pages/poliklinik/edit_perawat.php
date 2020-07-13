<div class="content-wrapper">
    <section class="content">
        <?php foreach($perawat_poli as $prw_pl)  ?>

        <form action="<?php echo base_url().'poliklinik/update_perawat'?>" method="POST">
            <div class="from-group">
                <label>Nama Perawat</label>
                <input type="hidden" name="id_perawat" class="form-control"
                    value="<?php echo $prw_pl->id_perawat ?> ">
                <input type="text" name="nama" class="form-control"
                    value="<?php echo $prw_pl->nama ?>" required >
            </div>
            <div class="from-group">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" class="form-control"
                    value="<?php echo $prw_pl->no_telp ?>" required>
            </div>
            <div class="from-group">
                <label>spec_id</label>
                <input type="text" name="spec_id" class="form-control"
                    value="<?php echo $prw_pl->spec_id ?>"required>
            </div>
            <div class="from-group">
                <label>Status</label>
                <input type="text" name="status" class="form-control"
                    value="<?php echo $prw_pl->status ?>"required>
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>