(($) => {
    $(() => {
        new RunModules();
    });

    class RunModules {

        muduls =  [
            {'userEditSection': '.emp-profile'},
        ];
        constructor() {
            $(this.muduls).each((index,item)=>{
                const key = Object.keys(item)[0]
                const value = item[key]
                if($(value).length > 0){
                    if (typeof this[key] === 'function') {
                        this[key]();
                    } else {
                        console.error(`متد ${key} وجود ندارد.`);
                    }
                }
            })
        }

        userEditSection(){
            $('.emp-profile .group input').each((index,item)=>{

                $(item).parents().eq(1).find('a').click(e=>{
                    e.preventDefault()
                    $(item).parent().removeClass('d-none');
                    $(item).focus()
                    $(item).parents().eq(1).children().eq(1).addClass('d-none').removeClass('d-flex')

                })
                $(item).parents().eq(1).find('button').click(e=>{
                    $(item).parent().addClass('d-none')
                    $(item).parents().eq(1).children().eq(1).addClass('d-flex').removeClass('d-none')
                })
            })

            // $('#userData').submit(function (event) {
            //     event.preventDefault();
            //
            //     $.ajax({
            //         url: '/user-update', // آدرس مسیر ذخیره‌سازی
            //         type: 'POST',
            //         data: $(this).serialize(),
            //         success: function (response) {
            //             alert('اطلاعات با موفقیت به‌روزرسانی شد.');
            //         },
            //         error: function (xhr) {
            //             alert('خطا: ' + xhr.responseJSON.message);
            //         }
            //     });
            // });


            // $('#saveButton').on('click', function (e) {
            //
            //     console.log($(this).parent())
            //     // // جمع‌آوری داده‌ها از فرم
            //     // let formData = {
            //     //     userId: $('#userId').val(),
            //     //     firstName: $('#firstName').val(),
            //     //     lastName: $('#lastName').val(),
            //     //     email: $('#email').val(),
            //     //     phone: $('#phone').val(),
            //     //     mobile: $('#mobile').val(),
            //     //     jobField: $('#jobField').val()
            //     // };
            //     //
            //     // // ارسال داده‌ها به سرور با AJAX
            //     // $.ajax({
            //     //     url: '/save-form', // آدرس مسیر ذخیره‌سازی در لاراول
            //     //     type: 'POST',
            //     //     data: formData,
            //     //     success: function (response) {
            //     //         $('#message').html('<p style="color:green;">' + response.message + '</p>');
            //     //     },
            //     //     error: function (xhr) {
            //     //         $('#message').html('<p style="color:red;">خطا: ' + xhr.responseJSON.message + '</p>');
            //     //     }
            //     // });
            // });
        }
    }
})(jQuery);
