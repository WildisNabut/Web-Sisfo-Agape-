<!-- Modal Konfirmasi Logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <i class="fas fa-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
            </div>
            <div class="modal-body text-center">
                <h5 class="modal-title mb-3" id="logoutModalLabel">Konfirmasi Logout</h5>
                <p>Apakah Anda yakin ingin keluar?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <a id="confirmLogoutBtn" href="../logout.php" class="btn btn-primary">Ya, Logout</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<script>
    function showLogoutModal() {
        // Tampilkan modal konfirmasi logout
        $('#logoutModal').modal('show');
    }
</script>
