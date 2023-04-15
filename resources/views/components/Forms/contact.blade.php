<form action="https://formsubmit.co/5975661f74c8264e8527ff97cc1abd96" method="POST">
    @csrf
    <div class="control-group">
        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="" required
         />
        <p class="message-block text-danger name_error"></p>
    </div>
    <div class="control-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="" required
            />
            <p class="message-block text-danger email_error"></p>
        </div>
    <div class="control-group">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="" required
            />
            <p class="message-block text-danger subject_error"></p>
        </div>
    <div class="control-group">
        <textarea class="form-control" name="message" id="message" placeholder="Message" required
            ></textarea>
            <p class="message-block text-danger message_error"></p>
        </div>
    <div>
        <button class="btn" type="submit">Send Message</button>
    </div>
</form>
{{-- <form id="contact-form" action="https://formsubmit.co/treostyle1.com" method="POST">
    @csrf
    <div class="control-group">
        <input type="text" class="form-control" name="name" id="name" placeholder="Your Name" value="" required
         />
    </div>
    <div class="control-group">
        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="" required
            />
        </div>
    <div class="control-group">
        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="" required
            />
        </div>
    <div class="control-group">
        <textarea class="form-control" name="message" id="message" placeholder="Message" required
            ></textarea>
        </div>
    <div>
        <button class="btn" type="submit">Send Message</button>
    </div>
</form> --}}
