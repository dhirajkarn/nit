<?php $this->load->view('header'); ?>
      <div class="span10">
          <div class="hero-unit" style="padding:20px;">
            <h4><small>Enter Pay Details For : </small><?php echo $cur_teacher['name']; ?></h4>
          </div>
          <?php if($message) { ?>
            <div class="alert alert-info">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <span class="text-center"><?php echo $message; ?></span>
            </div>
          <?php } ?>
          <div class="row-fluid">
            <form action="<?php echo base_url(); ?>teaching/add_teacher_pay/<?php echo $cur_teacher['id']; ?>" method="post">
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
                      <input class="span8 required number" type="text" name="hra_per" id="hra_per">
                      <span class="add-on">%</span>
                    </div>
                    <label>Other Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="ta" id="ta">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Hostel Chairman/Supdt. Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="spl_allowance" id="spl_allowance">
                      <span class="add-on">.00</span>
                    </div>
                  </div><!-- end of 3rd row of pay -->
                  <div class="span3">
                      <label>Family Planning</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="hra_per" id="hra_per">
                      <span class="add-on">%</span>
                    </div>
                    
                  </div><!-- end of 3rd row of pay -->
                  </fieldset>
            </div>
            <div class="row-fluid">
              <fieldset>
                <legend>Deduction</legend>
                <div class="span3" style="margin-left:0;">
                    <label>P.F. DEDUCTION</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="pf" id="pf">
                      <span class="add-on">.00</span>
                    </div>
                    <label>NPS CONTRIBUTION</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="gsli_one" id="gsli_one">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Income Tax</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="it" id="it">
                      <span class="add-on">.00</span>
                    </div>
                </div><!-- end of 1st row of deduction -->
                <div class="span3">
                    <label>HOUSE RENT </label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="hrd" id="hrd">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Rec PF</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="rec_pf" id="rec_pf">
                      <span class="add-on">.00</span>
                    </div>
                    <label>ELECTRICITY CHARGE</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="ec" id="ec">
                      <span class="add-on">.00</span>
                    </div>
                </div><!-- end of 2nd row of deduction -->
                  <div class="span3">
                    <label>GSLI(II)</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="gsli_two" id="gsli_two">
                      <span class="add-on">.00</span>
                    </div>
                    <label>P TAX</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="p_tax" id="p_tax">
                      <span class="add-on">.00</span>
                    </div>
                    <label>DATE</label>
                      <div class="input-prepend input-append">
                        <span class="add-on">@</span>
                        <input class="span8 required" id="date" type="text" name="date">
                      </div>
                  </div><!-- end of 3rd row of deduction -->
                  <div class="span3">
                    <label>GSLI(II)</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="gsli_two" id="gsli_two">
                      <span class="add-on">.00</span>
                    </div>
                    <label>P TAX</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="p_tax" id="p_tax">
                      <span class="add-on">.00</span>
                    </div>
                    <label>DATE</label>
                      <input class="span8 required" id="date" type="text" name="date">
                  </div><!-- end of 4th row of deduction -->
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
