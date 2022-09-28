<div class="row">
    <h6 class="mb-0">Old Password</h6>
    <div class="col-sm-12 text-secondary">
        <input class="w-100 outline-none border-none form-group" type="password" name="oldpassword">
        @error('password')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<hr>
<div class="row">
    <h6 class="mb-0">New Password</h6>
    <div class="col-sm-12 text-secondary">
        <input class="w-100 outline-none border-none" type="password" name="password">
        @error('newpassword')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<hr>
<div class="row">
    <h6 class="mb-0">Confirm new Password</h6>
    <div class="col-sm-12 text-secondary">
        <input class="w-100 outline-none border-none" type="password" name="cpassword">
        @error('cpassword')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
</div>
<hr>
