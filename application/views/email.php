<!DOCTYPE html>
<!-- BEGIN HEAD -->
<head>
   <meta charset="utf-8"/>
   <title>Email Spoof</title>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
   <meta http-equiv="Content-type" content="text/html; charset=utf-8">
   <meta content="" name="description"/>
   <meta content="" name="author"/>
   <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
   <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
   <link href="assets/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
   <link href="assets/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
   <link href="assets/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
   <!-- END GLOBAL MANDATORY STYLES -->
   <!-- BEGIN PAGE LEVEL STYLES -->
   <link rel="stylesheet" type="text/css" href="assets/select2/select2.css"/>   
   <link rel="stylesheet" type="text/css" href="assets/bootstrap-markdown/css/bootstrap-markdown.min.css">
   <link rel="stylesheet" type="text/css" href="assets/jquery-notific8/jquery.notific8.min.css"/>
   <!-- END PAGE LEVEL SCRIPTS -->
   <!-- BEGIN THEME STYLES -->
   <link href="assets/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
   <link href="assets/css/plugins-md.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/layout.css" rel="stylesheet" type="text/css"/>
   <link id="style_color" href="assets/css/light.css" rel="stylesheet" type="text/css"/>
   <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
   <!-- END THEME STYLES -->   
   <link rel="shortcut icon" href="<?php echo base_url(); ?>emailspoofin.png" type="image/png">
   <link rel="icon" href="<?php echo base_url(); ?>emailspoofin.png" type="image/png"> 
   <style>
       .page-content-wrapper .page-content {
            margin-left: 0px !important;
       }
       .note.note-success {
            background-color: #d6f5f3 !important;
            border-color: #1c7d64 !important;
            color: #000000 !important;
        }
   </style>
   <script src='https://www.google.com/recaptcha/api.js'></script>
   <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-80209290-1', 'auto');
      ga('send', 'pageview');
    </script>
       
</head>

<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-md page-header-fixed page-sidebar-closed-hide-logo ">
   <!-- BEGIN HEADER -->
   <div class="page-header md-shadow-z-1-i navbar navbar-fixed-top">	
    <div class="page-header-inner">
<!--	<div class="page-header-inner container">  -->
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="http://www.emailspoof.in">
			<img height="70px" style="margin: 1px; padding-left: 0.5cm;" src="assets/img/emailspoofin.png" alt="EmailSpoofIn" class="logo-default"/>
			</a>			
		</div>
    </div>            
   </div>
   <!-- END HEADER -->
   <div class="clearfix"></div>
   <!-- BEGIN CONTAINER -->
   <div class="page-container">
      <!-- BEGIN CONTENT -->
      <div class="page-content-wrapper">
         <div class="page-content">
            <!-- BEGIN PAGE CONTENT-->          
            <div class="row">
                <div class="col-md-8">
                  <!-- BEGIN VALIDATION STATES-->
                  <div class="portlet box blue">
                     <div class="portlet-title">
                        <div class="caption">
                           <i class="fa fa-gift"></i>Compose Email
                        </div>                        
                     </div>
                     <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form action="index.php/email/sendmailget" id="form_sample_1" class="form-horizontal">
                           <div class="form-body">
                              <div class="alert alert-danger display-<?php if ($error) { echo "show"; } else  { echo "hide"; } ?> ">
                                 <button class="close" data-close="alert"></button>
                                 You have some email errors. Please check below.
                              </div>
                              <div class="alert alert-success display-<?php if ($success) { echo "show"; } else  { echo "hide"; } ?>">
			         <button class="close" data-close="alert"></button>
                                 Email is sent successfully!
                              </div>
                              <div class="form-group">
                                 <label class="control-label col-md-2">From Name <span class="required">
                                 * </span>
                                 </label>
                                 <div class="col-md-2">
                                    <input type="text" id='fromname' name="fromname" data-required="1" class="form-control"/>
                                 </div>
                                 <label class="control-label col-md-2">From Email <span class="required">
                                 * </span>
                                 </label> 
                                 <div class="col-md-5">
                                    <input type="text" id='from' name="from" data-required="1" class="form-control"/>
                                 </div>
                               </div>   
                               <div class="form-group">   
                                 <label class="control-label col-md-2">To <span class="required">
                                 * </span>
                                 </label>
                                 <div class="col-md-9">
                                    <input name="to" id='to' type="text" class="form-control"/>
                                 </div> 
                              </div>                              
                              <div class="form-group">
                                 <label class="control-label col-md-2">Subject <span class="required">
                                 * </span>
                                 </label>
                                 <div class="col-md-9">
                                    <input name="subject" id='subject' type="text" class="form-control"/>                                    
                                 </div>
                              </div>
                              <div class="form-group last">
                                 <label class="control-label col-md-2">Body <span class="required">
                                 * </span>
                                 </label>
                                 <div class="col-md-9">
                                    <textarea class="ckeditor form-control" id='body' name="body" rows="6" data-error-container="#editor2_error"></textarea>
                                    <div id="editor2_error">
                                    </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                  <div class="row">
                                 <div class="col-md-offset-5 col-md-9">
                                    <div class="g-recaptcha" data-sitekey="6LfIJCQTAAAAACa5hQ3NX-RQxOsKML0eteGnNAYL"></div>
                                 </div>
                              </div>                                 
                              </div> 
                              
                           </div>
                           <div class="form-actions">
                              <div class="row">
                                 <div class="col-md-offset-6 col-md-9">
                                    <button type="submit" class="btn blue">Send Email</button>                                    
                                 </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-offset-4 col-md-9">                                  
                                  By pressing "SEND EMAIL" you accept our terms and conditions
                                  </div>
                              </div>
                           </div>
                        </form>
                        <!-- END FORM-->
                     </div>
                  </div>
                  <!-- END VALIDATION STATES-->
               </div>
                <div class="col-md-4">
                    <div class="note note-success">
                        <h4 class="block"><strong>Send Spoof email to anyone</strong></h4>
                    <p>                        
                        <br>
                        Every day over 60,000 free anonymous emails are
                        sent from our servers, making us&nbsp;the world's largest
                        and most&nbsp;trusted anonymous email service.<br>
                        <br>



                      This service is perfect for the following <br>
                      <ul>
                        <li>catch a cheating spouse husband or wife. &nbsp;  
                        </li><li>find out if your friend is are real friend   
                        </li><li>give warnings to people   
                        </li><li>inform the police about illegal activities   
                        </li><li>inform the tax office about tax cheaters   
                        </li><li>confess your love to somebody   
                        </li><li>play an email joke with your friends   
                        </li><li>when your own email service&nbsp;doesn't work
                        </li><li>if your private email is banned by the recipient   
                        </li><li>report fraud to your boss or institution   
                        </li><li>and many more reasons...&nbsp; </li>
                      </ul>
                      <p><strong><font color="#FF0000">Note:</font></strong> By
                      sending a fake email or prank email you may be committing
                      the offence of fraud even you did not intend to. You are
                      not allowed to use this service for any illegal activities
                      at any time. <br>
                      <br>
                      <strong>EmailSpoof.in is not liable for your emails
                      you send at any time. Try not to do anything stupid or you might end up needing a divorce.</strong><br>
                      <br>
					  
					  <strong>
					 Don't do anything illegal.</strong>                      <strong>If you send death threats, abuse, slander or anything illegal we WILL publish your IP address and block you from this site.</strong> <br>
					  <br>
					  Abusers can be reported <a href="mailto:support@emailspooof.in">here</a>.<br>
                      <br>                      
                      </p>                                        
                </div> 
               </div>    
            </div>          
            <!-- END PAGE CONTENT-->
         </div>
      </div>
      <!-- END CONTENT -->
   </div>
   <!-- END CONTAINER -->
   <!-- BEGIN FOOTER -->
   <div class="page-footer">
       <div class="page-footer-inner">
		 <?php echo date('Y'); ?> &copy; EmailSpoof.in
	</div>
      <div class="scroll-to-top">
         <i class="icon-arrow-up"></i>
      </div>
   </div>
   <!-- END FOOTER -->
   <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   <!-- BEGIN CORE PLUGINS -->
   <!--[if lt IE 9]>
   <script src="assets/global/plugins/respond.min.js"></script>
   <script src="assets/global/plugins/excanvas.min.js"></script> 
   <![endif]-->
   <script src="assets/js/jquery.min.js" type="text/javascript"></script>
   <script src="assets/js/jquery-migrate.min.js" type="text/javascript"></script>
   <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
   <script src="assets/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
   <script src="assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="assets/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
   <script src="assets/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
   <script src="assets/js/jquery.blockui.min.js" type="text/javascript"></script>
   <script src="assets/js/jquery.cokie.min.js" type="text/javascript"></script>
   <script src="assets/uniform/jquery.uniform.min.js" type="text/javascript"></script>
   <script src="assets/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
   <!-- END CORE PLUGINS -->
   <!-- BEGIN PAGE LEVEL PLUGINS -->
   <script type="text/javascript" src="assets/jquery-validation/js/jquery.validate.min.js"></script>
   <script type="text/javascript" src="assets/jquery-validation/js/additional-methods.min.js"></script>
   <script type="text/javascript" src="assets/select2/select2.min.js"></script>   
   <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
   <script type="text/javascript" src="assets/bootstrap-markdown/js/bootstrap-markdown.js"></script>
   <script type="text/javascript" src="assets/bootstrap-markdown/lib/markdown.js"></script>
   <script src="assets/jquery-notific8/jquery.notific8.min.js"></script>
   <script src="assets/js/ui-notific8.js"></script>

   <!-- END PAGE LEVEL PLUGINS -->
   <!-- BEGIN PAGE LEVEL STYLES -->
   <script src="assets/js/metronic.js" type="text/javascript"></script>
   <script src="assets/js/layout.js" type="text/javascript"></script>
   <script src="assets/js/demo.js" type="text/javascript"></script>
   <script src="assets/js/form-validation.js"></script>
   <!-- END PAGE LEVEL STYLES -->
   <script>
      jQuery(document).ready(function() {   
         // initiate layout and plugins
      Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Demo.init(); // init demo features
      FormValidation.init();
      UINotific8.init();
      });
   </script>              
   <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
