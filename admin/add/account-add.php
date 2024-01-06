<?php

include '../../database/database.php';

if(ISSET($_POST['submit'])) {

        $First_Name = $_POST['First_Name']; 
        $Middel_Name = $_POST['Middel_Name'];    
        $Last_Name = $_POST['Last_Name'];

        $Month = $_POST['Month'];
        $Day = $_POST['Day'];
        $Year = $_POST['Year'];  
        $Gender = $_POST['Gender'];
        $Birth_Place = $_POST['Birth_Place'];

        $Email = $_POST['Email'];
        $Contact_Number = $_POST['Contact_Number'];

        $Region = $_POST['Region'];
        $Province = $_POST['Province'];
        $City = $_POST['City'];
        $Barangay = $_POST['Barangay'];  

        $Job_Title = $_POST['Job_Title'];   
        $Company = $_POST['Company'];    
        $Company_Address = $_POST['Company_Address']; 
        $Work_From_Date = $_POST['Work_From_Date'];   
        $Work_From_To = $_POST['Work_From_To'];    

        $Education = $_POST['Education'];   
        $Field_Of_Study = $_POST['Field_Of_Study'];    
        $School = $_POST['School']; 
        $School_Address = $_POST['School_Address']; 
        $School_From_Date = $_POST['School_From_Date'];    
        $School_From_To = $_POST['School_From_To']; 

        $Account_Id = $_POST['Account_Id']; 

mysqli_query($con, "INSERT INTO personal_data ( First_Name, Middel_Name, Last_Name, 
                                      Month, Day, Year, Gender, Birth_Place, Email, Contact_Number,
                                      Region, Province, City, Barangay, 
                                      Job_Title, Company, Company_Address, Work_From_Date, Work_From_To,
                                      Education, Field_Of_Study, School, School_Address, School_From_Date, School_From_To,
                                      Account_Id)

                                VALUES ('$First_Name', '$Middel_Name', '$Last_Name', 
                                        '$Month', '$Day', '$Year', '$Gender', '$Birth_Place','$Email', '$Contact_Number',
                                        '$Region', '$Province', '$City', '$Barangay',
                                        '$Job_Title', '$Company', '$Company_Address', '$Work_From_Date', '$Work_From_To', 
                                        '$Education', '$Field_Of_Study', '$School', '$School_Address', '$School_From_Date', '$School_From_To',
                                        '$Account_Id')");

    }

   echo "<script>alert('Successfull Create Peso resume')</script>";
   echo "<script>window.location = '/peso/admin/index.php'</script>"; 

?>


