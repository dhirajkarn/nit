<?php $this->load->view('header'); ?>
      <div class="span10">
          <div class="hero-unit" style="padding:20px;">
            <h4><small>Enter Pay Details For : </small><?php echo $cur_teacher['name']; ?></h4>
          </div>
          <div class="row-fluid">
            <div class="span4 pull-right">
              <dl class="dl-horizontal">
                  <dt>Designation :</dt>
                  <dd><?php echo $cur_teacher['designation']; ?></dd>
                  <dt>Department :</dt> 
                  <dd><?php echo $cur_teacher['department']; ?></dd>
                  <dt>Account Number : </dt>
                  <dd><?php echo $cur_teacher['account_no']; ?></dd>   
              </dl>
            </div>
          </div>
          <?php if($message) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <span class="text-center"><?php echo $message; ?></span>
            </div>
          <?php } ?>
          <div class="row-fluid">
            <form action="<?php echo base_url(); ?>teaching/add_teacher_pay/<?php echo $cur_teacher['emp_type']; ?>/<?php echo $cur_teacher['id']; ?>" method="post">
                  <fieldset>
                    <legend>Pay</legend>
              	<div class="span3" style="margin-left:0;">
                    <label>Pay In Pay Band</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="ppb" id="ppb">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Grade Pay</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="agp" id="agp">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Dearness Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="da_per" id="da_per">
                      <span class="add-on">%</span>
                    </div>
                  </div><!-- end of 1st row of pay -->
                  <div class="span3">
                    <label>House Rent Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="hra_per" id="hra_per">
                      <span class="add-on">%</span>
                    </div>
                    <label>Transport Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="ta" id="ta">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Special Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="spl_allowance" id="spl_allowance">
                      <span class="add-on">.00</span>
                    </div>
                  </div><!-- end of 2nd row of pay -->
                  <div class="span3">
                      <label>Washing Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="washing_allowance" id="washing_allowance">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Other Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="other_allowance" id="other_allowance">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Hostel Chairman/Supdt. Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="hostel_supdt" id="hostel_supdt">
                      <span class="add-on">.00</span>
                    </div>
                  </div><!-- end of 3rd row of pay -->
                  <div class="span3">
                      <label>Family Planning</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="family_planning" id="family_planning">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Telephone Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="tel_allowance" id="tel_allowance">
                      <span class="add-on">.00</span>
                    </div>
                    
                  </div><!-- end of 3rd row of pay -->
                  </fieldset>
            </div>
            <div class="row-fluid">
              <fieldset>
                <legend>Deduction</legend>
                <div class="span3" style="margin-left:0;">
                    <label>P.F. Deduction</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="pf" id="pf">
                      <span class="add-on">.00</span>
                    </div>
                    <label>NPS Contribution</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="nps_contribution" id="nps_contribution">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Income Tax</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="it" id="it">
                      <span class="add-on">.00</span>
                    </div>
                </div><!-- end of 1st row of deduction -->
                <div class="span3">
                    <label>House Rent </label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="hrd" id="hrd">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Electricity Charge</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="ec" id="ec">
                      <span class="add-on">.00</span>
                    </div>
                    <label>GSLI Deduction</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="gsli_deduction" id="gsli_deduction">
                      <span class="add-on">.00</span>
                    </div>
                </div><!-- end of 2nd row of deduction -->
                  <div class="span3">
                    <label>Festival Advanced Recovery</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="festival_adv_recovery" id="festival_adv_recovery">
                      <span class="add-on">.00</span>
                    </div>
                    <label>GPF Loan Recovery</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="gpf_loan_recovery" id="gpf_loan_recovery">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Bike/Computer Recovery</label>
                      <div class="input-prepend input-append">                        
                        <input class="span8 required" type="text" name="bike_com_recovery" id="bike_com_recovery">
                        <span class="add-on">.00</span>
                      </div>
                  </div><!-- end of 3rd row of deduction -->
                  <div class="span3">
                    <label>Loan Recovery</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="loan_recovery" id="loan_recovery">
                      <span class="add-on">.00</span>
                    </div>
                    <label>LIC II Deduction</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="lic_2_deduction" id="lic_2_deduction">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Flood Donation</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="flood_donation" id="flood_donation">
                      <span class="add-on">.00</span>
                    </div>
                  </div><!-- end of 4th row of deduction -->
                  <div class="row-fluid">
                    <div class="span3">
                      <label>Professional Tax Deduction</label>
                      <div class="input-prepend input-append">
                        <input class="span8 required number" type="text" name="pro_tax_deduction" id="pro_tax_deduction">
                        <span class="add-on">.00</span>
                      </div>
                    </div>
                    <div class="span3">
                      <label>Other Deduction</label>
                      <div class="input-prepend input-append">
                        <input class="span8 required number" type="text" name="other_deduction" id="other_deduction">
                        <span class="add-on">.00</span>
                      </div>
                    </div>
                    <div class="span3">
                      <label>DATE</label>
                      <div class="input-prepend input-append">
                        <span class="add-on">@</span>
                        <input class="span8 required" id="date" type="text" name="date">
                      </div>
                    </div>
                  </div>
                  </fieldset>
                </div>
              <div class="row-fluid">
                <fieldset>
                  <legend>Summary</legend>   
            	       <div class="span3" style="margin-left:0;">
                        <label>Basic Pay</label>
                            <div class="input-prepend input-append">
                              <span class="add-on">Rs.</span>
                              <input class="span8 auto" type="text" name="bp" id="bp">
                              <span class="add-on">.00</span>
                            </div>
                            <label>DA</label>
                            <div class="input-prepend input-append">
                              <span class="add-on">Rs.</span>
                              <input class="span8 auto" type="text" name="da" id="da">
                              <span class="add-on">.00</span>
                            </div>
                            <label>HRA</label>
                            <div class="input-prepend input-append">
                              <span class="add-on">Rs.</span>
                              <input class="span8 auto" type="text" name="hra" id="hra">
                              <span class="add-on">.00</span>
                            </div>
                        </div><!-- end of 1st row of summary -->
                        <div class="span3">
                            <label>Total Pay</label>
                            <div class="input-prepend input-append">
                              <span class="add-on">Rs.</span>
                              <input class="span8 auto" type="text" name="total_amount" id="total_pay">
                              <span class="add-on">.00</span>
                            </div>
                            <label>Total Deduction</label>
                            <div class="input-prepend input-append">
                              <span class="add-on">Rs.</span>
                              <input class="span8 auto" type="text" name="total_deduction" id="total_deduction">
                              <span class="add-on">.00</span>
                            </div>
                            <label>Net Amount</label>
                            <div class="input-prepend input-append">
                              <span class="add-on">Rs.</span>
                              <input class="span8 auto" type="text" name="net_amount" id="net_amount">
                              <span class="add-on">.00</span>
                            </div>
                          </div><!-- end of 2nd row of summary -->
                      </fieldset>
                     </div>
            <div class="form-actions">
          	  <input type="button" id="calculate" value="Calculate" class="btn btn-primary">
              <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary pull-right" disabled>
              <button type="button" class="btn">Cancel</button>
            </div>
        </form>
      </div>
<?php $this->load->view('footer'); ?>
