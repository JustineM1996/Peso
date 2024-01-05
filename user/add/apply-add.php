<?php

include '../../database/database.php';

if(ISSET($_POST['submit'])) {

        // JOB AND COMPANY ID
        $company_id = $_POST['company_id']; 
        $job_id = $_POST['job_id']; 


        // PERSONAL 
        $Account_Id = $_POST['Account_Id'];
        $First_Name = $_POST['First_Name']; 
        $Middel_Name = $_POST['Middel_Name'];    
        $Last_Name = $_POST['Last_Name'];
        $Status = $_POST['Status'];

        $Month = $_POST['Month'];
        $Day = $_POST['Day'];
        $Year = $_POST['Year']; 
        $Age = $_POST['Age'];
        $Gender = $_POST['Gender'];
        $Birth_Place = $_POST['Birth_Place'];

        $Email = $_POST['Email'];
        $Contact_Number = $_POST['Contact_Number'];

        $Region = $_POST['Region'];
        $Province = $_POST['Province'];
        $City = $_POST['City'];
        $Barangay = $_POST['Barangay'];  
        $Street = $_POST['Street'];    


        // EDUCATION
        $Education = $_POST['Education'];   
        $Field_Of_Study = $_POST['Field_Of_Study'];    
        $School_Name = $_POST['School_Name']; 
        $School_Address = $_POST['School_Address']; 

        $School_From_Date_Month = $_POST['School_From_Date_Month'];
        $School_From_Date_Year = $_POST['School_From_Date_Year']; 
        $School_From_To_Month = $_POST['School_From_To_Month']; 
        $School_From_To_Year = $_POST['School_From_To_Year']; 


        // WORK
        $Job_Title = $_POST['Job_Title'];   
        $Company = $_POST['Company'];    
        $Company_Address = $_POST['Company_Address']; 

        $Work_From_Date_Month = $_POST['Work_From_Date_Month'];
        $Work_From_Date_Year = $_POST['Work_From_Date_Year'];
        $Work_From_To_Month = $_POST['Work_From_To_Month'];
        $Work_From_To_Year = $_POST['Work_From_To_Year'];   

        mysqli_query($con, "INSERT INTO applicant (company_id, job_id,
                
                                                   Account_Id, Status, First_Name, Middel_Name, Last_Name, 
                                                   Month, Day, Year, Gender, Birth_Place, Email, Contact_Number, Age,
                                                   Region, Province, City, Barangay, Street,

                                                   Education, Field_Of_Study, School_Name, School_Address, School_From_Date_Month, School_From_Date_Year,
                                                                                                           School_From_To_Month, School_From_To_Year,

                                                   Job_Title, Company, Company_Address, Work_From_Date_Month, Work_From_Date_Year, 
                                                                                        Work_From_To_Month, Work_From_To_Year )

                                        VALUES ('$company_id', '$job_id',

                                                '$Account_Id', '$Status', '$First_Name', '$Middel_Name', '$Last_Name', 
                                                '$Month', '$Day', '$Year', '$Gender', '$Birth_Place','$Email', '$Contact_Number', '$Age',
                                                '$Region', '$Province', '$City', '$Barangay', '$Street',

                                                '$Education', '$Field_Of_Study', '$School_Name', '$School_Address', '$School_From_Date_Month', '$School_From_Date_Year',
                                                                                                                    '$School_From_To_Month', '$School_From_To_Year',

                                                '$Job_Title', '$Company', '$Company_Address', '$Work_From_Date_Month', '$Work_From_Date_Year', 
                                                                                              '$Work_From_To_Month', '$Work_From_To_Year' )");

    }

   echo "<script>alert('Successfull application')</script>";
   echo "<script>window.location = '/peso/user/my-job.php'</script>"; 

?>


