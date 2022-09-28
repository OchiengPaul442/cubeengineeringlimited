<!-- Vertically centered modal -->
<div class="modal fade" tabindex="-1" id="changepwd">
    <div class="modal-dialog modal-dialog-centered">
        <form class="card-body" action="{{ route('change-password', session('userID')) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Change Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('Admin.components.forms.changepwd')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-success " type="submit"
                        >Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
