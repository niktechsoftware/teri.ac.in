<?php $this->load->view('header'); ?>   
	 <?php $this->load->view('menu'); ?> 
        
          <section id="panel-first" class="panel">
        <div class="container">
            <div class="region region-panel-first">
    <div id="block-views-contact-form-block-block" class="block block-views">

    <h2>Contact Form Block</h2>
  
  <div class="content">
    <div class="view view-contact-form-block view-id-contact_form_block view-display-id-block view-dom-id-06e1153f9953605a636bf89217baeb17">
        
  
  
      <div class="view-content">
        <div class="views-row views-row-1 views-row-odd views-row-first views-row-last">
      
  <div class="views-field views-field-nothing">        <span class="field-content"><div class=""><p>We would love to hear from you! Please fill out this form and we will get in touch with you shortly.</a></p></div>
<div class="text-right">*Mandatory fields</div></span>  </div>  
  <div class="views-field views-field-webform-form-body">        <span class="field-content">
 
  <form  method="post" action="<?php echo base_url()?>index.php/formController/stdregistration" enctype="multipart/form-data" accept-charset="UTF-8">
  <div>
  <div  class="form-item webform-component webform-component-select webform-component--name-pre">
  
  <label for="edit-submitted-name-pre">Name Pre <span class="form-required" title="This field is required.">*</span></label>
 <select id="edit-submitted-name-pre" name="preName" class="form-select required" required="required"><option value="Mr" selected="selected">Mr</option><option value="Mrs">Mrs</option></select>
</div>
<div  class="form-item webform-component webform-component-textfield webform-component--first-name">
  <label for="edit-submitted-first-name">First Name <span class="form-required" title="This field is required.">*</span></label>
 <input placeholder="First Name*" type="text" id="edit-submitted-first-name" name="firstName" value="" size="60" maxlength="128" class="form-text required" required="required"/>
</div>
<div  class="form-item webform-component webform-component-textfield webform-component--last-name">
  <label for="edit-submitted-last-name">Last Name <span class="form-required" title="This field is required."></span></label>
 <input placeholder="Last Name*" type="text" id="edit-submitted-last-name" name="lastName" value="" size="60" maxlength="128" class="form-text required" required="required" />
</div>
<div  class="form-item webform-component webform-component-select webform-component--name-pre">
  
  <label for="edit-submitted-name-pre">Father's Name Pre <span class="form-required" title="This field is required.">*</span></label>
 <select id="edit-submitted-name-pre" name="father_preName" class="form-select required" required="required"><option value="Mr" selected="selected">Mr</option><option value="Mrs">Mrs</option></select>
</div>
<div  class="form-item webform-component webform-component-textfield webform-component--first-name">
  <label for="edit-submitted-first-name">Father's First Name <span class="form-required" title="This field is required.">*</span></label>
 <input placeholder="Father's First Name*" type="text" id="edit-submitted-first-name" name="father_firstName" value="" size="60" maxlength="128" class="form-text required" required="required"/>
</div>
<div  class="form-item webform-component webform-component-textfield webform-component--last-name">
  <label for="edit-submitted-last-name">Father's Last Name <span class="form-required" title="This field is required."></span></label>
 <input placeholder="Father's Last Name*" type="text" id="edit-submitted-last-name" name="father_lastName" value="" size="60" maxlength="128" class="form-text required" required="required" />
</div>
<div  class="form-item webform-component webform-component-textfield webform-component--last-name">
  <label for="edit-submitted-last-name">Father's Mobile Number <span class="form-required" title="This field is required."></span></label>
 <input placeholder="Father Mobile Number*" type="text" id="edit-submitted-last-name" name="father_mobile_no" value="" size="60" maxlength="128" class="form-text required" required="required" />
</div>
<div  class="form-item webform-component webform-component-textfield webform-component--last-name">
  <label for="edit-submitted-last-name">Course <span class="form-required" title="This field is required."></span></label>
 <input placeholder="course*" type="text" id="edit-submitted-last-name" name="course" value="" size="60" maxlength="128" class="form-text required" required="required" />
</div>


<div  class="form-item webform-component webform-component-textfield webform-component--last-name">
  <label for="edit-submitted-last-name">Mobile Number <span class="form-required" title="This field is required."></span></label>
 <input placeholder="Mobile Number*" type="text" id="mob" name="mobile_no" value="" size="60" maxlength="128" class="form-text required" required="required" />
</div>

<div  class="form-item webform-component webform-component-textfield webform-component--last-name">
  <label for="edit-submitted-last-name">Otp <span class="form-required" title="This field is required."></span></label>
 <input placeholder="otp" type="text" id="otp" name="otp" value="" size="60" maxlength="128" class="form-text required" required="required" />
</div>


<div class="form-actions"><input class="webform-submit button-primary form-submit" type="submit" name="op" id="sub" value="Submit" /></div></div>
</form></span>  </div>  </div>
    </div>
  
 
  
  
  
  
</div>  </div>
</div>
  </div>
        </div>
        
      </section>
      
 
       <?php $this->load->view('footer'); ?>
       
         <script>

		 $("#otp").hide();
		 $("#sub").hide();
		 $("#mob").keyup(function(){
				var rnum = $("#rnum").val();
				var mob = $("#mob").val();
				$.post("<?php echo site_url("welcome/getMobile") ?>",{mob : mob,rnum : rnum}, function(data){
					$("#rahul").html(data);
					});
				});
		
			
         
		 </script>