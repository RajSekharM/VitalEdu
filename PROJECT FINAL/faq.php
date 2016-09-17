<?php
	error_reporting(0);
	require ('dbconn.php');
	include ('nav.php');
?>
<html lang = "en">
<head><title>FAQ</title>
	<style>
	.panel-heading .accordion-toggle:after {
		font-family: 'Glyphicons Halflings';
		content: "\e114";
		float: right;
		color: grey;
		}
		.panel-heading .accordion-toggle.collapsed:after {
		content: "\e080";
		}
	</style>
</head>
<body>

<br/><br/><br/>
<div class="container panel text-muted">
	<div style = "margin:10%; margin-top: 5%">
 <h2 class = "cont_head">Frequently asked questions</h2>
  <div class="panel-group" id="accordion" >
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Is Australia Wide First Aid accredited? Will my certificate be normally recognised</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">Australia Wide First Aid is a Nationally Recognised Training Organisation (no: 31961) 
		meaning your first aid qualification is nationally recognised. Australia Wide First Aid 
		follow the Australian Resuscitation Council guidelines and every competent student will 
		receive a Nationally Recognised Certificate of Attainment.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">How long am I certified for? How can I renew</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">Your Provide First Aid certificate is valid for three (3) years. The 
		CPR component of the course is valid for 12 months and will need to be updated annually for 
		you to keep your certification current.</div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Is there anything I need to do before turning up to my First Aid Course?</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">You can read through Australia Wide First Aid's Manual which 
		you receive on completion of your booking. This will assist you in your first aid 
		assessments which you will undertake during your first aid course.</div>
      </div>
	</div>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">How is a one day course the same as completing a two day course? Is the qualification the same?</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">Yes. The qualification is the same, regardless if you complete your 
		first aid course in one day or two days. Australia Wide First Aid offers a streamlined 
		course, educating you with the same knowledge and skills of first aid, it is fast tracked 
		to ensure you gain your first aid qualification with minimal disruption to your work or 
		home life.</div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Can I have a firs aid course conducted at my workplace or home?</a>
        </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body">Yes, Australia Wide First Aid can come to you at your
		workplace or organisation at a time which best suits you. Australia Wide First Aid 
		provides group discounts, as well as training which can be specifically tailored to 
		your environment.</div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">When do I pay for my first aid course? How do I pay for my first aid course?</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">Yes, Australia Wide First Aid can come to you at your
		workplace or organisation at a time which best suits you. Australia Wide First Aid 
		provides group discounts, as well as training which can be specifically tailored to 
		your environment.</div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">What do I do if my personal details change after I have booked in for a first aid course?</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">Australia Wide First Aid recommends you to pay for your first 
		aid course at least 48 hours before the course commences. This will ensure you receive
		your first aid certificate on the day of your first aid course, and secures your 
		booking. You can pay with a Visa or Mastercard online or via phone with one of 
		Australia Wide First Aid friendly customer service representatives. We also have 
		the options of Direct Debit, Invoice, or Eptos facilities which are available at some
		of Australia Wide First Aid training centres.</div>
      </div>
    </div>
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">How do I claim the 70% rebate from Construction Training Fund (BCITF)?</a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body">The Building and Construction Industry Training Fund offers 
		rebates on the cost of training incurred by those working in the Building and 
		Construction Industries and their employees in Western Australia. If you are 
		eligible, you can claim your rebate directly from the BCITF by completing the forms 
		available here.</div>
      </div>
    </div>
  </div>
  </div>
</div>
<br><br><br>
<br><br><br>
	<?php
		include ('footer.php');
	?>	
</body>
</html>