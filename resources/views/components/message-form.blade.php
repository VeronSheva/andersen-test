<div class="row">
    <span class="navbar-brand fs-3 pt-3">Send message</span>
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="input-group">
                <span class="input-group-text" id="basic-addon1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                </span>
            <input type="email" class="form-control" id="email" placeholder="Email" aria-label="Email"
                   aria-describedby="basic-addon1">
            <div class="invalid-feedback">
                Invalid email.
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="input-group ">
                <span class="input-group-text" id="basic-addon2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                </span>
            <input type="text" class="form-control" id="name" placeholder="Name" aria-label="Name"
                   aria-describedby="basic-addon2">
            <div class="invalid-feedback">
                The name length should be between 2 and 50 characters.
            </div>
        </div>
    </div>
    <div class="col-md-6"></div>

    <div class="col-12 col-md-6 mt-3">
        <div class="mb-3">
                <textarea class="form-control" id="message" placeholder="Message"
                          rows="3"></textarea>
            <div class="invalid-feedback">
                The message length should be between 2 and 200 characters.
            </div>
        </div>
    </div>
</div>
<div class="row mb-5">
    <div class="col-12 gap-2 col-md-6 d-grid d-sm-flex justify-content-sm-end">
        <button class="btn rounded-5 btn-warning px-4" id="submitBtn" type="submit">Send</button>
    </div>
</div>
