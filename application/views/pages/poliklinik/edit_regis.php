<div class="content-wrapper">
    <section class="content">
        <?php foreach($regis_poli as $rgs_pl)  ?>

        <form action="<?php echo base_url().'poliklinik/update_regis'?>" method="POST">
            <div class="from-group">
                <label>Nama Pasien</label>
                <input type="hidden" name="transaksi_id" class="form-control"
                    value="<?php echo $rgs_pl->id ?> ">
                <input type="text" name="id_pasien" class="form-control"
                    value="<?php echo $rgs_pl->id_pasien ?>" required >
            </div>
            <div class="from-group">
                <label>Jadwal</label>
                <input type="text" name="jadwal_id" class="form-control"
                    value="<?php echo $rgs_pl->jadwal_id ?>" required>
            </div>
            <div class="from-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control"
                    value="<?php echo $rgs_pl->tanggal ?>"required>
            </div>
            <div class="from-group">
                <label>Status</label>
                <input type="text" name="status" class="form-control"
                    value="<?php echo $rgs_pl->status ?>"required>
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>