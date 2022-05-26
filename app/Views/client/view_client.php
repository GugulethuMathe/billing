<?= $this->include('inc/header') ?>
<?php
foreach ($view_admin as $row) {
    ?>
<div class="main-content-body tab-pane p-4 border-top-0" id="edit">
    <div class="card-body border">
        <div class="mb-4 main-content-label">Personal Information</div>
        <form class="form-horizontal">
            <div class="mb-4 main-content-label">Name</div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">User Name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="User Name" value="<?php echo $row->first_name;?>">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">First Name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="First Name" value="Mack Adamia">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">last Name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Last Name" value="Mack Adamia">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Nick Name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Nick Name" value="Spruha">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Designation</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Designation" value="Web Designer">
                    </div>
                </div>
            </div>
            <div class="mb-4 main-content-label">Contact Info</div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Email<i>(required)</i></label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Email" value="info@Spruha.in">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Website</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="Website" value="@spruko.w">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Phone</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="phone number" value="+245 354 654">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Address</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="example-textarea-input" rows="2" placeholder="Address">San Francisco, CA</textarea>
                    </div>
                </div>
            </div>
            <div class="mb-4 main-content-label">Social Info</div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Twitter</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="twitter" value="twitter.com/spruko.me">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Facebook</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="facebook" value="https://www.facebook.com/Spruha">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Google+</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="google" value="spruko.com">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Linked in</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="linkedin" value="linkedin.com/in/spruko">
                    </div>
                </div>
            </div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Github</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control" placeholder="github" value="github.com/sprukos">
                    </div>
                </div>
            </div>
            <div class="mb-4 main-content-label">About Yourself</div>
            <div class="form-group ">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Biographical Info</label>
                    </div>
                    <div class="col-md-9">
                        <textarea class="form-control" name="example-textarea-input" rows="4" placeholder="">pleasure rationally encounter but because pursue consequences that are extremely painful.occur in which toil and pain can procure him some great pleasure..</textarea>
                    </div>
                </div>
            </div>
            <div class="mb-4 main-content-label">Email Preferences</div>
            <div class="form-group mb-0">
                <div class="row row-sm">
                    <div class="col-md-3">
                        <label class="form-label">Verified User</label>
                    </div>
                    <div class="col-md-9">
                        <div class="custom-controls-stacked">
                            <label class="ckbox mg-b-10-f"><input checked="" type="checkbox"><span> Accept to receive post or page notification emails</span></label>
                            <label class="ckbox"><input checked="" type="checkbox"><span> Accept to receive email sent to multiple recipients</span></label>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php } ?>
<?= $this->include('inc/footer') ?>
