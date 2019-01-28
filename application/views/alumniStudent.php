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
 
  <form  method="post" action="<?php echo base_url()?>index.php/formController/saveAlumni" enctype="multipart/form-data" accept-charset="UTF-8">
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
<div  class="form-item webform-component webform-component-textfield webform-component--phone">
  <label for="edit-submitted-phone">Mobile </label>
 <input placeholder="Phone" type="text" id="edit-submitted-phone" name="mobile" value="" size="60" maxlength="128" class="form-text" required="required" />
</div>
<div  class="form-item webform-component webform-component-email webform-component--email-id">
  <label for="edit-submitted-email-id">Email ID <span class="form-required" title="This field is required.">*</span></label>
 <input class="email form-text form-email required" placeholder="Email Id*" type="email" id="edit-submitted-email-id" name="email" size="60" required="required"/>
</div>
<div  class="form-item webform-component webform-component-select webform-component--type-of-query">
  <label for="edit-submitted-type-of-query">Coures <span class="form-required" title="This field is required.">*</span></label>
 <select id="edit-submitted-type-of-query" name="course" class="form-select required" required="required"><option value="0" selected="selected">Select Course*</option><option value="BCA">BCA</option><option value="MCA">MCA</option><option value="BBA">BBA</option><option value="MBA">MBA</option></select>
</div>
<div  class="form-item webform-component webform-component-email webform-component--email-id">
  <label for="edit-submitted-email-id">Passout Year<span class="form-required" title="This field is required.">*</span></label>
 <input class="email form-text form-email required" placeholder="Passout Year*" type="text" id="edit-submitted-email-id" name="passoutYear" size="60" required="required"/>
</div>
<div  class="form-item webform-component webform-component-email webform-component--email-id">
  <label for="edit-submitted-email-id">Company Name<span class="form-required" title="This field is required.">*</span></label>
 <input class="email form-text form-email required" placeholder="Company Name*" type="text" id="edit-submitted-email-id" name="companyName" size="60" required="required" />
</div>
<div  class="form-item webform-component webform-component-email webform-component--email-id">
  <label for="edit-submitted-email-id">Upload Photo<span class="form-required" title="This field is required.">*</span></label>
 <input class="email form-text form-email required" placeholder="Upload Photo*" type="file" id="edit-submitted-email-id" name="stuImage" size="60" required="required" />
</div>
<div  class="form-item webform-component webform-component-textarea webform-component--comment">
  <label for="edit-submitted-comment">Share the Experience<span class="form-required" title="This field is required.">*</span></label>
 <div class="form-textarea-wrapper resizable"><textarea placeholder="Suggestions/Comments*" id="edit-submitted-comment" name="experience" cols="60" rows="5" class="form-textarea required" ></textarea></div>
</div>

<div class="form-actions"><input class="webform-submit button-primary form-submit" type="submit" name="op" value="Submit" /></div></div>
</form></span>  </div>  </div>
    </div>
  
  
  
  
  
  
</div>  </div>
</div>
  </div>
        </div>
      </section>
    
    
         
    
       <?php $this->load->view('footer'); ?>