<input name="memeber_name" placeholder="Name" type="text" class="form-control mb-4" disabled value="<?php echo $memberName; ?> ">
<select name="week" class="form-select mb-4">
    <option selected value="">Pertemuan</option>
    <?php for ($o = 1; $o <= 16; $o++) { ?>
        <option value="<?= $o; ?>"><?= $o; ?></option>
    <?php } ?>
</select>
<select name="status" id="status" class="form-select" aria-label="Default select example">
    <option selected value="H">Hadir</option>
    <option value="I">Izin</option>
    <option value="S">Sakit</option>
    <option value="A">Alpha</option>
</select>