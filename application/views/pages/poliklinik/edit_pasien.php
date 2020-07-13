<div class="content-wrapper">
    <section class="content">
        <?php foreach($pasien as $psn)  ?>

        <form action="<?php echo base_url().'poliklinik/update_pasien'?>" method="POST">
            <div class="from-group">
                <label>Nama Pasien</label>
                <input type="hidden" name="id_pasien" class="form-control"
                    value="<?php echo $psn->id_pasien ?> ">
                <input type="text" name="nama" class="form-control"
                    value="<?php echo $psn->nama ?>" required >
            </div>
            <div class="from-group">
                <label>Nomor Telepon</label>
                <input type="text" name="no_telp" class="form-control"
                    value="<?php echo $psn->no_telp ?>" required>
            </div>
            <div class="from-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control"
                    value="<?php echo $psn->alamat ?>"required>
            </div>
            <div class="from-group">
                <label>Tanggal lahir</label>
                <input type="date" name="tgl_lahir" class="form-control"
                    value="<?php echo $psn->tgl_lahir ?>"required>
            </div>
            <div class="from-group">
                <label>Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control"
                    value="<?php echo $psn->pekerjaan ?>"required>
            </div>
            
                <button type="reset" class="btn btn-danger mt-3">Reset</button>
                <button type="submit" class="btn btn-primary mt-3">Simpan</button>          
    
        </form>
        

    </section>
</div>