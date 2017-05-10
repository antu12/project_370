document.querySelector("#empType").addEventListener("change", partial, true);

  function partial(){
    var parID=document.querySelector("#empType").value;
    document.querySelector("#id").value=parID+"-";
  }



 function showFunction(){
    document.getElementById("dele").style.display = "none";
    document.getElementById("docb").style.display = "inline-block";
    document.getElementById("nurb").style.display = "inline-block";
    document.getElementById("patb").style.display = "inline-block";
    document.getElementById("repb").style.display = "inline-block";
    document.getElementById("othb").style.display = "inline-block";
    document.getElementById("addEmpForm").style.display = "none";
    document.getElementById("budgetCost").style.display = "none";
    document.getElementById("adp").style.display = "none";
    document.getElementById("nnp").style.display = "none";
    document.getElementById("admittable").style.display = "none";
    document.getElementById("nontable").style.display = "none";

    
   }

   //show function shesh

	function docFunction(){
        
    	document.getElementById("Doctor").style.display = "inline-block";
    	document.getElementById("Nurse").style.display = "none";
    	document.getElementById("Patient").style.display = "none";
    	document.getElementById("Reciptionist").style.display = "none";
    	document.getElementById("Others").style.display = "none";
        document.getElementById("admittable").style.display = "none";
        document.getElementById("nontable").style.display = "none";
        document.getElementById("adp").style.display = "none";
        document.getElementById("nnp").style.display = "none";
	}

    function del(){
        document.getElementById("dele").style.display = "inline-block";
        document.getElementById("Doctor").style.display = "none";
        document.getElementById("Nurse").style.display = "none";
        document.getElementById("Patient").style.display = "none";
        document.getElementById("Reciptionist").style.display = "none";
        document.getElementById("Others").style.display = "none";
        document.getElementById("admittable").style.display = "none";
        document.getElementById("nontable").style.display = "none";
        document.getElementById("adp").style.display = "none";
        document.getElementById("nnp").style.display = "none";
    }

	function nurFunction(){
        document.getElementById("adp").style.display = "none";
        document.getElementById("nnp").style.display = "none";
		document.getElementById("Nurse").style.display = "inline-block";
		document.getElementById("Doctor").style.display = "none";
		document.getElementById("Patient").style.display = "none";
		document.getElementById("Reciptionist").style.display = "none";
		document.getElementById("Others").style.display = "none";
        document.getElementById("admittable").style.display = "none";
        document.getElementById("nontable").style.display = "none";
    }

	function patFunction(){
		document.getElementById("adp").style.display = "inline-block";
        document.getElementById("nnp").style.display = "inline-block";
        document.getElementById("Reciptionist").style.display = "none";
		document.getElementById("Nurse").style.display = "none";
		document.getElementById("Doctor").style.display = "none";
		document.getElementById("Others").style.display = "none";
        document.getElementById("admittable").style.display = "none";
        document.getElementById("nontable").style.display = "none";
	}

  function adpFunction(){
    document.getElementById("admittable").style.display = "inline-block";
    document.getElementById("nontable").style.display = "none";
  }

  function nnpFunction(){
    document.getElementById("nontable").style.display = "inline-block";
    document.getElementById("admittable").style.display = "none";
  }

	function repFunction(){
    document.getElementById("Reciptionist").style.display = "inline-block";
    document.getElementById("adp").style.display = "none";
    document.getElementById("nnp").style.display = "none";
		document.getElementById("Patient").style.display = "none";
		document.getElementById("Nurse").style.display = "none";
		document.getElementById("Doctor").style.display = "none";
		document.getElementById("Others").style.display = "none";
    document.getElementById("admittable").style.display = "none";
    document.getElementById("nontable").style.display = "none";
	}

	function othFunction(){
    document.getElementById("Others").style.display = "inline-block";
    document.getElementById("adp").style.display = "none";
    document.getElementById("nnp").style.display = "none";
    document.getElementById("Reciptionist").style.display = "none";
    document.getElementById("Patient").style.display = "none";
		document.getElementById("Nurse").style.display = "none";
		document.getElementById("Doctor").style.display = "none";
    document.getElementById("admittable").style.display = "none";
    document.getElementById("nontable").style.display = "none";
   }


   //Add Employee func
   function addFunction(){
    document.getElementById("addEmpForm").style.display = "inline-block";
    document.getElementById("dele").style.display = "none";
    document.getElementById("budgetCost").style.display = "none";
    document.getElementById("docb").style.display = "none";
    document.getElementById("nurb").style.display = "none";
    document.getElementById("patb").style.display = "none";
    document.getElementById("repb").style.display = "none";
    document.getElementById("othb").style.display = "none";
    document.getElementById("adp").style.display = "none";
    document.getElementById("nnp").style.display = "none";
    document.getElementById("Reciptionist").style.display = "none";
    document.getElementById("admittable").style.display = "none";
    document.getElementById("nontable").style.display = "none";
    document.getElementById("Patient").style.display = "none";
    document.getElementById("Nurse").style.display = "none";
    document.getElementById("Doctor").style.display = "none";
    document.getElementById("Others").style.display = "none";
    document.getElementById("adp").style.display = "none";
    document.getElementById("nnp").style.display = "none";
   }//addfunction ends

   

   //budget & Cost 

   function budgetFunction(){
    document.getElementById("budgetCost").style.display = "inline-block";
    document.getElementById("dele").style.display = "none";
    document.getElementById("addEmpForm").style.display = "none";
    document.getElementById("docb").style.display = "none";
    document.getElementById("nurb").style.display = "none";
    document.getElementById("patb").style.display = "none";
    document.getElementById("repb").style.display = "none";
    document.getElementById("othb").style.display = "none";
    document.getElementById("adp").style.display = "none";
    document.getElementById("nnp").style.display = "none";
    document.getElementById("Reciptionist").style.display = "none";
    document.getElementById("admittable").style.display = "none";
    document.getElementById("nontable").style.display = "none";
    document.getElementById("Patient").style.display = "none";
    document.getElementById("Nurse").style.display = "none";
    document.getElementById("Doctor").style.display = "none";
    document.getElementById("Others").style.display = "none";
   }

   function refresh(){
    document.getElementById("budgetCost").style.display = "none";
    document.getElementById("addEmpForm").style.display = "none";
    document.getElementById("docb").style.display = "none";
    document.getElementById("nurb").style.display = "none";
    document.getElementById("patb").style.display = "none";
    document.getElementById("repb").style.display = "none";
    document.getElementById("othb").style.display = "none";
    document.getElementById("adp").style.display = "none";
    document.getElementById("nnp").style.display = "none";
    document.getElementById("Reciptionist").style.display = "none";
    document.getElementById("admittable").style.display = "none";
    document.getElementById("nontable").style.display = "none";
    document.getElementById("Patient").style.display = "none";
    document.getElementById("Nurse").style.display = "none";
    document.getElementById("Doctor").style.display = "none";
    document.getElementById("Others").style.display = "none";
   }