//projectList Api
document.addEventListener('DOMContentLoaded', function() {
    const projectList = document.getElementsByClassName('projectList');

fetch('http://127.0.0.1:8000/api/projectList')
    .then(response => response.json())
    .then(json => {
        json.forEach(item => {
            projectList[0].innerHTML += `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.startDate}</td>
                    <td>${item.endDate}</td>
                    <td>${item.comments}</td>
                    <td><button class="deleteBtn btn-danger" data-id="${item.id}">Delete</button></td>
                    <td><button class="updateBtn btn-primary" id="editButton" data-id="${item.id}" onclick=clickFun(${item.id}) >Edit</button></td>
                </tr>
            `;
        });
    })
    .catch(error => console.error('Error fetching project list:', error));
projectList[0].addEventListener('click', event => {
    if (event.target.classList.contains('deleteBtn')) {
        const id = event.target.getAttribute('data-id');
        fetch(`http://127.0.0.1:8000/api/prolistDel/${id}`, {
            method: 'DELETE'
        })
        .then(response => {
            if (response.ok) {
                event.target.closest('tr').remove();
            } else {
                console.error('Failed to delete project');
            }
        })
        .catch(error => console.error('Error deleting project:', error));
    }
});
projectList[0].addEventListener('click', event => {
    if (event.target.classList.contains('updateBtn')) {
        const id = event.target.getAttribute('data-id');
        fetch(`http://127.0.0.1:8000/api/project/${id}`)
        .then(response => {
            if (response.ok) {
                return response.json();
            } else {
                throw new Error('Failed to fetch project details');
            }
        })
        .then(data => {
            document.getElementsByClassName('projectName').value = data.name;
        })
        .catch(error => console.error('Error fetching project details:', error));
    }
});
});

    var button = document.getElementById('editButton');
  function  clickFun(id) {
        window.location = '/projectUpd/'+id;
    }


//employeeList Api
document.addEventListener('DOMContentLoaded',function(){
    const employeetList = document.getElementsByClassName('employeeList');

    fetch('http://127.0.0.1:8000/api/employeeList')
          .then(response => response.json())
          .then(json => {
           json.forEach((item)=>{
            employeetList[0].innerHTML += `
            <tr>
              <td>${item.id}</td>
              <td>${item.emp_name}</td>
              <td>${item.email}</td>
              <td>${item.comments}</td>
              <td><button class="deleteBtnEmp btn-danger" data-id="${item.id}">Delete</button></td>
              <td><button class="updateBtnEmp btn-primary" id="editButtonEmp" data-id="${item.id}" onclick=clickEmp(${item.id}) >Edit</button></td>
              </tr>
         `
           });
          })
          .catch(error => console.error('Error fetching project list:', error));
          employeetList[0].addEventListener('click', event => {
              if (event.target.classList.contains('deleteBtnEmp')) {
                  const id = event.target.getAttribute('data-id');
                  fetch(`http://127.0.0.1:8000/api/emplistDel/${id}`, {
                      method: 'DELETE'
                  })
                  .then(response => {
                      if (response.ok) {
                          event.target.closest('tr').remove();
                      } else {
                          console.error('Failed to delete employee');
                      }
                  })
                  .catch(error => console.error('Error deleting employee:', error));
              }
          });
          employeetList[0].addEventListener('click', event => {
            if (event.target.classList.contains('updateBtnEmp')) {
                const id = event.target.getAttribute('data-id');
                fetch(`http://127.0.0.1:8000/api/emplistUpd/${id}`)
                .then(response => {
                    if (response.ok) {
                        return response.json();
                    } else {
                        throw new Error('Failed to fetch Employee details');
                    }
                })
                .then(data => {
                    document.getElementsByClassName('employee_name').value = data.name;
                })
                .catch(error => console.error('Error fetching Employee details:', error));
            }
        });
});

var button = document.getElementById('editButtonEmp');
function  clickEmp(id) {
      window.location = '/employeeUpd/'+id;
  }


//Assign Employee List
document.addEventListener('DOMContentLoaded',function(){
    const emplist = document.getElementsByClassName('empList');

    fetch('http://127.0.0.1:8000/api/empList')
       .then(response => response.json())
       .then(json => {
        var rows = document.getElementsByClassName('dataTables_empty');
    if (rows.length > 0) {
        rows[0].style.display = "none";
    }
    json.forEach((data) => {

        fetch(`http://127.0.0.1:8000/api/employee/${data.employee_id}`)
            .then(response => response.json())
            .then(employeeData => {
                // Fetch project data
                fetch(`http://127.0.0.1:8000/api/project/${data.project_id}`)
                    .then(response => response.json())
                    .then(projectData => {

                        emplist[0].innerHTML += `
                            <tr>
                                <td>${data.id}</td>
                                <td>${projectData.name}</td>
                                <td>${employeeData.emp_name}</td>
                                <td><button class="AssignDel btn-danger" data-id="${data.id}">Delete</button></td>
                                <td><button class="AssignUpd btn-primary" id="AssignUpd" data-id="${data.id}" onclick=clickAssign(${data.id}) >Edit</button></td>
                            </tr>
                        `;
                    });
            });
            emplist[0].addEventListener('click', event => {
                if (event.target.classList.contains('AssignDel')) {
                    const id = event.target.getAttribute('data-id');
                    fetch(`http://127.0.0.1:8000/api/assignEmp/${id}`, {
                        method: 'DELETE'
                    })
                    .then(response => {
                        if (response.ok) {
                            event.target.closest('tr').remove();
                        } else {
                            console.error('Failed to delete employee');
                        }
                    })
                    .catch(error => console.error('Error deleting employee:', error));
                }
            });
    });
    });

});

var button = document.getElementById('AssignUpd');
function  clickAssign(id) {
      window.location = '/assignUpd/'+id;
  }



//Assign Task
const assignTask = document.getElementsByClassName('assignTask');

fetch('http://127.0.0.1:8000/api/assignTask')
   .then(response => response.json())
   .then(json => {

    var rows = document.getElementsByClassName('dataTables_empty');
if (rows.length > 0) {
    rows[0].style.display = "none";
}
json.forEach((data) => {
    // Fetch employee data
    fetch(`http://127.0.0.1:8000/api/user/${data.user_id}`)
        .then(response => response.json())
        .then(employeeData => {
            // Fetch project data
            fetch(`http://127.0.0.1:8000/api/project/${data.project_id}`)
                .then(response => response.json())
                .then(projectData => {
                    assignTask[0].innerHTML += `
                        <tr>
                            <td>${data.id}</td>
                            <td>${projectData.name}</td>
                            <td>${employeeData.name}</td>
                            <td>${data.task}</td>
                        </tr>
                    `;
                });
        });
});

   });


//Show Daily reports Api
document.addEventListener('DOMContentLoaded', function () {
    const showReport = document.querySelector('.showReports');

    fetch('http://127.0.0.1:8000/api/dailyReport')
        .then(response => response.json())
        .then(dailyReports => {
            dailyReports.forEach((data) => {
                fetch(`http://127.0.0.1:8000/api/user/${data.user_id}`)
                    .then(response => response.json())
                    .then(user => {
                        showReport.innerHTML += `
                            <tr>
                                <td>${user.name}</td>
                                <td>${data.today_date}</td>
                                <td>${data.project_name}</td>
                                <td>${data.firstPhase}</td>
                                <td>${data.secondPhase}</td>
                                <td>${data.thirdPhase}</td>
                                <td>${data.fourthPhase}</td>
                            </tr>
                        `;
                    })
                    .catch(error => {
                        console.error('Error fetching user:', error);
                    });
            });
        })
        .catch(error => {
            console.error('Error fetching daily reports:', error);
        });
});
