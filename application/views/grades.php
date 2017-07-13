 <div class="main container">
	 <? (@$edit ? $destination="edit" : $destination = "have_interest") ?>
	 <form action='<?=base_url("applicant/put/" . $destination)?>' id="grades" method="post" enctype="multipart/form-data">
	 <h1 class= "mytitle">What is your current GPA?</h1>
	 <h2 class= "mytitle">GPA <input type="text" size='4' name="GPA" value="<?=@$applicant->GPA ?>"></h2>
	<h1 class= "mytitle">Required Course Grades</h1>
	 <h2 class= "mytitle">Select grades earned in the below courses</h2></br>
		 <h4>If you are currently enrolled in any of the below classes, please enter an estimated grade in the box(s) below. We will update the correct grade at the end of the semester.</h4>
		 <div class="row">
			<h3><div  class="col-md-3">ACCT 2101 <select name="ACCT2101" required>
						<option value="">Grade</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="Below C">Below C</option>
						</select></div>
				<div  class="col-md-3">ACCT 2102 <select name="ACCT2102" required>
							<option value="">Grade</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="Below C">Below C</option>
						</select></div>
				<div  class="col-md-3">BUSA 2106 <select name="BUSA2106" required>
							<option value="">Grade</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="Below C">Below C</option>
						</select></div>
				<div  class="col-md-3">BUSA 2205 <select name="BUSA2205" required>
							<option value="">Grade</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="Below C">Below C</option>
						</select></div>
			</h3>
		</div><!--row-->
		<div class="row">
			<h3><div  class="col-md-3">ECON 2105 <select name="ECON2105" required>
							<option value="">Grade</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="Below C">Below C</option>
						</select></div>
				<div  class="col-md-3">ECON 2106 <select name="ECON2106" required>
							<option value="">Grade</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="Below C">Below C</option>
						</select></div>
				<div  class="col-md-3">MATH 2200 <select name="MATH2200" required>
							<option value="">Grade</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="Below C">Below C</option>
						</select></div>
				<div  class="col-md-3">ENGL 1101 <select name="ENGL1101" required>
							<option value="">Grade</option>
							<option value="A">A</option>
							<option value="B">B</option>
							<option value="C">C</option>
							<option value="Below C">Below C</option>
						</select></div>
			</h3>
		</div><!--row-->
		 <br><br><br>


			<div class="wrapper">			
        <button type="submit" class="btn-lg btn-primary">Next</button>
        	    </div>
	</form>
<p></p>

</div><!-- container -->
              