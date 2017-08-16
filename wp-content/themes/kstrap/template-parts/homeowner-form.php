<?php
/**
 * The template for the Homeowners Quote Request.
 * @package kstrap
 */

date_default_timezone_set('America/New_York');


//FORM VARS
$yourname      = ( isset( $_POST['yourname'] ) ? $_POST['yourname'] : null );
$youremail     = ( isset( $_POST['youremail'] ) ? $_POST['youremail'] : null );
$youraddr1     = ( isset( $_POST['youraddr1'] ) ? $_POST['youraddr1'] : null );
$youraddr2     = ( isset( $_POST['youraddr2'] ) ? $_POST['youraddr2'] : null );
$yourcity      = ( isset( $_POST['yourcity'] ) ? $_POST['yourcity'] : null );
$yourstate     = ( isset( $_POST['yourstate'] ) ? $_POST['yourstate'] : null );
$yourzip       = ( isset( $_POST['yourzip'] ) ? $_POST['yourzip'] : null );
$phone         = ( isset( $_POST['phone'] ) ? $_POST['phone'] : null );
$datesubmitted = date( 'F d, Y @ g:ia' );

$construction      = ( isset( $_POST['construction'] ) ? $_POST['construction'] : null );
$yearbuilt         = ( isset( $_POST['yearbuilt'] ) ? $_POST['yearbuilt'] : null );
$foundation        = ( isset( $_POST['foundation'] ) ? $_POST['foundation'] : null );
$occupancy         = ( isset( $_POST['occupancy'] ) ? $_POST['occupancy'] : null );
$roofcovering      = ( isset( $_POST['roofcovering'] ) ? $_POST['roofcovering'] : null );
$roofstyle         = ( isset( $_POST['roofstyle'] ) ? $_POST['roofstyle'] : null );
$protectivedevices = ( isset( $_POST['protectivedevices'] ) ? $_POST['protectivedevices'] : null );
$pool              = ( isset( $_POST['pool'] ) ? $_POST['pool'] : null );
$pooltype          = ( isset( $_POST['pooltype'] ) ? $_POST['pooltype'] : null );
$roofupdates       = ( isset( $_POST['roofupdates'] ) ? $_POST['roofupdates'] : null );
$wiringupdates     = ( isset( $_POST['wiringupdates'] ) ? $_POST['wiringupdates'] : null );
$plumbingupdates   = ( isset( $_POST['plumbingupdates'] ) ? $_POST['plumbingupdates'] : null );
$heatairupdates    = ( isset( $_POST['heatairupdates'] ) ? $_POST['heatairupdates'] : null );
$dwellinglimit     = ( isset( $_POST['dwellinglimit'] ) ? $_POST['dwellinglimit'] : null );
$contentslimit     = ( isset( $_POST['contentslimit'] ) ? $_POST['contentslimit'] : null );
$curcompany        = ( isset( $_POST['curcompany'] ) ? $_POST['curcompany'] : null );
$expdate           = ( isset( $_POST['expdate'] ) ? $_POST['expdate'] : null );
$pets              = ( isset( $_POST['pets'] ) ? $_POST['pets'] : null );
$pettypes          = ( isset( $_POST['pettypes'] ) ? $_POST['pettypes'] : null );
$numpets           = ( isset( $_POST['numpets'] ) ? $_POST['numpets'] : null );

$formID        = ( isset( $_POST['formID'] ) ? $_POST['formID'] : '' );
$securityFlag  = ( isset( $_POST['secu'] ) ? $_POST['secu'] : '' );
$formSubmitted = ( $formID == 'homeowners-quote' && $securityFlag == '' ? true : false );

if( $formSubmitted ) {

    //TODO: DO SOMETHING
    echo '<pre>',print_r($_POST),'</pre>';

}

?>

<form class="form-horizontal" name="quoteform" id="mainForm" method="post" enctype="multipart/form-data" action="<?php the_permalink(); ?>">
    <input type="hidden" name="formID" value="homeowners-quote" >
    <div class="row no-gutters"></div>

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
        <div class="col-md-5 form-group <?php echo ($yourname == '' && $_POST ? 'has-error' : '') ?>">
            <input type="text" class="form-control" value="<?php echo $yourname; ?>" name="yourname">
        </div>
    </div>

    <div class="row align-items-center">
        <label for="email" class="col-md-3 control-label text-md-right">Email Address<span class="req">*</span></label>
        <div class="col-md-5 form-group <?php echo (($youremail == '' && $_POST) || (!filter_var($youremail, FILTER_VALIDATE_EMAIL) && !preg_match('/@.+\./', $youremail) && $_POST) ? 'has-error' : '');  ?>">
            <input type="text" class="form-control" value="<?php echo $youremail; ?>" name="youremail">
        </div>
    </div>

    <div class="row align-items-center">
        <label for="phone1" class="col-md-3 control-label text-md-right">Phone Number<span class="req">*</span></label>
        <div class="col-md-9 form-group form-inline <?php echo ($phone == '' && $_POST ? 'has-error' : ''); ?>">
            <input type="tel" class="phoneinput form-control" placeholder="850-###-####" value="<?php echo $phone; ?>" name="phone" id="phone"  >
        </div>
    </div>

    <div class="row align-items-center">
        <label for="youraddr1" class="col-md-3 control-label text-md-right">Physical Address<span class="req">*</span></label>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6 form-group <?php echo ($youraddr1 == '' && $_POST ? 'has-error' : '' ); ?>" id="addr1">
                    <input type="text" class="form-control" value="<?php echo $youraddr1; ?>" placeholder="Street" name="youraddr1">
                </div>
                <div class="col-md-4 form-group <?php echo ($youraddr2 == '' && $_POST ? 'has-error' : '' ); ?>" id="addr2">
                    <input type="text" class="form-control" value="<?php echo $youraddr2; ?>" placeholder="Apt/Suite" name="youraddr2">
                </div>
                <div class="col-xs-7 col-md-4 form-group <?php echo ($yourcity == '' && $_POST ? 'has-error' : '' ); ?>" id="city">
                    <input type="text" class="form-control" value="<?php echo ($yourcity!='' && $_POST ? $yourcity : '' ); ?>" placeholder="Marianna" name="yourcity">
                </div>
                <div class="col-xs-6 col-md-2 form-group <?php echo ($yourstate == '' && $_POST ? 'has-error' : '' ); ?>" id="state">
                    <select class="form-control" name="yourstate">
                        <?php //TODO: Add state array loop; ?>
                    </select>
                </div>
                <div class="col-xs-4 col-md-2 form-group <?php echo ($yourzip == '' && $_POST ? 'has-error' : '' ); ?>" id="zip">
                    <input type="text" class="form-control" value="<?php echo ($yourzip!='' && $_POST ? $yourzip : '' ); ?>" placeholder="32448" name="yourzip">
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

    <div class="row align-items-center" >
        <label for="construction" class="col-md-3 control-label text-md-right">Construction</label>
        <div class="col-md-3 form-group">
            <select class="form-control" name="construction">
                <option value="" class="placeholder" <?php echo ($construction == '' ? 'selected' : '' ); ?> >- Choose One -</option>
                <option value="Brick (Masonry)" <?php echo ($construction == 'Brick (Masonry)' ? 'selected' : '' ); ?> >Brick (Masonry)</option>
                <option value="Wood Frame" <?php echo ($construction == 'Wood Frame' ? 'selected' : '' ); ?> >Wood Frame</option>
                <option value="Frame W/ Brick veneer (Hardy Board)" <?php echo ($construction == 'Frame W/ Brick veneer (Hardy Board)' ? 'selected' : '' ); ?> >Frame W/ Brick veneer (Hardy Board)</option>
            </select>
        </div>
        <label for="yearbuilt" class="col-md-2 control-label text-md-right">Year Built</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $yearbuilt; ?>" name="yearbuilt" placeholder="">
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="foundation" class="col-md-3 control- text-md-right">Foundation</label>
        <div class="col-md-3 form-group">
            <select class="form-control" name="foundation">
                <option <?php echo ($foundation == '' ? 'selected' : ''); ?> >- Choose One -</option>
                <option value="Open" <?php echo ($foundation == 'Open' ? 'selected' : ''); ?>>Open</option>
                <option value="Closed" <?php echo ($foundation == 'Closed' ? 'selected' : ''); ?> >Closed</option>
                <option value="On Stilts" <?php echo ($foundation == 'On Stilts' ? 'selected' : ''); ?> >On Stilts</option>
            </select>
        </div>
        <label for="occupancy" class="col-md-2 control-label text-md-right">Occupancy</label>
        <div class="col-md-3 form-group">
            <select class="form-control" name="occupancy">
                <option <?php echo ($occupancy == '' ? 'selected' : ''); ?> >- Choose One -</option>
                <option value="Primary" <?php echo ($occupancy == 'Primary' ? 'selected' : ''); ?> >Primary</option>
                <option value="Secondary" <?php echo ($occupancy == 'Secondary' ? 'selected' : ''); ?> >Secondary</option>
                <option value="Short Term Rental" <?php echo ($occupancy == 'Short Term Rental' ? 'selected' : ''); ?> >Short Term Rental</option>
            </select>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="roofcovering" class="col-md-3 control-label text-md-right">Roof Covering</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $roofcovering; ?>" name="roofcovering" placeholder="">
        </div>
        <label for="roofstyle" class="col-md-2 control-label text-md-right">Roof Style</label>
        <div class="col-md-3 form-group">
            <select class="form-control" name="roofstyle">
                <option <?php echo ($roofstyle == '' ? 'selected' : ''); ?> >- Choose One -</option>
                <option value="Hip" <?php echo ($roofstyle == 'Hip' ? 'selected' : ''); ?> >Hip</option>
                <option value="Gable" <?php echo ($roofstyle == 'Gable' ? 'selected' : ''); ?> >Gable</option>
            </select>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="protectivedevices" class="col-md-3 control-label text-md-right">Protective Devices</label>
        <div class="col-md-8 form-group">
            <input type="text" class="form-control" value="<?php echo $protectivedevices; ?>" name="protectivedevices" placeholder="">
        </div>
    </div>

    <div class="row align-items-center">
        <label for="pool" class="col-md-3 control-label text-md-right">Pool on premises</label>
        <div class="col-md-3">
            <div class="radio-group">
                <label class="custom-control custom-radio"><input type="radio" name="pool" id="pool1" <?php echo ($pool == 'yes' ? 'checked' : ''); ?> value="yes" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Yes</span></label>
                <label class="custom-control custom-radio"><input type="radio" name="pool" id="pool2" <?php echo ($pool == 'no' ? 'checked' : ''); ?> value="no" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">No</span></label>
            </div>
        </div>
        <div id="pooltypesection" class="col-md-5 no-gutters">
            <div class="row align-items-center">
                <label for="pooltype" class="col-md-5 control-label text-md-right" id="pooltypelabel">Pool Type</label>
                <div class="col-md-7 form-group" id="pooltype">
                    <select class="form-control" name="pooltype">
                        <option <?php echo( $pooltype == '' ? 'selected' : '' ); ?> >- Choose One -</option>
                        <option value="Above Ground" <?php echo( $pooltype == 'Above Ground' ? 'selected' : '' ); ?> >Above Ground</option>Below Ground</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="closingdate" class="col-md-3 control-label text-md-right">Closing/Effective Date</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control datepicker mobilehide" value="<?php echo $closingdate; ?>" name="closingdate" placeholder="">
            <?php //TODO: datepicker for component; ?>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
            <h3>Updates</h3>
            </div>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="roofupdates" class="col-md-3 control-label text-md-right">Roof</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $roofupdates; ?>" name="roofupdates" placeholder="">
        </div>
        <label for="wiringupdates" class="col-md-2 control-label text-md-right">Wiring</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $wiringupdates; ?>" name="wiringupdates" placeholder="">
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="plumbingupdates" class="col-md-3 control-label text-md-right">Plumbing</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $plumbingupdates; ?>" name="plumbingupdates" placeholder="">
        </div>
        <label for="heatairupdates" class="col-md-2 control-label text-md-right">Heat/Air</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $heatairupdates; ?>" name="heatairupdates" placeholder="">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
            <h3>Coverages</h3>
            </div>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="dwellinglimit" class="col-md-3 control-label text-md-right">Dwelling Limit</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $dwellinglimit; ?>" name="dwellinglimit" placeholder="$ value of home">
        </div>
        <label for="contentslimit" class="col-md-2 control-label text-md-right">Contents Limit</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $contentslimit; ?>" name="contentslimit" placeholder="$ value of contents">
        </div>
    </div>

    <div class="row align-items-center">
        <div class="offset-md-3 col-md-8 ">
            <div class="form-group">
            <h3>Current Carrier</h3>
            </div>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="curcompany" class="col-md-3 control-label text-md-right">Company</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control" value="<?php echo $curcompany; ?>" name="curcompany" placeholder="">
        </div>
        <label for="expdate" class="col-md-2 control-label text-md-right">Expiration Date</label>
        <div class="col-md-3 form-group">
            <input type="text" class="form-control datepicker mobilehide" value="<?php echo $expdate; ?>" name="expdate" placeholder="">
            <?php //TODO: datepicker for component; ?>
        </div>
    </div>

    <div class="row align-items-center" >
        <label for="pets" class="col-md-3 control-label text-md-right">Pets</label>
        <div class="col-md-3">
            <div class="radio-group">
                <label class="custom-control custom-radio"><input type="radio" name="pets" id="pets1" <?php echo ($pets == 'yes' ? 'checked' : '' ); ?> value="yes" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Yes</span></label>
                <label class="custom-control custom-radio"><input type="radio" name="pets" id="pets2" <?php echo ($pets == 'no' ? 'checked' : ''); ?> value="no" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">No</span></label>
            </div>
        </div>
    </div>

    <div class="row align-items-center" id="petinfo" >
        <label for="pettypes" class="col-md-3 control-label text-md-right">Pet Types</label>
        <div class="col-md-4 form-group">
            <input type="text" class="form-control" value="<?php echo $pettypes; ?>" name="pettypes" placeholder="">
        </div>
        <label for="numpets" class="col-md-2 control-label text-md-right"># of Pets</label>
        <div class="col-md-2 form-group">
            <input type="num" class="form-control" value="<?php echo $numpets; ?>" name="numpets" placeholder="">
        </div>
    </div>

    <div class="row" >
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

<script>
    $(document).ready(function () {

        $('#petinfo').toggle(false);
        $('input[name="pets"]').bind('change', function () {
            var showOrHide = ($(this).val() == 'yes') ? true : false;
            $('#petinfo').toggle(showOrHide);
        });

        $('#pooltypesection').toggle(false);
        $('input[name="pool"]').bind('change', function () {
            var showOrHide = ($(this).val() == 'yes') ? true : false;
            $('#pooltypesection').toggle(showOrHide);
        });

    });
</script>