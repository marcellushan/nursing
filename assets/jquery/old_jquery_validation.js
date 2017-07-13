     
     // jQuery(function(){
    	//  $("#btnSubmit").click(function(){
    	//  	if($('input[name=applied]:checked').length<=0)
    	//  	{
    	//  	 alert("You must apply to Georgia Highlands College before you can apply for the Dental Program.");
    	//  	 return false;
    	//  	}
    	//  });
    	//  });
     //
     // $(document).ready(function() {
     //     $('input[type=radio][name=GHC]').change(function() {
     //         if (this.value == 'yes') {
     //             alert("Allot Thai Gayo Bhai");
     //         }
     //         else if (this.value == 'no') {
     //             alert("Transfer Thai Gayo");
     //         }
     //     });
     // });

     // jQuery(function(){
    	//  $("#cprBtn").click(function(){
    	//  	if(! $('#cpr').val())
    	//  	{
    	//  	 alert("Please attach a copy your current CPR Certificate");
    	//  	 return false;
    	//  	}
    	//  });
    	//  });
     //
     // jQuery(function(){
     //     $("#identificationBtn").click(function(){
     //         if(! $('#identification').val())
     //         {
     //             alert("Please attach a copy your valid identification");
     //             return false;
     //         }
     //     });
     // });

     $(document).ready(function(){
         $( "#welcome" ).validate({
             rules: {
                 active: {
                     required: true
                 },
                 hours: {
                     required: true
                 },
                 grades: {
                     required: true
                 },
                 gpa: {
                     required: true
                 },
                 gpa_f: {
                     required: true
                 }
             },
             messages: {
                 active: "You must be an active GHC student to apply",
                 hours: "You must have completed 50 credit hours to apply",
                 grades: "You must have a C or better in all these classes",
                 gpa: "You must have a 2.5 GPA",
                 gpa_f: "You must have a 2.8 GPA"
             }
         });
     });

     $(document).ready(function(){
             $( "#create" ).validate({
                 rules: {
                     email: {
                         required: true,
                         email: true
                     },
                     password: {
                         required: true,
                         minlength: 8
                     },
                     passconf: {
                         equalTo: "#password"
                     }
                 },
                 messages: {
                     email:"Enter your email address",
                     password: {
                         required: "Select a password",
                         minlength: "Password must be at least 8 characters"
                     }
                 }
         });
     });

     $(document).ready(function(){
         $( "#GHC" ).validate({
             rules: {
                 GHC_ID: {
                     required: true,
                     range: [900000000 , 900999999]
                 }
             },
             messages: {
                 GHC_ID: "Please enter valid GHC ID in the form 900XXXXXX"
             }
         });
     });

     $(document).ready(function(){
         $( "#login" ).validate({
             rules: {
                 email: {
                     required: true,
                     email: true
                 },
                 password: {
                     required: true,
                     minlength: 8
                 }
                 // passconf: {
                 //     equalTo: "#password"
                 // }
             },
             messages: {
                 email:"Enter your email address",
                 password: {
                     required: "Select a password",
                     minlength: "Password must be at least 8 characters"
                 }
             }
         });
     });



     $(document).ready(function(){
         $( "#personal" ).validate({
             // ignore: ".ignore",
             rules: {
                 first_name: {
                     required: true
                 },
                 last_name: {
                     required: true
                 },
                 birth_date: {
                     required: true,
                     date: true
                 },
                 street: {
                     required: true
                 },
                 city: {
                     required: true
                 },
                 zip: {
                     required: true,
                     range: [10000, 99999]
                 },
                 preferred_phone: {
                     required: true,
                     digits: true,
                     minlength: 10,
                     maxlength: 10
                 }

             },
             messages: {
                 first_name: "Please specify your first name",
                 last_name: "Please specify your last name",
                 birth_date: {
                     required: "Please specify your birth date",
                     date: "Please enter your birth date in format MM/DD/YYYY"
                 },
                 street: "Please enter your street address",
                 city: "Please enter your city",
                 zip: {
                     required: "Please enter your zip code",
                     range: "Please enter a valid zip code"
                 },
                 preferred_phone: {
                     required: "Please enter your preferred phone"
                 }

             }
         });
     });



     $(document).ready(function(){
         $( "#emergency" ).validate({
             // ignore: ".ignore",
             rules: {
                 e_first_name: {
                     required: true
                 },
                 e_last_name: {
                     required: true
                 },
                 e_street: {
                     required: true
                 },
                 e_city: {
                     required: true
                 },
                 e_zip: {
                     required: true,
                     range: [10000, 99999]
                 },
                 e_preferred_phone: {
                     required: true,
                     digits: true,
                     minlength: 10,
                     maxlength: 10
                 }
             },
             messages: {
                 e_first_name: "Please specify your first name",
                 e_last_name: "Please specify your last name",
                 e_street: "Please enter your street address",
                 e_city: "Please enter your city",
                 e_zip: {
                     required: "Please enter your zip code",
                     range: "Please enter a valid zip code"
                 },

             }
         });
     });


     $(document).ready(function(){
         $( "#transcript" ).validate({
             rules: {
                 school: {
                     required: true
                 },
                 start_date: {
                     required: true
                 },
                 end_date: {
                     required: true
                 },
                 fileToUpload: {
                     required: true,
                     extension: "jpg|jpeg|pdf"
                 }
             },
             messages: {
                 school: "Please enter the name of the school",
                 fileToUpload: {
                     required:  "Please upload a copy of your transcript",
                     extension: "Please select a jpg, jpeg or pdf file"
                 }
             }
         });
     });


     $(document).ready(function(){
         $( "#program" ).validate({
             rules: {
                 student_type: {
                     required: true
                 },
                 hear: {
                     required: true
                 }
             },
             messages: {
                 student_type: "Please select the program you're interested in",
                 hear: "Please tell us how you heard about our program"
             }
         });
     });

     $(document).ready(function(){
         $( "#grades" ).validate({
             rules: {
                 GPA: {
                     required: true,
                     range: [0,4]
                 },
                 ACCT2101: {
                     required: true
                 },
                 ACCT2102: {
                     required: true
                 },
                 BUSA2106: {
                     required: true
                 },
                 BUSA2205: {
                     required: true
                 },
                 ECON2105: {
                     required: true
                 },
                 ECON2106: {
                     required: true
                 },
                 MATH2200: {
                     required: true
                 },
                 ENGL1101: {
                     required: true
                 }
             },
             messages: {
                 GPA: {
                     required: "Please enter your current GPA"
                 },
                 ACCT2101: {
                     required: "Please select a grade"
                 },
                 ACCT2102: {
                     required: "Please select a grade"
                 },
                 BUSA2106: {
                     required: "Please select a grade"
                 },
                 BUSA2205: {
                     required: "Please select a grade"
                 },
                 ECON2105: {
                     required: "Please select a grade"
                 },
                 ECON2106: {
                     required: "Please select a grade"
                 },
                 MATH2200: {
                     required: "Please select a grade"
                 },
                 ENGL1101: {
                     required: "Please select a grade"
                 }

             }
         });
     });

     $(document).ready(function(){
         $( "#interest" ).validate({
             rules: {
                 fileToUpload: {
                     required: true,
                     extension: "doc|docx|pdf"
                 }
             },
             messages: {
                 GPA: {
                     required: "Please enter your current GPA"
                 },
                 fileToUpload: {
                     required:  "Please upload a copy of your letter of interest",
                     extension: "Please select a pdf, doc or docx file"
                 }
             }
         });
     });


