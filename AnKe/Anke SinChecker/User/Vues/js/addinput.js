$(document).ready(function()
			  {
			  $("#langue_maternelle").change(function()
	{
		if($(this).val() == "langue_maternelle~Autre")
	{
		$("#Autre15857").show();
		$("#Autre15857").prop('required',true);
	}
	else
	{
		$("#Autre15857").hide();
		$("#Autre15857").prop('required', false);
	}
		});
				  $("#Autre15857").hide();
	});
						

$(document).ready(function()
				  {
				  $("#apprenant").change(function()
		{
			if($(this).val() == "apprenant~Autre")
		{
			$("#Autre29102").show();
			$("#Autre29102").prop('required',true);
		}
		else
		{
			$("#Autre29102").hide();
			$("#Autre29102").prop('required', false);
		}
			});
					  $("#Autre29102").hide();
					 
				
				
		});	  

$(document).ready(function()
				  {	
$("input[type='radio']").change(function(){

	   if($(this).val()=="etablissement~école")
	   {
		  $("#ecole1").show();
		  $("#ecole1").prop('required',true);
	   }
	   else
	   {
		   $("#ecole1").hide(); 
		     $("#ecole1").prop('required',false);
	   }
          			
		});		$("#ecole1").hide(); 
   });	 


$(document).ready(function()
				  {								
$("input[type='radio']").change(function(){

	   if($(this).val()=="etablissement~université")
	   {
		  $("#université1").show();
		  $("#université1").prop('required',true);
	   }
	   else
	   {
		   $("#université1").hide(); 
		   $("#université1").prop('required',false);
	   }
        
		});			 $("#université1").hide();		

});	  

$(document).ready(function()
				  {
				  $("#autre_cadre").change(function()
		{
			if($(this).val() == "Autre")
		{
			$("#Autre15116").show();
			$("#Autre15116").prop('required',true);
		}
		else
		{
			$("#Autre15116").hide();
			$("#Autre15116").prop('required', false);
		}
			});
					  $("#Autre15116").hide();
					 
				
				
		});	  
		
$(document).ready(function()
				  {
				  $("#certifie").change(function()
		{
			if($(this).val() == "certifie~Autre")
		{
			$("#Autre265").show();
			$("#Autre265").prop('required',true);
		}
		else
		{
			$("#Autre265").hide();
			$("#Autre265").prop('required', false);
		}
			});
					  $("#Autre265").hide();
					 
				
				
		});	 
		
		 
/*$(document).ready(function()
				  {
				  $("#titulaire_capes").change(function()
		{
			if($(this).val() == "Année")
		{
			$("#Année9413").show();
			$("#Année9413").prop('required',true);
		}
		else
		{
			$("#Année9413").hide();
			$("#Année9413").prop('required', false);
		}
			});
					  $("#Année9413").hide();
					 
				
				
		});	  */

$(document).ready(function()
				  {								
$("input[type='radio']").change(function(){

	   if($(this).val()=="capes_interne")
	   {
		  $("#Année9413").show();
			$("#Année9413").prop('required',true);
	   }
	   else
	   {
		   $("#Année9413").hide();
			$("#Année9413").prop('required', false);
	   }
        
		});			 $("#Année9413").hide();		

});	  

$(document).ready(function()
				  {								
$("input[type='radio']").change(function(){

	   if($(this).val()=="capes_externe")
	   {
		  $("#Année9414").show();
			$("#Année9414").prop('required',true);
	   }
	   else
	   {
		   $("#Année9414").hide();
			$("#Année9414").prop('required', false);
	   }
        
		});			 $("#Année9414").hide();		

});	 

$(document).ready(function()
				  {								
$("input[type='radio']").change(function(){

	   if($(this).val()=="capet_interne")
	   {
		  $("#Année18497").show();
			$("#Année18497").prop('required',true);
	   }
	   else
	   {
		   $("#Année18497").hide();
			$("#Année18497").prop('required', false);
	   }
        
		});			 $("#Année18497").hide();		

});	  

$(document).ready(function()
				  {								
$("input[type='radio']").change(function(){

	   if($(this).val()=="capet_externe")
	   {
		  $("#Année18498").show();
			$("#Année18498").prop('required',true);
	   }
	   else
	   {
		   $("#Année18498").hide();
			$("#Année18498").prop('required', false);
	   }
        
		});			 $("#Année18498").hide();		

});	  

$(document).ready(function()
				  {								
$("input[type='radio']").change(function(){

	   if($(this).val()=="autre_etablissement~Oui")
	   {
		  $("#etablissement_secondaire_1").show();
			$("#etablissement_secondaire_1").prop('required',true);
	   }
	   else
	   {
		   $("#etablissement_secondaire_1").hide();
			$("#etablissement_secondaire_1").prop('required', false);
	   }
        
		});			 $("#etablissement_secondaire_1").hide();		

});	  

$(document).ready(function()
				  {								
$("input[type='radio']").change(function(){

	   if($(this).val()=="oui_contrat_doctoral")
	   {
		  $("#discipline").show();
			$("#discipline").prop('required',true);
	   }
	   else
	   {
		   $("#discipline").hide();
			$("#discipline").prop('required', false);
	   }
        
		});			 $("#discipline").hide();		

});	

  
$(document).ready(function()
				  {								
$("input[type='radio']").change(function(){

	   if($(this).val()=="poste_universitaire~maitre de conferences")
	   {
		  $("#discipline1").show();
			$("#discipline1").prop('required',true);
	   }
	   else
	   {
		   $("#discipline1").hide();
			$("#discipline1").prop('required', false);
	   }
        
		});			 $("#discipline1").hide();		

});	  
$(document).ready(function()
				  {			
$("input[type='radio']").change(function(){

	   if($(this).val()=="poste_universitaire~HDR")
	   {
		  $("#discipline2").show();
			$("#discipline2").prop('required',true);
	   }
	   else
	   {
		   $("#discipline2").hide();
			$("#discipline2").prop('required', false);
	   }
        
		});			 $("#discipline2").hide();		

});	  


$(document).ready(function()
				  {
				  $("#chercheur_independant").change(function()
		{
			if($(this).val() == "chercheur_independant~Autre")
		{
			$("#Autre27993").show();
			$("#Autre27993").prop('required',true);
		}
		else
		{
			$("#Autre27993").hide();
			$("#Autre27993").prop('required', false);
		}
			});
					  $("#Autre27993").hide();
					 
				
				
		});	  
		
		
$(document).ready(function()
				  {			
$("input[type='radio']").change(function(){

	   if($(this).val()=="publication_anke~j’accepte")
	   {
		  $("#engagement").show();
			$("#engagement").prop('required',true);
	   }
	   else
	   {
		   $("#engagement").hide();
			$("#engagement").prop('required', false);
	   }
        
		});			 $("#engagement").hide();		

});	  

