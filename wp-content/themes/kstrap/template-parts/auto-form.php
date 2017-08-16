<?php
/**
 * The template for the Auto Quote Request.
 * @package kstrap
 */

date_default_timezone_set('America/New_York');

//FORM VARS
$yourname      = ( isset( $_POST['yourname'] ) ? $_POST[''] : null );
$youremail     = ( isset( $_POST['youremail'] ) ? $_POST[''] : null );
$youraddr1     = ( isset( $_POST['youraddr1'] ) ? $_POST[''] : null );
$youraddr2     = ( isset( $_POST['youraddr2'] ) ? $_POST[''] : null );
$yourcity      = ( isset( $_POST['yourcity'] ) ? $_POST[''] : null );
$yourstate     = ( isset( $_POST['yourstate'] ) ? $_POST[''] : null );
$yourzip       = ( isset( $_POST['yourzip'] ) ? $_POST[''] : null );
$phone         = ( isset( $_POST['phone'] ) ? $_POST[''] : null );
$datesubmitted = date('F d, Y @ g:ia' );

$ownlease       = ( isset( $_POST['ownlease'] ) ? $_POST[''] : null );
$insssn         = ( isset( $_POST['insssn'] ) ? $_POST[''] : null );
$driver1        = ( isset( $_POST['driver1'] ) ? $_POST[''] : null );
$dob1           = ( isset( $_POST['dob1'] ) ? $_POST[''] : null );
$martialstatus1 = ( isset( $_POST['martialstatus1']) ? $_POST[''] : null);
$dl1            = ( isset( $_POST['dl1'] ) ? $_POST[''] : null );
$driver2        = ( isset( $_POST['driver2'] ) ? $_POST[''] : null );
$dob2           = ( isset( $_POST['dob2'] ) ? $_POST[''] : null );
$martialstatus2 = ( isset( $_POST['martialstatus2']) ? $_POST[''] : null);
$dl2            = ( isset( $_POST['dl2'] ) ? $_POST[''] : null );
$driver3        = ( isset( $_POST['driver3'] ) ? $_POST[''] : null );
$dob3           = ( isset( $_POST['dob3'] ) ? $_POST[''] : null );
$martialstatus3 = ( isset( $_POST['martialstatus3'] ) ? $_POST[''] : null );
$dl3            = ( isset( $_POST['dl3'] ) ? $_POST[''] : null );
$driver4        = ( isset( $_POST['driver4'] ) ? $_POST[''] : null );
$dob4           = ( isset( $_POST['dob4'] ) ? $_POST[''] : null );
$martialstatus4 = ( isset( $_POST['martialstatus4'] ) ? $_POST[''] : null );
$dl4            = ( isset( $_POST['dl4'] ) ? $_POST[''] : null );

$curcompany = ( isset( $_POST['curcompany'] ) ? $_POST[''] : null );
$expdate    = ( isset( $_POST['expdate'] ) ? $_POST[''] : null );
$bi         = ( isset( $_POST['bi'] ) ? $_POST[''] : null );
$pd         = ( isset( $_POST['pd'] ) ? $_POST[''] : null );
$um         = ( isset( $_POST['um'] ) ? $_POST[''] : null );
$mp         = ( isset( $_POST['mp'] ) ? $_POST[''] : null );
$comp       = ( isset( $_POST['comp'] ) ? $_POST[''] : null );
$coll       = ( isset( $_POST['coll'] ) ? $_POST[''] : null );
$rental     = ( isset( $_POST['rental'] ) ? $_POST[''] : null );
$tow        = ( isset( $_POST['tow'] ) ? $_POST[''] : null );

$vehicle1 = ( isset( $_POST['vehicle1'] ) ? $_POST[''] : null );
$vin1     = ( isset( $_POST['vin1'] ) ? $_POST[''] : null );
$pdriver1 = ( isset( $_POST['pdriver1'] ) ? $_POST[''] : null );
$puse1    = ( isset( $_POST['puse1'] ) ? $_POST[''] : null );
$vehicle2 = ( isset( $_POST['vehicle2'] ) ? $_POST[''] : null );
$vin2     = ( isset( $_POST['vin2'] ) ? $_POST[''] : null );
$pdriver2 = ( isset( $_POST['pdriver2'] ) ? $_POST[''] : null );
$puse2    = ( isset( $_POST['puse2'] ) ? $_POST[''] : null );
$vehicle3 = ( isset( $_POST['vehicle3'] ) ? $_POST[''] : null );
$vin3     = ( isset( $_POST['vin3'] ) ? $_POST[''] : null );
$pdriver3 = ( isset( $_POST['pdriver3'] ) ? $_POST[''] : null );
$puse3    = ( isset( $_POST['puse3'] ) ? $_POST[''] : null );
$vehicle4 = ( isset( $_POST['vehicle4'] ) ? $_POST[''] : null );
$vin4     = ( isset( $_POST['vin4'] ) ? $_POST[''] : null );
$pdriver4 = ( isset( $_POST['pdriver4'] ) ? $_POST[''] : null );
$puse4    = ( isset( $_POST['puse4'] ) ? $_POST[''] : null );

$formID        = ( isset( $_POST['formID'] ) ? $_POST['formID'] : '' );
$securityFlag  = ( isset( $_POST['secu'] ) ? $_POST['secu'] : '' );
$formSubmitted = ( $formID == 'auto-quote' && $securityFlag == '' ? true : false );

if( $formSubmitted ) {

    //TODO: DO SOMETHING
    echo '<pre>',print_r($_POST),'</pre>';

}

?>

<form class="form-horizontal" name="quoteform" id="mainForm" method="post" enctype="multipart/form-data" action="<?php the_permalink(); ?>">
    <input type="hidden" name="formID" value="auto-quote">

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
                <span class="float-right"><span class="req">*</span> = required</span>
                <h2>Contact Information</h2>
                <hr />
            </div>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="name" class="col-md-3 control-label text-md-right">Full Name<span class="req">*</span></label>
        <div class="col-md-5 form-group <?php echo ($yourname == '' && $formSubmitted ? 'has-error' : ''); ?>">
            <input type="text" class="form-control" value="<?php echo $yourname; ?>" name="yourname">
        </div>
    </div>
    <div class="row align-items-center">
        <label for="email" class="col-md-3 control-label text-md-right">Email Address<span class="req">*</span></label>
        <div class="col-md-5 form-group <?php echo (($youremail == '' && $formSubmitted) || (!filter_var($youremail, FILTER_VALIDATE_EMAIL) && !preg_match('/@.+\./', $youremail) && $_POST) ? 'has-error' : ''); ?>">
            <input type="text" class="form-control" value="<?php echo $youremail; ?>" name="youremail">
        </div>
    </div>
    <div class="row align-items-center">
        <label for="phone1" class="col-md-3 control-label text-md-right">Phone Number<span class="req">*</span></label>
        <div class="col-md-9 form-group form-inline <?php echo ($phone == '' && $formSubmitted ? 'has-error' : ''); ?>" >
            <input type="tel" class="phoneinput form-control" placeholder="850-###-####" value="<?php echo $ph1; ?>" name="phone" id="phone" >
        </div>
    </div>
    <div class="row align-items-center">
        <label for="youraddr1" class="col-md-3 control-label text-md-right">Physical Address<span class="req">*</span></label>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6 form-group <?php echo ($youraddr1 == '' && $formSubmitted ? 'has-error' : ''); ?>" id="addr1">
                    <input type="text" class="form-control" value="<?php echo ($youraddr1!='' && $formSubmitted ? $youraddr1 : ''); ?>" placeholder="Street" name="youraddr1">
                </div>
                <div class="col-md-4 form-group <?php echo ($youraddr2 == '' && $formSubmitted ? 'has-error' : ''); ?>" id="addr2">
                    <input type="text" class="form-control" value="<?php echo ($youraddr2!='' && $formSubmitted ? $youraddr2 : ''); ?>" placeholder="Apt/Suite" name="youraddr2">
                </div>
                <div class="col-xs-7 col-md-4 form-group <?php echo ($yourcity == '' && $formSubmitted ? 'has-error' : ''); ?>" id="city">
                    <input type="text" class="form-control" value="<?php echo ($yourcity!='' && $formSubmitted ? $yourcity : ''); ?>" placeholder="Marianna" name="yourcity">
                </div>
                <div class="col-xs-6 col-md-2 form-group <?php echo ($yourstate == '' && $formSubmitted ? 'has-error' : ''); ?>" id="state">
                    <select class="form-control" name="yourstate">
                        <?php //TODO: Add state array loop; ?>
                    </select>
                </div>
                <div class="col-xs-4 col-md-2 form-group <?php echo ($yourzip == '' && $formSubmitted ? 'has-error' : ''); ?>" id="zip">
                    <input type="text" class="form-control" value="<?php echo ($yourzip != '' && $formSubmitted ? $yourzip : ''); ?>" placeholder="32448" name="yourzip">
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
                <h2>Quote Information</h2>
                <hr />
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-5">
            <div class="radio-group">
                <label class="custom-control custom-radio"><input type="radio" name="ownlease" id="ownlease1" value="Own" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Own</span></label>
                <label class="custom-control custom-radio"><input type="radio" name="ownlease" id="ownlease2" value="Lease" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Lease</span></label>
            </div>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="name" class="col-md-3 control-label text-md-right">Insured's SSN </label>
        <div class="col-md-5 form-group">
            <input type="text" class="form-control" value="<?php echo $insssn; ?>" name="insssn" placeholder="###-##-####">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
                <h3>Driver / Household Resident Information</h3>
            </div>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="driver1" class="col-md-3 control-label text-md-right">Driver</label>
        <div class="col-md-3 form-group nomargin first">
            <input type="text" class="form-control" value="<?php echo $driver1; ?>" name="driver1" placeholder="Name">
        </div>
        <label for="dob1" class="col-4 hidden-sm-up control-label" style="font-weight:normal;">DOB</label>
        <div class="col-6 col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $dob1; ?>" name="dob1" placeholder="DOB: mm/dd/yyyy" >
        </div>
        <label for="martialstatus1" class="col-md-2 control-label sr-only"></label>
        <div class="col-md-2 form-group nomargin">
            <select class="form-control" name="martialstatus1">
                <option value="" class="placeholder" <?php if($martialstatus1 == ''){ echo 'selected'; } ?> >Martial Status</option>
                <option value="Single" <?php if($martialstatus1 == 'Single'){ echo 'selected'; } ?> >Single</option>
                <option value="Married" <?php if($martialstatus1 == 'Married'){ echo 'selected'; } ?> >Married</option>
            </select>
        </div>
        <label for="dl1" class="col-md-1 control-label sr-only">DL#</label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $dl1; ?>" name="dl1" placeholder="DL#">
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="driver2" class="col-md-3 control-label text-md-right">Resident 1</label>
        <div class="col-md-3 form-group nomargin first">
            <input type="text" class="form-control" value="<?php echo $driver2; ?>" name="driver2" placeholder="Name">
        </div>
        <label for="dob2" class="col-4 hidden-sm-up control-label" style="font-weight:normal;">DOB</label>
        <div class="col-6 col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $dob2; ?>" name="dob2" placeholder="DOB: mm/dd/yyyy" >
        </div>
        <label for="martialstatus2" class="col-md-2 control-label sr-only"></label>
        <div class="col-md-2 form-group nomargin">
            <select class="form-control" name="martialstatus2">
                <option value="" class="placeholder" <?php if($martialstatus2 == ''){ echo 'selected'; } ?> >Martial Status</option>
                <option value="Single" <?php if($martialstatus2 == 'Single' ){ echo 'selected'; } ?> >Single</option>
                <option value="Married" <?php if($martialstatus2 == 'Married'){ echo 'selected'; } ?> >Married</option>
            </select>
        </div>
        <label for="dl2" class="col-md-1 control-label sr-only">DL#</label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $dl2; ?>" name="dl2" placeholder="DL#">
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="driver3" class="col-md-3 control-label text-md-right">Resident 2</label>
        <div class="col-md-3 form-group nomargin first">
            <input type="text" class="form-control" value="<?php echo $driver3; ?>" name="driver3" placeholder="Name">
        </div>
        <label for="dob3" class="col-4 hidden-sm-up control-label" style="font-weight:normal;">DOB</label>
        <div class="col-6 col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $dob3; ?>" name="dob3" placeholder="DOB: mm/dd/yyyy" >
        </div>
        <label for="martialstatus3" class="col-md-2 control-label sr-only"></label>
        <div class="col-md-2 form-group nomargin">
            <select class="form-control" name="martialstatus3">
                <option value="" class="placeholder" <?php if($martialstatus3 == ''){ echo 'selected'; } ?> >Martial Status</option>
                <option value="Single" <?php if($martialstatus3 == 'Single'){ echo 'selected'; } ?> >Single</option>
                <option value="Married" <?php if($martialstatus3 == 'Married'){ echo 'selected'; } ?> >Married</option>
            </select>
        </div>
        <label for="dl3" class="col-md-1 control-label sr-only">DL#</label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $dl3; ?>" name="dl3" placeholder="DL#">
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="driver4" class="col-md-3 control-label text-md-right">Resident 3</label>
        <div class="col-md-3 form-group nomargin first">
            <input type="text" class="form-control" value="<?php echo $driver4; ?>" name="driver4" placeholder="Name">
        </div>
        <label for="dob4" class="col-4 hidden-sm-up control-label" style="font-weight:normal;">DOB</label>
        <div class="col-6 col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $dob4; ?>" name="dob4" placeholder="DOB: mm/dd/yyyy" >
        </div>
        <label for="martialstatus4" class="col-md-2 control-label sr-only"></label>
        <div class="col-md-2 form-group nomargin">
            <select class="form-control" name="martialstatus4">
                <option value="" class="placeholder" <?php if($martialstatus4 == ''){ echo 'selected'; } ?> >Martial Status</option>
                <option value="Single" <?php if($martialstatus4 == 'Single'){ echo 'selected'; } ?> >Single</option>
                <option value="Married" <?php if($martialstatus4 == 'Married'){ echo 'selected'; } ?> >Married</option>
            </select>
        </div>
        <label for="dl4" class="col-md-1 control-label sr-only">DL#</label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $dl4; ?>" name="dl4" placeholder="DL#">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
                <h3>Prior Insurance Carrier 6 Months or more (if applicable)</h3>
            </div>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="curcompany" class="col-md-3 control-label text-md-right">Company</label>
        <div class="col-md-4 form-group">
            <input type="text" class="form-control" value="<?php echo $curcompany; ?>" name="curcompany" placeholder="">
        </div>
        <label for="expdate" class="col-md-2 control-label text-md-right">Expiration Date</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $expdate; ?>" name="expdate" placeholder="">
            <?php //TODO: datepicker for component; ?>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="priorcoverage" class="col-xs-12 col-md-3 control-label text-md-right">Prior Coverage</label>
        <div class="col-xs-12 col-md-4 form-group"><div class="input-group nomargin first">
                <div class="input-group-addon">$</div>
                <input type="text" class="form-control" value="<?php echo $bi; ?>" name="bi" placeholder="Bodily Injury Liability">
            </div>
        </div>
        <div class="col-xs-12 col-md-4 form-group"><div class="input-group nomargin">
                <div class="input-group-addon">$</div>
                <input type="text" class="form-control" value="<?php echo $pd; ?>" name="pd" placeholder="Property Damage Liability">
            </div>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="priorcoverage" class="col-xs-12 col-md-3 control-label text-md-right"></label>
        <div class="col-xs-12 col-md-4 form-group"><div class="input-group nomargin">
                <div class="input-group-addon">$</div>
                <input type="text" class="form-control" value="<?php echo $um; ?>" name="um" placeholder="Uninsured Motorist">
            </div>
        </div>
        <div class="col-xs-12 col-md-4 form-group"><div class="input-group nomargin">
                <div class="input-group-addon">$</div>
                <input type="text" class="form-control" value="<?php echo $mp; ?>" name="mp" placeholder="Medical Payments">
            </div>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="priorcoverage" class="col-xs-12 col-md-3 control-label text-md-right"></label>
        <div class="col-xs-12 col-md-4 form-group"><div class="input-group nomargin">
                <div class="input-group-addon">$</div>
                <input type="text" class="form-control" value="<?php echo $comp; ?>" name="comp" placeholder="Comprehensive Deductible">
            </div>
        </div>
        <div class="col-xs-12 col-md-4 form-group"><div class="input-group nomargin">
                <div class="input-group-addon">$</div>
                <input type="text" class="form-control" value="<?php echo $coll; ?>" name="coll" placeholder="Collision Coverage Deductible">
            </div>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="priorcoverage" class="col-xs-12 col-md-3 control-label text-md-right">Rental Coverage</label>
        <div class="col-xs-12 col-md-2">
            <div class="radio-group nomargin">
                <label class="custom-control custom-radio"><input type="radio" name="rental" id="rental1" <?php echo ($tow == 'rental' ? 'checked' : ''); ?> value="yes" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Yes</span></label>
                <label class="custom-control custom-radio"><input type="radio" name="rental" id="rental2" <?php echo ($tow == 'rental' ? 'checked' : ''); ?> value="no" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">No</span></label>
            </div>
        </div>
        <label for="priorcoverage" class="col-xs-12 col-md-4 control-label text-md-right">Towing Coverage</label>
        <div class="col-xs-12 col-md-2">
            <div class="radio-group nomargin">
                <label class="custom-control custom-radio"><input type="radio" name="tow" id="tow1" <?php echo ($tow == 'yes' ? 'checked' : ''); ?> value="yes" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Yes</span></label>
                <label class="custom-control custom-radio"><input type="radio" name="tow" id="tow2" <?php echo ($tow == 'no' ? 'checked' : ''); ?> value="no" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">No</span></label>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
                <h3>Vehicle Information</h3>
            </div>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="vehicle1" class="col-md-3 control-label text-md-right">Vehicle 1</label>
        <div class="col-md-3 form-group nomargin first">
            <input type="text" class="form-control" value="<?php echo $vehicle1; ?>" name="vehicle1" placeholder="Year, Make, Model">
        </div>
        <label for="vin1" class="col-md-1 control-label sr-only">DOB</label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $vin1; ?>" name="vin1" placeholder="VIN">
        </div>
        <label for="pdriver1" class="col-md-2 control-label sr-only"></label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $pdriver1; ?>" name="pdriver1" placeholder="Primary Driver">
        </div>
        <label for="puse1" class="col-md-1 control-label sr-only">DL#</label>
        <div class="col-md-2 form-group nomargin">
            <select class="form-control" name="puse1">
                <option value="" class="placeholder" <?php echo ($puse1 == '' ? 'selected' : ''); ?> >Primary Use</option>
                <option value="Commute to Work" <?php echo ($puse1 == 'Commute to Work' ? 'selected' : ''); ?> >Commute to Work</option>
                <option value="Pleasure" <?php echo ($puse1 == 'Pleasure' ? 'selected' : ''); ?> >Pleasure</option>
                <option value="Commercial" <?php echo ($puse1 == 'Commercial' ? 'selected' : ''); ?> >Commercial</option>
            </select>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="vehicle2" class="col-md-3 control-label text-md-right">Vehicle 2</label>
        <div class="col-md-3 form-group nomargin first">
            <input type="text" class="form-control" value="<?php echo $vehicle2; ?>" name="vehicle2" placeholder="Year, Make, Model">
        </div>
        <label for="vin2" class="col-md-1 control-label sr-only">DOB</label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $vin2; ?>" name="vin2" placeholder="VIN">
        </div>
        <label for="pdriver2" class="col-md-2 control-label sr-only"></label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $pdriver2; ?>" name="pdriver2" placeholder="Primary Driver">
        </div>
        <label for="puse1" class="col-md-2 control-label sr-only">DL#</label>
        <div class="col-md-2 form-group nomargin">
            <select class="form-control" name="puse2">
                <option value="" class="placeholder" <?php echo ($puse2 == '' ? 'selected' : ''); ?> >Primary Use</option>
                <option value="Commute to Work" <?php echo ($puse2 == 'Commute to Work' ? 'selected' : ''); ?> >Commute to Work</option>
                <option value="Pleasure" <?php echo ($puse2 == 'Pleasure' ? 'selected' : ''); ?> >Pleasure</option>
                <option value="Commercial" <?php echo ($puse2 == 'Commercial' ? 'selected' : ''); ?> >Commercial</option>
            </select>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="vehicle3" class="col-md-3 control-label text-md-right">Vehicle 3</label>
        <div class="col-md-3 form-group nomargin first">
            <input type="text" class="form-control" value="<?php echo $vehicle3; ?>" name="vehicle3" placeholder="Year, Make, Model">
        </div>
        <label for="vin3" class="col-md-1 control-label sr-only">DOB</label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $vin3; ?>" name="vin3" placeholder="VIN">
        </div>
        <label for="pdriver3" class="col-md-2 control-label sr-only"></label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $pdriver3; ?>" name="pdriver3" placeholder="Primary Driver">
        </div>
        <label for="puse3" class="col-md-2 control-label sr-only">DL#</label>
        <div class="col-md-2 form-group nomargin">
            <select class="form-control" name="puse3">
                <option value="" class="placeholder" <?php echo ($puse3 == '' ? 'selected' : ''); ?> >Primary Use</option>
                <option value="Commute to Work" <?php echo ($puse3 == 'Commute to Work' ? 'selected' : ''); ?> >Commute to Work</option>
                <option value="Pleasure" <?php echo ($puse3 == 'Pleasure' ? 'selected' : ''); ?> >Pleasure</option>
                <option value="Commercial" <?php echo ($puse3 == 'Commercial' ? 'selected' : ''); ?> >Commercial</option>
            </select>
        </div>
    </div>
    <div class="row align-items-center" >
        <label for="vehicle4" class="col-md-3 control-label text-md-right">Vehicle 4</label>
        <div class="col-md-3 form-group nomargin first">
            <input type="text" class="form-control" value="<?php echo $vehicle4; ?>" name="vehicle4" placeholder="Year, Make, Model">
        </div>
        <label for="vin4" class="col-md-1 control-label sr-only">DOB</label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $vin4; ?>" name="vin4" placeholder="VIN">
        </div>
        <label for="pdriver4" class="col-md-2 control-label sr-only"></label>
        <div class="col-md-2 form-group nomargin">
            <input type="text" class="form-control" value="<?php echo $pdriver4; ?>" name="pdriver4" placeholder="Primary Driver">
        </div>
        <label for="puse4" class="col-md-2 control-label sr-only">DL#</label>
        <div class="col-md-2 form-group nomargin">
            <select class="form-control" name="puse4">
                <option value="" class="placeholder" <?php echo ($puse4 == '' ? 'selected' : ''); ?> >Primary Use</option>
                <option value="Commute to Work" <?php echo ($puse4 == 'Commute to Work' ? 'selected' : ''); ?> >Commute to Work</option>
                <option value="Pleasure" <?php echo ($puse4 == 'Pleasure' ? 'selected' : ''); ?> >Pleasure</option>
                <option value="Commercial" <?php echo ($puse4 == 'Commercial' ? 'selected' : ''); ?> >Commercial</option>
            </select>
        </div>
    </div>

    <div class="row align-items-center" >
        <div class="col-md-3 form-group">&nbsp;</div>
    </div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-10 ">
            <div class="form-group">
                <input type="text" name="secu" value="" style="position:absolute; height:1px; width:1px; top:-10000px; left:-10000px;">
                <button type="submit" class="btn btn-primary">Submit Quote Request</button>
            </div>
        </div>
    </div>

</form>
