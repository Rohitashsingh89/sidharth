<?php include 'header.php'; ?>

<section class="contact-area page-section scroll-content" id="contact">
    <div class="custom-container">
        <div class="contact-content content-width">
            <div class="section-header">
                <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                    <i class="las la-dollar-sign"></i> contact
                </h4>
                <h1 class="scroll-animation" data-animation="fade_from_bottom">Let's Work
                    <span>Together!</span>
                </h1>
            </div>
            <h3 class="scroll-animation" data-animation="fade_from_bottom">hello@sidharthkumar</h3>
            <p id="required-msg">* Marked fields are required to fill.</p>

            <form class="contact-form scroll-animation" data-animation="fade_from_bottom" method="POST" action="mailer.php">
                <div class="alert alert-success messenger-box-contact__msg" style="display: none" role="alert">
                    Your message was sent successfully.
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group">
                            <label for="full-name">full Name <sup>*</sup></label>
                            <input type="text" name="full-name" id="full-name" placeholder="Your Full Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label for="email">Email <sup>*</sup></label>
                            <input type="email" name="email" id="email" placeholder="Your email adress">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label for="phone-number">phone <span>(optional)</span></label>
                            <input type="text" name="phone-number" id="phone-number" placeholder="Your number phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group">
                            <label for="subject">subject <sup>*</sup></label>
                            <select name="subject" id="subject">
                                <option value="">Select a subject</option>
                                <option value="subject1">Subject 1</option>
                                <option value="subject2">Subject 2</option>
                                <option value="subject3">Subject 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <label for="budget">your budget <span>(optional)</span></label>
                            <input type="number" name="budget" id="budget" placeholder="A range budget for your project">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group">
                            <label for="message">message</label>
                            <textarea name="message" id="message" placeholder="Wrire your message here ..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group upload-attachment">
                            <div>
                                <label for="upload-attachment">
                                    <i class="las la-cloud-upload-alt"></i> add an attachment
                                    <input type="file" name="file" id="upload-attachment">
                                </label>

                            </div>

                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-group submit-btn-wrap">
                            <button class="theme-btn" name="submit" type="submit" id="submit-form">send
                                message</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
<?php include 'footer.php'; ?>
