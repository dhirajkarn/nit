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
          	<div class="span4">
            	<form action="<?php echo base_url(); ?>teaching/add_teacher_pay/<?php echo $cur_teacher['id']; ?>" method="post">
                  <fieldset>
                    <legend>Pay</legend>
                    <label>Pay In Pay Band</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="ppb" id="ppb">
                      <span class="add-on">.00</span>
                    </div>
                    <label>AGP</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="agp" id="agp">
                      <span class="add-on">.00</span>
                    </div>
                    <label>DA</label>
                    <div class="input-prepend input-append">
                      <input class="span4 required number" type="text" name="da_per" id="da_per">
                      <span class="add-on">%</span>
                    </div>
                    <label>HRA</label>
                    <div class="input-prepend input-append">
                      <input class="span4 required number" type="text" name="hra_per" id="hra_per">
                      <span class="add-on">%</span>
                    </div>
                    <label>TA</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="ta" id="ta">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Special Allowance</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="spl_allowance" id="spl_allowance">
                      <span class="add-on">.00</span>
                    </div>
                  </fieldset>
            </div>
            <div class="span4">
                  <fieldset>
                    <legend>Deduction</legend>
                    <label>PF</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="pf" id="pf">
                      <span class="add-on">.00</span>
                    </div>
                    <label>GSLI(1)</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="gsli_one" id="gsli_one">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Income Tax</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="it" id="it">
                      <span class="add-on">.00</span>
                    </div>
                    <label>HRD</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="hrd" id="hrd">
                      <span class="add-on">.00</span>
                    </div>
                    <label>Rec PF</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="rec_pf" id="rec_pf">
                      <span class="add-on">.00</span>
                    </div>
                    <label>EC</label>
                    <div class="input-prepend input-append">
                      <input class="span8 required number" type="text" name="ec" id="ec">
                      <span class="add-on">.00</span>
                    </div>
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
                      <input class="span5 required" id="date" type="text" name="date">
                  </fieldset>
                  
               
            </div>
            	<div class="span4">
                	<fieldset>
                        <legend>Summary</legend>
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
                      </fieldset>
                     
                </div>
          </div> 
            <div class="form-actions">
          	  <input type="button" id="calculate" value="Calculate" class="btn btn-primary">
              <input type="submit" name="submit" id="submit" value="Save" class="btn btn-primary pull-right" disabled>
              <button type="button" class="btn">Cancel</button>
            </div>
        </form>
<?php $this->load->view('footer'); ?>
