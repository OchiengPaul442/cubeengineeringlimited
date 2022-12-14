<!-- Modal -->
<div class="modal fade" id="notification" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <span class="success-message text-success"></span>
                <span class="fail-message text-danger"></span>
            </div>
        </div>
    </div>
</div>

<!-- delete account centered modal -->
<div class="modal fade" tabindex="-1" id="deleteaccount">
    <div class="modal-dialog modal-dialog-centered">
        <div class="card-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete account Parmanently</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete your account?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form action="{{ route('Auth.destroy', session('userID')) }}" method="POST"
                        style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" href="">Yes</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- delete record centered modal -->
<div class="modal fade" tabindex="-1" id="deleteRecord">
    <div class="modal-dialog modal-dialog-centered">
        <div class="card-body">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Record!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <form
                        action="
                    @if (Request::is('services/*')) {{ route('services.destroy', $services->id) }}
                     @elseif (Request::is('portfolio/*'))                            
                     {{ route('portfolio.destroy', $portfolios->id) }} 
                     @elseif (Request::is('FAQs/*'))                            
                     {{ route('FAQs.destroy', $FAQs->id) }} 
                     @elseif (Request::is('testimonials/*'))                            
                     {{ route('testimonials.destroy', $testimonial->id) }}
                      @elseif (Request::is('timeline/*'))                            
                     {{ route('timeline.destroy', $timelines->id) }}
                      @elseif (Request::is('messages/*'))                            
                     {{ route('messages.destroy', $message->id) }} @endif                            
                        "
                        method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
