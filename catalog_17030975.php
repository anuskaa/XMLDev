<?php
	$servername = "localhost";
	$user = "root";
	$password = "";
    $dbname = "technogyang";
	
//Creating Connection
	 $con = new mysqli($servername, $user, $password, $dbname);
	 
 //Checking Connection
    if ($con->connect_error){
        die("Connection failed:" . $con->connect_error);
    }
	else {
		echo "Connected.";
		
//For Company Details selecting all columns from database

		$details_sql = "SELECT * FROM company_details";
		$result_details = $con->query($details_sql);
		
//For Chief Executive Office's Details selecting all columns from database
		$ceo_sql = "SELECT * FROM chief_executive_officer";
		$result_ceo = $con->query($ceo_sql);
		
// For Project Manager's Detail selecting all columns from database for both te project-manager

		//For 1st project manager
		
		$proman_sql = "SELECT `Manager_Id`, `Manager_Name`, `Manager_Address`, `Manager_Phone`, `Manager_Email`, `Salary`, `Incharge_Of` FROM `project_manager` WHERE 
		Manager_Id='ManID122'";	
		$result_proman1 = $con->query($proman_sql);		
		
		//For Another project manager
		$proman_sql = "SELECT `Manager_Id`, `Manager_Name`, `Manager_Address`, `Manager_Phone`, `Manager_Email`, `Salary`, `Incharge_Of` FROM `project_manager` WHERE 
		Manager_Id='ManID123'";	
		$result_proman2 = $con->query($proman_sql);		
		
//For Team Leader's Detail selecting all columns from database for all team-leaders

		$teamleader_sql = "SELECT `Leader_Id`, `Leader_Name`, `Leader_Address`, `Leader_Phone`, `Leader_Email`, `Leading_Project`, `Salary` FROM `team_leader` WHERE Leader_Id='Led133';";
		$result_teamleader1 = $con->query($teamleader_sql);		
		
		$teamleader_sql = "SELECT `Leader_Id`, `Leader_Name`, `Leader_Address`, `Leader_Phone`, `Leader_Email`, `Leading_Project`, `Salary` FROM `team_leader` WHERE Leader_Id='Led134';";
		$result_teamleader2 = $con->query($teamleader_sql);	
		
		$teamleader_sql = "SELECT `Leader_Id`, `Leader_Name`, `Leader_Address`, `Leader_Phone`, `Leader_Email`, `Leading_Project`, `Salary` FROM `team_leader` WHERE Leader_Id='Led135';";
		$result_teamleader3 = $con->query($teamleader_sql);	
		
		$teamleader_sql = "SELECT `Leader_Id`, `Leader_Name`, `Leader_Address`, `Leader_Phone`, `Leader_Email`, `Leading_Project`, `Salary` FROM `team_leader` WHERE Leader_Id='Led136';";
		$result_teamleader4 = $con->query($teamleader_sql);	
		
		$teamleader_sql = "SELECT `Leader_Id`, `Leader_Name`, `Leader_Address`, `Leader_Phone`, `Leader_Email`, `Leading_Project`, `Salary` FROM `team_leader` WHERE Leader_Id='Led137';";
		$result_teamleader5 = $con->query($teamleader_sql);	
		
//For Department Worker's Detail selecting all columns from database for all the department-worker

		$depworker_sql = "SELECT `Worker_Id`, `Worker_Name`, `Worker_Address`, `Worker_Phone`, `Worker_Designation`, `Worker_Salary` FROM `department_workers` WHERE Worker_Id='Emp145';";
		$result_depworker1 = $con->query($depworker_sql);		
		
		$depworker_sql = "SELECT `Worker_Id`, `Worker_Name`, `Worker_Address`, `Worker_Phone`, `Worker_Designation`, `Worker_Salary` FROM `department_workers` WHERE Worker_Id='Emp146';";
		$result_depworker2 = $con->query($depworker_sql);		

		$depworker_sql = "SELECT `Worker_Id`, `Worker_Name`, `Worker_Address`, `Worker_Phone`, `Worker_Designation`, `Worker_Salary` FROM `department_workers` WHERE Worker_Id='Emp147';";
		$result_depworker3 = $con->query($depworker_sql);		

		$depworker_sql = "SELECT `Worker_Id`, `Worker_Name`, `Worker_Address`, `Worker_Phone`, `Worker_Designation`, `Worker_Salary` FROM `department_workers` WHERE Worker_Id='Emp148';";
		$result_depworker4 = $con->query($depworker_sql);		

		$depworker_sql = "SELECT `Worker_Id`, `Worker_Name`, `Worker_Address`, `Worker_Phone`, `Worker_Designation`, `Worker_Salary` FROM `department_workers` WHERE Worker_Id='Emp149';";
		$result_depworker5 = $con->query($depworker_sql);	

//For department selecting all columns from database

		$depart_sql = "SELECT * FROM departments";
		$result_depart = $con->query($depart_sql);	

//For Running Projects's Details selecting all columns from database

		$runpro_sql = "SELECT `Project_Id`, `Project_Name`, `Departments`, `Managed_By`, `Supervised_By`, `Worker_No` FROM `running_project` WHERE Project_Id='RP100'";
		$result_runpro1 = $con->query($runpro_sql);		
		
		$runpro_sql = "SELECT `Project_Id`, `Project_Name`, `Departments`, `Managed_By`, `Supervised_By`, `Worker_No` FROM `running_project` WHERE Project_Id='RP101'";
		$result_runpro2 = $con->query($runpro_sql);		
		
		$runpro_sql = "SELECT `Project_Id`, `Project_Name`, `Departments`, `Managed_By`, `Supervised_By`, `Worker_No` FROM `running_project` WHERE Project_Id='RP103'";
		$result_runpro3 = $con->query($runpro_sql);		
		
		$runpro_sql = "SELECT `Project_Id`, `Project_Name`, `Departments`, `Managed_By`, `Supervised_By`, `Worker_No` FROM `running_project` WHERE Project_Id='RP104'";
		$result_runpro4 = $con->query($runpro_sql);		
		
		$runpro_sql = "SELECT `Project_Id`, `Project_Name`, `Departments`, `Managed_By`, `Supervised_By`, `Worker_No` FROM `running_project` WHERE Project_Id='RP105'";
		$result_runpro5 = $con->query($runpro_sql);		
		


//Creating a XML Document From the populated datas
	$xml=new DomDocument('1.0','UTF-8');
	$xml->xmlStandalone = false;
	$xml->formatOutput = true;
	
/* Creating element with createElement() and using appendChild() to append child to parent */

//XML for company
	
/* CreateElement is used for creating the required element for our xml file
	$row[columnname] is used for exracting values of repsectiv column from database
	setAttribtue eis used for seeting the attribute
	appenchil is used for appending the creating element with other element as reuired fr oxml file*/
	
	//Company Details
		while($row = mysqli_fetch_array($result_details)){
			$tech=$xml->createElement("Company");
			$tech->setAttribute("Name", "TechnoGyang");
            $xml->appendChild($tech);
			
			$head=$xml->createElement("Header");
			$tech->appendChild($head);
			
			$company_detail=$xml->createElement("Company_details");
			$head->appendChild($company_detail);
			
			//Creating child elements
			
			$company_name=$xml->createElement("Name", $row[0]);
			$company_detail->appendChild($company_name);
			
			$company_slogan=$xml->createElement("Slogan");
			$company_detail->appendChild($company_slogan);
			
			$company_address=$xml->createElement("Address", $row["Address"]);
			$company_detail->appendChild($company_address);
			
			$company_contact=$xml->createElement("Contact_info");
			$company_detail->appendChild($company_contact);
			
			$company_email=$xml->createElement("Contact", $row["Email"]);
			$company_email->setAttribute("type","email");
			$company_contact->appendChild($company_email);
			
			$company_voice=$xml->createElement("Contact", $row["Voice_Call"]);
			$company_voice->setAttribute("type","voice_call");
			$company_contact->appendChild($company_voice);
			
			$company_fax=$xml->createElement("Contact", $row["Fax_No"]);
			$company_fax->setAttribute("type","fax");
			$company_contact->appendChild($company_fax);
			
			$company_phone=$xml->createElement("Contact", $row["Office"]);
			$company_phone->setAttribute("type","official");
			$company_contact->appendChild($company_phone);
			
			$company_website=$xml->createElement("Web_Address", $row["Web_Address"]);
			$company_detail->appendChild($company_website);	
			
			$logo=$xml->createElement("Logo");
			$company_detail->appendChild($logo);	
			}

		//Company CEO Details
		
		while($row = mysqli_fetch_array($result_ceo)){
		
			$company_ceo=$xml->createElement("Chief_Executive_Officer");
			$company_ceo->setAttribute("id",$row["CEO_Id"]);
			$tech->appendChild($company_ceo);
			
			//Creating child elements inside CEO_details element
			
			
			$ceo_fname=$xml->createElement("First_Name", $row["First_Name"]);
			$company_ceo->appendChild($ceo_fname);
			
			$ceo_lname=$xml->createElement("Last_Name", $row["Last_Name"]);
			$company_ceo->appendChild($ceo_lname);
			
			$ceo_peradd=$xml->createElement("Permanent_Address", $row["Permanent.Address"]);
			$company_ceo->appendChild($ceo_peradd);
			
			$ceo_contact=$xml->createElement("Contact_Details");
			$company_ceo->appendChild($ceo_contact);
			
			$ceo_email=$xml->createElement("Ceo_Contact", $row["Mail"]);
			$ceo_email->setAttribute("type","email");
			$ceo_contact->appendChild($ceo_email);
			
			$ceo_phone=$xml->createElement("Ceo_Contact", $row["Phone_No"]);
			$ceo_phone->setAttribute("type","phone");
			$ceo_contact->appendChild($ceo_phone);	
			}
			
			
			$company_employees=$xml->createElement("Employees");
			$company_employees->setAttribute("working_under","CEO");
			$company_ceo->appendChild($company_employees);
			
			
		//Company Project Managers Details
		
		while($row = mysqli_fetch_array($result_proman1)){
		
			$company_manager=$xml->createElement("Project_Manager");
			$company_employees->appendChild($company_manager);
			
			//Creating child elements inside project_manager element
			$promanager=$xml->createElement("Manager_Id");
			$promanager->setAttribute("id",$row["Manager_Id"]);
			$company_manager->appendChild($promanager);
			
			$mname=$xml->createElement("Manager_Name", $row["Manager_Name"]);
			$company_manager->appendChild($mname);
			
			$maddress=$xml->createElement("Manager_Address", $row["Manager_Address"]);
			$company_manager->appendChild($maddress);
			
			
			$mcontact=$xml->createElement("Manger_Contact");
			$company_manager->appendChild($mcontact);
			
			
			$mphone=$xml->createElement("Details", $row["Manager_Phone"]);
			$mphone->setAttribute("type","official");
			$mcontact->appendChild($mphone);
			
			$memail=$xml->createElement("Details", $row["Manager_Email"]);
			$memail->setAttribute("type","email");
			$mcontact->appendChild($memail);
			
			$msalary=$xml->createElement("Manager_Salary", $row["Salary"]);
			$company_manager->appendChild($msalary);
			
			$incharge=$xml->createElement("Incharge_Of", $row["Incharge_Of"]);
			$company_manager->appendChild($incharge);
		}
		
		
		while($row = mysqli_fetch_array($result_proman2)){
			
			//Creating child elements inside project_manager element
			$promanager=$xml->createElement("Manager_Id");
			$promanager->setAttribute("id",$row["Manager_Id"]);
			$company_manager->appendChild($promanager);
			
			$mname=$xml->createElement("Manager_Name", $row["Manager_Name"]);
			$company_manager->appendChild($mname);
			
			$maddress=$xml->createElement("Manager_Address", $row["Manager_Address"]);
			$company_manager->appendChild($maddress);
			
			
			$mcontact=$xml->createElement("Manger_Contact");
			$company_manager->appendChild($mcontact);
			
			
			$mphone=$xml->createElement("Details", $row["Manager_Phone"]);
			$mphone->setAttribute("type","official");
			$mcontact->appendChild($mphone);
			
			$memail=$xml->createElement("Details", $row["Manager_Email"]);
			$memail->setAttribute("type","email");
			$mcontact->appendChild($memail);
			
			$msalary=$xml->createElement("Manager_Salary", $row["Salary"]);
			$company_manager->appendChild($msalary);
			
			$incharge=$xml->createElement("Incharge_Of", $row["Incharge_Of"]);
			$company_manager->appendChild($incharge);
		}
		
		while($row = mysqli_fetch_array($result_teamleader1)){
		
			$company_tleader=$xml->createElement("Team_Leader");
			$company_employees->appendChild($company_tleader);
			
			//Creating child elements inside team_leader element
			
			$tleader=$xml->createElement("Leader_Id");
			$tleader->setAttribute("id",$row["Leader_Id"]);
			$company_tleader->appendChild($tleader);
			
			$lname=$xml->createElement("Leader_Name", $row["Leader_Name"]);
			$company_tleader->appendChild($lname);
			
			$laddress=$xml->createElement("Leader_Address", $row["Leader_Address"]);
			$company_tleader->appendChild($laddress);
			
			
			$lcontact=$xml->createElement("Leader_Contact");
			$company_tleader->appendChild($lcontact);
			
			
			$lphone=$xml->createElement("Info", $row["Leader_Phone"]);
			$lphone->setAttribute("type","phone");
			$lcontact->appendChild($lphone);
			
			$lemail=$xml->createElement("Info", $row["Leader_Email"]);
			$lemail->setAttribute("type","email");
			$lcontact->appendChild($lemail);
			
			$lpro=$xml->createElement("Leading_Project", $row["Leading_Project"]);
			$company_tleader->appendChild($lpro);
			
			$lea_salary=$xml->createElement("Leader_Salary", $row["Salary"]);
			$company_tleader->appendChild($lea_salary);
		}
		
		
		while($row = mysqli_fetch_array($result_teamleader2)){
			
			//Creating child elements inside team_leader element
			
			$tleader=$xml->createElement("Leader_Id");
			$tleader->setAttribute("id",$row["Leader_Id"]);
			$company_tleader->appendChild($tleader);
			
			$lname=$xml->createElement("Leader_Name", $row["Leader_Name"]);
			$company_tleader->appendChild($lname);
			
			$laddress=$xml->createElement("Leader_Address", $row["Leader_Address"]);
			$company_tleader->appendChild($laddress);
			
			
			$lcontact=$xml->createElement("Leader_Contact");
			$company_tleader->appendChild($lcontact);
			
			
			$lphone=$xml->createElement("Info", $row["Leader_Phone"]);
			$lphone->setAttribute("type","phone");
			$lcontact->appendChild($lphone);
			
			$lemail=$xml->createElement("Info", $row["Leader_Email"]);
			$lemail->setAttribute("type","email");
			$lcontact->appendChild($lemail);
			
			$lpro=$xml->createElement("Leading_Project", $row["Leading_Project"]);
			$company_tleader->appendChild($lpro);
			
			$lea_salary=$xml->createElement("Leader_Salary", $row["Salary"]);
			$company_tleader->appendChild($lea_salary);
		}
		
		
		while($row = mysqli_fetch_array($result_teamleader3)){
			
			//Creating child elements inside team_leader element
			
			$tleader=$xml->createElement("Leader_Id");
			$tleader->setAttribute("id",$row["Leader_Id"]);
			$company_tleader->appendChild($tleader);
			
			$lname=$xml->createElement("Leader_Name", $row["Leader_Name"]);
			$company_tleader->appendChild($lname);
			
			$laddress=$xml->createElement("Leader_Address", $row["Leader_Address"]);
			$company_tleader->appendChild($laddress);
			
			
			$lcontact=$xml->createElement("Leader_Contact");
			$company_tleader->appendChild($lcontact);
			
			
			$lphone=$xml->createElement("Info", $row["Leader_Phone"]);
			$lphone->setAttribute("type","phone");
			$lcontact->appendChild($lphone);
			
			$lemail=$xml->createElement("Info", $row["Leader_Email"]);
			$lemail->setAttribute("type","email");
			$lcontact->appendChild($lemail);
			
			
			$lpro=$xml->createElement("Leading_Project", $row["Leading_Project"]);
			$company_tleader->appendChild($lpro);
			
			$lea_salary=$xml->createElement("Leader_Salary", $row["Salary"]);
			$company_tleader->appendChild($lea_salary);
		}
		
		
		while($row = mysqli_fetch_array($result_teamleader4)){
		
			//Creating child elements inside team_leader element
			
			$tleader=$xml->createElement("Leader_Id");
			$tleader->setAttribute("id",$row["Leader_Id"]);
			$company_tleader->appendChild($tleader);
			
			$lname=$xml->createElement("Leader_Name", $row["Leader_Name"]);
			$company_tleader->appendChild($lname);
			
			$laddress=$xml->createElement("Leader_Address", $row["Leader_Address"]);
			$company_tleader->appendChild($laddress);
			
			
			$lcontact=$xml->createElement("Leader_Contact");
			$company_tleader->appendChild($lcontact);
			
			
			$lphone=$xml->createElement("Info", $row["Leader_Phone"]);
			$lphone->setAttribute("type","phone");
			$lcontact->appendChild($lphone);
			
			$lemail=$xml->createElement("Info", $row["Leader_Email"]);
			$lemail->setAttribute("type","email");
			$lcontact->appendChild($lemail);
			
			
			$lpro=$xml->createElement("Leading_Project", $row["Leading_Project"]);
			$company_tleader->appendChild($lpro);
			
			$lea_salary=$xml->createElement("Leader_Salary", $row["Salary"]);
			$company_tleader->appendChild($lea_salary);
		}
		
		
		while($row = mysqli_fetch_array($result_teamleader5)){
		
			//Creating child elements inside team_leader element
			
			$tleader=$xml->createElement("Leader_Id");
			$tleader->setAttribute("id",$row["Leader_Id"]);
			$company_tleader->appendChild($tleader);
			
			$lname=$xml->createElement("Leader_Name", $row["Leader_Name"]);
			$company_tleader->appendChild($lname);
			
			$laddress=$xml->createElement("Leader_Address", $row["Leader_Address"]);
			$company_tleader->appendChild($laddress);
			
			
			$lcontact=$xml->createElement("Leader_Contact");
			$company_tleader->appendChild($lcontact);
			
			
			$lphone=$xml->createElement("Info", $row["Leader_Phone"]);
			$lphone->setAttribute("type","phone");
			$lcontact->appendChild($lphone);
			
			$lemail=$xml->createElement("Info", $row["Leader_Email"]);
			$lemail->setAttribute("type","email");
			$lcontact->appendChild($lemail);
			
			$lpro=$xml->createElement("Leading_Project", $row["Leading_Project"]);
			$company_tleader->appendChild($lpro);
			
			$lea_salary=$xml->createElement("Leader_Salary", $row["Salary"]);
			$company_tleader->appendChild($lea_salary);
		}
		
		
		
		while($row = mysqli_fetch_array($result_depworker1)){
		
			$company_worker=$xml->createElement("Department_Worker");
			$company_employees->appendChild($company_worker);
			
			//Creating child elements inside Department workers element
			
			$depwork=$xml->createElement("Worker_Id");
			$depwork->setAttribute("id",$row["Worker_Id"]);
			$company_worker->appendChild($depwork);
			
			$wname=$xml->createElement("Worker_Name", $row["Worker_Name"]);
			$company_worker->appendChild($wname);
			
			$waddress=$xml->createElement("Worker_Address", $row["Worker_Address"]);
			$company_worker->appendChild($waddress);
				
			$wphone=$xml->createElement("Worker_Phone", $row["Worker_Phone"]);
			$company_worker->appendChild($wphone);
			
			$worker_desig=$xml->createElement("Worker_Designation", $row["Worker_Designation"]);
			$company_worker->appendChild($worker_desig);
			
			$work_salary=$xml->createElement("Worker_Salary", $row["Worker_Salary"]);
			$company_worker->appendChild($work_salary);
		}
	
	
		
		
		while($row = mysqli_fetch_array($result_depworker2)){
		
			//Creating child elements inside Department workers element
			
			$depwork=$xml->createElement("Worker_Id");
			$depwork->setAttribute("id",$row["Worker_Id"]);
			$company_worker->appendChild($depwork);
			
			$wname=$xml->createElement("Worker_Name", $row["Worker_Name"]);
			$company_worker->appendChild($wname);
			
			$waddress=$xml->createElement("Worker_Address", $row["Worker_Address"]);
			$company_worker->appendChild($waddress);
				
			$wphone=$xml->createElement("Worker_Phone", $row["Worker_Phone"]);
			$company_worker->appendChild($wphone);
			
			$worker_desig=$xml->createElement("Worker_Designation", $row["Worker_Designation"]);
			$company_worker->appendChild($worker_desig);
			
			$work_salary=$xml->createElement("Worker_Salary", $row["Worker_Salary"]);
			$company_worker->appendChild($work_salary);
		}
		
		
		
		
		while($row = mysqli_fetch_array($result_depworker3)){
		
			//Creating child elements inside Department workers element
			
			$depwork=$xml->createElement("Worker_Id");
			$depwork->setAttribute("id",$row["Worker_Id"]);
			$company_worker->appendChild($depwork);
			
			$wname=$xml->createElement("Worker_Name", $row["Worker_Name"]);
			$company_worker->appendChild($wname);
			
			$waddress=$xml->createElement("Worker_Address", $row["Worker_Address"]);
			$company_worker->appendChild($waddress);
				
			$wphone=$xml->createElement("Worker_Phone", $row["Worker_Phone"]);
			$company_worker->appendChild($wphone);
			
			$worker_desig=$xml->createElement("Worker_Designation", $row["Worker_Designation"]);
			$company_worker->appendChild($worker_desig);
			
			$work_salary=$xml->createElement("Worker_Salary", $row["Worker_Salary"]);
			$company_worker->appendChild($work_salary);
		}
		
		
		
		while($row = mysqli_fetch_array($result_depworker4)){
		
			//Creating child elements inside Department workers element
			
			$depwork=$xml->createElement("Worker_Id");
			$depwork->setAttribute("id",$row["Worker_Id"]);
			$company_worker->appendChild($depwork);
			
			$wname=$xml->createElement("Worker_Name", $row["Worker_Name"]);
			$company_worker->appendChild($wname);
			
			$waddress=$xml->createElement("Worker_Address", $row["Worker_Address"]);
			$company_worker->appendChild($waddress);
				
			$wphone=$xml->createElement("Worker_Phone", $row["Worker_Phone"]);
			$company_worker->appendChild($wphone);
			
			$worker_desig=$xml->createElement("Worker_Designation", $row["Worker_Designation"]);
			$company_worker->appendChild($worker_desig);
			
			$work_salary=$xml->createElement("Worker_Salary", $row["Worker_Salary"]);
			$company_worker->appendChild($work_salary);
		}
		
		while($row = mysqli_fetch_array($result_depworker5)){
		
			//Creating child elements inside Department workers element
			
			$depwork=$xml->createElement("Worker_Id");
			$depwork->setAttribute("id",$row["Worker_Id"]);
			$company_worker->appendChild($depwork);
			
			$wname=$xml->createElement("Worker_Name", $row["Worker_Name"]);
			$company_worker->appendChild($wname);
			
			$waddress=$xml->createElement("Worker_Address", $row["Worker_Address"]);
			$company_worker->appendChild($waddress);
				
			$wphone=$xml->createElement("Worker_Phone", $row["Worker_Phone"]);
			$company_worker->appendChild($wphone);
			
			$worker_desig=$xml->createElement("Worker_Designation", $row["Worker_Designation"]);
			$company_worker->appendChild($worker_desig);
			
			$work_salary=$xml->createElement("Worker_Salary", $row["Worker_Salary"]);
			$company_worker->appendChild($work_salary);
		}
//For deparment

//For Department's Details

		$department = $xml->createElement("Department");
		$tech->appendChild($department);
		
		while ($row = mysqli_fetch_array($result_depart)){


		$departmentid = $xml->createElement("Department_Id");
		$departmentid->setAttibute("id",$row["Department_Id"]
		$department->appendChild($departmentid);
		
		$departmentName = $xml->createElement("DepartmentName",$row["Department_Name"]);
		$department->appendChild($departmentName);

		$employee = $xml->createElement("AssignedEmployee",$row["Assigned_Employes"]);
        $department->appendChild($employee);
		
		$leadedby = $xml->createElement("Leadedby",$row["Leaded_by"]);
        $department->appendChild($leadedby);
        
		
		$runningproject = $xml->createElement("Runningproject");
		$department->appendChild($runningproject);
		
		if ($row['Running_Project'] != NULL){
			$runningproject->setAttribute("project",$row["Running_Project"]);
		}

		}
		

	
		while($row = mysqli_fetch_array($result_runpro1)){
		
			$company_projects=$xml->createElement("Running_Projects");
			$tech->appendChild($company_projects);
			
			//Creating child elements inside Departments element
			
			$pro=$xml->createElement("Projects_Id");
			$pro->setAttribute("id",$row["Project_Id"]);
			$company_projects->appendChild($pro);
			
			$pro_name=$xml->createElement("Project_Name", $row["Project_Name"]);
			$company_projects->appendChild($pro_name);
			
			$pro_dep=$xml->createElement("Deparments", $row["Departments"]);
			$company_projects->appendChild($pro_dep);
				
			$managed_by=$xml->createElement("Managed_By", $row["Managed_By"]);
			$company_projects->appendChild($managed_by);
			
			$supervised_by=$xml->createElement("Supervised_By", $row["Supervised_By"]);
			$company_projects->appendChild($supervised_by);
			
			$workers=$xml->createElement("Worker_No", $row["Worker_No"]);
			$company_projects->appendChild($workers);

		}
		
		
			while($row = mysqli_fetch_array($result_runpro2)){
		
			//Creating child elements inside Departments element
			
			$pro=$xml->createElement("Projects_Id");
			$pro->setAttribute("id",$row["Project_Id"]);
			$company_projects->appendChild($pro);
			
			$pro_name=$xml->createElement("Project_Name", $row["Project_Name"]);
			$company_projects->appendChild($pro_name);
			
			$pro_dep=$xml->createElement("Deparments", $row["Departments"]);
			$company_projects->appendChild($pro_dep);
				
			$managed_by=$xml->createElement("Managed_By", $row["Managed_By"]);
			$company_projects->appendChild($managed_by);
			
			$supervised_by=$xml->createElement("Supervised_By", $row["Supervised_By"]);
			$company_projects->appendChild($supervised_by);
			
			$workers=$xml->createElement("Worker_No", $row["Worker_No"]);
			$company_projects->appendChild($workers);

		}
		
		
			while($row = mysqli_fetch_array($result_runpro3)){
		
			//Creating child elements inside Departments element
			
			$pro=$xml->createElement("Projects_Id");
			$pro->setAttribute("id",$row["Project_Id"]);
			$company_projects->appendChild($pro);
			
			$pro_name=$xml->createElement("Project_Name", $row["Project_Name"]);
			$company_projects->appendChild($pro_name);
			
			$pro_dep=$xml->createElement("Deparments", $row["Departments"]);
			$company_projects->appendChild($pro_dep);
				
			$managed_by=$xml->createElement("Managed_By", $row["Managed_By"]);
			$company_projects->appendChild($managed_by);
			
			$supervised_by=$xml->createElement("Supervised_By", $row["Supervised_By"]);
			$company_projects->appendChild($supervised_by);
			
			$workers=$xml->createElement("Worker_No", $row["Worker_No"]);
			$company_projects->appendChild($workers);

		}
		
		
			while($row = mysqli_fetch_array($result_runpro4)){
		
			//Creating child elements inside Departments element
			
			$pro=$xml->createElement("Projects_Id");
			$pro->setAttribute("id",$row["Project_Id"]);
			$company_projects->appendChild($pro);
			
			$pro_name=$xml->createElement("Project_Name", $row["Project_Name"]);
			$company_projects->appendChild($pro_name);
			
			$pro_dep=$xml->createElement("Deparments", $row["Departments"]);
			$company_projects->appendChild($pro_dep);
				
			$managed_by=$xml->createElement("Managed_By", $row["Managed_By"]);
			$company_projects->appendChild($managed_by);
			
			$supervised_by=$xml->createElement("Supervised_By", $row["Supervised_By"]);
			$company_projects->appendChild($supervised_by);
			
			$workers=$xml->createElement("Worker_No", $row["Worker_No"]);
			$company_projects->appendChild($workers);

		}
		
		
			while($row = mysqli_fetch_array($result_runpro5)){
		
			//Creating child elements inside Departments element
			
			$pro=$xml->createElement("Projects_Id");
			$pro->setAttribute("id",$row["Project_Id"]);
			$company_projects->appendChild($pro);
			
			$pro_name=$xml->createElement("Project_Name", $row["Project_Name"]);
			$company_projects->appendChild($pro_name);
			
			$pro_dep=$xml->createElement("Deparments", $row["Departments"]);
			$company_projects->appendChild($pro_dep);
				
			$managed_by=$xml->createElement("Managed_By", $row["Managed_By"]);
			$company_projects->appendChild($managed_by);
			
			$supervised_by=$xml->createElement("Supervised_By", $row["Supervised_By"]);
			$company_projects->appendChild($supervised_by);
			
			$workers=$xml->createElement("Worker_No", $row["Worker_No"]);
			$company_projects->appendChild($workers);

		}
		
		echo "<xmp>".$xml->savexml()."</xmp>";
		//save XML as a file.
		$xml->save ('catalog_17030975.xml');
	}
?>
	
		
		
	