<?php
	// This file is the place to store all basic functions
   
	// function mysqli_prep( $value ) {
	// 	$magic_quotes_active = get_magic_quotes_gpc();
	// 	$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
	// 	if( $new_enough_php ) { // PHP v4.3.0 or higher
	// 		// undo any magic quote effects so mysql_real_escape_string can do the work
	// 		if( $magic_quotes_active ) { $value = stripslashes( $value ); }
	// 		$value = mysqli_real_escape_string($connection,$value );
	// 	} else { // before PHP v4.3.0
	// 		// if magic quotes aren't already on then add slashes manually
	// 		if( !$magic_quotes_active ) { $value = addslashes( $value ); }
	// 		// if magic quotes are active, then the slashes already exist
	// 	}
	// 	return $value;
	// }

	function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}

	function getListOfAdmins($tblname){
		global $connection;

		$query = "SELECT * FROM $tblname";
		$query_field = mysqli_query($connection, $query);
		while ($query_fiel = mysqli_fetch_array($query_field)) {
         $fullname = $query_fiel['fullname'];
        echo  "<option value=\"$fullname\">" . $fullname  . "<option>";

        		
		}

		//return $fullname;
 	
	}

	function analyse_matric_no($matric_no) {
		//dfghj

	}
	function get_total_no_of_table($tablename){
	  global $connection;
	  
	  $query = mysqli_query($connection, "select * from $tablename");
	  $a =0;
	  while($row = mysqli_fetch_array($query)){
       $a++;
	  }	
	  return $a;
	}
	
	function admin_messages($tbname){
	  global $connection;
	  
	  $query = mysqli_query($connection, "select * from $tbname WHERE messageto ='admin'");
	  $a =0;
	  while($row = mysqli_fetch_array($query)){
       $a++;
	  }	
	  return $a;
	}

	function query_db($dbname){
	  global $connection;
	  
	  $query = mysqli_query($connection, "select * from $dbname WHERE messageto ='admin'");
		while ($row = mysqli_fetch_array($query)){
			//f
			echo $row['fullname']."  ".$row['message']."<br /><br />"; 
	}
	return $row;
}
	function staff_db($dbname){
	  global $connection;
	  
	  $query = mysqli_query($connection, "select * from $dbname");
		while ($row = mysqli_fetch_array($query)){
			//f
			//echo $row['title']."  ".$row['firstname']."  ".$row['firstname']."<br /><br />"; 
			echo "<table><tr><td>".$row['title']."</td><td>".$row['firstname']."</td><td>".$row['lastname']."</td></tr></table>";
	}
	return $row;
}
	function student_db($dbname){
	  global $connection;
	  
	  $query = mysqli_query($connection, "select * from $dbname");
		while ($row = mysqli_fetch_array($query)){
			//f
			//echo $row['title']."  ".$row['firstname']."  ".$row['firstname']."<br /><br />"; 
			echo $row['fullname']."     ".$row['username']."     ".$row['matric_no']."     ".$row['email']."<br /><br />"; 
	}
	return $row;
}
	function question_db(){
	  global $connection;
	  
	  $query = mysqli_query($connection, "select * from question");

      $storearray_question = array();
      $storearray_id = array();
	  $a=0;
		while ($row = mysqli_fetch_array($query)){
			$storearray_question[$a] = $row['question'];
			$storearray_id[$a] = $row['id'];
			$a++;
		}
	    for ($i=0; $i < count($storearray_id);  $i++) {
	    	echo $storearray_question[$i]  . "<br/>";
	      $query = mysqli_query($connection, "select * from solution where question_id = $storearray_id[$i]");
	    	while ($row = mysqli_fetch_array($query)){
				//echo $row['title']."  ".$row['firstname']."  ".$row['firstname']."<br /><br />"; 
				echo $row['solution']."<br /><br />"; 
		}
	    }
}


function submit_question($question){
	global $connection;

       // checking for dynamic hod of students 
         similar_text($question, 'who is my hod', $percent);
        if($percent >= 85){
        	$student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$department_id = $row['department_id'];
        	}

        	$query =mysqli_query($connection, "select * from department where id=$department_id");
        	while($row =  mysqli_fetch_array($query)){
        		$result = $row['hod'];
                $picture = $row['hod_picture'];
        	}
        	$reply = $result."<br><img src=".$picture." width='150px' height='100px'>";

        }

        similar_text($question, 'my hod name', $percent);
        if($percent >= 80){
        	$student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$department_id = $row['department_id'];
        	}

        	$query =mysqli_query($connection, "select * from department where id=$department_id");
        	while($row =  mysqli_fetch_array($query)){
        		$result = $row['hod'];
        	}
        	$reply = $result;

        }


         similar_text($question, 'show me my result', $percent);
        if($percent >= 85){
        	$reply = "<a href='result.php'>click here to see your result</a>";
        	}



        similar_text($question, 'see my result', $percent);
        if($percent >= 85){
        	$student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");

        	while ($row = mysqli_fetch_array($query)) {
        		$student_id = $row['id'];
        		$department_id = $row['department_id'];
        		$program_id = $row['program_id'];
        	
        		echo "<b>MATRIC NUMBER : ".$student_mat_no  = strtoupper($row['matric_no'])."</b><br>";
        		echo "<b>FULLNAME : ".$student_name  = strtoupper($row['name'])."</b><br>";
        	}

        		$query =mysqli_query($connection, "select * from department where id=$department_id");
        	while($row =  mysqli_fetch_array($query)){
        		$dept_name = strtoupper($row['name']);

        		echo "<b>DEPARTMENT : ". $dept_name."</b><br>";


        	}

        	$query =mysqli_query($connection, "select * from program where id=$program_id");
        	while($row =  mysqli_fetch_array($query)){
        		$prog_name =strtoupper($row['name']);

        		echo "<b>PROGRAMME : ". $prog_name ."</b><br>";


        	}

        	$query =mysqli_query($connection, "select * from student where id=$student_id");
        	while($row =  mysqli_fetch_array($query)){
        		$level = strtoupper($row['level']);

        		echo "<b>LEVEL : ". $level."</b><br>";

        	}

        		

        	$query =mysqli_query($connection, "select * from result where student_id=$student_id && semester_id=1");
        	$a=0;
        	$n=mysqli_num_rows($query);?>
            <table style="text-align: center;" border="1" width="80%">
             <thead>
                 <th>Course Code</th>
                 <th>Course Title</th>
                  <th>Course unit</th>
                 <th>Grade</th>
             </thead>
             <tbody>
                <?php
         	      while($row =  mysqli_fetch_assoc($query)){ 
                  $result = "<tr><td ><i>" . $row['course_code'] ."</i></td><td> " . $row['course_title']."</td><td>" . $row['course_unit']  ."</td><td>" . $row['grade'] . "</td></tr>";
        	       echo $result;
                	}
                	?>
             </tbody>
             </table>
            <?php }



            similar_text($question, 'show me my statement of Result', $percent);
        if($percent >= 85){
            $reply = "<a href='transcript.php'>click here to see your transcript</a>";
            }



        similar_text($question, 'see my transcript', $percent);


        if($percent >= 85){

         

            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from student where id=$student_id");

            while ($row = mysqli_fetch_array($query)) {
                $student_id = $row['id'];
                $department_id = $row['department_id'];
                $program_id = $row['program_id'];
            
                echo "<b>MATRIC NUMBER : ".$student_mat_no  = strtoupper($row['matric_no'])."</b><br>";
                echo "<b>FULLNAME : ".$student_name  = strtoupper($row['name'])."</b><br>";
            }

                $query =mysqli_query($connection, "select * from department where id=$department_id");
            while($row =  mysqli_fetch_array($query)){
                $dept_name = strtoupper($row['name']);

                echo "<b>DEPARTMENT : ". $dept_name."</b><br>";

            }

            $query =mysqli_query($connection, "select * from program where id=$program_id");
            while($row =  mysqli_fetch_array($query)){
                $prog_name =strtoupper($row['name']);

                echo "<b>PROGRAMME : ". $prog_name ."</b><br>";
            }

            $query =mysqli_query($connection, "select * from student where id=$student_id");
            while($row =  mysqli_fetch_array($query)){
                $level = strtoupper($row['level']);

                echo "<b>LEVEL : ". $level."</b><br>";

            }

            $query =mysqli_query($connection, "select * from result where student_id=$student_id && semester_id=1");
            $a=0;
            $n=mysqli_num_rows($query);?>
            <table style="text-align: center;" border="1" width="80%">
             <thead>
                 <th>Course Code</th>
                 <th>Course Title</th>
                  <th>Course unit</th>
                  <th>Scores</th>
                 <th>Grade</th>
             </thead>
             <tbody>
                <?php
                  while($row =  mysqli_fetch_assoc($query)){ 
                  $result = "<tr><td ><i>" . $row['course_code'] ."</i></td><td> " . $row['course_title']."</td><td>" . $row['course_unit']  ."</td><td>" .$row['score']."</td><td>". $row['grade'] ."</td></tr>";
                   echo $result;
                    }
                    ?>
             </tbody>
             </table>
            <?php }

        

        similar_text($question, 'who is the hod of my department', $percent);
        if($percent >= 85){
        	$student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$department_id = $row['department_id'];
        	}

        	$query =mysqli_query($connection, "select * from department where id=$department_id");
        	while($row =  mysqli_fetch_array($query)){
        		$result = $row['hod'];
        	}
        	$reply = $result;

        }


        similar_text($question, 'who is the hod of chemical sciences department', $percent);
        if($percent >= 85){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from student");
            while ($row = mysqli_fetch_array($query)) {
                $faculty_id = $row['faculty_id'];
            }

            $query =mysqli_query($connection, "select * from department where faculty_id=$faculty_id && id=3");
            while($row =  mysqli_fetch_array($query)){
                $result = $row['hod'];
                $picture = $row['hod_picture'];

            }
            $reply = $result."<br><img src=".$picture." width='150px' height='100px'>";

        }


        similar_text($question, 'who is the hod of physical sciences department', $percent);
        if($percent >= 85){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from student");
            while ($row = mysqli_fetch_array($query)) {
                $faculty_id = $row['faculty_id'];
            }

            $query =mysqli_query($connection, "select * from department where faculty_id=$faculty_id && id=2 ");
            while($row =  mysqli_fetch_array($query)){
                $result = $row['hod'];
                $picture = $row['hod_picture'];

            }
            $reply = $result."<br><img src=".$picture." width='150px' height='100px'>";

        }

        similar_text($question, 'who is the hod of biological sciences department', $percent);
        if($percent >= 85){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from student");
            while ($row = mysqli_fetch_array($query)) {
                $faculty_id = $row['faculty_id'];
            }

            $query =mysqli_query($connection, "select * from department where faculty_id=$faculty_id && id=4 ");
            while($row =  mysqli_fetch_array($query)){
                $result = $row['hod'];
                $picture = $row['hod_picture'];

            }
            $reply = $result."<br><img src=".$picture." width='150px' height='100px'>";

        }


        similar_text($question, 'who is the hod of mathematical sciences department', $percent);
        if($percent >= 85){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from student");
            while ($row = mysqli_fetch_array($query)) {
                $faculty_id = $row['faculty_id'];
            }

            $query =mysqli_query($connection, "select * from department where faculty_id=$faculty_id && id=1");
            while($row =  mysqli_fetch_array($query)){
                $result = $row['hod'];
                $picture = $row['hod_picture'];

            }
            $reply = $result."<br><img src=".$picture." width='150px' height='100px'>";

        }

        similar_text($question, 'how many programs are in my department', $percent);
        if($percent >= 85){
        	$student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$program_id = $row['program_id'];
        	}

        	$query =mysqli_query($connection, "select * from program where department_id=$program_id");
        	
        	$a=0;
        	while($row =  mysqli_fetch_array($query)){
        		$a++;
        	}
        	$reply = "There are ".$a." program in your department";

        }

        similar_text($question, 'lecturer in charge of csc301', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 301'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc311', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 311'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc302', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 302'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc312', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 312'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc303', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 303'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc313', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 313'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }


        similar_text($question, 'lecturer in charge of csc304', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 304'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc314', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 314'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc305', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 305'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc315', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 315'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc306', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 306'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc316', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 316'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }


        similar_text($question, 'lecturer in charge of csc307', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 307'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }


        similar_text($question, 'lecturer in charge of csc317', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 317'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc308', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 308'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc318', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 318'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }

        similar_text($question, 'lecturer in charge of csc309', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 309'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }


        similar_text($question, 'lecturer in charge of csc319', $percent);
        if($percent >= 98){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from result where course_code='CSC 319'");
            $row = mysqli_fetch_array($query);
                $staff_id = $row['staff_id'];
            

            $query =mysqli_query($connection, "select * from staff where id = $staff_id");
            $row =  mysqli_fetch_array($query);
                $title = $row['title'];
                $lastname = $row['lastname']; 
                $firstname = $row['firstname'];
            
            $reply = $title." ".$lastname." ".$firstname ;

        }




        similar_text($question, 'how many departments are in my faculty', $percent);
        if($percent >= 85){
        	$student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$department_id = $row['department_id'];
        	}

        	$query =mysqli_query($connection, "select * from program where faculty_id=$department_id");
        	
        	$a=0;
        	while($row =  mysqli_fetch_array($query)){
        		$a++;
        	}
        	$reply ="There are ".$a." department in your faculty";

        }
        	

        similar_text($question, 'how many students are in my program', $percent);
        if($percent >= 65){
        	$student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	

        	while ($row = mysqli_fetch_array($query)) {
        		$program_id = $row['program_id'];
        	}

        	$query =mysqli_query($connection, "select * from student where program_id=$program_id");
        	
        	$a=0;
        	while($row =  mysqli_fetch_array($query)){
        		$a++;
        	}
        	$reply = "There are ".$a." students in your Program";

        }

        similar_text($question, 'how many students are in my level', $percent);
        if($percent >= 65){
            $student_id = $_SESSION['student_id'];
            $query = mysqli_query($connection, "select * from student where id=$student_id");
            

            while ($row = mysqli_fetch_array($query)) {
                $level = $row['level'];
                $program_id = $row['program_id'];
            }

            $query =mysqli_query($connection, "select * from student where level=$level && program_id=$program_id");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in your level";

        }


        similar_text($question, 'how many students are in computer science 300L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='300' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Computer Science 300L";

        }


        similar_text($question, 'how many students are in computer science 200L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='200' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Computer Science 200L";

        }


        similar_text($question, 'how many students are in computer science 100L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='100' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Computer Science 100L";

        }


        similar_text($question, 'how many students are in computer science 400L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='400' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Computer Science 400L";

        }


        similar_text($question, 'how many students are in computer science 500L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='500' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Computer Science 500L";

        }


        similar_text($question, 'how many students are in mathematics 100L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='100' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Mathematics 100L";

        }

        similar_text($question, 'how many students are in mathematics 200L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='200' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Mathematics 200L";

        }


        similar_text($question, 'how many students are in mathematics 300L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='300' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Mathematics 400L";

        }

        similar_text($question, 'how many students are in mathematics 400L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='400' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Mathematics 400L";

        }

        similar_text($question, 'how many students are in mathematics 500L', $percent);
        if($percent >= 70){
            $student_id = $_SESSION['student_id'];

            $query =mysqli_query($connection, "select * from student where level='500' && program_id=1");
            
            $a=0;
            while($row =  mysqli_fetch_array($query)){
                $a++;
            }
            $reply = "There are ".$a." students in Mathematics 500L";

        }








        similar_text($question, 'how many students are in my department', $percent);
        if($percent >= 86){
        	$student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	

        	while ($row = mysqli_fetch_array($query)) {
        		$department_id = $row['department_id'];
        	}

        	$query =mysqli_query($connection, "select * from student where department_id=$department_id");
        	
        	$a=0;
        	while($row =  mysqli_fetch_array($query)){
        		$a++;
        	}
        	$reply = "The total number of students in your department is ". $a;

        }




        similar_text($question, 'who is my dean', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$faculty_id = $row['faculty_id'];
        	}

        	$query =mysqli_query($connection, "select * from faculty where id=$faculty_id");
        	while($row =  mysqli_fetch_array($query)){
        		$result = $row['dean'];
        	}
        	$reply = $result;

        }



        similar_text($question, 'my dean name', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$faculty_id = $row['faculty_id'];
        	}

        	$query =mysqli_query($connection, "select * from faculty where id=$faculty_id");
        	while($row =  mysqli_fetch_array($query)){
        		$result = $row['dean'];
        	}
        	$reply = $result;

        }


        similar_text($question, 'my name', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$result = $row['name'];
        	}

        	$reply = $result;

        }


        similar_text($question, 'my matric number', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$result = $row['matric_no'];
        	}

        	$reply = $result;

        }



        similar_text($question, 'my matric no', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$result = $row['matric_no'];
        	}
        	$reply = $result;
        }

        similar_text($question, 'who is my staff adviser', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($check = mysqli_fetch_array($query)) {
        		 $level = $check['level'];
        		 $program_id = $check['program_id'];
        	}

        	$query =mysqli_query($connection, "select * from staff_adviser where program_id=$program_id && level=$level");
        	while($row =  mysqli_fetch_array($query)){
        		$result =  $row['staff_name'];
        	 }
        	   $reply =  $result;
        }

        similar_text($question, 'my department name', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$department_id = $row['department_id'];
        	}

        	$query =mysqli_query($connection, "select * from department where id=$department_id");
        	while($row =  mysqli_fetch_array($query)){
        		$result = $row['name'];
        	}
        	$reply = $result;
        }

        similar_text($question, 'my program name', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$program_id = $row['program_id'];
        	}

        	$query =mysqli_query($connection, "select * from program where id=$program_id");
        	while($row =  mysqli_fetch_array($query)){
        		$result = $row['name'];
        	}
        	$reply = "Program : ".$result;
        }

        similar_text($question, 'my faculty name', $percent);
        if($percent >= 85){
        	 $student_id = $_SESSION['student_id'];
        	$query = mysqli_query($connection, "select * from student where id=$student_id");
        	while ($row = mysqli_fetch_array($query)) {
        		$faculty_id = $row['faculty_id'];
        	}

        	$query =mysqli_query($connection, "select * from faculty where id=$faculty_id");
        	while($row =  mysqli_fetch_array($query)){
        		$result = $row['name'];
        	}
        	$reply = "Faculty of  ".$result;

        }


        similar_text($question, 'how many department do we have', $percent);
        if($percent >= 85){
        	
        	$query = mysqli_query($connection, "select * from department");
				  $a =0;
				  while($row = mysqli_fetch_array($query)){
				   $a++;
				  }	
				  $reply = "There are currently ".$a." departments in this institution";

        }


        similar_text($question, 'how many program do we have', $percent);
        if($percent >= 85){
        	
        	$query = mysqli_query($connection, "select * from program");
				  $a =0;
				  while($row = mysqli_fetch_array($query)){
				   $a++;
				  }	
				  $reply = "There are currently ".$a." programs in this institution";

        }



         similar_text($question, 'how many faculty do we have', $percent);
        if($percent >= 85){
        	
        	$query = mysqli_query($connection, "select * from faculty");
				  $a =0;
				  while($row = mysqli_fetch_array($query)){
				   $a++;
				  }	
				  $reply = "There are currently ".$a." faculty in this institution";

        }

        if(empty($reply)){
            //  select all qestions from database.
            $query = mysqli_query($connection, "select * from question");
            $a=0;
            $store_question_percent = array();
            $store_question = array();
            $store_question_id = array();
            // stores temin an array 
            while($row = mysqli_fetch_array($query)){
                $db_question = $row['question'];
                $question_id = $row['id'];

               similar_text($question, $db_question, $percent);
               $store_question_percent[$a] = $percent;
               $store_question[$a] = $db_question;
               $store_question_id[$a] = $question_id;

               $a++;
            }
               // search for the onewith higest priority or similarity.
               $highest =0;
              for ($i=0; $i < count($store_question_percent) ; $i++) { 
               if($highest < $store_question_percent[$i]){
                $highest = $store_question_percent[$i];
                $question_name =   $store_question[$i];
                $question_id =   $store_question_id[$i];
               }
              }
 
            if($highest > 50){
            $query =  mysqli_query($connection, "select * from solution where question_id=$question_id");
             while ($row =  mysqli_fetch_array($query)) {
               $solution =  $row['solution'];
             }
         }else{
            $solution = "Sorry i can answer that question would you love to speak with my boss <a href=\"message.php\"> Click Here</a>";
         }

              return $solution;
        } else{
            return $reply;
        }
        


        




	//$query = mysqli_query($connection, "insert into  chat (question, answer, user) values ()");
} 
?>