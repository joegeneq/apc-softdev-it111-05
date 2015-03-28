<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width" />
<style>a.epl_button, input.epl_button,.epl_button_small  {
    padding: 5px 15px;
    background: #4479BA;
    color: #FFF;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    border: solid 1px #20538D;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    -webkit-transition-duration: 0.2s;
    -moz-transition-duration: 0.2s;
    transition-duration: 0.2s;
    -webkit-user-select:none;
    -moz-user-select:none;
    -ms-user-select:none;
    user-select:none;
}

.epl_button_small {
padding: 2px 15px;
font-size: 0.8em;
}
.epl_button:hover, .epl_button_small:hover, input[type=submit].epl_button_small:hover {
    background: #356094;
    border: solid 1px #2A4E77;
    text-decoration: none;
}
.epl_button:active, .epl_button_small:active, input[type=submit].epl_button_small:active {
    position:relative;
    top:1px;
}
</style>
<link rel='stylesheet' id='events-planner-jquery-ui-style-css'  href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css?ver=3.5.1' type='text/css' media='all' />
<link rel='stylesheet' id='twentytwelve-fonts-css'  href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700&#038;subset=latin,latin-ext' type='text/css' media='all' />
<link rel='stylesheet' id='twentytwelve-style-css'  href='http://www.nancymerkling.com/wp-content/themes/twentytwelve-child/style.css?ver=3.5.1' type='text/css' media='all' />
<!--[if lt IE 9]>
<link rel='stylesheet' id='twentytwelve-ie-css'  href='http://www.nancymerkling.com/wp-content/themes/twentytwelve/css/ie.css?ver=20121010' type='text/css' media='all' />
<![endif]-->
<link rel='stylesheet' id='events-planner-stylesheet-main-css'  href='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/css/style.css?ver=3.5.1' type='text/css' media='all' />
<link rel='stylesheet' id='fullcalendar-stylesheet-css'  href='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/css/fullcalendar.css?ver=3.5.1' type='text/css' media='all' />
<link rel='stylesheet' id='small-calendar-css-css'  href='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/css/calendar/small-calendar.css?ver=3.5.1' type='text/css' media='all' />
<link rel='stylesheet' id='course-calendar-css-css'  href='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/css/calendar/epl-course-cal.css?ver=3.5.1' type='text/css' media='all' />
<link rel='stylesheet' id='events-planner-stylesheet-css'  href='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/css/events-planner-style1.css?ver=3.5.1' type='text/css' media='all' />
<script type='text/javascript' src='http://www.nancymerkling.com/wp-includes/js/jquery/jquery.js?ver=1.8.3'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var EPL = {"ajaxurl":"http:\/\/www.nancymerkling.com\/wp-admin\/admin-ajax.php","plugin_url":"http:\/\/www.nancymerkling.com\/wp-content\/plugins\/events-planner-pro\/","date_format":"mm\/dd\/yy","time_format":"g:i a","firstDay":"1"};
/* ]]> */
</script>
<script type='text/javascript' src='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/js/events-planner.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/js/tipsy.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/js/fullcalendar.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/js/jquery.validate.min.js?ver=3.5.1'></script>
<script type='text/javascript' src='http://maps.googleapis.com/maps/api/js?sensor=false&#038;ver=3.5.1'></script>
<script type='text/javascript' src='http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.0/jquery.dataTables.min.js?ver=3.5.1'></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.nancymerkling.com/xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.nancymerkling.com/wp-includes/wlwmanifest.xml" /> 
<meta name="generator" content="WordPress 3.5.1" />
    <style type="text/css">
            .site-title,
        .site-description {
            position: absolute !important;
            clip: rect(1px 1px 1px 1px); /* IE7 */
            clip: rect(1px, 1px, 1px, 1px);
        }
        </style>
    </head>

<body class="page page-id-667 page-template-default custom-font-enabled single-author">
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">
        <hgroup>
            <h1 class="site-title"><a href="http://www.nancymerkling.com/" title="Nancy Merkling Photography + Workshops" rel="home">Nancy Merkling Photography + Workshops</a></h1>
            <h2 class="site-description">Simply Learn Photography Workshops</h2>
        </hgroup>

                    <a href="http://www.nancymerkling.com/"><img src="http://www.nancymerkling.com/wp-content/uploads/2013/01/Logo-NancyMerkling-white.png" class="header-image" width="345" height="90" alt="" /></a>
        
      <div id="headerwidget">
         <div id="text-2" class="widget widget_text"><div class="widget-wrap">          <div class="textwidget"><span style="font-size:33px; font-weight:normal;">815-347-8535</span></br>

<a href="http://www.facebook.com/nancymerkling" target="_blank"><img src="http://www.nancymerkling.com/wp-content/uploads/2013/04/facebook.png" alt="Nancy Merkling on Facebook" title="Connect with Nancy Merkling on Facebook!" width="32" height="32" class="ks-social-media-icons" /></a>

<a href="http://www.linkedin.com/in/nancymerkling" target="_blank"><img src="http://www.nancymerkling.com/wp-content/uploads/2013/04/linkedin.png" alt="Nancy Merkling on LinkedIn" title="Connect with Nancy Merkling on LinkedIn!" width="32" height="32" class="ks-social-media-icons" /></a>

<a href="http://www.yelp.com/biz/nancy-merkling-harvard" target="_blank"><img src="http://www.nancymerkling.com/wp-content/uploads/2013/04/yelp.png" alt="Nancy Merkling on Yelp" title="Review Nancy Merkling on Yelp!" width="32" height="32" class="ks-social-media-icons" /></a>

<a href="http://www.nancymerkling.com/contact"><img src="http://www.nancymerkling.com/wp-content/uploads/2013/04/email.png" alt="Contact Nancy Merkling via email" title="Contact Nancy Merkling via email" width="32" height="32" class="ks-social-media-icons" /></a> </div>
        </div></div>      </div>

    </header><!-- #masthead -->

        <nav id="site-navigation" class="main-navigation" role="navigation">
            <h3 class="menu-toggle">Menu</h3>
            <a class="assistive-text" href="#content" title="Skip to content">Skip to content</a>
            <div class="menu-main-menu-container"><ul id="menu-main-menu" class="nav-menu"><li id="menu-item-323" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home menu-item-323"><a href="http://www.nancymerkling.com">Home</a></li>
<li id="menu-item-2575" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor menu-item-2575"><a href="http://www.nancymerkling.com/about-workshop-instructors/">Simply Learn</br>Workshops</a>
<ul class="sub-menu">
    <li id="menu-item-2496" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2496"><a href="http://www.nancymerkling.com/about-workshop-instructors/">About Workshop Instructors</a></li>
    <li id="menu-item-1710" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-667 current_page_item menu-item-1710"><a href="http://www.nancymerkling.com/view-workshop-calendar/">View Workshop Calendar</a></li>
    <li id="menu-item-695" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-695"><a href="http://www.nancymerkling.com/register-online/">Register Online</a></li>
    <li id="menu-item-957" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-957"><a href="http://www.nancymerkling.com/gift-certificate-purchase/">Purchase Gift Certificates</a></li>
    <li id="menu-item-2544" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2544"><a href="#">Workshops</a>
    <ul class="sub-menu">
        <li id="menu-item-42" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-42"><a href="http://www.nancymerkling.com/simply-learn-your-camera/">Simply Learn | Your Camera 1</a></li>
        <li id="menu-item-41" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-41"><a href="http://www.nancymerkling.com/simply-learn-people-pics/">Simply Learn | People Pics</a></li>
        <li id="menu-item-40" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-40"><a href="http://www.nancymerkling.com/simply-learn-composition-blackwhite/">Simply Learn | Composition &#038; Black+White</a></li>
        <li id="menu-item-39" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-39"><a href="http://www.nancymerkling.com/simply-learn-the-4-step-creative-process/">Simply Learn | The 4 Step Creative Process</a></li>
        <li id="menu-item-2194" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2194"><a href="http://www.nancymerkling.com/simply-learn-your-camera-2/">Simply Learn | Your Camera 2</a></li>
        <li id="menu-item-2195" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2195"><a href="http://www.nancymerkling.com/simply-learn-iphone-photography-1/">Simply Learn | iPhone Photography 1</a></li>
        <li id="menu-item-2506" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2506"><a href="http://www.nancymerkling.com/simply-learn-social-media-marketing-for-artists/">Simply Learn | Social Media Marketing for Artists</a></li>
        <li id="menu-item-3281" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-3281"><a href="http://www.nancymerkling.com/simply-learn-adobe-photoshop-lightroom/">Simply Learn | Adobe [Photoshop] Lightroom</a></li>
        <li id="menu-item-459" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-459"><a href="http://www.nancymerkling.com/you2-workshop/">You+2 Workshop</a></li>
        <li id="menu-item-458" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-458"><a href="http://www.nancymerkling.com/workshop-at-your-place/">Workshop at Your Place</a></li>
        <li id="menu-item-38" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-38"><a href="http://www.nancymerkling.com/mentoring-sessions-portfolio-reviews/">Mentoring Sessions+Portfolio Reviews</a></li>
        <li id="menu-item-462" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-462"><a href="http://www.nancymerkling.com/new-workshops/">New Workshops</a></li>
    </ul>
</li>
</ul>
</li>
<li id="menu-item-1084" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1084"><a href="http://www.nancymerkling.com/4th-fridays-at-the-starline/">&#8220;4th Fridays&#8221;</br>at The Starline</a>
<ul class="sub-menu">
    <li id="menu-item-693" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-693"><a href="http://www.nancymerkling.com/4th-fridays-at-the-starline/">&#8220;4th Fridays&#8221; at The Starline:  About</a></li>
    <li id="menu-item-734" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-734"><a target="_blank" href="http://www.nancymerkling.com/wp-content/uploads/pdf_documents/4Fprospectusart.pdf">&#8220;4th Fridays&#8221; Prospectus:  Art Exhibit</a></li>
    <li id="menu-item-733" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-733"><a target="_blank" href="http://www.nancymerkling.com/wp-content/uploads/pdf_documents/4Fprospectusphoto.pdf">&#8220;4th Fridays&#8221; Prospectus:  Photo Contest</a></li>
    <li id="menu-item-674" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-674"><a href="http://www.nancymerkling.com/4th-fridays-submission/">Submit Your Work to &#8220;4th Fridays&#8221;</a></li>
</ul>
</li>
<li id="menu-item-360" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-360"><a href="http://www.nancymerkling.com/professional-services-for-hire/">Professional Services</br>For Hire</a></li>
<li id="menu-item-1086" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1086"><a href="http://www.nancymerkling.com/gallery-babies-kids-families/">Portfolios</a>
<ul class="sub-menu">
    <li id="menu-item-371" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-371"><a href="http://www.nancymerkling.com/gallery-babies-kids-families/">Babies+Kids+Families</a></li>
    <li id="menu-item-355" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-355"><a href="http://www.nancymerkling.com/gallery-developing-ev-series/">Developing Ev Series</a></li>
    <li id="menu-item-354" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-354"><a href="http://www.nancymerkling.com/gallery-laundry-line-series/">Laundry Line Series</a></li>
    <li id="menu-item-353" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-353"><a href="http://www.nancymerkling.com/infrared/">Infrared</a></li>
    <li id="menu-item-352" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-352"><a href="http://www.nancymerkling.com/end-of-the-day/">End of The Day</a></li>
    <li id="menu-item-370" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-370"><a href="http://www.nancymerkling.com/senior-portraits/">Senior Portraits</a></li>
    <li id="menu-item-372" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-372"><a href="http://www.nancymerkling.com/gallery-light-nature/">Light+Nature</a></li>
    <li id="menu-item-420" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-420"><a href="http://www.nancymerkling.com/abandoned-places/">Abandoned Places</a></li>
</ul>
</li>
<li id="menu-item-361" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-361"><a href="http://www.nancymerkling.com/testimonials/">Testimonials</a></li>
<li id="menu-item-1085" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1085"><a href="http://www.nancymerkling.com/about/">About Nancy</a>
<ul class="sub-menu">
    <li id="menu-item-694" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-694"><a href="http://www.nancymerkling.com/about/">About Nancy</a></li>
    <li id="menu-item-896" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-896"><a href="http://www.nancymerkling.com/contact/">Contact</a></li>
</ul>
</li>
</ul></div>     </nav><!-- #site-navigation -->

    <div id="main" class="wrapper">
    <div id="primary" class="site-content">
        <div id="content" role="main">

                            
    <article id="post-667" class="post-667 page type-page status-publish hentry">
        <header class="entry-header">
            <h1 class="entry-title">View Workshop Calendar</h1>
        </header>

        <div class="entry-content">
            
<div id='calendar'></div>
<div class="epl_fc_legend">
    
</div>

<script type='text/javascript'>

    jQuery(document).ready(function($) {

        //TODO - remove php and use js vars

        $('#calendar').fullCalendar({

            header: {
                left: '',
                center: 'select-my', //CAN'T USE THE title in header
                right: 'today,prev,next'
            },

            selectMY: {
                years: 2
            },
            firstDay: EPL.firstDay,
            theme: 0, //change
            editable: false,

            events: [{"title":"<span class=\"epl_fc_title_time\"> 1:30 PM<\/span>Simply Learn | Adobe [Photoshop] Lightroom","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Adobe [Photoshop] Lightroom<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Saturday, March 28, 2015        <\/div>\n\n\n                        <div class=\"event_time\">1:30 PM - 4:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Join <a href=\"http:\/\/www.nancymerkling.com\/about-workshop-instructors\/\/#giovanni-arroyo\">Giovanni Arroyo<\/a> as he walks you through the super user friendly post production software that both amateurs and professionals alike are choosing. Giovanni will talk editing, workflow, importing &amp; organizing files, exporting &amp; printing and more. He will address all 7 modules of Lightroom : Library, Develop, Map, Book, Slideshow, Print and Web.<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1427500800","start":"2015-03-28 13:30:00","end_timestamp":"1427500800","end":"2015-03-28 17:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=3273&_rand=5511867c0c40b&_date_id=NnzwXs","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":3273,"sort_time":1427549400},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Your Camera 1","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Your Camera 1<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Sunday, March 29, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Set in her historic loft studio, Nancy Merkling demystifies shooting 'off-automatic' with her rare and insightful teaching style. Learning camera settings has never been simpler.  This 3- hour mini-workshop includes casual lecture, hands-on assistance and a field-trip-shoot adventure in the beautiful Starline Factory to apply your new skills and answer questions!  <\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1427587200","start":"2015-03-29 09:30:00","end_timestamp":"1427587200","end":"2015-03-29 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=6&_rand=5511867c199bb&_date_id=aoIiDv","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":6,"sort_time":1427621400},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Your Camera 1","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Your Camera 1<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Saturday, April 4, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Set in her historic loft studio, Nancy Merkling demystifies shooting 'off-automatic' with her rare and insightful teaching style. Learning camera settings has never been simpler.  This 3- hour mini-workshop includes casual lecture, hands-on assistance and a field-trip-shoot adventure in the beautiful Starline Factory to apply your new skills and answer questions!  <\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1428105600","start":"2015-04-04 09:30:00","end_timestamp":"1428105600","end":"2015-04-04 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=6&_rand=5511867c199bb&_date_id=x1fkpZ","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":6,"sort_time":1428139800},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | People Pics","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | People Pics<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Sunday, April 5, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Award-winning portrait artist Nancy Merkling shares her personal insights and expertise on creating successful images that portray the people in front of our lives, whether posed or living in the moment and enjoying life. From candids to street photography to documenting our family, novice and seasoned photographers alike will find inspiration for cultivating creativity as well as essential skill-building information...<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1428192000","start":"2015-04-05 09:30:00","end_timestamp":"1428192000","end":"2015-04-05 20:30:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=539&_rand=5511867c0eb8a&_date_id=dMFWm7","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":539,"sort_time":1428226200},{"title":"<span class=\"epl_fc_title_time\"> 6:30 PM<\/span>Simply Learn | The 4 Step Creative Process","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | The 4 Step Creative Process<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Friday, April 10, 2015        <\/div>\n\n\n                        <div class=\"event_time\">6:30 PM - 8:30 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">The Creative Process is an elusive bundle of energy that leads us to our craft with a surge of emotion like no other.  How do we feed this energy ... and exercise it... and discipline it... and call it up as needed?  Join Nancy Merkling as she shares her insight and wisdom on growing in the 4-Step Creative...<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1428624000","start":"2015-04-10 18:30:00","end_timestamp":"1428624000","end":"2015-04-10 20:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=886&_rand=5511867c11414&_date_id=JkhVNJ","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":886,"sort_time":1428690600},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Your Camera 2","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Your Camera 2<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Saturday, April 11, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Moving past the exposure triangle and histograms into the world of white balance, metering+modes, exposure compensation and focus+modes, this workshop widens the path of decisions and control with your digital slr.\r\n\r\nPhotographers who are ready for this workshop have a strong working knowledge of the exposure triangle [ISO, aperture and shutter] and are able to shoot on priority and manual settings...<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1428710400","start":"2015-04-11 09:30:00","end_timestamp":"1428710400","end":"2015-04-11 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=2187&_rand=5511867c13075&_date_id=ekE63i","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":2187,"sort_time":1428744600},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Your Camera 1","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Your Camera 1<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Sunday, April 12, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Set in her historic loft studio, Nancy Merkling demystifies shooting 'off-automatic' with her rare and insightful teaching style. Learning camera settings has never been simpler.  This 3- hour mini-workshop includes casual lecture, hands-on assistance and a field-trip-shoot adventure in the beautiful Starline Factory to apply your new skills and answer questions!  <\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1428796800","start":"2015-04-12 09:30:00","end_timestamp":"1428796800","end":"2015-04-12 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=6&_rand=5511867c199bb&_date_id=ldVW7a","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":6,"sort_time":1428831000},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Composition & Black+White","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Composition & Black+White<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Sunday, April 19, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">A fun combo workshop that explores the magic of composition and the art of shooting for black+white: this inspirational workshop unravels some of elements of composition while still encouraging photographers to compose by focusing with their heart and mind. Nancy Merkling also freely shares her wisdom and secrets behind powerful black+white imagery.<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1429401600","start":"2015-04-19 09:30:00","end_timestamp":"1429401600","end":"2015-04-19 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=540&_rand=5511867c15318&_date_id=WeIuol","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":540,"sort_time":1429435800},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Your Camera 1","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Your Camera 1<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Saturday, May 2, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Set in her historic loft studio, Nancy Merkling demystifies shooting 'off-automatic' with her rare and insightful teaching style. Learning camera settings has never been simpler.  This 3- hour mini-workshop includes casual lecture, hands-on assistance and a field-trip-shoot adventure in the beautiful Starline Factory to apply your new skills and answer questions!  <\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1430524800","start":"2015-05-02 09:30:00","end_timestamp":"1430524800","end":"2015-05-02 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=6&_rand=5511867c199bb&_date_id=ZD3pnJ","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":6,"sort_time":1430559000},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | iPhone Photography 1","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | iPhone Photography 1<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Sunday, May 3, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Learn to use the camera that is with you the most in this innovative workshop, taught by Nancy Merkling. Learning the basics is paramount to all photography and the iPhone is no different. Although we wish our cameras were intuitive enough to read our thoughts and ideas, Apple hasn\u2019t turned that corner yet. Too dark? Out of focus? Yep, it...<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1430611200","start":"2015-05-03 09:30:00","end_timestamp":"1430611200","end":"2015-05-03 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=2191&_rand=5511867c17578&_date_id=0BJ8fo","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":2191,"sort_time":1430645400},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Your Camera 1","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Your Camera 1<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Sunday, May 10, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Set in her historic loft studio, Nancy Merkling demystifies shooting 'off-automatic' with her rare and insightful teaching style. Learning camera settings has never been simpler.  This 3- hour mini-workshop includes casual lecture, hands-on assistance and a field-trip-shoot adventure in the beautiful Starline Factory to apply your new skills and answer questions!  <\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1431216000","start":"2015-05-10 09:30:00","end_timestamp":"1431216000","end":"2015-05-10 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=6&_rand=5511867c199bb&_date_id=INyyIM","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":6,"sort_time":1431250200},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Composition & Black+White","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Composition & Black+White<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Saturday, May 16, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">A fun combo workshop that explores the magic of composition and the art of shooting for black+white: this inspirational workshop unravels some of elements of composition while still encouraging photographers to compose by focusing with their heart and mind. Nancy Merkling also freely shares her wisdom and secrets behind powerful black+white imagery.<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1431734400","start":"2015-05-16 09:30:00","end_timestamp":"1431734400","end":"2015-05-16 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=540&_rand=5511867c15318&_date_id=ZpdTW1","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":540,"sort_time":1431768600},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | People Pics","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | People Pics<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Sunday, May 17, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Award-winning portrait artist Nancy Merkling shares her personal insights and expertise on creating successful images that portray the people in front of our lives, whether posed or living in the moment and enjoying life. From candids to street photography to documenting our family, novice and seasoned photographers alike will find inspiration for cultivating creativity as well as essential skill-building information...<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1431820800","start":"2015-05-17 09:30:00","end_timestamp":"1431820800","end":"2015-05-17 20:30:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=539&_rand=5511867c0eb8a&_date_id=rMDdUm","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":539,"sort_time":1431855000},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Your Camera 1","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Your Camera 1<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Saturday, May 30, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Set in her historic loft studio, Nancy Merkling demystifies shooting 'off-automatic' with her rare and insightful teaching style. Learning camera settings has never been simpler.  This 3- hour mini-workshop includes casual lecture, hands-on assistance and a field-trip-shoot adventure in the beautiful Starline Factory to apply your new skills and answer questions!  <\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1432944000","start":"2015-05-30 09:30:00","end_timestamp":"1432944000","end":"2015-05-30 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=6&_rand=5511867c199bb&_date_id=3FKPzD","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":6,"sort_time":1432978200},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | Composition & Black+White","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | Composition & Black+White<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Sunday, June 7, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">A fun combo workshop that explores the magic of composition and the art of shooting for black+white: this inspirational workshop unravels some of elements of composition while still encouraging photographers to compose by focusing with their heart and mind. Nancy Merkling also freely shares her wisdom and secrets behind powerful black+white imagery.<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1433635200","start":"2015-06-07 09:30:00","end_timestamp":"1433635200","end":"2015-06-07 13:20:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=540&_rand=5511867c15318&_date_id=kiTLAs","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":540,"sort_time":1433669400},{"title":"<span class=\"epl_fc_title_time\"> 9:30 AM<\/span>Simply Learn | People Pics","description":"\n\n<div class=\"fc_template1\">\n\n    <div class=\"event_title\">Simply Learn | People Pics<\/div>\n\n    <div class=\"event_details\">\n\n        <div class=\"event_date\">\n            Saturday, June 13, 2015        <\/div>\n\n\n                        <div class=\"event_time\">9:30 AM - 12:15 PM<\/div>\n        \n\n            <div style=\"\" class=\"event_description\">Award-winning portrait artist Nancy Merkling shares her personal insights and expertise on creating successful images that portray the people in front of our lives, whether posed or living in the moment and enjoying life. From candids to street photography to documenting our family, novice and seasoned photographers alike will find inspiration for cultivating creativity as well as essential skill-building information...<\/div>\n    <\/div>\n\n<\/div>\n\n","term_list":"workshops","start_timestamp":"1434153600","start":"2015-06-13 09:30:00","end_timestamp":"1434153600","end":"2015-06-13 20:30:00","url":"http:\/\/www.nancymerkling.com\/register-online\/?page_id=356&epl_action=process_cart_action&cart_action=add&event_id=539&_rand=5511867c0eb8a&_date_id=K7aeQq","backgroundColor":"#ffffff","borderColor":"#ffffff","textColor":"#eb8b0f","id":539,"sort_time":1434187800}],
            eventRender: function(event, element) {

                element.find('span.fc-event-title').html(element.find('span.fc-event-title').text());


            },
            eventMouseover:function( event, jsEvent, view ) {

                var title = event.title;
                var content = event.description;


            
                //ttp.fadeTo('10',0.9);

            },
            eventMouseout:function( event, jsEvent, view ) {


                $('#fc_tooltip').remove();


            },
                            
            loading: function(bool) {
                if (bool) epl_loader('show');
                else epl_loader('hide');
            }

        });


    });


</script>
                    </div><!-- .entry-content -->
        <footer class="entry-meta">
                    </footer><!-- .entry-meta -->
    </article><!-- #post -->
                
<div id="comments" class="comments-area">

    
    
                                    
</div><!-- #comments .comments-area -->         
        </div><!-- #content -->
    </div><!-- #primary -->


            <div id="secondary" class="widget-area" role="complementary">
            <aside id="search-2" class="widget widget_search"><form role="search" method="get" id="searchform" action="http://www.nancymerkling.com/" >
    <div><label class="screen-reader-text" for="s">Search for:</label>
    <input type="text" value="" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="Search" />
    </div>
    </form></aside><aside id="text-4" class="widget widget_text"><h3 class="widget-title">Sign up for our mailing list!</h3>            <div class="textwidget"><!-- BEGIN: Constant Contact Basic Opt-in Email List Form -->
<div align="center">
<table border="0" cellspacing="0" cellpadding="3" bgcolor="#000000" style="border:2px solid #FFFFFF;">
<tr>
<td align="center">
<form name="ccoptin" action="http://visitor.r20.constantcontact.com/d.jsp" target="_blank" method="post" style="margin-bottom:2;">
<input type="hidden" name="llr" value="dxz888iab">
<input type="hidden" name="m" value="1109036754659">
<input type="hidden" name="p" value="oi">
<font style="font-weight: normal; font-family:Arial; font-size:15px; font-weight:bold; padding-right:5px; color:#C86517;">Email:</font> <input type="text" name="ea" size="20" value="" style="font-size:13px; border:1px solid #999999; width: 150px;">
<input type="submit" name="go" value="Go" class="submit" style="font-family:Verdana,Geneva,Arial,Helvetica,sans-serif; font-size:13px; margin:8px;">
</form>
</td>
</tr>
</table>
</div>
<!-- END: Constant Contact Basic Opt-in Email List Form --></div>
        </aside><aside id="text-3" class="widget widget_text">          <div class="textwidget"><a href="http://www.nancymerkling.com/4th-fridays-at-the-starline/"><img src="http://www.nancymerkling.com/wp-content/uploads/2013/03/4F-logo-no-color-183x300.png" alt="4F-logo-no-color" width="91" height="150" class="aligncenter size-medium wp-image-1457" /></a><div style="text-align: center;"><strong><span style="color: #C86517;">2015 "4th Fridays" at the Starline</br>Event Calendar</span></strong></br>
January 23rd</br>
February 27th</br>
March 27th</br>
April 24th</br>
May 22nd</br>
June 26th</br>
July 24th</br>
August 28th</br>
September – no event</br>
October 23rd</br>
November+December – break for the holidays</div>
</div>
        </aside><aside id="text-9" class="widget widget_text">          <div class="textwidget"><div style="text-align: center;"><a class="workshop_registration_button" href="http://www.nancymerkling.com/registration-problems/">Registration Problems?</a></div></div>
        </aside>        </div><!-- #secondary -->
        </div><!-- #main .wrapper -->
    <footer id="colophon" role="contentinfo">
        <div class="site-info">
<div class="vcard">
<span class="fn n">
<span class="given-name"></span>
<span class="additional-name"></span>
<span class="family-name"></span>
</span>
<div class="org">Nancy Merkling Photography + Workshops</div>
<a class="email" href="mailto:nancy@nancymerkling.com">nancy@nancymerkling.com</a>
<div class="adr">Historic Starline Factory Gallery + Studios
<div class="street-address">400 West Front St</div>
<span class="locality">Harvard</span>,&nbsp;<span class="region">IL</span>&nbsp;&nbsp;<span class="postal-code">60033</span>&nbsp;<span class="country-name">United States</span>
</div>
<div class="tel"><a href="tel://+18153478535">815-347-8535</a></div></div>

                        &copy;  2015 Nancy Merkling Photography + Workshops. All rights reserved.  Website by  <a href="http://www.getsharpinc.com" target="_blank">Get Sharp, Inc.</a>.
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
</div><!-- #page -->

<div class="slide_down_box" id="slide_down_box">
    <div class="display">

    </div>
    <div class="incoming" style="display: none;"></div>
    <a href="#" id="dismiss_loader" class="epl_button_small" style=""><span class=""></span>Close</a>
</div>

<div id="epl_overlay" class="">
    <div></div>

</div>

<div id ="epl_loader">
    <img  src ="http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/images/ajax-loader.gif" alt="loading..." />
</div>


<script>
    
    jQuery(document).ready(function($){

        $(".lightbox_login").click(function(e) {

            var redirect_to =this.getAttribute('data-redirect_to');
            var data = "epl_action=login_form&epl_controller=epl_front";
            jQuery('body').data('epl_redirect_to', redirect_to);

            events_planner_do_ajax( data, function(r){

                //I don't know why I have to do this but it's the only way it works
                var html = $(r.html);

                $.lightbox(html, {
                    'width'       : 350,
                    'height'      : 200,
                    'autoresize'  : true
                });

            });
            
            e.preventDefault();
  
            return false;
        });
    });
    
</script><script type='text/javascript' src='http://www.nancymerkling.com/wp-content/themes/twentytwelve-child/js/selectnav.js?ver=1.0'></script>
<script type='text/javascript' src='http://www.nancymerkling.com/wp-content/plugins/events-planner-pro/js/epl-front.js?ver=1'></script>
<script type='text/javascript' src='http://www.nancymerkling.com/wp-includes/js/jquery/ui/jquery.ui.core.min.js?ver=1.9.2'></script>
<script type='text/javascript' src='http://www.nancymerkling.com/wp-includes/js/jquery/ui/jquery.ui.datepicker.min.js?ver=1.9.2'></script>
</body>
</html>