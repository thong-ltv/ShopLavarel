function actionDelete(event)
{
    event.preventDefault();//tat cai default reload lai link
    let urlRequest = $(this).data('url');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            
          $.ajax({
            type: 'GET',
            URL: urlRequest,
            success: function (data)
            {
                // console.log(data);
            },
            error: function () 
            {

            }
          });
          
        }
      })
}

$(function()
{
    $(document).on('click', '.action_delete', actionDelete);
    
});