 <div class="main container">
		 <? (@$edit ? $destination="edit" : $destination = "demo") ?>
	 <?php if(@$applicant->identification) :?>
		 <h2>The following letter of interest has been submitted:</h2>
			 <h3><a href="<?=$applicant->interest ?>" >Image</a></h3>

	 <?php endif ?>
	<h1 class="wrapper">
	Please provide a letter of interest in pdf, doc or docx format
	</h1>
<br><br><br>
<form action='<?=base_url("applicant/put_image/interest/" . $destination)?>' method="post" enctype="multipart/form-data"  id="interest" >

    <div class="row">
        <div class="col-md-3 col-md-offset-5">
            <input type="file" name="fileToUpload">
        </div>
    </div>

	<input type="submit" class="btn btn-primary btn-lg center-block" id="driverBtn" value="Submit" />

</form>
</div>
</body>
</html>
