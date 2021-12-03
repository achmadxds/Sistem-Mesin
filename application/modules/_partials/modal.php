<div class="modal fade" id="tambahAkun" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('Admin/Manajemen_akun/insert') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Nama*</label>
            <input class="form-control" type="text" name="namaBuatUser" min="0" placeholder="Nama..." />
          </div>
          <div class="form-group">
            <label for="">Username*</label>
            <input class="form-control" type="text" name="usmBuatUser" min="0" placeholder="Username..." />
          </div>
          <div class="form-group">
            <label for="">Password*</label>
            <input class="form-control" type="text" name="pwdBuatUser" min="0" placeholder="Password..." />
          </div>
          <div class="form-group">
            <label for="">ID Registrasi*</label>
            <input class="form-control" type="text" name="idRegBuatUser" min="0" placeholder="ID Registrasi.." />
          </div>
          <div class="form-group">
            <label for="">Status*</label>
            <select name="statusBuatUser" id="" class="form-control">
              <option value="">- PILIH -</option>
              <option value="1">1</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLogin">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahIp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="<?php echo site_url('Admin/Manajemen_jaringan/insert') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="">Ip Address*</label>
            <input class="form-control" type="text" name="ipBuatAddress" min="0" placeholder="Ip Address..." />
          </div>
          <div class="form-group">
            <label for="">Lokasi*</label>
            <input class="form-control" type="text" name="lokBuatAddress" min="0" placeholder="Lokasi..." />
          </div>
          <div class="form-group">
            <label for="">Keterangan*</label>
            <textarea name="ketBuatAddress" class="form-control" id="" cols="20" rows="2" placeholder="Keterangan..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLogin">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Reset Kata Sandi</h5>
      </div>
      <form action="<?php echo site_url('Admin/Manajemen_akun/resetPassword') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="hidden" name="idUsers" id="idUsers" value="">
          <div class="form-group">
            <label for="">Kata Sandi Baru*</label>
            <input class="form-control" type="text" name="newPassword" min="0" placeholder="...." />
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btnLogin">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div id="previewFile" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h2 class="modal-title text-center">Preview File</h2>
				<hr>
				<div class="form-group">
					<iframe src="" id="iframe-pdf" width="570px" height="400px"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
