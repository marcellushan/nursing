 <div class="main container">
	<h1 class= "mytitle">BSDH PROGRAM QUESTIONS</h1>
     <? (@$edit ? $destination="edit" : $destination = "demo") ?>
	<form action='<?=base_url("applicant/put/" . $destination)?>' id="program" method="post">
		<div class="row">
				<h3 class="col-md-7">How do you plan to attend the program?</h3>
			<div class="col-md-5">
				<h3><input type="radio" name="student_type" value="2" required <? echo (@$applicant->student_type==2 ? "checked" : "") ?> >Fulltime (3 semesters)</h3>
				<h3><input type="radio" name="student_type" value="1" <? echo (@$applicant->student_type==1 ? 'checked' : '') ?>>Part-time (4 semesters)</h3>
			</div><!-- col-md-5 -->
		</div><!-- row -->
		<div class="row">
			<h3 class="col-md-7">Check the semester you would like to start</h3>
			<div class="col-md-5">
				<h3><input type="radio" name="semester" value="3" required <? echo (@$applicant->semester==2 ? "checked" : "") ?> >Fall</h3>
				<h3><input type="radio" name="semester" value="2" required <? echo (@$applicant->semester==2 ? "checked" : "") ?> >Spring</h3>
				<h3><input type="radio" name="semester" value="1" <? echo (@$applicant->semester==1 ? 'checked' : '') ?>>Summer</h3>
			</div><!-- col-md-5 -->
		</div><!-- row -->
		<div class="row">
				<h3 class="col-md-5">How did you hear about our program?</h3>
				<div class="col-md-7">
					<textarea rows="5" class="form-control" cols="" name="hear"><?=@$applicant->hear ?></textarea>
				</div>
		</div><!-- row -->
		
			<div class="wrapper">			
        <button type="submit" class="btn-lg btn-primary">Next</button>
        	    </div>
	</form>


</div><!-- container -->
              