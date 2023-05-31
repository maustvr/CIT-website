/*!
    * Start Bootstrap - SB Admin v7.0.5 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2022 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


function showHideIntervention() {
    let inputOfficerIntervention = document.getElementById('inputOfficerIntervention');
    if (inputOfficerIntervention.value == "Other") {
        document.getElementById('inputOtherIntervention').style.display = 'block';
    } else {
        document.getElementById('inputOtherIntervention').style.display = 'none';
    }
}

function showHideWeapons() {
    let inputWeaponsPresent = document.getElementById('inputWeaponsPresent');
    if (inputWeaponsPresent.value == "Other") {
        document.getElementById('inputOtherWeapon').style.display = 'block';
    } else {
        document.getElementById('inputOtherWeapon').style.display = 'none';
    }
}

function showHideOutcome() {
    let inputConsumerOutcome = document.getElementById('inputConsumerOutcome');
    if (inputConsumerOutcome.value == "Other") {
        document.getElementById('inputOtherOutcome').style.display = 'block';
    } else {
        document.getElementById('inputOtherOutcome').style.display = 'none';
    }
}

//document.getElementById("addDept").addEventListener("click", displayDate);
//document.getElementById("addDept").addEventListener("click", add);
function getDynamicTextBox(value) {
    return '<input class="form-control" id="inputDepartment" name="department[]" value="">  <br>'
}


document.getElementById("addDept").addEventListener("click", add);

function add() {
    var div = document.createElement("div");
    div.innerHTML = getDynamicTextBox("");
    document.getElementById("dept").appendChild(div);

}


function getDept() {
    var county = document.getElementById('inputCounty');
    var selection = county.value;
    var department = document.getElementById('inputDepartment');
    department.value = selection;
    
}

function reload(form) {
    var val = form.county.options[form.county.options.selectedIndex].value;
    self.location = 'entry-form.php?county=' + val;

}

function update(e) {
    var val = e.options[county.selectedIndex].value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("inputDepartment").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "getDept.php?department=" + val, true);
    xmlhttp.send();
}


function get() {
    var val = document.getElementById("inputCounty").value;

    $.ajax({
        type: "POST",
        url: "getDept.php",
        data: 'county=' + val,
        //alert(data);
        success: function (response) {
            //alert(response);
            $("#inputDepartment").html(response);
        }
    });
}

