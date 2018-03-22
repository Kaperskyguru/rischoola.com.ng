<?php
require '../init.php';
$userController->cookie_login();
if($userController->is_authenticated()){
  require 'member_header.php';
}else {
  require 'header.php';
}
?>
?>
<section id="view-scholarship">
	<div class="container pad-up-50">
		<h2>Study In Greece: Leventis Foundation Scholarships For Nigerians - 2018</h2>
		<div class="col-sm-8 pad-bottom-20">
			<p>
				The ALBA Graduate Business School at the American College of Greece and The Leventis Foundation Nigeria is providing Scholarship opportunities to Interested applicants who are willing to pursue a Masters In Business Administration program in Greece.
				This Scholarship program covers full tuition, accommodation and living expenses for two qualified students from Nigeria to attend The ALBA MBA program in Athens, Greece for the academic year 2018-2019.
			</p>
			<div>
				<img src="../res/imgs/1.jpg" class="img-responsive img-thumbnail">
			</div>
			<p>
				Application Deadline: 31st March 2018 <br>

				Eligible Countries: Nigeria <br>

				To be taken at (Country): Greece <br>

				Type: MBA <br>

				Eligibility: <br>


				    Applicants must have Nigerian Citizenship <br>

				    Applicants must hold 1st or Upper 2nd Class Bachelors degree completed (GPA 3.8 or higher) <br>

				    Applicants must have an Excellent command of English language <br>

				    Applicants must have At least three years of work experience <br>

				    Applicants must be Ambitious individuals <br>

				Application Process: Interested applicants are advised to apply online at https://applications.alba.edu.gr/ and then send their completed application hard copy package (include all official supplementary documents) <br>

				by March 31st,2018 to: <br>

				(Leventis Foundation Nigeria (No. 2 Leventis Close, Central Business District, FCT, P.O. Box 20351, Abuja) <br>



				Contact person 1: <br>

				Ms Anna Vithoulka, <br>

				International Relations Manager, ALBA <br>

				avithoulka@alba.acg.edu <br>

				Website: http://www.alba.acg.edu/degree-programs/mba/the-alba-mba/ <br>



				Contact Person 2: <br>

				Mrs Janet Owoicho, <br>

				Secretary, Leventis Foundation Nigeria <br>

				leventisfooundation@gmail.com <br>

				0708 552 4233 <br>

				Website: leventisfoundation.org.ng <br>
			</p>

		</div>
		<div class="col-sm-4 pad-bottom-20">
			<div class="pad-bottom-20">
				<img src="../res/imgs/8722.gif" class="img-responsive">
			</div>
			<div class="pad-bottom-20">
				<form>
				  <div class="form-group">
				    <label >Subject : </label>
				    <input type="text" class="form-control" placeholder="Enter Subject of Study">
				  </div>
				  <div class="form-group">
				    <label >Destination of Study :</label>
				    <input type="text" class="form-control"  placeholder="Enter Destination">
				  </div>
				  <div class="form-group">
				  	<label >Study Mode :</label>
				    <select class="form-control">
				    	<option>full</option>
				    	<option>online</option>
				    </select>
				  </div>
				  <div class="form-group">
				  	<label >Qualification :</label>
				    <select class="form-control">
				    	<option>Postgraduate</option>
				    	<option>Undergraduate</option>
				    </select>
				  </div>
				  <button  class="btn btn-lg btn-block btn-success">Find Course</button>
				</form>
			</div>
			<div class="pad-bottom-20">
				<img src="../res/imgs/p.gif" class="img-responsive">
			</div>
			<div class="pad-bottom-20">
				<img src="../res/imgs/m.png" class="img-responsive">
			</div>
			<div class="pad-bottom-20">
				<img src="../res/imgs/s.png" class="img-responsive">
			</div>
		</div>
	</div>

</section>
<?php
	include 'footer.php';
?>
