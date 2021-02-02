<?php
$unit = array(
    'kepegawaian' => 'Kepegawaian',
    'umum' => 'Umum',
    'keuangan' => 'Keuangan'
);
?>

<h1>Pengaturan Akun</h1>

<div class="form-container">
    <div class="form-title"><i class="fas fa-user-alt fa-fw"></i> Akun</div>
    <form action="<?= base_url("arsip/processUser") ?>" id="disposisi-form" method="post" class="form-content">
        <div class="form-section">
            <input type="hidden" name="id_user" value="<?= $userData->id_user ?>">
            <div class="form-label">Nama</div>
            <div class="form-input"><input value="<?= $userData->nama ?>" type="text" name="nama" id="nama" class="input-data" required></div>

            <div class="form-label">Username</div>
            <div class="form-input"><input value="<?= $userData->username ?>" type="text" name="username" id="username" pattern="[a-z0-9_]+" class="input-data" required></div>

            <div class="form-label">Unit</div>
            <div class="form-input">
                <select name="unit" id="unit" class="input-data" required>
                    <?php
                    foreach ($unit as $key => $value) :
                    ?>
                        <option value="<?= $key ?>" <?php
                        if ($userData->unit == $key) {
                            echo "selected";
                        }
                        ?>><?= $value ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>

            <div class="form-label">Ubah password?</div>
            <div class="form-input">
                <input type="checkbox" name="passcheck" id="passcheck" class="checkbox">
                <label for="passcheck"></label>
            </div>

            <div class="form-label">Password Baru</div>
            <div class="form-input"><input type="password" name="password" pattern="[A-Za-z0-9.,@!#$%&*].{5,}" id="password" class="input-data" required disabled></div>

            <div class="form-label">Password Lama</div>
            <div class="form-input"><input type="password" name="oldpass" id="oldpass" class="input-data" required></div>
        </div>
        <div class="menu-section">
            <div class="context-menu"></div>
            <div class="button-wrapper">
                <button type="submit" class="btn green" id="save-btn" disabled><i class="fas fa-save fa-fw"></i> Simpan</button>
            </div>
        </div>
    </form>
</div>

<script src="<?= base_url("assets/js/sha1.min.js") ?>"></script>
<script>
$(document).ready(() => {
    let oldPass = '<?= $userData->password ?>';

    $("#passcheck").change((event) => {
        if ($(event.currentTarget).prop("checked")) {
            $("#password").prop("disabled", false);
        }
        else {
            $("#password").prop("disabled", true);
            $("#password").val(null);
        }
    });

    $("#oldpass").on('keyup', (event) => {
        if (sha1($(event.currentTarget).val()) == oldPass) {
            $("#save-btn").prop("disabled", false);
        }
        else {
            $("#save-btn").prop("disabled", true);
        }
    });
});
</script>