<!-- Modal Sukses -->
<div class="modal flip" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center p-5">
                <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="loop"
                    colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px">
                </lord-icon>

                <div class="mt-4">
                    <h4 class="mb-3">Berhasil!</h4>
                    <p class="text-muted mb-4">{{ Session::get('success') }}.</p>
                    <div class="hstack gap-2 justify-content-center">
                        <button type="button" class="btn btn-link link-success fw-medium material-shadow-none"
                            data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> Tutup</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Selesai</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        @endif

        const demoButton = document.querySelector('.btn-soft-success');
        if (demoButton) {
            demoButton.addEventListener('click', function() {
                var successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            });
        }
    });
</script>
