<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta name="generator" content=
  "HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org" />
  <link rel="stylesheet" href="css/blueprint/screen.css" type="text/css" media=
  "screen, projection" />
  <link rel="stylesheet" href="css/blueprint/print.css" type="text/css" media="print" />
  <!--[if lt IE 8]>
      <link rel="stylesheet" href="css/blueprint/ie.css" type="text/css" media="screen, projection">
      <![endif]-->
  <link rel="stylesheet" href=
  "//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" type="text/css" />
  <script src="./js/jquery-1.9.1.js" type="text/javascript">
</script>
  <script src="./js/jquery-ui.js" type="text/javascript">
</script>
  <script src="./js/homepagejs.js" type="text/javascript">
</script>
  <script type="text/javascript" src="./js/jquery.timepicker.js">
</script>
  <link rel="stylesheet" type="text/css" href="./js/jquery.timepicker.css" />

  <title></title>
  <style type="text/css">
  label {
		float: left;
		width: 300px;
		text-align: right;
		padding-right: 12px;
		margin-bottom: 5px;
		}
	#bookingform {
		background-color: #CCCCCC;
		margin:auto;
		width: 60%;
	}
	#timeAvaliabilitySpace{
		float: center;
		text-align: center;
	}
  
  </style>
</head>

<body>
	<br/><br/></br>
    <form name="form1" id="bookingform" action="bookit.php" onsubmit="return validateFields();" method=
    "post" id="form1">
      <?php
			if(isset($_GET['username'])){
				echo '<input type="hidden" name= "username" value = "'.$_GET['username'].'"/>';
			}
			else header("Location:index.php");
      ?>
	  </br></bR>
				  <div>
		<label for="floorNo">Select a Room</label> 
		<select name="floorNo"
        id="floorno" onchange=
        'showAvailability(this.value,document.getElementById("datepicker").value)'>
		<option value=""> </option>
          <option value="Floor-1 Board Room">
            Floor-1 Board Room
          </option>

          <option value="Floor-4 Conf room">
            Floor-4 Conf room
          </option>

          <option value="Floor-5 Meeting Room-1">
            Floor-5 Meeting Room-1
          </option>

          <option value="Floor-5 Meeting Room-1">
            Floor-5 Meeting Room-1
          </option>
        </select>
        <label for="floorNo" id="roomerrorspace" class="errorText"></label>
		</div>
		<div>
		<br/><label for="dateToBook">Select a date</label>
        <input type="text" name="dateToBook" id="datepicker" onchange=
        'showAvailability(document.getElementById("floorno").value,this.value)' />
		<label id="dateErrorSpace" class="errorText"></label>
		</div>
        
        <!--<div id="bookingSpace"></div>-->

        <div id="availabilitySpace" align="center"></div>
		<div>
        <label for="fromTime">Timings From</label> <input type="text" id="fromtimepicker" name="fromTime"
        onchange="checkAvailabilityTime()" />

        <label id="fromTimeErrorSpace" class="errorText"></label>
		</div>
		<div>
		<label for="toTime">To</label>
        <input type="text" id="totimepicker" name="toTime" onchange=
        "checkAvailabilityTime()" />
        <label id="toTimeErrorSpace" class="errorText"></label>
		</div>
		<div>
		<label for="project">Project Name</label>
        <input type="text" id="project" name="project" onchange="document.getElementById('projectErrorSpace').innerHTML=''"/>

        <label id="projectErrorSpace" class="errorText"></label>
		</div>
		<div>
		<center>
		<label id="timeAvaliabilitySpace" class="errorText"></label>
		</center>
		</div>
		<div>
		<center>
		<input type="submit" value=
        "BookIt" class="fsSubmitButton" />
		</center>
        </div>
		
    </form>
	
</body>
</html>
