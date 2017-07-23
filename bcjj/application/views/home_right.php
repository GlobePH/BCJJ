<div id="loginFormDiv">
    <div class="right-acc-pad"></div>

    <div class="col-md-12 login-signup-box">
    <?php
            if ( empty($this->session->user_session) ) {
        ?>
                <p>Receive SMS notifications from us.</p>
                <a class="btn btn-primary login-button" data-toggle="modal" data-target="#LoginModal">Login</a>
                <a class="btn btn-primary sign-up-button" data-toggle="modal" data-target="#SignupModal">Sign Up</a>
        <?php 
            } else {
                if ( $information->SMSSETUP == 'NO' ) {
                    echo '<p><a class="setup-color" href="" data-toggle="modal" data-target="#NewSetupContact">Setup your SMS Notification.</a></p>';
                } else {
                    echo '<p><a class="setup-color" href="" data-toggle="modal" data-target="#EditSetupContact">Edit your SMS Notification.</a></p>';
                }
        ?>
                <div class="align-center color-white">Welcome, <?php print_r($information->NAME); ?></div>
        <?php 
            }
        ?>
    </div>

    <div class="fill-up">
        <div class="form-group">
            <label>To</label>
            <input type="text" class="form-control" id="txt_to_address" placeholder="Starting point" />
        </div>
        <div class="form-group">
            <label>From</label>
            <input type="text" class="form-control" id="txt_from_address" placeholder="Destination" />
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-cstm" id="btn-submit">SUBMIT</button>
        </div>
    </div>

    <div class="padding-top-large">
        <div class="form-group">
            <label>Result:</label>
            <div class="panel panel-default pnl-status">
                <div class="panel-body pnl-status-box">
                    <div class="col-md-12 status"><i class="fa fa-lightbulb-o" aria-hidden="true"></i> Status:<br/><span id="get_status"></span></div>
                    <div class="col-md-12>">
                        <div class="col-md-6 distance"><i class="fa fa-arrows-h" aria-hidden="true"></i> Distance:<br/><span id="get_distance"></span></div>
                        <div class="col-md-6 duration"><i class="fa fa-clock-o" aria-hidden="true"></i> Duration:<br/><span id="get_duration"></span></div>
                    </div>    
                </div>
            </div>
        </div>
    </div> 

    <?php
        if ( !empty($this->session->user_session) ) {
    ?>
            <a class="btn btn-primary btn-cstm" href="<?php echo base_url(); ?>logout">Log-out</a>
    <?php 
        }
    ?>

</div>


<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content login-modal">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title login-title"><i class="fa fa-car" aria-hidden="true"></i><br/>Login to your account.</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Email Address:</label>
                            <input type="text" class="form-control" id="txt_email" />
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" id="txt_pword" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary sign-up-button" id="btn-login">Login</button>
                        </div>
                        <div class="align-center padding-bottom-normal">OR</div>
                        <div class="form-group">
                            <button class="btn btn-primary signup-button" id="btn-login-facebook">Login with <i class="fa fa-facebook-square" aria-hidden="true"></i> Facebook</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="SignupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content sign-up-modal">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title sign-up-title"><i class="fa fa-car" aria-hidden="true"></i><br/>Sign Up</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" id="txt_name_su" />
                        </div>
                        <div class="form-group">
                            <label>Email address:</label>
                            <input type="text" class="form-control" id="txt_email_su" />
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" id="txt_pword_su" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary sign-up-button-modal" id="btn-signup">SIGN UP</button>
                        </div>
                        <div class="align-center padding-bottom-normal">OR</div>
                        <div class="form-group">
                            <button class="btn btn-primary" id="btn-signup-facebook">Sign Up with Facebook</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    
<div class="modal fade" id="NewSetupContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content sign-up-modal">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title sign-up-title"><br/>Setup your SMS Notification</h4>
            </div>
            <div class="modal-body" id="set-mdlbdy">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Contact Number:</label>
                            <input type="text" class="form-control" id="txt_contact_set" maxlength="11" placeholder="09123456789" />
                        </div>
                        <div class="form-group">
                            <label>Time:</label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="timepicker1_set" type="text" class="form-control input-small">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To:</label>
                            <input type="text" class="form-control" placeholder="Starting point" id="txt_to_address_set" />
                        </div>
                        <div class="form-group">
                            <label>From:</label>
                            <input type="text" class="form-control" placeholder="Destionation" id="txt_from_address_set" />
                        </div>
                        <div class="form-group padding-top-normal">
                            <button class="btn btn-primary sign-up-button-modal" id="btn-submit-set">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="EditSetupContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content sign-up-modal">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title sign-up-title"><br/>Edit your SMS Notification</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Contact Number:</label>
                            <input type="text" class="form-control" value="<?php echo $information->CONTACTNO; ?>" id="txt_contact_update" maxlength="11" placeholder="09123456789"/>
                        </div>
                        <div class="form-group">
                            <label>Time:</label>
                            <div class="input-group bootstrap-timepicker timepicker">
                                <input id="timepicker1_update" value="<?php echo $information->TIME; ?>" type="text" class="form-control input-small">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>To:</label>
                            <input type="text" class="form-control" value="<?php echo $information->TO_LOCATION; ?>" placeholder="Starting point" id="txt_to_address_update" />
                        </div>
                        <div class="form-group">
                            <label>From:</label>
                            <input type="text" class="form-control" value="<?php echo $information->FROM_LOCATION; ?>" placeholder="Destionation" id="txt_from_address_update" />
                        </div>
                        <div class="form-group padding-top-normal">
                            <button class="btn btn-primary sign-up-button-modal" id="btn-submit-update">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>