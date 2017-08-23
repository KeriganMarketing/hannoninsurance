<?php

use KMA\Utilities\StateList;

/**
 * The template for the Homeowners Quote Request.
 * @package kstrap
 */

date_default_timezone_set('America/New_York');

//states for the form dropdown
$lead              = new kmaLeads();
$states            = StateList::all();
$insuranceTypes    = [
                        'Commercial and Personal Auto',
                        "Boat and Personal Watercraft",
                        "Recreational Vehicle",
                        "Motorcycle and Scooter",
                        "Homeowners",
                        "Renters",
                        "Dwelling Fire including short-term rental / seasonal",
                        "Wind / Hail",
                        "Flood",
                        "Business Owners Policy / General Liability",
                        "Bonds",
                        "Workers Comp",
                    ];
//FORM VARS
$yourname          = (isset($_POST['yourname']) ? $_POST['yourname'] : null);
$youremail         = (isset($_POST['youremail']) ? $_POST['youremail'] : null);
$youraddr1         = (isset($_POST['youraddr1']) ? $_POST['youraddr1'] : null);
$youraddr2         = (isset($_POST['youraddr2']) ? $_POST['youraddr2'] : null);
$yourcity          = (isset($_POST['yourcity']) ? $_POST['yourcity'] : null);
$yourstate         = (isset($_POST['yourstate']) ? $_POST['yourstate'] : null);
$yourzip           = (isset($_POST['yourzip']) ? $_POST['yourzip'] : null);
$phone             = (isset($_POST['phone']) ? $_POST['phone'] : null);
$datesubmitted     = date('F d, Y @ g:ia');
$formID            = (isset($_POST['formID']) ? $_POST['formID'] : '');
$securityFlag      = (isset($_POST['secu']) ? $_POST['secu'] : '');
$formSubmitted     = ($formID == 'homeowners-quote' && $securityFlag == '' ? true : false);

if ($formSubmitted) {
    $lead->addToDashboard($_POST);
    $lead->sendNotifications($_POST);

    echo '<script> swal("Thank you!", "Someone from our staff will be in touch with you soon.", "success"); </script>';
}
?>
<form class="form-horizontal" name="quoteform" id="mainForm" method="post" enctype="multipart/form-data" action="<?php the_permalink(); ?>">
    <input type="hidden" name="formID" value="homeowners-quote" >
    <div class="row no-gutters"></div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
                <span class="float-right"><span class="req">*</span> = required</span>
                <h2>Request a quote</h2>
                <hr />
            </div>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="name" class="col-md-3 control-label text-md-right">Full Name<span class="req">*</span></label>
        <div class="col-md-5 form-group <?php echo($yourname == '' && $_POST ? 'has-error' : '') ?>">
            <input type="text" class="form-control" value="<?php echo $yourname; ?>" name="yourname" required>
        </div>
    </div>

    <div class="row align-items-center">
        <label for="email" class="col-md-3 control-label text-md-right">Email Address<span class="req">*</span></label>
        <div class="col-md-5 form-group <?php echo(($youremail == '' && $_POST) || (!filter_var($youremail, FILTER_VALIDATE_EMAIL) && !preg_match('/@.+\./', $youremail) && $_POST) ? 'has-error' : '');  ?>">
            <input type="text" class="form-control" value="<?php echo $youremail; ?>" name="youremail" id="emailAddress" required>
        </div>
    </div>

    <div class="row align-items-center">
        <label for="phone1" class="col-md-3 control-label text-md-right">Phone Number<span class="req">*</span></label>
        <div class="col-md-9 form-group form-inline <?php echo($phone == '' && $_POST ? 'has-error' : ''); ?>">
            <input type="tel" class="phoneinput form-control" placeholder="850-###-####" value="<?php echo $phone; ?>" name="phone" id="phone" required>
        </div>
    </div>

    <div class="row align-items-center">
        <label for="youraddr1" class="col-md-3 control-label text-md-right">Physical Address<span class="req">*</span></label>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6 form-group <?php echo($youraddr1 == '' && $_POST ? 'has-error' : ''); ?>" id="addr1">
                    <input type="text" class="form-control" value="<?php echo $youraddr1; ?>" placeholder="Street" name="youraddr1" required>
                </div>
                <div class="col-md-4 form-group <?php echo($youraddr2 == '' && $_POST ? 'has-error' : ''); ?>" id="addr2">
                    <input type="text" class="form-control" value="<?php echo $youraddr2; ?>" placeholder="Apt/Suite" name="youraddr2">
                </div>
                <div class="col-xs-7 col-md-4 form-group <?php echo($yourcity == '' && $_POST ? 'has-error' : ''); ?>" id="city" required>
                    <input type="text" class="form-control" value="<?php echo($yourcity!='' && $_POST ? $yourcity : ''); ?>" placeholder="Marianna" name="yourcity" required>
                </div>
                <div class="col-xs-6 col-md-2 form-group <?php echo($yourstate == '' && $_POST ? 'has-error' : ''); ?>" id="state" required>
                    <select class="form-control" name="yourstate" required>
                        <option value="FL" selected>FL</option>
                        <?php
                        foreach ($states as $abbreviation => $fullName) {
                            if ($abbreviation != 'FL') {
                                echo '<option value="'.$abbreviation.'">'.$abbreviation.'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-xs-4 col-md-2 form-group <?php echo($yourzip == '' && $_POST ? 'has-error' : ''); ?>" id="zip">
                    <input type="text" class="form-control" value="<?php echo($yourzip!='' && $_POST ? $yourzip : ''); ?>" placeholder="32448" name="yourzip" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <label for="requestType" class="col-md-3 control-label text-md-right">Type of Quote:<span class="req">*</span></label>
        <div class="col col-md-8 form-group id="requestType" required>
            <select class="form-control col-md-6" name="requestType" required>
                <option value="">--Select a type of quote--</option>
                <?php
                foreach ($insuranceTypes as $insuranceType) {
                    echo '<option value="'.$insuranceType.'">'.$insuranceType.'</option>';
                }
                ?>
            </select>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="offset-md-3 col-md-10 ">
            <div class="form-group">
                <button type="submit" class="btn btn-primary" id="form-submit-button">Submit Quote Request</button>
            </div>
        </div>
    </div>
</form>
<script>
    $("#form-submit-button").on("click", function(e){
        e.preventDefault();

        var email = $("#emailAddress").val();
        var check = validateEmail(email);

        if(check){
            $("#mainForm").submit();
        }
        else{
            swal("Whoops!", "It looks like the email address you entered is invalid. Please enter a valid email address", "error");
        }
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        }
    });
</script>

