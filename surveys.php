<?php 
  //require_once ('../dcon/dcon.php');
  $show_form=true;                       
  if(isset($_POST['survey']))
  {// The form is submitted
    $show_form=false;
    include ("../common/header-echo.php");
    echo "<div class='grid_660'>\n";
    echo "<div class='div_660'>\n"; 
    echo "<h1 class='echo-surveys'></h1>\n";
    echo "<h3 style='font-size:15px;'>Thank you for taking this month's ECHO survey! Check back later to see survey results.</h3>\n";
    echo "<h5>Previous Surveys</h5>\n";
    echo "<ul>\n";
    echo "<li><a href="">May/June 2012: Data on international medical graduates (IMGs) in U.S. GME </a></li>\n";
    echo "</ul\n";  
    echo "<div class='echo-survey'>\n";
    $show_form=false;
    $to = "echo@ecfmg.org";
		$subject = "ECHO Survey";
		$email = $_POST["email"];
    $msg = "<div style='font-family:Helvetica, Arial, Verdana, sans-serif;'>"; 
		$msg .= "<p><strong>What kind of  information about the interview process would be of interest to you?:</strong>&nbsp;<font color='#006699'>".$_POST["answer"]."</font>\n";
		$msg .= "</div>";
		$headers = "MIME-Version: 1.0\n"; 
		$headers .= "Content-type: text/html; charset=iso-8859-1\n";
		$headers .= "From: echo@ecfmg.org";           					
		mail($to, $subject, $msg, $headers);          					
		/*$answer=$_POST['answer'];
    $question="What kind of  information about the interview process would be of interest to you?"; 
    $query = "INSERT INTO surveyTbl (question, answer) VALUES('$question', '$answer')";
    $result = mysql_query ($query);
    if ($result) {		
			 header ("Location: http://test.ecfmg.org/echo/survey-results.php");
    }*/
  }
  if(true == $show_form){
 include ("../common/header-echo.php"); ?>
    <div class="grid_660">
      <div class="div_660"> 
        <h1 class="echo-surveys"></h1> 
        <?php  ?>
        <h5 class="blue">Be Heard.</h5>   
        <p>ECHO is a new way for certified physicians to communicate with ECFMG. Take this month&rsquo;s survey to let us know what you think, and view survey results to see what your fellow physicians have to say. The results of these surveys will help us learn more about what&rsquo;s on your mind and how we can develop resources that meet your needs.</p>
        
        <div class="echo-survey">
        <p><b>July 2012: Residency Application Support</b>
        <br />In April of 2012, ERAS Support Services at ECFMG surveyed 2012 Match participants about the types of application resources that would have been helpful to them during application process. One of the top answers was information about &#8221;the interview process.&#8221; What kind of  information about the interview process would be of interest to you? Please select one.</p> 
          <form method='post' action="<?php echo $_SERVER['PHP_SELF']; ?>"  onsubmit="">
            <script type="text/javascript">
                  $(document).ready(function() { 
                    $("#vote").hide();
                    $("#falsevote").show();
                    $("input[type='radio']").change(function(){  
                      if($("#Data-IMGs").val()=="Frequently asked interview questions"){
                        $("#vote").show();
                        $("#falsevote").hide();
                      } else if($("#Data-IMGs").val()=="Questions you should ask during the interview"){  
                        $("#vote").show();
                        $("#falsevote").hide();
                      } else if($("#Data-IMGs").val()=="How to communicate with program staff before, during, and after an interview"){ 
                        $("#vote").show();
                        $("#falsevote").hide();
                      } else if($("#Data-IMGs").val()=="How to communicate with the program's current residents during the interview process"){
                        $("#vote").show();
                        $("#falsevote").hide();
                      } else {}                
                    });
                  });
                </script>
            <div class="inputradio">
              <input type="radio" name="answer" id="Data-IMGs" value="Frequently asked interview questions">Frequently asked interview questions<br />
              <input type="radio" name="answer" id="Data-IMGs" value="Questions you should ask during the interview">Questions you should ask during the interview<br />
              <input type="radio" name="answer" id="Data-IMGs" value="How to communicate with program staff before, during, and after an interview">How to communicate with program staff before, during, and after an interview<br />
              <input type="radio" name="answer" id="Data-IMGs" value="How to communicate with the program's current residents during the interview process">How to communicate with the program's current residents during the interview process<br />
            </div>           
            <div class="input" id="vote" style="height:30px; margin-bottom:0;"><input class="submit" type="submit" name="survey" value="" style="margin-top:0;" /></div>
            <div id="falsevote"></div>
            <div class="clear"></div>
            <div class="input" style="margin-top:10px; width:600px;"><p style="font-weight:bold; color:#006699; text-align:center;">We&#8217;ll use the results of this survey to develop a new ECHO resource. Look for the new resource in September!</p></div>
          </form>
          
          <h5>Previous Surveys</h5>
          <ul>
          <li><a href="">May/June 2012: Data on international medical graduates (IMGs) in U.S. GME </a></li>
          </ul>
          <?php } ?><!-- end show form -->
        </div><!-- end echo-survey -->
      </div><!-- end div_660 -->
    </div><!-- end grid660 -->    
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