<?php $site = "http://www.pupdogrescue.org/"; ?>

<html>
<head>
    <title>People United for Pets </title>
    <link rel="stylesheet" type="text/css" href="<?php echo $site; ?>pup.css">
    <link rel="stylesheet" href="<?php echo $site; ?>default.css" type="text/css" media="screen">
    <meta name="keywords" content="dog adoption foster adopt pet /">
    <meta name="description"
          content="At PUP we strive to make it easier by helping you find the best match from day one.">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css" >
    <script type="text/javascript" src="<?php echo $site; ?>pup.js"></script>

</head>

<body style="margin: 0px;" data-pinterest-extension-installed="cr1.39.1">

<div align="center">

    <div class="pagelong">
        <div class="pageback">
            <div class="container">
                <div id="topbanner">
                    <div id="toplinks"><a class="blacklink" href="http://www.adoptapet.com/shelter73557-pets.html"
                                          target="_blank">Adoptapet.com</a>
                        &nbsp;|&nbsp;<a class="blacklink" href="<?php echo $site; ?>pup-pals.html">Other Partners</a></div>
                    <div id="twittericon"><a href="https://twitter.com/PUPDogRescue" target="_blank"><img
                                    src="<?php echo $site; ?>graphics/twitter-icon.jpg" width="28" height="28"
                                    alt="Follow us on Twitter" border="0"></a></div>
                    <div id="facebookicon"><a href="http://www.facebook.com/puprescue" target="_blank"><img
                                    src="<?php echo $site; ?>graphics/facebook-icon.jpg" width="28" height="28"
                                    alt="Find us on Facebook" border="0"></a></div>

                    <a href="<?php echo $site; ?>index.html"><img
                                src="<?php echo $site; ?>graphics/topbanner-spring-2014.gif" width="1124" height="224"
                                alt="People United for Pets" border="0"></a></div>

                <!-- begin navigation -->

                <!-- Start css3menu.com BODY section -->

                <div class="navback">


                    <!-- Start css3menu.com BODY section -->

                    <div>
                        <ul id="css3menu1" class="topmenu">
                            <li class="topfirst"><a href="<?php echo $site; ?>index.html" style="line-height:40px;"><span>Home</span> </a>
                            </li>
                            <li class="topmenu" style="background-color: #000000;"><a style="line-height:40px;"
                                                                                      href="adopt.html"><span>Adopt</span></a>

                                <ul>
                                    <li><a href="<?php echo $site; ?>available-adoption.html">Available for Adoption</a></li>
                                    <li><a href="<?php echo $site; ?>surrendering-pet.html">Surrendering a Pet</a></li>

                                </ul>
                            </li>

                            <li class="topmenu"><a style="line-height:40px;"
                                                   href="<?php echo $site; ?>volunteer.html"><span>Volunteer</span></a>

                                <ul>
                                    <li><a href="<?php echo $site; ?>volunteer-foster.html">Foster</a></li>
                                    <li><a href="<?php echo $site; ?>foster-stories.html">Foster Stories</a></li>
                                </ul>
                            </li>

                            <li class="topmenu"><a style="line-height:40px;" href="<?php echo $site; ?>events.html"><span>Events</span></a>

                                <ul>
                                    <li><a href="<?php echo $site; ?>calendar.html"><span>Calendar</span></a></li>

                                </ul>
                            </li>


                            <li class="topmenu"><a style="line-height:40px;"
                                                   href="<?php echo $site; ?>about-pup.html"><span>About</span></a>

                                <ul>
                                    <li><a href="<?php echo $site; ?>story-of-pup.html"><span>The Story of Pup</span></a></li>
                                    <li><a href="<?php echo $site; ?>meet-the-team.html">Meet the Team</a></li>
                                    <li><a href="<?php echo $site; ?>pup-pals.html">PUP Pals</a></li>
                                    <li><a href="<?php echo $site; ?>happy-tails.phtml">Happy Tails</a></li>
                                    <li><a href="<?php echo $site; ?>pup-stars-calendar.html">PUP Stars Calendar</a></li>
                                    <li><a href="<?php echo $site; ?>media.html">Media</a></li>
                                    <li><a href="<?php echo $site; ?>newsletters.html">Newsletters</a></li>
                                </ul>
                            </li>

                            <li class="topmenu"><a style="line-height:40px;"
                                                   href="<?php echo $site; ?>general-donation.html"><span>Donate</span></a>

                                <ul>
                                    <li><a href="<?php echo $site; ?>general-donation.html">General Donation</a></li>
                                    <li><a href="<?php echo $site; ?>planned-giving.html">Planned Giving</a></li>
                                    <li><a href="<?php echo $site; ?>medical-fund.html">Medical Fund</a></li>
                                    <li><a href="<?php echo $site; ?>corporate-matching.html">Corporate Matching</a></li>

                                    <li><a href="<?php echo $site; ?>wish-list.html">Wish List</a></li>
                                    <li><a href="<?php echo $site; ?>your-gift.html">Your Gifts at Work</a></li>
                                </ul>
                            </li>

                            <li class="topmenu"><a style="line-height:40px;"
                                                   href="<?php echo $site; ?>contact.html"><span>Contact</span></a></li>


                        </ul>

                        <!-- End css3menu.com BODY section -->

                    </div>

                </div>
                <!-- end navback -->
                <!-- End css3menu.com BODY section -->


                <div align="center">

                    <div class="main">
                        <div class="content">
                            <div id="rightcolumn">


                                <div style="padding-left:30px;">
                                    <div class="container">
                                        @yield('content')
                                    </div>


                                </div>
                                <!-- end padding -->
                            </div>
                            <!-- end rightcolumn -->
                            <div id="leftcolumn">
                                <div class="leftnav">
                                    <div class="title1" id="sidenav">
                                        <div id="sidenavline"></div>
                                        <a class="sidenav" href="<?php echo $site; ?>general-donation.html">Donate</a></div>

                                    <ul class="sidenav">

                                        <li class="sidenavtop"><a class="sidenavon" href="/">Be a
                                                Pet's Guardian Angel!</a></li>
                                        <li class="sidenav"><a class="sidenav" href="<?php echo $site; ?>planned-giving.html">Planned
                                                Giving</a></li>
                                        <li class="sidenav"><a class="sidenav" href="<?php echo $site; ?>corporate-matching.html">Corporate
                                                Giving</a></li>
                                    </ul>


                                </div>
                                <!-- end class sidenav -->
                            </div>
                            <!-- end leftnav -->

                            <div style="padding-top: 45px;">

                            </div>

                        </div>
                        <!-- end leftcolumn -->


                    </div>
                    <!-- end content -->

                    <br clear="all">
                </div>
                <!-- end main -->

            </div>
            <!-- end container -->

        </div>
        <!-- end pageback -->


        <br clear="all">

        <div style="border-bottom: thin #c9c9c9 solid; width : 1125px;" align="center"></div>
        <div class="footer">
            <div>
                <div style="padding-top: 6px;"><span class="redtitle">People United for Pets</span><br>
                    P.O. Box 1691<br>
                    Issaquah, WA 98027<br>
 
<span style="margin-top: 10px; padding-bottom : 10px;"><script type="text/javascript"><!--
        document.write('<a class="redlink" href="mailto:' + hideme_info() + '">' + hideme_info() + '</a>');
        // --></script><a class="redlink" href="mailto:info@pupdogrescue.org">info@pupdogrescue.org</a></span></div>
            </div>
            <!-- end center -->
        </div>
        <!-- end footer -->
    </div>
    <!-- end center -->
</div>
<!-- end pagelong -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    $( document ).ready(function() {
        // Selector - Method - Parameter (Take this, Do this, With these conditions)
        $(".pet").mouseover(function(){
            var $this = $(this);
            var heightOfPet = $this.height();
            var h1 = $this.find("h1");
            var top = (heightOfPet - h1.height()) / 2;
            h1.css("top", top);
            h1.show();
            $this.find(".pet-hover").show();
        }).mouseout(function(){
            $(this).find("h1").hide();
            $(this).find(".pet-hover").hide();
        }).click(function() {
            var $this = $(this);
            document.location.href = "/pets/" + $this.data("id");
        });
    });
</script>
</body>
</html>