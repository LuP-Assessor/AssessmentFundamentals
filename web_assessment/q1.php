
 
<script language="JavaScript">
	function CheckAnswer(){
		var oldstr = document.getElementById("Answer").value;
		var newstr = oldstr.replace("'","");
		document.getElementById("Answer").value = newstr;
	}
	
	function FinalSubmit() {
		var ConfirmMessage = confirm("Do you really want to submit answers and quit assessment?");
		if (ConfirmMessage == true) {
			alert("Ja");
		} else {
			alert("Dann eben nicht!");
		}	
	}
	
	function EditAnswer(Question,Answer,QType,AnswerID,QuestionID,AnswerA,AnswerB,AnswerC,AnswerD,AnswerE) {
		document.getElementById("QuestionBox").style.visibility = "visible";
		if(QType=="Free") {
			document.getElementById("QuestionBoxQDiv").innerHTML = Question;
			document.getElementById("QuestionBoxADivT").style.visibility = "visible";
			//document.getElementById("QuestionBoxADivText").style.visibility = "visible";
			document.getElementById("QuestionBoxADivM").style.visibility = "hidden";
			document.getElementById("QuestionBoxADivText").value = Answer;
		} else {
			//document.getElementById("QuestionBoxADivText").value = Answer;
			document.getElementById("QuestionBoxADivT").style.visibility = "hidden";
			//document.getElementById("QuestionBoxADivText").style.visibility = "hidden";
			document.getElementById("QuestionBoxADivM").style.visibility = "visible";
			var DynHTML = "";
			if (AnswerA != "") {
				if (AnswerA==Answer) {
					alert("4.1");
					DynHTML = DynHTML + '<input type="radio" name="Answer" value="' + AnswerA + '" selected>' + AnswerA + '<br>';
					alert("4.11");
				} else {
					DynHTML = DynHTML+'<input type="radio" name="Answer" value="'+AnswerA+'">'+AnswerA+'<br>';
					alert("4.2");
				}
			}
			alert("Before");
			document.getElementById("QuestionBoxADivM").innerHTML = DynHTML;
			alert("After");
		}
	}
	
	function CancelEditAnswer() {
		document.getElementById("QuestionBox").style.visibility = "hidden";
		//document.getElementById("QuestionBoxADivText").style.visibility = "hidden";
		document.getElementById("QuestionBoxADivT").style.visibility = "hidden";
		document.getElementById("QuestionBoxADivM").style.visibility = "hidden";
	}
</script>

<link rel="stylesheet" type="text/css" href="../web_css/generalFrame.css" media="screen" /><div id="Div_Headbanner" class="Div_Headbanner" style="border-width:3px;border-style:groove"><div id="Div_Headbanner_CapLogo"        class="Div_CorpLogos" style="right:35px;width:280px"><img class="Img_CorpLogos" src="../web_pics/logo_capgemini.png"></img></div><div id="Div_Headbanner_SogLogo"        class="Div_CorpLogos" style="right:450px;width:280px"><img class="Img_CorpLogos" src="../web_pics/logo_sogeti.png" ></img></div><font color="Blue" size="5pt">Automated<br>LuP-Training<br>System</font><div id="Div_Headbanner_Menu_Examples"  class="Div_CorpLogos" style="left:230px; bottom:10px; position:absolute;"><a href="../web_public/examples.php">Examples</a></div><div id="Div_Headbanner_Menu_Assessment"  class="Div_CorpLogos" style="left:330px; bottom:10px; position:absolute;"><a href="../web_assessment/index.php">Assessment</a></div></div><div id="" class="Div_DataArea Div_deactive" style="top:120px;"><div id="QuestionBox" style="visibility:hidden;position:absolute;top:5%;right:5%;left:5%;height:500px;background-color:#FFF9AF;border:3px solid;"><div id="QuestionBoxQHeadline" style="position:absolute;top:20px;left:20px;right:20px;height:40px;border:0px solid;text-align:center;font-size:25px;padding-top:5px;">Question</div><div id="QuestionBoxQDiv" style="position:absolute;top:66px;left:20px;right:20px;height:140px;border:1px solid;">text inside</div><div id="QuestionBoxAHeadline" style="position:absolute;top:220px;left:20px;right:20px;height:40px;border:0px solid;text-align:center;font-size:25px;padding-top:5px;">Answer</div><div id="QuestionBoxADiv" style="position:absolute;top:266px;left:20px;right:20px;height:145px;border:1px solid;"><div id="QuestionBoxADivT" style="border:3px solid;position:absolute;left:0px;right:0px;height:100%"><textarea id="QuestionBoxADivText" name="Answer" style="height:100%;width:100%;-moz-box-sizing: border-box;" ></textarea></div><div id="QuestionBoxADivM" style="visibility:hidden;position:absolute;">Multiple Choice</div></div><div id="QuestionBoxProgressDiv" style="position:absolute;top:423px;left:20px;right:20px;height:30px;border:1px solid;">Progress Bar</div><div id="QuestionBoxSubmitBtn" style="position:absolute;top:458px;left:20px;right:75%;height:22px;border:1px solid;text-align:center;font-size:20px;background-color:#c6e2ff;">Submit Answer</div><div id="QuestionBoxCancelBtn" style="position:absolute;top:458px;left:26%;right:45%;height:22px;border:1px solid;text-align:center;font-size:20px;background-color:#c6e2ff;" onClick="CancelEditAnswer()">Cancel</div><div id="QuestionBoxTestTimer" style="position:absolute;top:458px;left:60%;right:22%;height:22px;border:1px solid;font-size:10px;">Test Timer</div><div id="QuestionBoxQuestionTimer" style="position:absolute;top:458px;left:80%;right:20px;height:22px;border:1px solid;font-size:10px;">Question Timer</div></div>No questions left. Please review your Results:<br><br><b>Question: </b>Your customer asked for a delay between VUser iteration. How/where do you implement this?<br><b>Answer: </b>bla<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Your customer asked for a delay between VUser iteration. How/where do you implement this?','bla','Free','2','8','','','','','')">Edit answer</div><br><b>Question: </b>Your customer asked you for enabling full logging option inside the next loadtest to have an easy way to analyze occurring errors. What will you answer him and why?<br><b>Answer: </b>HUPE<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Your customer asked you for enabling full logging option inside the next loadtest to have an easy way to analyze occurring errors. What will you answer him and why?','HUPE','Free','3','7','','','','','')">Edit answer</div><br><b>Question: </b>The infrastructure of application under test consists of two webservers that are located behind an IP based load balancing system. Are you able to load test this application and what do you need to generate load on both of the application servers?<br><b>Answer: </b>Quark<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('The infrastructure of application under test consists of two webservers that are located behind an IP based load balancing system. Are you able to load test this application and what do you need to generate load on both of the application servers?','Quark','Free','4','12','','','','','')">Edit answer</div><br><b>Question: </b>Please describe the difference between parallel and concurrent user.<br><b>Answer: </b>Humbaaaa<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Please describe the difference between parallel and concurrent user.','Humbaaaa','Free','5','11','','','','','')">Edit answer</div><br><b>Question: </b>What function do you use inside VuGen to send messages to the output log?<br><b>Answer: </b>Tüten<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('What function do you use inside VuGen to send messages to the output log?','Tüten','Free','6','6','','','','','')">Edit answer</div><br><b>Question: </b>You are assigned to write the first VuGen script for a complete new load test. What information do you need to start your business?<br><b>Answer: </b>Lattesat<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('You are assigned to write the first VuGen script for a complete new load test. What information do you need to start your business?','Lattesat','Free','7','10','','','','','')">Edit answer</div><br><b>Question: </b>You already started a loadtest with a defined scenario of 500 VUser when the customer contacts you and asks for a higher load. Under which circumstances are you able to fulfill this request and how/where will you do this?<br><b>Answer: </b>Sogeti ist doof!<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('You already started a loadtest with a defined scenario of 500 VUser when the customer contacts you and asks for a higher load. Under which circumstances are you able to fulfill this request and how/where will you do this?','Sogeti ist doof!','Free','8','9','','','','','')">Edit answer</div><br><b>Question: </b>Your customer expect that his application can handle up to 500 concurrent users. How many VUser will you suggest for a duration test and why?<br><b>Answer: </b>LuP<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Your customer expect that his application can handle up to 500 concurrent users. How many VUser will you suggest for a duration test and why?','LuP','Free','9','4','','','','','')">Edit answer</div><br><b>Question: </b>Your customer expect that his application can handle up to 500 concurrent users. How many VUser will you suggest for a stress test and why?<br><b>Answer: </b>keine Ahnung<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Your customer expect that his application can handle up to 500 concurrent users. How many VUser will you suggest for a stress test and why?','keine Ahnung','Free','10','3','','','','','')">Edit answer</div><br><b>Question: </b>Describe the difference between POST and GET method of a HTML request.<br><b>Answer: </b>Leck mich doch<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Describe the difference between POST and GET method of a HTML request.','Leck mich doch','Free','11','2','','','','','')">Edit answer</div><br><b>Question: </b>Provided that application under test use default HTTP response codes. What response will you expect by requesting a file / resource that physically not exist on the web server?<br><b>Answer: </b>File Not Found<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Provided that application under test use default HTTP response codes. What response will you expect by requesting a file / resource that physically not exist on the web server?','File Not Found','Multiple','12','14','File Not Found','HTTP 200','HTTP 400','HTTP 404','HTTP 500')">Edit answer</div><br><br><a href="" onClick="FinalSubmit()">Final submit and quit assessment</a></div><div id="Div_Footer" class="Div_Footer">(c) Marcel Jodorf - ALP Training System V.01</div>







<script language="JavaScript">
	function CheckAnswer(){
		var oldstr = document.getElementById("Answer").value;
		var newstr = oldstr.replace("'","");
		document.getElementById("Answer").value = newstr;
	}
	
	function FinalSubmit() {
		var ConfirmMessage = confirm("Do you really want to submit answers and quit assessment?");
		if (ConfirmMessage == true) {
			alert("Ja");
		} else {
			alert("Dann eben nicht!");
		}	
	}
	
	function EditAnswer(Question,Answer,QType,AnswerID,QuestionID,AnswerA,AnswerB,AnswerC,AnswerD,AnswerE) {
		document.getElementById("QuestionBox").style.visibility = "visible";
		if(QType=="Free") {
			document.getElementById("QuestionBoxQDiv").innerHTML = Question;
			document.getElementById("QuestionBoxADivT").style.visibility = "visible";
			//document.getElementById("QuestionBoxADivText").style.visibility = "visible";
			document.getElementById("QuestionBoxADivM").style.visibility = "hidden";
			document.getElementById("QuestionBoxADivText").value = Answer;
		} else {
			//document.getElementById("QuestionBoxADivText").value = Answer;
			document.getElementById("QuestionBoxADivT").style.visibility = "hidden";
			//document.getElementById("QuestionBoxADivText").style.visibility = "hidden";
			document.getElementById("QuestionBoxADivM").style.visibility = "visible";
			var DynHTML = "";
			if (AnswerA != "") {
				if (AnswerA==Answer) {
					alert("4.1");
					DynHTML = DynHTML + '<input type="radio" name="Answer" value="' + AnswerA + '" selected>' + AnswerA + '<br>';
					alert("4.11");
				} else {
					DynHTML = DynHTML+'<input type="radio" name="Answer" value="'+AnswerA+'">'+AnswerA+'<br>';
					alert("4.2");
				}
			}
			alert("Before");
			document.getElementById("QuestionBoxADivM").innerHTML = DynHTML;
			alert("After");
		}
	}
	
	function CancelEditAnswer() {
		document.getElementById("QuestionBox").style.visibility = "hidden";
		//document.getElementById("QuestionBoxADivText").style.visibility = "hidden";
		document.getElementById("QuestionBoxADivT").style.visibility = "hidden";
		document.getElementById("QuestionBoxADivM").style.visibility = "hidden";
	}
</script>







<div id="QuestionBox" style="visibility:hidden;position:absolute;top:5%;right:5%;left:5%;height:500px;background-color:#FFF9AF;border:3px solid;">
<div id="QuestionBoxQHeadline" style="position:absolute;top:20px;left:20px;right:20px;height:40px;border:0px solid;text-align:center;font-size:25px;padding-top:5px;">Question</div>
<div id="QuestionBoxQDiv" style="position:absolute;top:66px;left:20px;right:20px;height:140px;border:1px solid;">text inside</div>
<div id="QuestionBoxAHeadline" style="position:absolute;top:220px;left:20px;right:20px;height:40px;border:0px solid;text-align:center;font-size:25px;padding-top:5px;">Answer</div>
<div id="QuestionBoxADiv" style="position:absolute;top:266px;left:20px;right:20px;height:145px;border:1px solid;">
<div id="QuestionBoxADivT" style="border:3px solid;position:absolute;left:0px;right:0px;height:100%">
<textarea id="QuestionBoxADivText" name="Answer" style="height:100%;width:100%;-moz-box-sizing: border-box;" ></textarea>
</div>
<div id="QuestionBoxADivM" style="visibility:hidden;position:absolute;">Multiple Choice</div>
</div>
<div id="QuestionBoxProgressDiv" style="position:absolute;top:423px;left:20px;right:20px;height:30px;border:1px solid;">Progress Bar</div>
<div id="QuestionBoxSubmitBtn" style="position:absolute;top:458px;left:20px;right:75%;height:22px;border:1px solid;text-align:center;font-size:20px;background-color:#c6e2ff;">Submit Answer</div>
<div id="QuestionBoxCancelBtn" style="position:absolute;top:458px;left:26%;right:45%;height:22px;border:1px solid;text-align:center;font-size:20px;background-color:#c6e2ff;" onClick="CancelEditAnswer()">Cancel</div>
<div id="QuestionBoxTestTimer" style="position:absolute;top:458px;left:60%;right:22%;height:22px;border:1px solid;font-size:10px;">Test Timer</div>
<div id="QuestionBoxQuestionTimer" style="position:absolute;top:458px;left:80%;right:20px;height:22px;border:1px solid;font-size:10px;">Question Timer</div>
</div>

No questions left. Please review your Results:<br><br>
<b>Question: </b>Your customer asked for a delay between VUser iteration. How/where do you implement this?<br>
<b>Answer: </b>bla<br>
<div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Your customer asked for a delay between VUser iteration. How/where do you implement this?','bla','Free','2','8','','','','','')">Edit answer</div><br>
<b>Question: </b>Your customer asked you for enabling full logging option inside the next loadtest to have an easy way to analyze occurring errors. What will you answer him and why?<br>
<b>Answer: </b>HUPE<br>
<div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Your customer asked you for enabling full logging option inside the next loadtest to have an easy way to analyze occurring errors. What will you answer him and why?','HUPE','Free','3','7','','','','','')">Edit answer</div><br><b>Question: </b>The infrastructure of application under test consists of two webservers that are located behind an IP based load balancing system. Are you able to load test this application and what do you need to generate load on both of the application servers?<br><b>Answer: </b>Quark<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('The infrastructure of application under test consists of two webservers that are located behind an IP based load balancing system. Are you able to load test this application and what do you need to generate load on both of the application servers?','Quark','Free','4','12','','','','','')">Edit answer</div><br><b>Question: </b>Please describe the difference between parallel and concurrent user.<br><b>Answer: </b>Humbaaaa<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Please describe the difference between parallel and concurrent user.','Humbaaaa','Free','5','11','','','','','')">Edit answer</div><br><b>Question: </b>What function do you use inside VuGen to send messages to the output log?<br><b>Answer: </b>Tüten<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('What function do you use inside VuGen to send messages to the output log?','Tüten','Free','6','6','','','','','')">Edit answer</div><br><b>Question: </b>You are assigned to write the first VuGen script for a complete new load test. What information do you need to start your business?<br><b>Answer: </b>Lattesat<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('You are assigned to write the first VuGen script for a complete new load test. What information do you need to start your business?','Lattesat','Free','7','10','','','','','')">Edit answer</div><br><b>Question: </b>You already started a loadtest with a defined scenario of 500 VUser when the customer contacts you and asks for a higher load. Under which circumstances are you able to fulfill this request and how/where will you do this?<br><b>Answer: </b>Sogeti ist doof!<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('You already started a loadtest with a defined scenario of 500 VUser when the customer contacts you and asks for a higher load. Under which circumstances are you able to fulfill this request and how/where will you do this?','Sogeti ist doof!','Free','8','9','','','','','')">Edit answer</div><br><b>Question: </b>Your customer expect that his application can handle up to 500 concurrent users. How many VUser will you suggest for a duration test and why?<br><b>Answer: </b>LuP<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Your customer expect that his application can handle up to 500 concurrent users. How many VUser will you suggest for a duration test and why?','LuP','Free','9','4','','','','','')">Edit answer</div><br><b>Question: </b>Your customer expect that his application can handle up to 500 concurrent users. How many VUser will you suggest for a stress test and why?<br><b>Answer: </b>keine Ahnung<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Your customer expect that his application can handle up to 500 concurrent users. How many VUser will you suggest for a stress test and why?','keine Ahnung','Free','10','3','','','','','')">Edit answer</div><br><b>Question: </b>Describe the difference between POST and GET method of a HTML request.<br><b>Answer: </b>Leck mich doch<br><div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Describe the difference between POST and GET method of a HTML request.','Leck mich doch','Free','11','2','','','','','')">Edit answer</div><br>

<b>Question: </b>Provided that application under test use default HTTP response codes. What response will you expect by requesting a file / resource that physically not exist on the web server?<br>
<b>Answer: </b>File Not Found<br>
<div style='text-align:center;border:1px solid;width:170px;background-color:#c6e2ff;' onClick="EditAnswer('Provided that application under test use default HTTP response codes. What response will you expect by requesting a file / resource that physically not exist on the web server?','File Not Found','Multiple','12','14','File Not Found','HTTP 200','HTTP 400','HTTP 404','HTTP 500')">Edit answer</div><br><br>

<a href="" onClick="FinalSubmit()">Final submit and quit assessment</a>