$(document).ready(function() {
    $('#personsTable').DataTable({
    	"scrollY": "100%",
        "scrollX": true
    });
} );

function loginTabsChange(evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}

function addInput(e, tabName, selectArray, selectArray2, selectArray3, selectArray4, selectArray5){
	var parent = document.getElementById(tabName)
	var innerText='';
	switch (tabName) {
	  case 'contactsTableBody':
	    innerText+='<tr><td><input name="contacts_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="contacts_account[]" type="varchar" placeholder="Account type" class="login-input-label" maxlength="40" list="contacts_account_list"><datalist id="contacts_account_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="contacts_account_id[]" type="varchar" placeholder="Account ID" class="login-input-label" size="20" maxlength="40"></td><td><input name="contacts_status[]" type="varchar" placeholder="Status" class="login-input-label" size="20" maxlength="40" list="contacts_status_list"><datalist id="contacts_status_list">'
	    for (i = 0; i < selectArray2.length; i++) {
		    innerText+="<option value='"+selectArray2[i]+"'>"
		}
		innerText+='</datalist></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	  case 'educationTableBody':
	    innerText+='<tr><td><input name="education_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="education_type[]" type="varchar" placeholder="Type" class="login-input-label" maxlength="40" list="education_type_list"><datalist id="education_type_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="education_institution[]" type="varchar" placeholder="Institution" class="login-input-label" size="20" maxlength="40" list="education_institution_list"><datalist id="education_institution_list">'
	    for (i = 0; i < selectArray2.length; i++) {
		    innerText+="<option value='"+selectArray2[i]+"'>"
		}
		innerText+='</datalist></td><td><input name="education_year_start[]" type="varchar" placeholder="Year start" class="login-input-label" size="20" maxlength="40"></td><td><input name="education_year_end[]" type="varchar" placeholder="Year end" class="login-input-label" size="20" maxlength="40"></td><td><input name="education_group[]" type="varchar" placeholder="Group" class="login-input-label" size="20" maxlength="40" list="education_group_list"><datalist id="education_group_list">'
	    for (i = 0; i < selectArray3.length; i++) {
		    innerText+="<option value='"+selectArray3[i]+"'>"
		}
		innerText+='</datalist></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	  case 'armyTableBody':
	    innerText+='<tr><td><input name="army_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="army_suitablility[]" type="varchar" placeholder="Suitability" class="login-input-label" size="20" maxlength="40"></td><td><input name="army_unit[]" type="varchar" placeholder="Unit" class="login-input-label" maxlength="40" list="army_unit_list"><datalist id="army_unit_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="army_year_start[]" type="varchar" placeholder="Year start" class="login-input-label" size="20" maxlength="40"></td><td><input name="army_year_end[]" type="varchar" placeholder="Year end" class="login-input-label" size="20" maxlength="40"></td><td><input name="army_rank[]" type="varchar" placeholder="Rank" class="login-input-label" size="20" maxlength="40" list="army_rank_list"><datalist id="army_rank_list">'
	    for (i = 0; i < selectArray2.length; i++) {
		    innerText+="<option value='"+selectArray2[i]+"'>"
		}
		innerText+='</datalist></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	  case 'workTableBody':
	    innerText+='<tr><td><input name="work_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="work_company[]" type="varchar" placeholder="Company" class="login-input-label" maxlength="40" list="work_company_list"><datalist id="work_company_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="work_post[]" type="varchar" placeholder="Post" class="login-input-label" maxlength="40" list="work_post_list"><datalist id="work_post_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="work_year_start[]" type="varchar" placeholder="Year start" class="login-input-label" size="20" maxlength="40"></td><td><input name="work_year_end[]" type="varchar" placeholder="Year end" class="login-input-label" size="20" maxlength="40"></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	  case 'relationshipTableBody':
	    innerText+='<tr><td><input name="relationship_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="relationship_person_1[]" type="varchar" placeholder="Person 1" class="login-input-label" maxlength="40" list="relationship_person_list"></td><td><input name="relationship_person_2[]" type="varchar" placeholder="Person 2" class="login-input-label" maxlength="40" list="relationship_person_list"></td><td><input name="relationship_relation_type[]" type="varchar" placeholder="Relation type" class="login-input-label" maxlength="40" list="relationship_relation_type_list"></td><td><input name="relationship_year_start[]" type="varchar" placeholder="Year start" class="login-input-label" size="10" maxlength="40"></td><td><input name="relationship_month_start[]" type="varchar" placeholder="Month start" class="login-input-label" size="10" maxlength="40"></td><td><input name="relationship_day_start[]" type="varchar" placeholder="Day start" class="login-input-label" size="10" maxlength="40"></td><td><input name="relationship_year_end[]" type="varchar" placeholder="Year end" class="login-input-label" size="10" maxlength="40"></td><td><input name="relationship_month_end[]" type="varchar" placeholder="Month end" class="login-input-label" size="10" maxlength="40"></td><td><input name="relationship_day_end[]" type="varchar" placeholder="Day end" class="login-input-label" size="10" maxlength="40"></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	  case 'skillsTableBody':
	    innerText+='<tr><td><input name="skills_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="skills_skill[]" type="varchar" placeholder="Skill" class="login-input-label" maxlength="40" list="skills_skill_list"><datalist id="skills_skill_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="skills_level[]" type="varchar" placeholder="Level" class="login-input-label" size="20" maxlength="40" list="skills_level_list"><datalist id="skills_level_list">'
	    for (i = 0; i < selectArray2.length; i++) {
		    innerText+="<option value='"+selectArray2[i]+"'>"
		}
		innerText+='</datalist></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	  case 'languagesTableBody':
	    innerText+='<tr><td><input name="languages_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="languages_language[]" type="varchar" placeholder="Language" class="login-input-label" maxlength="40" list="languages_language_list"><datalist id="languages_language_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="languages_level[]" type="varchar" placeholder="Level" class="login-input-label" size="20" maxlength="40" list="languages_level_list"><datalist id="languages_level_list">'
	    for (i = 0; i < selectArray2.length; i++) {
		    innerText+="<option value='"+selectArray2[i]+"'>"
		}
		innerText+='</datalist></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	  case 'likesTableBody':
	    innerText+='<tr><td><input name="likes_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="likes_like_status[]" type="varchar" placeholder="Like status" class="login-input-label" maxlength="40" list="likes_like_status_list"><datalist id="likes_like_status_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="likes_object_type[]" type="varchar" placeholder="Object type" class="login-input-label" size="20" maxlength="40" list="likes_object_type_list"><datalist id="likes_object_type_list">'
	    for (i = 0; i < selectArray2.length; i++) {
		    innerText+="<option value='"+selectArray2[i]+"'>"
		}
		innerText+='</datalist></td><td><input name="likes_object[]" type="varchar" placeholder="Object" class="login-input-label" size="20" maxlength="40"></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	  case 'propertyTableBody':
	    innerText+='<tr><td><input name="property_ids[]" type="varchar" placeholder="ID" class="login-input-label" size="20" maxlength="40" disabled></td><td><input name="property_property_type[]" type="varchar" placeholder="Property type" class="login-input-label" maxlength="40" list="property_property_type_list"><datalist id="property_property_type_list">';
	    for (i = 0; i < selectArray.length; i++) {
		    innerText+="<option value='"+selectArray[i]+"'>"
		}
	    innerText+='</datalist></td><td><input name="property_property_name[]" type="varchar" placeholder="Property name" class="login-input-label" size="20" maxlength="40"></td></tr>'
	    parent.innerHTML+=innerText;
	    break;
	}
}