function actionDelete(event){
    event.preventDefault();
    let urlRequest=$(this).data('url');
    let that=$(this);
    Swal.fire({
        title: 'Bạn có chắc chắn muốn xóa?',
        text: "Bạn không thể khôi phục lại khi xóa!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: ' Xóa'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type:'GET',
                url:urlRequest,
                success:function (data){
                    if(data.code == 200){
                        that.parent().parent().remove();
                        Swal.fire(
                            'Xóa',
                            'Bạn đã xóa thành công',
                            'success'
                        )
                    }
                },
                error:function (){

                }
            });
        }
    })
}

$(function (){
    $(document).on('click','.action_delete',actionDelete);
});
