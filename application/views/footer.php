 <section id="panel-third" class="panel">
        <div class="container">
            <div class="region region-panel-third">
    <div id="block-block-9" class="block block-block">

    
  <div class="content">
    <div class="mini_footer clearfix">
<div class="block block-block block-info animation col-sm-6" id="block-block-2">
<div class="content">
<div class="pull-left">
<address style="color: white">TERI, Ghazipur
Post Graduate College,
Ghazipur-U.P
PIN Code-233001 <br>
Ph: +91(548) 2220045, 2222087
Fax: +91(548) 2220045, 2222087
email: info@teri.ac.in</address>
</div>
</div>
</div>

<div class="block block-block col-sm-6" id="block-block-6">
  
  <div class="content">
    <ul class="socials-list-footer">

<li><a href="#" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Facebook"><i class="fa fa-facebook"></i></a></li>
<li><a href="#" data-toggle="tooltip" data-placement="top" data-original-title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
<!--
<li><a href="#" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Linkedin "><i class="fa fa-linkedin"></i></a></li>

<li><a href="#" target="_blank" data-toggle="tooltip" data-placement="top" data-original-title="Instagram"><i class="fa fa-youtube-play"></i></a></li>
-->
</ul>  </div>
</div>

  </div>
</div>
</div>
  </div>

        </div>
      </section>

<footer id="footer" class="section">
        <div class="container">
            <div class="region region-footer">
    <div id="block-menu-menu-footer-menu" class="block block-menu col-sm-8">

    
  <div class="content">
    <ul class="menu"><li class="first leaf"><a href="terms-conditions.html">Term of use</a></li>
<li class="leaf"><a href="#">Privacy Policy</a></li>
<li class="leaf"><a href="#" target="_blank">Right to Information</a></li>
<li class="leaf"><a href="#">Reports</a></li>
<li class="leaf"><a href="#">Grievance</a></li>
<li class="last leaf"><a href="#">Contact us</a></li>
</ul>  </div>
</div>
<div id="block-block-3" class="block block-block pull-right">

    
  <div class="content">
    <p>Copyright @ 2017. TERI</p>
  </div>
</div>
  </div>
          <!--?php print $feed_icons; ?-->
        </div>
      </footer>
        
	<a title="Back to Top" class="btn-btt" href="#Top">Back to Top</a>


<div id="google_map_model" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Address Information</h4>
            </div>
            <div class="modal-body model_google_body_replace">

            </div>

        </div>

    </div>
</div>



<script>
jQuery(document).ready(function($) {
$('.uk-offcanvas-bar .menu li.expanded').prepend('<span class="toggle"><i class="fa fa-plus-square-o" aria-hidden="true"></i></span>');

$('.uk-offcanvas-bar .menu li.expanded .toggle').click(function(e) {
    $(this).siblings('ul.menu').slideToggle();
	$(this).toggleClass('activated');
});	
$('.uk-offcanvas-bar .menu li.active .toggle').addClass('activated');
	
  if ($("body").hasClass("page-office") == true) {
   $("#cboxClose").on('click',function(){
     location.reload();

   })
  }
//----removing value of a select drupal------------------
  $("#edit-submitted-type-of-query option:first-child").val("");
  $("#edit-field-select-region-category-tid option:first-child").remove();

$(".click_to_genrate_popup_triger").on('click',function(){

  $(this).parent().parent().parent().children('.views-field-field-image').find('.first a').trigger('click');
})
  $("body").on('click','.class_map_display_model',function()
  {
    $(".model_google_body_replace").html('');
   var data=  $(this).parent().parent().siblings('.views-field-field-address-my').clone(true,true);
    $(".model_google_body_replace").html(data);
console.log(data);
  });

	$('.view-id-leadership_team .view-content >*').each(function() {
        $(this).find('.views-row>div').each(function(index, element) {
             var save_mailto = $(this).find('.views-field-field-email-id .field-content').html();
$(this).find('.views-field-field-email-id .field-content').html('<a href="mailto:'+save_mailto+'"><i class="fa fa-envelope-o"></i></a>');
			
			
        });
    });
	
$('.tree').parents('.row').addClass('no_pad');
  $('.font_changer li a').click(function(e) {
    var saveattr = $(this).attr('id');
    $('html').removeAttr('id');
    $('html').attr('id',saveattr);
  });

var saveMessage = $('.page-contact #messages').html();
if(saveMessage){
$('.page-contact #block-views-contact-form-block-block').prepend('<div class="lzt_js">'+saveMessage+'</div>');
}

$('.page-node-169 #main-menu-inner .tb-megamenu>ul > li').removeClass('active');
});
</script>  <script type="text/javascript" src="<?php echo base_url();?>assets/sites/all/libraries/owlcarousel/owl.carousel.minb798.js?ozcdfu"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/sites/all/modules/flexslider/assets/js/flexslider.loadb798.js?ozcdfu"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/sites/all/modules/owlcarousel/includes/js/owlcarousel.settingsb798.js?ozcdfu"></script>
</body>

</html>