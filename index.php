<?php
session_start();


$html = '<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]--><!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]--><!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]--><!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->

<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>YouFolio: Define Yourself</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <script src="js/libs/head.min.js" type="text/javascript">
</script>
<script type="text/javascript">
//Load in all JS files for jQuery, Ember, MVC, etc.    
head.js("js/resources.js");
</script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"><!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>';

$html .= '<body style="padding:0px !important; background-color:white; min-width:100% !important; min-height:100% !important; overflow-x: hidden;">
    <script type="text/x-handlebars" data-template-name="application">
    <form name="myForm" id="myForm" action="Signup.php" method="POST" style="margin-bottom:0px !important;">

<!--Start main div-->
  <div class="row-fluid" style="background-color:white;">
    
    <!--Start first row-->

    <div class="span3 offset2">
    <img src="img/Logo.png"/ style="height:125px; width:250px;">
    </div>
    <div class="span4 offset1">
    <br/>
    <h2>Join YouFolio, discover people and opportunities.</h2>
    </div>



<!--End main div-->
  </div>



  <div class="row-fluid" style="background-color:white; padding:10px;">
  <div class="span8 offset2" style="text-align:center;">
 <!--<div id="myCarousel" class="carousel slide" style="height:auto; width:90%; z-index:1; text-align:center; margin-left:auto; margin-right:auto; display:block;">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="active item"><img style="max-width:700px; margin-left: 16%; margin-top: 4%;" src="img/YFPage.png"/></div>
    <div class="item"><img style=" max-width:700px; margin-left: 16%; margin-top: 4%;" src="img/YFPage2.png"/></div>
  </div>
  </div>-->
  <div style="height:auto; width:92%; z-index:1; text-align:center; margin-left:auto; margin-right:auto; padding-top:35px;">
  <img style="max-width:100%; height:auto;"src="img/mbp1.png"/>
  </div>
  </div>
  </div>
  <div class="row-fluid" style="background-color:white; padding:5px;">
  <div class="span4 offset2">
  YouFolio helps you showcase yourself to the world.
  </div>
  <div class="span3">
  <input type="text" name="email1" id="email1" placeholder="email (non-.edu preferred)" style="padding-right:10px;"/>
  <input type="button" value="Sign up" onclick="validationCheck();" class="btn btn-primary btn-medium" style="font-size:10pt; margin-top:-10px; text-align:center;"/>
</div>

<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fyoufolio&amp;send=false&amp;layout=button_count&amp;width=350&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:350px; height:21px;" allowTransparency="true"></iframe>

<div id="twitterTest"></div>


  </div>
    
  
      <div class="row-fluid">
      <div class="span12" style="background-color:#F8F8F7; padding:15px;">
   <div class="span3 offset2">
   <img src="img/Test2.png"/>
   <!--<span class="icon-folder-open iconColor" style="font-size:125pt;"></span>-->
    </div>
    <div class="span5">
<h2>We are more than a resume site</h2>
YouFolio lets you create a professional persona through meaningful descriptions and rich, visual attachments. Take control of your professional online presence and stand out better than you\'re able to on sites like LinkedIn, Facebook, Twitter, or Pinterest.    </div>
    </div>
      </div>
      
      
      
      <div class="row-fluid">
      <div class="span12" style="background-color:#F8F8F7; padding:15px;">
   <div class="span5 offset2">
  <h2>Our community is comprised of individuals with similar interests</h2>
Originating from Virginia Tech, our community of proactive and passionate students is continuously growing stronger. This is a place where like-minded individuals collaborate, give or receive feedback, and get inspired. We want to eliminate boundaries between social groups, professional opportunities and college campuses.       </div>
    <div class="span3">
       <img src="img/VA.png"/>
    </div>
    </div>
      </div>




      <div class="row-fluid">
      <div class="span12" style="background-color:#F8F8F7; padding:15px;">
   <div class="span3 offset2">
   
   <img src="img/people.png"/>
    </div>
    <div class="span5">
<h2>We are open to students of all majors!</h2>
We believe that online portfolios are not exclusive to one subset of students or majors, but that they are an essential tool for all builders, innovators and doers. Creating a portfolio and looking to others for inspiration is a part of every student’s college experience. YouFolio distinguishes individuals in the recruitment process by showcasing their unique and desirable attributes.    </div>
    </div>
      </div>



      <div class="row-fluid">
      <div class="span12" style="background-color:#F8F8F7; padding:15px;">
   <div class="span5 offset2">
  <h2>What makes us different than LinkedIn?</h2>
The main focus of LinkedIn is to build your professional network, which most college students don’t have. It is also a text-based platform, which works well for seasoned professionals, but does not allow students to properly present their professional experiences and skills. YouFolio is a social platform that provides an opportunity for you to showcase your creations and meaningful content all in one place!
    </div>
    <div class="span3">
       <img src="img/linkedin.png"/>
    </div>
    </div>
      </div>
      <div class="row-fluid">
      <div class="span8 offset2">
             <h2>Meet the Team</h2>
      <div class="row-fluid">
            <ul class="thumbnails">
              <li class="span4">
                <div class="thumbnail">
                  <img src="img/kayvon.png" data-src="holder.js/300x200" alt="">
                  <div class="caption">
                    <h3>Kayvon Kaviani</h3>
                    <p>CEO - Cofounder</p>
                    <p>Vienna, VA<br/>
       Business Information and Technology <br/>B.S.<br/>
       Virginia Tech
</p>
                    <p class="socialLink"><a href="https://www.facebook.com/KayKaviani" target="_blank"><span style="font-size:40pt;" class="icon-facebook"></span></a>
                    <a href="https://twitter.com/KayvonKaviani" target="_blank"><span style="font-size:40pt;" class="icon-twitter"></span></a></p>
                  </div>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <img src="img/matt2.png" data-src="holder.js/300x200" alt="">
                  <div class="caption">
                    <h3>Matthew D. Moore</h3>
                    <p>President - Cofounder</p>
                    <p>Vienna, VA<br/>
       Finance and International Business <br/>B.S.<br/>
       Virginia Tech
</p>
 <p class="socialLink"><a href="https://www.facebook.com/matt.moore.7161" target="_blank"><span style="font-size:40pt;" class="icon-facebook"></span></a>
                    <a href="https://twitter.com/matteo_moore" target="_blank"><span style="font-size:40pt;" class="icon-twitter"></span></a></p>                  
                    </div>
                </div>
              </li>
              <li class="span4">
                <div class="thumbnail">
                  <img src="img/wagner.png" data-src="holder.js/300x200" alt="">
                  <div class="caption">
                    <h3>Robert W. Wagner</h3>
                    <p>Director of Development</p>
                    <p>Roanoke, VA<br/>
       Computer Science <br/>B.S.<br/>
       Virginia Tech
</p>

 <p class="socialLink"><a href="https://www.facebook.com/robertwilliamwagner" target="_blank"><span style="font-size:40pt;" class="icon-facebook"></span></a>
                    <a href="https://twitter.com/robbiecore" target="_blank"><span style="font-size:40pt;" class="icon-twitter"></span></a></p>                    
                     </div>
                </div>
              </li>
            </ul>
          </div>

       <br/>
          </div>
      </div>
      <div class="row-fluid">
        <div class="span8 offset2">
      <hr/>
      </div>
      </div>
        <div class="row-fluid">
      <div class="span12" style="background-color:white; padding:5px; text-align:center;">
      <h2>Hello World, We\'re YouFolio</h2>
      <br/>
      </div>
        </div>
        <div class="row-fluid">
      <div class="span8 offset2" style="background-color:white; padding:15px; text-align:center;">
      Do you have knowledge or experience? Do you seek work opportunities and connections? YouFolio helps you display your accomplishments and creations, build your life portfolio, and build your professional network. <a href="./blog">Read more...</a>
      </div>
       </div>
       <div class="row-fluid">
      <div class="span12" style="background-color:#68bbde; padding:15px; text-align:center;">
         <h3 style="color:#94dbf9;"> Sign up today and get invited to YouFolio!</h3><br/>
        <input type="text" name="email2" id="email2" placeholder="email (non-.edu preferred)" style="padding-right:10px;"/>
  <input type="button" value="Sign up" onclick="validationCheck();" class="btn btn-primary btn-medium" style="font-size:10pt; margin-top:-10px; text-align:center;"/>
      </div>
       </div>
       
      
      <div class="row-fluid navbar bottomNavContainer">
  <div class="navbar-inner bottomNav">
    <a class="brand offset1" style="font-size:15pt; margin-top:15px;" href="http://www.youfolio.com/">©Youfolio LLC 2013. All rights reserved.</a>
    <!--<img class="bottomLogo" src="img/newLogo.png"/>-->
    <ul class="nav offset5">
      <!-- <li><a href="#">About</a></li>
      <li><a href="#">Story</a></li>
      <li><a href="#">Help</a></li>
      <li><a href="#">Jobs</a></li>
      <li><a href="#">Contact</a></li>   -->
      <li><a href="http://www.facebook.com/youfolio" target="_blank"><span style="font-size:40pt;" class="icon-facebook"></span></a></li>
      <li><a href="http://www.twitter.com/youfolio" target="_blank"><span style="font-size:40pt;" class="icon-twitter"></span></a></li>
      </ul>
  </div>
</div>
</form>
    </script>
</body>';

echo $html;

?>

<script type="text/javascript">
function validationCheck()
{
if($('#email1').val() && $('#email2').val())
{
if($('#email1').val() == $('#email2').val())
{
document.forms["myForm"].submit();
}
else
{
alert("You entered an email in both boxes, but they do not match!");
}
}
else if(($('#email1').val() && !$('#email2').val()) || (!$('#email1').val() && $('#email2').val()))
{
document.forms["myForm"].submit();
}
else
{
alert("The email field must be completed before continuing.");
}
}

</script>