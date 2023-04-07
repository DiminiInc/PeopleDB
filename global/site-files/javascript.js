$(document).ready(function () {
    $('#personsTable').DataTable({
        "scrollY": "100%",
        "scrollX": true
    });
});

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

function addInput(e, tabName) {
    var parent = document.getElementById(tabName);
    var childRow = document.createElement("tr");
    var innerText = '';
    switch (tabName) {
        case 'contactsTableBody':
            innerText = `<td><input name="contacts_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="contacts_account[]" placeholder="Account type" class="login-input-label" list="contacts_account_list"></td>
						<td><input name="contacts_account_id[]" placeholder="Account ID" class="login-input-label"></td>
						<td><input name="contacts_status[]" placeholder="Status" class="login-input-label" list="contacts_status_list"></td>`
            break;
        case 'educationTableBody':
            innerText = `<td><input name="education_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="education_type[]" placeholder="Type" class="login-input-label" list="education_type_list"></td>
						<td><input name="education_institution[]" placeholder="Institution" class="login-input-label" list="education_institution_list"></td>
						<td><input name="education_year_start[]" placeholder="Year start" class="login-input-label"></td>
						<td><input name="education_year_end[]" placeholder="Year end" class="login-input-label"></td>
						<td><input name="education_group[]" placeholder="Group" class="login-input-label" list="education_group_list"></td>`
            break;
        case 'armyTableBody':
            innerText = `<td><input name="army_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="army_suitablility[]" placeholder="Suitability" class="login-input-label" list="army_suitability_list"></td>
						<td><input name="army_unit[]" placeholder="Unit" class="login-input-label" list="army_unit_list"></td>
						<td><input name="army_year_start[]" placeholder="Year start" class="login-input-label"></td>
						<td><input name="army_year_end[]" placeholder="Year end" class="login-input-label"></td>
						<td><input name="army_rank[]" placeholder="Rank" class="login-input-label" list="army_rank_list"></td>`
            break;
        case 'workTableBody':
            innerText = `<td><input name="work_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="work_company[]" placeholder="Company" class="login-input-label" list="work_company_list"></td>
						<td><input name="work_post[]" placeholder="Post" class="login-input-label" list="work_post_list"></td>
						<td><input name="work_year_start[]" placeholder="Year start" class="login-input-label"></td>
						<td><input name="work_year_end[]" placeholder="Year end" class="login-input-label"></td>`
            break;
        case 'relationshipTableBody':
            innerText = `<td><input name="relationship_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="relationship_person_1[]" placeholder="Person 1" class="login-input-label" list="relationship_person_list"></td>
						<td><input name="relationship_person_2[]" placeholder="Person 2" class="login-input-label" list="relationship_person_list"></td>
						<td><input name="relationship_relation_type[]" placeholder="Relation type" class="login-input-label" list="relationship_relation_type_list"></td>
						<td><input name="relationship_year_start[]" placeholder="Year start" class="login-input-label" size="10"></td>
						<td><input name="relationship_month_start[]" placeholder="Month start" class="login-input-label" size="10"></td>
						<td><input name="relationship_day_start[]" placeholder="Day start" class="login-input-label" size="10"></td>
						<td><input name="relationship_year_end[]" placeholder="Year end" class="login-input-label" size="10"></td>
						<td><input name="relationship_month_end[]" placeholder="Month end" class="login-input-label" size="10"></td>
						<td><input name="relationship_day_end[]" placeholder="Day end" class="login-input-label" size="10"></td>`
            break;
        case 'skillsTableBody':
            innerText = `<td><input name="skills_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="skills_skill[]" placeholder="Skill" class="login-input-label" list="skills_skill_list"></td>
						<td><input name="skills_level[]" placeholder="Level" class="login-input-label" list="skills_level_list"></td>`
            break;
        case 'languagesTableBody':
            innerText = `<td><input name="languages_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="languages_language[]" placeholder="Language" class="login-input-label" list="languages_language_list"></td>
						<td><input name="languages_level[]" placeholder="Level" class="login-input-label" list="languages_level_list"></td>`
            break;
        case 'likesTableBody':
            innerText = `<td><input name="likes_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="likes_like_status[]" placeholder="Like status" class="login-input-label" list="likes_like_status_list"></td>
						<td><input name="likes_object_type[]" placeholder="Object type" class="login-input-label" list="likes_object_type_list"></td>
						<td><input name="likes_object[]" placeholder="Object" class="login-input-label"></td>`
            break;
        case 'propertyTableBody':
            innerText = `<td><input name="property_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="property_property_type[]" placeholder="Property type" class="login-input-label" list="property_property_type_list"></td>
						<td><input name="property_property_name[]" placeholder="Property name" class="login-input-label"></td>`
            break;
        case 'alternativeNamesTableBody':
            innerText = `<td><input name="alternative_names_ids[]" placeholder="ID" class="login-input-label" disabled></td>
						<td><input name="alternative_names_name[]" placeholder="Name" class="login-input-label"></td>
						<td><input name="alternative_names_type[]" placeholder="Type" class="login-input-label" list="alternative_names_type_list"></td>`
            break;
    }
    childRow.innerHTML += innerText;
    parent.appendChild(childRow);
}