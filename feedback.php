<?php include('../common/header-echo.php'); ?>
<script src="../_build/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	// validate the comment form when it is submitted
	$("#feedback").validate({
		rules: {
			Name: "required",
			Comments: "required"
		},
		messages: {
			Name: "Please provide your name.",
			Comments: "<div class='commentserror'>Please provide your comments.</div>"
		}
	});// matches form id
	$("#certified-no").hide();
  $("#certified-yes").hide();
  //$.extend($.validator.messages, { required: "Please give us your name." });
	$("input[type='radio']").change(function(){  
  if($(this).val()=="yes")
  {
      $("#certified-yes").show();
      $("#certified-no").hide();
  }
  if($(this).val()=="no")
  {
     $("#certified-no").show();
     $("#certified-yes").hide();
  }                        
  });
});
</script>

<!--[if lt IE 8]><style type="text/css">
form.echofeedback div.inside div.row input.name {width:150px; margin:0;}
form.echofeedback div.inside div.row div.commentserror {margin:0 125px 0 0; position:absolute; top:0px; left:300px;}
</style><![endif]-->
<!--[if gt IE 7]><style type="text/css">form.echofeedback div.inside div.row div.commentserror {margin:0 125px 0 0; width:250px; float:right; height:70px; overflow:hidden; position:absolute; top:0px; left:300px;}</style><![endif]-->

      <div class="grid_660">
        <div class="div_660"> 
          <h1 class="echo-feedback"></h1>
          <?php                                       
            $show_form=true;          
            if(isset($_POST['feedback'])){// The form is submitted
              echo "<div class='echo-feedback'>\n";
              echo "<h3 style='font-size:15px;'>Your comments have been submitted to ECHO. Thank you for taking the time to let us know what you think. Your feedback will help us to develop and improve ECHO resources for ECFMG-certified physicians.</h3>\n";
              $show_form=false;
              $to = "echo@ecfmg.org";
    					$subject = "ECHO Feedback";
    					$email = $_POST["email"];
              $msg = "<div style='font-family:Helvetica, Arial, Verdana, sans-serif;'>"; 
    					$msg .= "<p><strong>Name:</strong>&nbsp;<font color='#006699'>".$_POST["Name"]."</font></p>"; 
    					$msg .= "<p><strong>Email:</strong>&nbsp;<font color='#006699'>".$_POST["Email"]."</font></p>";
    					if (!$_POST["when-certified"]){
                $msg .= "<p><strong>Are you certified by ECFMG?:</strong>&nbsp;<font color='#006699'>No</font></p>";
                $msg .= "<p><strong>When do you expect to be certified?:</strong>&nbsp;<font color='#006699'>".$_POST["not-certified"]."</font></p>";
              }
              if (!$_POST["not-certified"]){
                $msg .= "<p><strong>Are you certified by ECFMG?:</strong>&nbsp;<font color='#006699'>Yes</font></p>";
                $msg .= "<p><strong>When were you certified?:</strong>&nbsp;<font color='#006699'>".$_POST["when-certified"]."</font></p>";
              }
    					$msg .= "<p><strong>Comments:</strong>&nbsp;<font color='#006699'>".$_POST["Comments"]."</font>\n";
    					$msg .= "</div>";
    					$headers = "MIME-Version: 1.0\n"; 
    					$headers .= "Content-type: text/html; charset=iso-8859-1\n";
    					$headers .= "From: $to";      // From: ecfmg.org        					
    					mail($to, $subject, $msg, $headers);
            }
            if(true == $show_form){
          ?>
          <h5 class="blue">Be Heard.</h5> 
          <p>Your ideas are important to us. Let us know what you think about ECHO &mdash; what you like, what you don&rsquo;t, what you want to see more of... what we can do to make ECHO a better resource for ECFMG-certified physicians.</p>
          <div class="echo-feedback">
            <!--<form class="cmxform" id="form1" method="get" action="">-->
            <form name='feedback' id="feedback" class="echofeedback" method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>"  onsubmit="">
              <div class="inside">
            		<div class="row">
            			<label for="Name" style="margin:0 0 0 83px;">Name:</label>
            			<input id="Name" name="Name" class="required name" maxlength='150' value="<?php echo htmlspecialchars($_POST['Name']); ?>" />
            		</div>
            		<div class="row">
            			<label style="margin:0 0 0 80px;">E-mail:</label>
            			<input id="email" type="email" name="Email" class="required name" maxlength='150' value="<?php echo htmlspecialchars($_POST['Email']); ?>" />
            		</div>          	
            		<div class="row">     
            			<label>Are you certified by ECFMG?</label>
                  <label for="certified"><input type='radio' name='Certification' id='certified' value="yes" class="required" />Yes</label>
                  <label for="notcertified"><input type='radio' name='Certification' id='notcertified' value="no" class="required" />No</label>
            			<label for="Certification" class="error" style="margin:0 0 0 40px;">Please indicate whether you are certified by ECFMG.</label>
            		</div>
            		<div class="row">
            		<div id="certified-yes" style="display:none;">
            		  <label for="certified">When were you certified?</label>
            		  <select name="when-certified" class="required" for="when-certified">
                    <option value="">Select one</option>
                    <option value="Within the last 6 months" <?php if ($_POST['when-certified']=='Within the last 6 months') {print 'selected';} ?>>Within the last 6 months</option>
                    <option value="6 months to 1 year ago" <?php if ($_POST['when-certified']=='6 months to 1 year ago') {print 'selected';} ?>>6 months to 1 year ago</option>
                    <option value="1 to 3 years ago" <?php if ($_POST['when-certified']=='1 to 3 years ago') {print 'selected';} ?>>1 to 3 years ago</option>
                    <option value="More than 3 years ago" <?php if ($_POST['when-certified']=='More than 3 years ago') {print 'selected';} ?>>More than 3 years ago</option>
                  </select>
                  <label for="when-certified" class="error">Please indicate when you were certified.</label>
            		</div>
            		<div id="certified-no" style="display:none;">
            		  <label for="notcertified">When do you expect to be certified?</label>
            		  <select name="not-certified" class="required">
                    <option value="">Select one</option>
                    <option value="Within the next 6 months" <?php if ($_POST['not-certified']=='Within the next 6 months') {print 'selected';} ?>>Within the next 6 months</option>
                    <option value="6 months to 1 year from now" <?php if ($_POST['not-certified']=='6 months to 1 year from now') {print 'selected';} ?>>6 months to 1 year from now</option>
                    <option value="More than 1 year from now" <?php if ($_POST['not-certified']=='More than 1 year from now') {print 'selected';} ?>>More than 1 year from now</option>
                    <option value="I do not expect to be certified by ECFMG" <?php if ($_POST['not-certified']=='I do not expect to be certified by ECFMG') {print 'selected';} ?>>I do not expect to be certified by ECFMG</option>
                  </select>
                  <label for="not-certified" class="error"><div style="margin:10px 0 0 300px;">Please indicate when you expect to be certified.</div></label>
            		</div>
            		<!--[if gt IE 7]><div style="height:5px;"></div><![endif]-->
            		</div><!-- ends div row -->
            		<div class="row" style="height:100px; display:block; position:relative;">
            			<div style="margin:0 5px 30px 50px; float:left;"><label for="Comments">Comments:</label></div>
            			<textarea id="Comments" name="Comments" class="required" style="width:155px;"></textarea>
                </div>
            		<div class="row">
            			<input class="submit" type="submit" value="" name="feedback" style="margin:0 0 0 120px;" />
            		</div>
            	</div>
            </form>
            <?php }//true == $show_form ?>
          </div><!-- end echo-feedback -->
        </div><!-- end div_660 -->
      </div><!-- end grid_660 -->
      <div class="grid_310"><?php include ("../common/echo-right-column-menu.php"); ?></div>
      <div class="footer960">
        <div class="footerleft">
          Last updated July 5, 2012.<br /> 
          &reg; Registered in the US Patent and Trademark Office.<br />
          Copyright &copy; 1996-2012 by the Educational Commission for Foreign Medical Graduates. All rights reserved.
        </div>
        <div class="footerright">
          <div style="margin-top:35px;"><a href="../annc/terms.html">Terms</a>  |  <a href="../annc/privacy.html">Privacy</a>  |  <a href="../sitemap.html">Sitemap</a>  |  <a href="../about/careers.html">Careers</a>  |  <a href="../contact.html">Contact</a></div>
        </div>
      </div><!-- end footer960 -->
    </div><!-- end grid_980 -->
  </body>
</html>
