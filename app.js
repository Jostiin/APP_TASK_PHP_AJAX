$(function() {
    var edit = false;
    console.log("jquery working")
    $("#task-form").submit(function(e){
        const postData = {
            id:$('#taskid').val(),
            task: $('#task').val(),
            edit:edit,
            description: $('#description').val()
        }
        let url = edit === false ? 'add-task.php' : 'edit-task.php';
        $.post(url,postData,function(response){
           
            list_task()
        })
        e.preventDefault()
    })
    $(document).on('click','.btn_delete',function(){
       
        const postData ={
            id:$(this).attr('id')
        }
       
       
        $.post(url,postData,function(response){
          
            list_task()
        })
    })
    $(document).on('click','.elname',function(){
        const postData ={
            id:$(this).attr('id')
        }
        edit = true;
        
        $.post('edit-task.php',postData,function(response){
            let task = JSON.parse(response);
            task.forEach(element => {
                $('#task').val(element.task)
                $('#description').val(element.description)
                $('#taskid').val(element.id)
            });
        })

    })
    function list_task() {
        $.ajax({
            url:'task-list.php',
            type:'GET',
            success:function (response) {
                
                let task = JSON.parse(response)
                let template = '';
                task.forEach(element => {
                    template += `
                    <tr>
                        <td><a href='#' class="elname"  id="${element.id}" >${element.task}</a></td>
                        <td>${element.description}</td>
                        <td>
                            
                            
                            <button type="button" id="${element.id}" class="btn btn-danger btn_delete">Delete</button>
                           
                        </td>
                    </tr>
                `
                });
                $('#tbody-task').html(template)
    
            }
        })
    }
    list_task()
})