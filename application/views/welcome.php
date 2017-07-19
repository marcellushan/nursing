<div class="main container">
    <div class="row">
		<div class="col-sm-8  right-border">
            <h1 class="wrapper">New Applicants</h1>
                <h1 class="mytitle">Application for Admission<br>
                    RN/BSN Program
                    <br>Fall 2017
                </h1>
            <h3>All applicants must meet the following requirements to be considered for admission to the program:</h3>
            <h4>
                <ul>
                    <li>A current valid RN license to practice nursing in the U.S. with no current disciplinary actions.
                        If practicing as an RN for four years or more, must submit a completed Verification of Employment form.</li>
                    <li> Graduated from an accredited nursing program: National League for Nursing Accrediting Commission (NLNAC),
                        Accreditation Commission for Education in Nursing (ACEN), or Commission on Collegiate Nursing Education (CCNE).</li>
                    <li>A minimum cumulative GPA of 2.5 on a 4.0 scale.</li>
                    <li>All Sciences courses, English 1102, and Math 2200 must be complete with a grade of "C" or better.</li>
                </ul>
            </h4>

                <form action="<?=base_url("home/display/create_applicant")?>" method="post" id="welcome">

            <div class="mytitle"><div class="col-sm-4 col-sm-offset-4"><button type="submit"class="btn btn-lg btn-success">Continue to Application</button></div></div>
                </form>
        </div><!--col-sm-6 -->
        <div class="col-sm-4">
                <h1 class="wrapper">Returning Applicants</h1>
                <h3>Previous applicants login here to complete application or address issues</h3>
            <br>
            <h4>
                <form action='<?=base_url("home/checkLogin")?>' method="post" id="login">
                    <fieldset>
                        <div class="row">
                            <label class="col-md-5 col-sm-12">Email Address </label><input type="text"  class="col-md-5  col-sm-12" name="email">
                        </div><!--row -->
                        <div class="row">
                            <label class="col-md-5 col-sm-12">Password</label>
                            <input type="password"  class="col-md-5  col-sm-12" name="password" id="password" >
                        </div><!--row -->
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-4"><button type="submit"class="btn btn-sm btn-success">Submit</button></div>

                        </div>
                    </fieldset>
                </form>
            </h4>
        </div><!--col-sm-6 -->
     </div><!--row -->
    </div><!-- container -->


