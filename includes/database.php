<?php 

	//require_once("config.php");
	/*

	* This page will include the class of connection to database

	*/
	defined("DB_HOST") ? null: define("DB_HOST", "localhost");
	defined("DB_USER") ? null: define("DB_USER", "root");
	defined("DB_PASS") ? null: define("DB_PASS", "");
	defined("DB_NAME") ? null: define("DB_NAME", "391project");

	class dbClass{

		private $connection;

		public function __construct(){
			
			$this->est_connection();
		}


		private function est_connection(){
			$this->connection=mysqli_connect(DB_HOST, DB_USER, DB_PASS);

			if (!$this->connection) {

				die("Database Connection Failed ". mysqli_connect_errno());
			}

			else{

				$select_db=mysqli_select_db($this->connection, DB_NAME);

				if (!$select_db) {

					die("Database Selection Failed ".mysqli_error());
				}
			}

		}//END of est connection


		public function close_connection(){

			if (isset($this->connection)) {
				mysqli_close($this->connection);

				unset($this->connection);
			}
		}//end of close connection


		public function perform_query($query){
			//echo $query;
			//$query=mysqli_real_escape_string($this->connection, $query);

			$result=mysqli_query($this->connection, $query);

			$this->confirm_query($result);

			return $result;
		}// end of perform query


		private function confirm_query($result){
			if (!$result) {
				die("Database Query Failed". mysqli_error());
			}
		}//end of confirm query

		public function fetch_result($result){
			
			return mysqli_fetch_assoc($result);
		}//end of fetch result


		public function last_insertedid(){

			return mysqli_insert_id($this->connection);
		}// end of last insertedid

		public function num_rows($result){

			return mysqli_num_rows($result);

		}//end of num rows

		public function affected_rows(){

			return mysqli_affected_rows($this->connection);
		}//end of affected rows

		public function show_all_doctors(){
			$sql="SELECT Employee.EID, Employee.Name, Employee.Degree, Employee.Address, ";
				$sql.="Employee.PhoneNo, Employee.Salary, Employee.Gender, Doctor.RoomNum, Department.Dept_name ";
				$sql.="from Employee, Doctor, Department where "; 
				$sql.="Employee.EID=Doctor.idDoctor and Doctor.Specialization=Department.DID"; 
				$sql.=" order by Employee.EID";

			$result=$this->perform_query($sql);
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["Address"][$i]=$row["Address"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Salary"][$i]=$row["Salary"];
				$arr["Gender"][$i]=$row["Gender"];
				$arr["RoomNum"][$i]=$row["RoomNum"];
				$arr["Dept_name"][$i]=$row["Dept_name"];
				$i++;
			}
			return $arr;

		}// End of show all doctors

		public function show_all_nurse(){
			$sql="Select Employee.EID, Employee.Name, Employee.Degree, Employee.Address, ";
				$sql.="Employee.PhoneNo, Employee.Salary, Employee.Gender, Nurse.Floor ";
				$sql.="from Employee, Nurse where Employee.EID=Nurse.idNurse order by Employee.EID";
			$result=$this->perform_query($sql);
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["Address"][$i]=$row["Address"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Salary"][$i]=$row["Salary"];
				$arr["Gender"][$i]=$row["Gender"];	
				$arr["Floor"][$i]=$row["Floor"];
				$i++;
			}

			return $arr;
		}// End of Show all nurse

		public function show_all_reciptionist(){
			$sql="SELECT Employee.EID, Employee.Name, Employee.Degree, Employee.Address, ";
				$sql.="Employee.PhoneNo, Employee.Salary, Employee.Gender, Reciptionist.Computer_Skills ";
				$sql.="from Employee, Reciptionist where "; 
				$sql.="Employee.EID=Reciptionist.idReciptionist"; 
				$sql.=" order by Employee.EID";

			$result=$this->perform_query($sql);
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["Address"][$i]=$row["Address"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Salary"][$i]=$row["Salary"];
				$arr["Gender"][$i]=$row["Gender"];
				$arr["Computer_Skills"][$i]=$row["Computer_Skills"];
				$i++;
			}
			return $arr;

		}// End of show all doctors

		public function show_other_employees(){
			$sql="Select Employee.EID, Employee.Name, Employee.Degree, Employee.Address, ";
				$sql.="Employee.PhoneNo, Employee.Salary, Employee.Gender, Others.Job_Catagory ";
				$sql.="from Employee, Others where Employee.EID=Others.idOthers order by Employee.EID";
				$result=$this->perform_query($sql);
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["Address"][$i]=$row["Address"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Salary"][$i]=$row["Salary"];
				$arr["Gender"][$i]=$row["Gender"];	
				$arr["Job_Catagory"][$i]=$row["Job_Catagory"];
				$i++;
			}
			return $arr;
		}// End of show other employees


		public function emloyee_type($EID){
			$type=substr($EID, 0,3);
			return $type;
		}// END of Employee Type

		


		public function show_my_info($d){
			
			$sql="select * from employee where EID= '{$d}'";
			$result=$this->perform_query($sql);
			$result=$this->fetch_result($result);
			return $result;
		}//End of show my info


		public function show_pat_info($d){
		
			$sql="select * from patient where PID= '{$d}'";
			$result=$this->perform_query($sql);
			$result=$this->fetch_result($result);
			return $result;
		}//End of show pat info


		public function add_Doctor($EID, $name, $password, $degree, $address, $phone, $salary, $gender, $roomNum, $specialization){
			if ($this->emloyee_type($EID)=="DOC") {
				$sql="insert into employee values ( '{$EID}', '{$name}', '{$password}', '{$degree}', '{$address}', '{$phone}', '{$salary}', '{$gender}')";
				$sql2="insert into Doctor values('{$EID}', '{$roomNum}', {$specialization})"; 

				if($this->perform_query($sql)){
					$this->perform_query($sql2);

				}
			return true;
			}
			else{
				return false;
			}
			
		}//End of add doctor

		public function add_nurse($EID, $name, $password, $degree, $address, $phone, $salary, $gender, $Floor){
			
			if ($this->emloyee_type($EID)=="NUR") {
				$sql="insert into employee values ('{$EID}', '{$name}', '{$password}', '{$degree}', '{$address}', '{$phone}', '{$salary}', '{$gender}')";
				$sql2="insert into nurse values ( '{$EID}', '{$Floor}')"; 

				if($this->perform_query($sql)){
					$this->perform_query($sql2);
				}
			return true;
			}
			else{
				return false;
			}
		}// End of add_nurse


		public function add_Recip($EID, $name, $password, $degree, $address, $phone, $salary, $gender, $skill){

			
			if ($this->emloyee_type($EID)=="REP") {
				$sql="insert into employee values ('{$EID}', '{$name}', '{$password}', '{$degree}', '{$address}', '{$phone}', '{$salary}', '{$gender}')";
				$sql2="insert into  reciptionist values ('{$EID}', '{$skill}')"; 

				if($this->perform_query($sql)){
					$this->perform_query($sql2);
				}
			return true;
			}
			else{
				return false;
			}
		}//End of add recip


		public function del_anyone($EID){

				$sql="DELETE FROM employee WHERE employee.EID='{$EID}' ";
				$this->perform_query($sql);
				
		}//End of add recip


		public function add_others($EID, $name, $password, $degree, $address, $phone, $salary, $gender, $catag){
			
			if ($this->emloyee_type($EID)=="OTH") {
				$sql="insert into employee values('{$EID}', '{$name}', '{$password}','{$degree}','{$address}', '{$phone}', '{$salary}', '{$gender}')";
				$sql2="insert into Others values('{$EID}', '{$catag}')"; 

				if($this->perform_query($sql)){
					$this->perform_query($sql2);
				}
			return true;
			}
			else{
				return false;
			}
		}// End of add others

		public function add_anyone($EID, $name, $password, $degree, $address, $phone, $salary, $gender, $roomNum, $specialization, $Floor, $skill, $catag){
			

			if ($this->emloyee_type($EID)=="DOC") {
				return $this->add_Doctor($EID, $name, $password, $degree, $address, $phone, $salary, $gender, $roomNum, $specialization);
			}
			else if ($this->emloyee_type($EID)=="REP") {
				return $this->add_Recip($EID, $name, $password, $degree, $address, $phone, $salary, $gender,$skill);
			}
			else if ($this->emloyee_type($EID)=="OTH") {
				return $this->add_others($EID, $name, $password, $degree, $address, $phone, $salary, $gender, $catag);
			}
			else if ($this->emloyee_type($EID)=="NUR") {
				return $this->add_nurse($EID, $name, $password, $degree, $address, $phone, $salary, $gender, $Floor);
			}
			else {
				return false;
			}


		}// End of Add Anyone

		public function add_patient($PID, $name, $gender, $disease, $phone, $rep_id, $select, $ad_date, $rel_date, $ward_no, $visit_date){
			

			if ($select=="adm") {
				return $this->add_adm_pat($PID, $name, $gender, $disease, $phone, $rep_id, $ad_date, $rel_date, $ward_no);
			}
			else if ($select=="non") {
				return $this->add_non_pat($PID, $name, $gender, $disease, $phone, $rep_id, $visit_date);
			}
			else {
				return false;
			}
		}// End of Add pat

		public function add_adm_pat($PID, $name, $gender, $disease, $phone, $rep_id, $ad_date, $rel_date, $ward_no){
			$sql="insert into patient values('{$PID}', '{$name}', '{$gender}','{$disease}','{$phone}', '{$rep_id}' )";
				$sql2="insert into admitted_patient values('{$PID}', '{$ad_date}', '{$rel_date}', '{$ward_no}')"; 

				if($this->perform_query($sql)){
					$this->perform_query($sql2);
				}
				return true;
		}

		public function add_non_pat($PID, $name, $gender, $disease, $phone, $rep_id, $visit_date){
			$sql="insert into patient values('{$PID}', '{$name}', '{$gender}','{$disease}','{$phone}', '{$rep_id}' )";
				$sql2="insert into non_admitted values('{$PID}', '{$visit_date}')"; 

				if($this->perform_query($sql)){
					$this->perform_query($sql2);
				}
				return true;
		}

		public function authenticate($EID, $pass){

			$EID=mysqli_real_escape_string($this->connection, $EID);
			$pass=mysqli_real_escape_string($this->connection, $pass);

			$sql="SELECT EID, Password from employee where EID ='{$EID}'";

			$result=$this->perform_query($sql);
			$result=$this->fetch_result($result);

			if ($result["Password"]==$pass) {
				$_SESSION["id"]=$EID;
				$value= $this->get_address($EID);
				$this->redirect_to($value);
			}

			return false;

		}// End of authentication

		public function get_address($EID){
			$type=$this->emloyee_type($EID);

			$sql="SELECT pageLocation from pageinfo where type='{$type}'";
			$result=$this->perform_query($sql);
			$result=$this->fetch_result($result);
			return $result["pageLocation"];

		}//End of get address 

		public function redirect_to($address){

			 header("refresh:0;url=".$address);
		}// End of redirect to 

		public function logOut(){
			if (isset($_SESSION["id"])) {
				unset($_SESSION["id"]);
				$this->redirect_to("../index.php");
			}
		}//Log Out

		public function show_admitted_patients(){
			$sql="SELECT Patient.PID, Patient.Name as PName, Patient.Sex, Patient.Disease, Patient.Phone, ";
				$sql.="employee.Name, Admitted_Patient.Ad_Date, Admitted_Patient.Rel_Date, ";
				$sql.="Admitted_Patient.Word_no from Patient, Employee, Admitted_Patient, "; 
				$sql.="reciptionist where Patient.idServedRecep=Reciptionist.idReciptionist and"; 
				$sql.=" employee.EID=Reciptionist.idReciptionist and Patient.PID=idAdmitted_Patient GROUP BY PID";

			$result=$this->perform_query($sql);
			
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["PID"][$i]=$row["PID"];
				$arr["PName"][$i]=$row["PName"];
				$arr["Sex"][$i]=$row["Sex"];
				$arr["Disease"][$i]=$row["Disease"];
				$arr["Phone"][$i]=$row["Phone"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Ad_Date"][$i]=$row["Ad_Date"];
				$arr["Rel_Date"][$i]=$row["Rel_Date"];
				$arr["Word_no"][$i]=$row["Word_no"];
				$i++;
			}
			
			return $arr;

		}// End of show admitted pats


		public function show_Nonadmitted_patients(){
			$sid=$_SESSION["id"];
			//$sid="DOC-004";
			$sql="SELECT Patient.PID, Patient.Name as PName, Patient.Sex, Patient.Disease, Patient.Phone, "; 
			$sql.="employee.Name, non_admitted.visit_date ";
            $sql.="from  Patient, Employee, Non_Admitted, reciptionist "; 
			$sql.="reciptionist where Patient.idServedRecep=Reciptionist.idReciptionist and"; 
			$sql.=" employee.EID=Reciptionist.idReciptionist and idNon_Admitted=Patient.PID GROUP BY PID";
			$result=$this->perform_query($sql);
			
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["PID"][$i]=$row["PID"];
				$arr["PName"][$i]=$row["PName"];
				$arr["Sex"][$i]=$row["Sex"];
				$arr["Disease"][$i]=$row["Disease"];
				$arr["Phone"][$i]=$row["Phone"];
				$arr["Name"][$i]=$row["Name"];
				$arr["visit_date"][$i]=$row["visit_date"];
				$i++;
			}
			
			return $arr;

		}// End of show non-admitted pats of a doc


		public function show_admitted_patients_by_Doc(){
			$sid=$_SESSION["id"];
			//$sid="DOC-001";
			$sql="SELECT Patient.PID, Patient.Name as PName, Patient.Sex, Patient.Disease, Patient.Phone, "; 
			$sql.="employee.Name, admitted_patient.Ad_Date, admitted_patient.Rel_Date, "; 
			$sql.="admitted_patient.Word_No ";
			$sql.="from treats, Patient, Employee, admitted_patient, reciptionist "; 
			$sql.="where patient.PID=treats.T_Patient and "; 
			$sql.="patient.PID=admitted_patient.idAdmitted_Patient ";
			$sql.="AND treats.T_DOCID='{$sid}' AND ";
			$sql.="Patient.idServedRecep=Reciptionist.idReciptionist and "; 
			$sql.=" employee.EID=Reciptionist.idReciptionist GROUP BY PID";
			$result=$this->perform_query($sql);
			
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["PID"][$i]=$row["PID"];
				$arr["PName"][$i]=$row["PName"];
				$arr["Sex"][$i]=$row["Sex"];
				$arr["Disease"][$i]=$row["Disease"];
				$arr["Phone"][$i]=$row["Phone"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Ad_Date"][$i]=$row["Ad_Date"];
				$arr["Rel_Date"][$i]=$row["Rel_Date"];
				$arr["Word_No"][$i]=$row["Word_No"];
				$i++;
			}
			
			return $arr;

		}// End of show admitted pats of a doc


		public function show_Nonadmitted_patients_by_Doc(){
			$sid=$_SESSION["id"];
			//$sid="DOC-004";
			$sql="SELECT Patient.PID, Patient.Name as PName, Patient.Sex, Patient.Disease, Patient.Phone, "; 
			$sql.="employee.Name, non_admitted.visit_date ";
            $sql.="from treats, Patient, Employee, Non_Admitted, reciptionist "; 
			$sql.="where patient.PID=treats.T_Patient and patient.PID=non_admitted.idNon_Admitted "; 
			$sql.="AND treats.T_DOCID='{$sid}' AND ";
			$sql.="Patient.idServedRecep=Reciptionist.idReciptionist and "; 
			$sql.=" employee.EID=Reciptionist.idReciptionist GROUP BY PID";
			$result=$this->perform_query($sql);
			
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["PID"][$i]=$row["PID"];
				$arr["PName"][$i]=$row["PName"];
				$arr["Sex"][$i]=$row["Sex"];
				$arr["Disease"][$i]=$row["Disease"];
				$arr["Phone"][$i]=$row["Phone"];
				$arr["Name"][$i]=$row["Name"];
				$arr["visit_date"][$i]=$row["visit_date"];
				$i++;
			}
			
			return $arr;

		}// End of show non-admitted pats of a doc

        
		public function show_nurse_for_doc(){
			$sid=$_SESSION["id"];
			//$sid="DOC-003";
			$sql="SELECT employee.EID, employee.Name, employee.Degree, employee.PhoneNo, employee.Gender, "; 
			$sql.="patient.PID, patient.Name as PName, patient.Disease ";
			$sql.="from employee,patient,serves,treats,doctor ";
			$sql.="WHERE doctor.idDoctor=treats.T_DOCID and doctor.idDoctor='{$sid}' and ";
			$sql.="treats.T_Patient=patient.PID ";
			$sql.="and patient.PID=serves.Serves_P and serves.Serves_N=employee.EID ";
			$sql.=" GROUP by patient.PID";


			$result=$this->perform_query($sql);
			
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Gender"][$i]=$row["Gender"];
				$arr["PID"][$i]=$row["PID"];
				$arr["PName"][$i]=$row["PName"];
				$arr["Disease"][$i]=$row["Disease"];
				$i++;
			}
			
			return $arr;

		}// End of show Nurse for doctor



public function show_doc_for_rep(){
			    $sql="SELECT Employee.EID, Employee.Name, Employee.Degree, "; 
				$sql="Employee.PhoneNo, Employee.Gender, Doctor.RoomNum, Department.Dept_name ";
				$sql="from Employee, Doctor, Department where ";
				$sql="Employee.EID=Doctor.idDoctor and Doctor.Specialization=Department.DID ";
				$sql=" order by Employee.EID";
			$result=$this->perform_query($sql);
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["Address"][$i]=$row["Address"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Salary"][$i]=$row["Salary"];
				$arr["Gender"][$i]=$row["Gender"];
				$arr["RoomNum"][$i]=$row["RoomNum"];
				$arr["Dept_name"][$i]=$row["Dept_name"];
				$i++;
			}
			return $arr;

		}

		public function show_year(){
			$sql="SELECT  cost.year, cost.Salary, cost.Utility, cost.Equipment, bill.Doctors, ";
			$sql.="bill.Medicine, bill.Diagonosis from cost, bill WHERE cost.year=bill.year";
			$result=$this->perform_query($sql);
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["year"][$i]=$row["year"];
				$arr["Salary"][$i]=$row["Salary"];
				$arr["Utility"][$i]=$row["Utility"];
				$arr["Equipment"][$i]=$row["Equipment"];
				$arr["Doctors"][$i]=$row["Doctors"];
				$arr["Medicine"][$i]=$row["Medicine"];
				$arr["Diagonosis"][$i]=$row["Diagonosis"];
				$i++;
			}
			return $arr;
		}

		public function search_by_specialization($DID){
			$sql="SELECT Employee.EID, Employee.Name, Employee.Degree, Employee.Address, ";
				$sql.="Employee.PhoneNo, Employee.Salary, Employee.Gender, Doctor.RoomNum, Department.Dept_name ";
				$sql.="from Employee, Doctor,  Department where "; 
				$sql.="Employee.EID=Doctor.idDoctor and Doctor.Specialization=Department.DID"; 
				$sql.=" and Department.DID=Doctor.specialization and Department.DID={$DID} order by Employee.EID";
			$result=$this->perform_query($sql);
				$arr=array();
			$i=0;

			if(!isset($_SESSION["id"])){
				while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["Address"][$i]=$row["Address"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Gender"][$i]=$row["Gender"];
				$arr["RoomNum"][$i]=$row["RoomNum"];
				$arr["Dept_name"][$i]=$row["Dept_name"];
				$i++;
			}

			}

			else{

			while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["Address"][$i]=$row["Address"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Salary"][$i]=$row["Salary"];
				$arr["Gender"][$i]=$row["Gender"];
				$arr["RoomNum"][$i]=$row["RoomNum"];
				$arr["Dept_name"][$i]=$row["Dept_name"];
				$i++;
			}

			
			}
			return $arr;

		}//End of search by doctor
		public function search_all_employee($name){
			$sql="SELECT * FROM employee where Name like '%$name%'";
			$result=$this->perform_query($sql);
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["EID"][$i]=$row["EID"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Degree"][$i]=$row["Degree"];
				$arr["Address"][$i]=$row["Address"];
				$arr["PhoneNo"][$i]=$row["PhoneNo"];
				$arr["Gender"][$i]=$row["Gender"];
				$i++;
			}
			return $arr;
			
			
		}//End of search all employee

		public function get_nur($PID){
			$sql="SELECT Employee.EID from Employee, Serves where ";
			$sql.="Serves.Serves_P='{$PID}' AND Employee.EID=Serves.Serves_N";
			
			$result=$this->perform_query($sql);
			$result=$this->fetch_result($result);
			$nur=$result['EID'];
			return $nur;
		}

		public function fileshr($sid,$PID,$location){
			
			$nur=$this->get_nur($PID);
			$sql="INSERT into shareFiles values('','{$location}', '{$sid}', ";
			$sql.="'{$nur}', '{$PID}')";
			$result=$this->perform_query($sql);

			return true;
			
		}


		public function show_admitted_patients_by_Docshr(){
			$sid=$_SESSION["id"];
			//$sid="DOC-001";
			$sql="SELECT Patient.PID, Patient.Name as PName, Patient.Sex, Patient.Disease, Patient.Phone, "; 
			$sql.="employee.Name, admitted_patient.Ad_Date, admitted_patient.Rel_Date, "; 
			$sql.="admitted_patient.Word_No, shareFiles.location ";
			$sql.="from treats, Patient, Employee, admitted_patient, reciptionist, shareFiles "; 
			$sql.="where patient.PID=treats.T_Patient and "; 
			$sql.="patient.PID=admitted_patient.idAdmitted_Patient ";
			$sql.="AND treats.T_DOCID='{$sid}' AND shareFiles.doc='{$sid}' and  ";
			$sql.="Patient.idServedRecep=Reciptionist.idReciptionist and patient.PID=shareFiles.pat AND"; 
			$sql.=" employee.EID=Reciptionist.idReciptionist GROUP BY PID";
			$result=$this->perform_query($sql);
			
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["PID"][$i]=$row["PID"];
				$arr["PName"][$i]=$row["PName"];
				$arr["Sex"][$i]=$row["Sex"];
				$arr["Disease"][$i]=$row["Disease"];
				$arr["Phone"][$i]=$row["Phone"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Ad_Date"][$i]=$row["Ad_Date"];
				$arr["Rel_Date"][$i]=$row["Rel_Date"];
				$arr["Word_No"][$i]=$row["Word_No"];
				$arr["location"][$i]=$row["location"];
				$i++;
			}
			
			return $arr;

		}// End of show admitted pats of a doc


		public function show_Nonadmitted_patients_by_Docshr(){
			$sid=$_SESSION["id"];
			//$sid="DOC-004";
			$sql="SELECT Patient.PID, Patient.Name as PName, Patient.Sex, Patient.Disease, Patient.Phone, "; 
			$sql.="employee.Name, non_admitted.visit_date,shareFiles.location ";
            $sql.="from treats, Patient, Employee, Non_Admitted, reciptionist, shareFiles "; 
			$sql.="where patient.PID=treats.T_Patient and patient.PID=non_admitted.idNon_Admitted "; 
			$sql.="AND treats.T_DOCID='{$sid}' AND shareFiles.doc='{$sid}' and ";
			$sql.="Patient.idServedRecep=Reciptionist.idReciptionist and patient.PID=shareFiles.pat AND"; 
			$sql.=" employee.EID=Reciptionist.idReciptionist GROUP BY PID";
			$result=$this->perform_query($sql);
			
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["PID"][$i]=$row["PID"];
				$arr["PName"][$i]=$row["PName"];
				$arr["Sex"][$i]=$row["Sex"];
				$arr["Disease"][$i]=$row["Disease"];
				$arr["Phone"][$i]=$row["Phone"];
				$arr["Name"][$i]=$row["Name"];
				$arr["visit_date"][$i]=$row["visit_date"];
				$arr["location"][$i]=$row["location"];
				$i++;
			}
			
			return $arr;

		}// End of show non-admitted pats of a doc

		public function show_admitted_patients_by_Nurse(){
			$sid=$_SESSION["id"];
			//$sid="DOC-001";
			$sql="SELECT Patient.PID, Patient.Name as PName, Patient.Sex, Patient.Disease, Patient.Phone, "; 
			$sql.="employee.Name, admitted_patient.Ad_Date, admitted_patient.Rel_Date, "; 
			$sql.="admitted_patient.Word_No, shareFiles.location ";
			$sql.="from serves, Patient, Employee, admitted_patient, reciptionist, shareFiles "; 
			$sql.="where patient.PID=serves.Serves_P and "; 
			$sql.="patient.PID=admitted_patient.idAdmitted_Patient ";
			$sql.="AND serves.Serves_N='{$sid}' AND shareFiles.nur='{$sid}' and ";
			$sql.="Patient.idServedRecep=Reciptionist.idReciptionist and  shareFiles.pat=patient.PID"; 
			$sql.=" and employee.EID=Reciptionist.idReciptionist GROUP BY PID";
			$result=$this->perform_query($sql);
			
			$arr=array();
			$i=0;

			while($row=mysqli_fetch_assoc($result)){
				$arr["PID"][$i]=$row["PID"];
				$arr["PName"][$i]=$row["PName"];
				$arr["Sex"][$i]=$row["Sex"];
				$arr["Disease"][$i]=$row["Disease"];
				$arr["Phone"][$i]=$row["Phone"];
				$arr["Name"][$i]=$row["Name"];
				$arr["Ad_Date"][$i]=$row["Ad_Date"];
				$arr["Rel_Date"][$i]=$row["Rel_Date"];
				$arr["Word_No"][$i]=$row["Word_No"];
				$arr["location"][$i]=$row["location"];
				$i++;
			}
			
			return $arr;

		}// End of show admitted pats of a doc



	}// End of the class



	// Now it is time to instantiate database class

	$database=new dbClass();
	//$var=$database->add_anyone("DOC-780","saad","secret","FCPS","Dhanmondi,Dhaka","019278478","10000","Male","302","101","3","MS Word","Cleaner");
    // $var;

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE); 

 ?>