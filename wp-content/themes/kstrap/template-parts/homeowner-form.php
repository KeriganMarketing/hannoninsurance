<?php
/**
 * The template for the Homeowners Quote Request.
 * @package kstrap
 */

date_default_timezone_set('America/Chicago');
?>

<form class="form-horizontal" name="quoteform" id="mainForm" method="post" enctype="multipart/form-data" action="<?php the_permalink(); ?>">
    <span class="pull-right"><span class="req">*</span> = required</span>
    <div class="row">
        <div class="col-sm-offset-3 col-sm-8 ">
            <div class="form-group">
                <h2>Contact Information</h2>
                <hr />
            </div>
        </div>
    </div>

    <div class="row" >
        <label for="name" class="col-sm-3 control-label">Full Name<span class="req">*</span></label>
        <div class="col-sm-5 form-group <?php if ($yourname == '' && $_POST) {
                                    echo 'has-error';
                                } ?>">
            <input type="text" class="form-control" value="<?php echo $yourname; ?>" name="yourname">
        </div>
    </div>

    <div class="row">
        <label for="email" class="col-sm-3 control-label">Email Address<span class="req">*</span></label>
        <div class="col-sm-5 form-group <?php if (($youremail == '' && $_POST) || (!filter_var($youremail, FILTER_VALIDATE_EMAIL) && !preg_match('/@.+\./', $youremail) && $_POST)) {
                                    echo 'has-error';
                                } ?>">
            <input type="text" class="form-control" value="<?php echo $youremail; ?>" name="youremail">
        </div>
    </div>

    <div class="row">
        <label for="phone1" class="col-sm-3 control-label">Phone Number<span class="req">*</span></label>
        <div class="col-sm-9 form-group form-inline <?php if (($ph1 == '' || $ph2 == '' || $ph3 == '') && $_POST) {
                                    echo 'has-error';
                                } ?>">
            <input type="tel" class="phoneinput form-control" placeholder="850" value="<?php echo $ph1; ?>" name="phone1" id="phone1" maxlength="3" style="width:55px;" >
            <input type="tel" class="phoneinput form-control" value="<?php echo $ph2; ?>" name="phone2" id="phone2" maxlength="3" style="width:55px;" >
            <input type="tel" class="phoneinput form-control" value="<?php echo $ph3; ?>" name="phone3" id="phone3" maxlength="4" style="width:70px;" >
        </div>
    </div>

    <div class="row">
        <label for="youraddr1" class="col-sm-3 control-label">Physical Address<span class="req">*</span></label>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-6 form-group <?php if ($youraddr1 == '' && $_POST) {
                                    echo 'has-error';
                                } ?>" id="addr1">
                    <input type="text" class="form-control" value="<?php echo $youraddr1; ?>" placeholder="Street" name="youraddr1">
                </div>
                <div class="col-sm-4 form-group <?php if ($youraddr2 == '' && $_POST) {
                                    echo 'has-error';
                                } ?>" id="addr2">
                    <input type="text" class="form-control" value="<?php echo $youraddr2; ?>" placeholder="Apt/Suite" name="youraddr2">
                </div>
                <div class="col-xs-7 col-sm-4 form-group <?php if ($yourcity == '' && $_POST) {
                                    echo 'has-error';
                                } ?>" id="city">
                    <input type="text" class="form-control" value="<?php if ($yourcity!='' && $_POST) {
                                    echo $yourcity;
                                } ?>" placeholder="Marianna" name="yourcity">
                </div>
                <div class="col-xs-6 col-sm-2 form-group <?php if ($yourstate == '' && $_POST) {
                                    echo 'has-error';
                                } ?>" id="state">
                    <select class="form-control" name="yourstate">
                        <option value="AL" <?php if ($yourstate == 'AL') {
                                    echo 'selected';
                                } ?> >Alabama</option>
                        <option value="AK" <?php if ($yourstate == 'AK') {
                                    echo 'selected';
                                } ?> >Alaska</option>
                        <option value="AZ" <?php if ($yourstate == 'AZ') {
                                    echo 'selected';
                                } ?> >Arizona</option>
                        <option value="AR" <?php if ($yourstate == 'AR') {
                                    echo 'selected';
                                } ?> >Arkansas</option>
                        <option value="CA" <?php if ($yourstate == 'CA') {
                                    echo 'selected';
                                } ?> >California</option>
                        <option value="CO" <?php if ($yourstate == 'CO') {
                                    echo 'selected';
                                } ?> >Colorado</option>
                        <option value="CT" <?php if ($yourstate == 'CT') {
                                    echo 'selected';
                                } ?> >Connecticut</option>
                        <option value="DE" <?php if ($yourstate == 'DE') {
                                    echo 'selected';
                                } ?> >Delaware</option>
                        <option value="FL" <?php if ($yourstate == 'FL' || $yourstate == '') {
                                    echo 'selected';
                                } ?> >Florida</option>
                        <option value="GA" <?php if ($yourstate == 'GA') {
                                    echo 'selected';
                                } ?> >Georgia</option>
                        <option value="HI" <?php if ($yourstate == 'HI') {
                                    echo 'selected';
                                } ?> >Hawaii</option>
                        <option value="ID" <?php if ($yourstate == 'ID') {
                                    echo 'selected';
                                } ?> >Idaho</option>
                        <option value="IL" <?php if ($yourstate == 'IL') {
                                    echo 'selected';
                                } ?> >Illinois</option>
                        <option value="IN" <?php if ($yourstate == 'IN') {
                                    echo 'selected';
                                } ?> >Indiana</option>
                        <option value="IA" <?php if ($yourstate == 'IA') {
                                    echo 'selected';
                                } ?> >Iowa</option>
                        <option value="KS" <?php if ($yourstate == 'KS') {
                                    echo 'selected';
                                } ?> >Kansas</option>
                        <option value="KY" <?php if ($yourstate == 'KY') {
                                    echo 'selected';
                                } ?> >Kentucky</option>
                        <option value="LA" <?php if ($yourstate == 'LA') {
                                    echo 'selected';
                                } ?> >Louisiana</option>
                        <option value="ME" <?php if ($yourstate == 'ME') {
                                    echo 'selected';
                                } ?> >Maine</option>
                        <option value="MD" <?php if ($yourstate == 'MD') {
                                    echo 'selected';
                                } ?> >Maryland</option>
                        <option value="MA" <?php if ($yourstate == 'MA') {
                                    echo 'selected';
                                } ?> >Massachusetts</option>
                        <option value="MI" <?php if ($yourstate == 'MI') {
                                    echo 'selected';
                                } ?> >Michigan</option>
                        <option value="MN" <?php if ($yourstate == 'MN') {
                                    echo 'selected';
                                } ?> >Minnesota</option>
                        <option value="MS" <?php if ($yourstate == 'MS') {
                                    echo 'selected';
                                } ?> >Mississippi</option>
                        <option value="MO" <?php if ($yourstate == 'MO') {
                                    echo 'selected';
                                } ?> >Missouri</option>
                        <option value="MT" <?php if ($yourstate == 'MT') {
                                    echo 'selected';
                                } ?> >Montana</option>
                        <option value="NE" <?php if ($yourstate == 'NE') {
                                    echo 'selected';
                                } ?> >Nebraska</option>
                        <option value="NV" <?php if ($yourstate == 'NV') {
                                    echo 'selected';
                                } ?> >Nevada</option>
                        <option value="NH" <?php if ($yourstate == 'NH') {
                                    echo 'selected';
                                } ?> >New Hampshire</option>
                        <option value="NJ" <?php if ($yourstate == 'NJ') {
                                    echo 'selected';
                                } ?> >New Jersey</option>
                        <option value="NM" <?php if ($yourstate == 'NM') {
                                    echo 'selected';
                                } ?> >New Mexico</option>
                        <option value="NY" <?php if ($yourstate == 'NY') {
                                    echo 'selected';
                                } ?> >New York</option>
                        <option value="NC" <?php if ($yourstate == 'NC') {
                                    echo 'selected';
                                } ?> >North Carolina</option>
                        <option value="ND" <?php if ($yourstate == 'ND') {
                                    echo 'selected';
                                } ?> >North Dakota</option>
                        <option value="OH" <?php if ($yourstate == 'OH') {
                                    echo 'selected';
                                } ?> >Ohio</option>
                        <option value="OK" <?php if ($yourstate == 'OK') {
                                    echo 'selected';
                                } ?> >Oklahoma</option>
                        <option value="OR" <?php if ($yourstate == 'OR') {
                                    echo 'selected';
                                } ?> >Oregon</option>
                        <option value="PA" <?php if ($yourstate == 'PA') {
                                    echo 'selected';
                                } ?> >Pennsylvania</option>
                        <option value="RI" <?php if ($yourstate == 'RI') {
                                    echo 'selected';
                                } ?> >Rhode Island</option>
                        <option value="SC" <?php if ($yourstate == 'SC') {
                                    echo 'selected';
                                } ?> >South Carolina</option>
                        <option value="SD" <?php if ($yourstate == 'SD') {
                                    echo 'selected';
                                } ?> >South Dakota</option>
                        <option value="TN" <?php if ($yourstate == 'TN') {
                                    echo 'selected';
                                } ?> >Tennessee</option>
                        <option value="TX" <?php if ($yourstate == 'TX') {
                                    echo 'selected';
                                } ?> >Texas</option>
                        <option value="UT" <?php if ($yourstate == 'UT') {
                                    echo 'selected';
                                } ?> >Utah</option>
                        <option value="VT" <?php if ($yourstate == 'VT') {
                                    echo 'selected';
                                } ?> >Vermont</option>
                        <option value="VA" <?php if ($yourstate == 'VA') {
                                    echo 'selected';
                                } ?> >Virginia</option>
                        <option value="WA" <?php if ($yourstate == 'WA') {
                                    echo 'selected';
                                } ?> >Washington</option>
                        <option value="WV" <?php if ($yourstate == 'WV') {
                                    echo 'selected';
                                } ?> >West Virginia</option>
                        <option value="WI" <?php if ($yourstate == 'WI') {
                                    echo 'selected';
                                } ?> >Wisconsin</option>
                        <option value="WY" <?php if ($yourstate == 'WY') {
                                    echo 'selected';
                                } ?> >Wyoming</option>
                    </select>
                </div>
                <div class="col-xs-4 col-sm-2 form-group <?php if ($yourzip == '' && $_POST) {
                                    echo 'has-error';
                                } ?>" id="zip">
                    <input type="text" class="form-control" value="<?php if ($yourzip!='' && $_POST) {
                                    echo $yourzip;
                                } ?>" placeholder="32448" name="yourzip">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-8 ">
            <div class="form-group">
            <h2>Quote Information</h2>
            <hr />
            </div>
        </div>
    </div>

    <div class="row" >
        <label for="construction" class="col-sm-3 control-label">Construction</label>
        <div class="col-sm-3 form-group <?php //if($construction == '' && $_POST){ echo 'has-error'; }?>">
            <select class="form-control" name="construction">
                <option value="" class="placeholder" <?php if ($construction == '') {
                                    echo 'selected';
                                } ?> >- Choose One -</option>
                <option value="Brick (Masonry)" <?php if ($construction == 'Brick (Masonry)') {
                                    echo 'selected';
                                } ?> >Brick (Masonry)</option>
                <option value="Wood Frame" <?php if ($construction == 'Wood Frame') {
                                    echo 'selected';
                                } ?> >Wood Frame</option>
                <option value="Frame W/ Brick veneer (Hardy Board)" <?php if ($construction == 'Frame W/ Brick veneer (Hardy Board)') {
                                    echo 'selected';
                                } ?> >Frame W/ Brick veneer (Hardy Board)</option>
            </select>
        </div>
        <label for="yearbuilt" class="col-sm-2 control-label">Year Built</label>
        <div class="col-sm-3 form-group <?php //if($yearbuilt == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $yearbuilt; ?>" name="yearbuilt" placeholder="">
        </div>
    </div>

    <div class="row" >
        <label for="foundation" class="col-sm-3 control-label">Foundation</label>
        <div class="col-sm-3 form-group <?php //if($foundation == '' && $_POST){ echo 'has-error'; }?>">
            <select class="form-control" name="foundation">
                <option <?php if ($foundation == '') {
                                    echo 'selected';
                                } ?> >- Choose One -</option>
                <option value="Open" <?php if ($foundation == 'Open') {
                                    echo 'selected';
                                } ?> >Open</option>
                <option value="Closed" <?php if ($foundation == 'Closed') {
                                    echo 'selected';
                                } ?> >Closed</option>
                <option value="On Stilts" <?php if ($foundation == 'On Stilts') {
                                    echo 'selected';
                                } ?> >On Stilts</option>
            </select>
        </div>
        <label for="occupancy" class="col-sm-2 control-label">Occupancy</label>
        <div class="col-sm-3 form-group <?php //if($occupancy == '' && $_POST){ echo 'has-error'; }?>">
            <select class="form-control" name="occupancy">
                <option <?php if ($occupancy == '') {
                                    echo 'selected';
                                } ?> >- Choose One -</option>
                <option value="Primary" <?php if ($occupancy == 'Primary') {
                                    echo 'selected';
                                } ?> >Primary</option>
                <option value="Secondary" <?php if ($occupancy == 'Secondary') {
                                    echo 'selected';
                                } ?> >Secondary</option>
                <option value="Short Term Rental" <?php if ($occupancy == 'Short Term Rental') {
                                    echo 'selected';
                                } ?> >Short Term Rental</option>
            </select>
        </div>
    </div>

    <div class="row" >
        <label for="roofcovering" class="col-sm-3 control-label">Roof Covering</label>
        <div class="col-sm-3 form-group <?php //if($roofcovering == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $roofcovering; ?>" name="roofcovering" placeholder="">
        </div>
        <label for="roofstyle" class="col-sm-2 control-label">Roof Style</label>
        <div class="col-sm-3 form-group <?php //if($roofstyle == '' && $_POST){ echo 'has-error'; }?>">
            <select class="form-control" name="roofstyle">
                <option <?php if ($roofstyle == '') {
                                    echo 'selected';
                                } ?> >- Choose One -</option>
                <option value="Hip" <?php if ($roofstyle == 'Hip') {
                                    echo 'selected';
                                } ?> >Hip</option>
                <option value="Gable" <?php if ($roofstyle == 'Gable') {
                                    echo 'selected';
                                } ?> >Gable</option>
            </select>
        </div>
    </div>

    <div class="row" >
        <label for="protectivedevices" class="col-sm-3 control-label">Protective Devices</label>
        <div class="col-sm-8 form-group <?php //if($protectivedevices == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $protectivedevices; ?>" name="protectivedevices" placeholder="">
        </div>
    </div>

    <div class="row">
        <label for="pool" class="col-sm-3 control-label">Pool on premises</label>
        <div class="col-sm-3">
            <div class="form-group <?php //if($pool == '' && $_POST){ echo 'has-error'; }?>">
                <label class="radio-inline"><input type="radio" name="pool" id="pool1" <?php if ($pool == 'yes') {
                                    echo 'checked';
                                } ?> value="yes"> Yes</label>
                <label class="radio-inline"><input type="radio" name="pool" id="pool2" <?php if ($pool == 'no') {
                                    echo 'checked';
                                } ?> value="no"> No</label>
            </div>
        </div>
        <label for="pooltype" class="col-sm-2 control-label <?php if ($pool != 'yes') {
                                    echo 'hidden';
                                } ?>" id="pooltypelabel">Pool Type</label>
        <div class="col-sm-3 form-group <?php //if($pooltype == '' && $_POST){ echo 'has-error'; }?> <?php if ($pool != 'yes') {
                                    echo 'hidden';
                                } ?>" id="pooltype">
            <select class="form-control" name="pooltype">
                <option <?php if ($pooltype == '') {
                                    echo 'selected';
                                } ?> >- Choose One -</option>
                <option value="Above Ground" <?php if ($pooltype == 'Above Ground') {
                                    echo 'selected';
                                } ?> >Above Ground</option>
                <option value="Below Ground" <?php if ($pooltype == 'Below Ground') {
                                    echo 'selected';
                                } ?> >Below Ground</option>
            </select>
        </div>
    </div>

    <div class="row" >
        <label for="closingdate" class="col-sm-3 control-label">Closing/Effective Date</label>
        <div class="col-sm-3 form-group <?php //if($closingdate == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control datepicker mobilehide" value="<?php echo $closingdate; ?>" name="closingdate" placeholder="">
            <input type="date" class="form-control visible-xs" value="<?php echo $closingdate; ?>" name="closingdate" placeholder="">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-8 ">
            <div class="form-group">
            <h3>Updates</h3>
            </div>
        </div>
    </div>

    <div class="row" >
        <label for="roofupdates" class="col-sm-3 control-label">Roof</label>
        <div class="col-sm-3 form-group <?php //if($roofupdates == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $roofupdates; ?>" name="roofupdates" placeholder="">
        </div>
        <label for="wiringupdates" class="col-sm-2 control-label">Wiring</label>
        <div class="col-sm-3 form-group <?php //if($wiringupdates == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $wiringupdates; ?>" name="wiringupdates" placeholder="">
        </div>
    </div>

    <div class="row" >
        <label for="plumbingupdates" class="col-sm-3 control-label">Plumbing</label>
        <div class="col-sm-3 form-group <?php //if($plumbingupdates == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $plumbingupdates; ?>" name="plumbingupdates" placeholder="">
        </div>
        <label for="heatairupdates" class="col-sm-2 control-label">Heat/Air</label>
        <div class="col-sm-3 form-group <?php //if($heatairupdates == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $heatairupdates; ?>" name="heatairupdates" placeholder="">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-8 ">
            <div class="form-group">
            <h3>Coverages</h3>
            </div>
        </div>
    </div>

    <div class="row" >
        <label for="dwellinglimit" class="col-sm-3 control-label">Dwelling Limit</label>
        <div class="col-sm-3 form-group <?php //if($dwellinglimit == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $dwellinglimit; ?>" name="dwellinglimit" placeholder="$ value of home">
        </div>
        <label for="contentslimit" class="col-sm-2 control-label">Contents Limit</label>
        <div class="col-sm-3 form-group <?php //if($contentslimit == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $contentslimit; ?>" name="contentslimit" placeholder="$ value of contents">
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-8 ">
            <div class="form-group">
            <h3>Current Carrier</h3>
            </div>
        </div>
    </div>

    <div class="row" >
        <label for="curcompany" class="col-sm-3 control-label">Company</label>
        <div class="col-sm-3 form-group <?php //if($curcompany == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $curcompany; ?>" name="curcompany" placeholder="">
        </div>
        <label for="expdate" class="col-sm-2 control-label">Expiration Date</label>
        <div class="col-sm-3 form-group <?php //if($expdate == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control datepicker mobilehide" value="<?php echo $expdate; ?>" name="expdate" placeholder="">
            <input type="date" class="form-control visible-xs" value="<?php echo $expdate; ?>" name="expdate" placeholder="">
        </div>
    </div>

    <div class="row" >
        <label for="pets" class="col-sm-3 control-label">Pets</label>
        <div class="col-sm-3">
            <div class="form-group <?php //if($pool == '' && $_POST){ echo 'has-error'; }?>">
                <label class="radio-inline"><input type="radio" name="pets" id="pets1" <?php if ($pets == 'yes') {
                                    echo 'checked';
                                } ?> value="yes"> Yes</label>
                <label class="radio-inline"><input type="radio" name="pets" id="pets2" <?php if ($pets == 'no') {
                                    echo 'checked';
                                } ?> value="no"> No</label>
            </div>
        </div>
    </div>

    <div class="row <?php if ($pets != 'yes') {echo 'hidden'; } ?>" id="petinfo" >
        <label for="pettypes" class="col-sm-3 control-label">Pet Types</label>
        <div class="col-sm-4 form-group <?php //if($pettypes == '' && $_POST){ echo 'has-error'; }?>">
            <input type="text" class="form-control" value="<?php echo $pettypes; ?>" name="pettypes" placeholder="">
        </div>
        <label for="numpets" class="col-sm-2 control-label"># of Pets</label>
        <div class="col-sm-2 form-group <?php //if($numpets == '' && $_POST){ echo 'has-error'; }?>">
            <input type="num" class="form-control" value="<?php echo $numpets; ?>" name="numpets" placeholder="">
        </div>
    </div>

    <script>
        jQuery(document).ready(function($){

            //show hide conditional for pets
            var pets = $('#mainForm input:radio[name=pets]');
            var pettypes = $('#mainForm input:text[name=pettypes]');
            var numpets = $('#mainForm input:text[name=numpets]');
            var petinfo  = $('#mainForm #petinfo');

            var pool = $('#mainForm input:radio[name=pool]');
            var pooltype = $('#mainForm #pooltype');
            var pooltypelabel = $('#mainForm #pooltypelabel');

            function changepet(element){
                pets_ok=element.value;
                if (pets_ok == 'yes'){
                    petinfo.removeClass('hidden');
                } else {
                    petinfo.addClass('hidden');
                }
            }

            function changepool(element){
                pool_ok=element.value;
                if (pool_ok == 'yes'){
                    pooltype.removeClass('hidden');
                    pooltypelabel.removeClass('hidden');
                } else {
                    pooltype.addClass('hidden');
                    pooltypelabel.addClass('hidden');
                }
            }

            pool.change(function(){
                changepool(this);
            });

            pets.change(function(){
                changepet(this);
            });

            //init datepicker
            $(".datepicker").click(function(e){
                e.preventDefault();
            });
            $(".dobpicker").click(function(e){
                e.preventDefault();
            });
            $('.datepicker').datepick({dateFormat: 'mm-dd-yyyy'});
            $('.dobpicker').datepick({
                defaultDate: '-25y' });
        });
    </script>

    <div class="row" >
        <div class="col-sm-3 form-group">&nbsp;</div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-10 ">
            <div class="form-group">
            <input type="text" name="secu" value="" style="position:absolute; height:1px; width:1px; top:-10000px; left:-10000px;">
            <button type="submit" class="btn btn-primary">Submit Quote Request</button>
            </div>
        </div>
    </div>

</form>
</div>
</div>
</div>
</div>


<?php get_footer(); ?>
