<div>
    {{-- Create moodle users from list --}}
    <button class="btn btn-warning me-1 mb-1 btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Moodle Export</button>

    <div wire:ignore.self class="modal fade" id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 400px">
            <div class="modal-content position-relative bg-warning">
                <div class="position-absolute top-0 end-0 mt-1 me-1 z-index-1">
                    <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="rounded-top-lg py-2 ps-4 pe-6 bg-light">
                        <h5 class="mb-1" id="modalExampleDemoLabel">Export users </h5>
                    </div>
                    <h5 class="text-center mt-4 text-white">Do you want to export all users?</h5>
                </div>
                <div class="modal-footer border-0">
                    <button class="btn btn-outline-light btn-sm" type="button" data-bs-dismiss="modal">Close</button>
                    <button wire:click="exportUsers" class="btn btn-light btn-sm" type="button">Continue </button>
                </div>
            </div>
        </div>
    </div>
</div>
