<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center bottom-separator">
                <!-- <img src="{!! asset('additional/home/images/home/under.png') !!}" class="img-responsive inline" alt=""> -->
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="testimonial bottom">
                <h2>Media Social</h2>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#"><img src="{!! asset('images/default/facebook81x81.png') !!}" alt=""></a>
                        </div>
                        <div class="col-md-4">
                            <a href="#"><img src="{!! asset('images/default/1453527761_twitter.png') !!}" alt=""></a>
                        </div>
                        <div class="col-md-4" style="padding-bottom : 15px;">
                            <a href="#"><img src="{!! asset('images/default/google-plus.png') !!}" alt=""></a>
                        </div><br/>
                        <div class="col-md-4">
                            <a href="#"><img src="{!! asset('images/default/path.png') !!}" alt=""></a>
                        </div>
                        <div class="col-md-4">
                            <a href="#"><img src="{!! asset('images/default/instagram.png') !!}" alt=""></a>
                        </div>
                        <div class="col-md-4">
                            <a href="#"><img src="{!! asset('images/default/linkedin.png') !!}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="contact-info bottom">
                    <h2>Contacts</h2>
                    <address>
                    E-mail: <a href="mailto:someone@example.com">email@email.com</a> <br> 
                    Phone: +1 (123) 456 7890 <br> 
                    Fax: +1 (123) 456 7891 <br> 
                    </address>

                    <h2>Address</h2>
                    <address>
                    Unit C2, St.Vincent's Trading Est., <br> 
                    Feeder Road, <br> 
                    Bristol, BS2 0UY <br> 
                    United Kingdom <br> 
                    </address>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="contact-form bottom">
                    <h2>Send a message</h2>
                    <form id="form" name="contact-form" action="{!! url('/send-contact-user') !!}">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" required="required" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" required="required" placeholder="Email Id">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8" placeholder="Your text here"></textarea>
                        </div>                        
                        <div class="form-group">
                            <button class="btn btn-submit">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</footer>