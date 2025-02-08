(($) => {
    $(() => {
        new RunModules();
    });

    class RunModules {

        muduls = [
            {'userEditSection': '.emp-profile'},
        ];

        constructor() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(this.muduls).each((index, item) => {
                const key = Object.keys(item)[0]
                const value = item[key]
                if ($(value).length > 0) {
                    if (typeof this[key] === 'function') {
                        this[key]();
                    } else {
                        console.error(`متد ${key} وجود ندارد.`);
                    }
                }
            })
        }

        userEditSection() {
            $('.emp-profile .group input').each((index, item) => {

                $(item).parents().eq(1).find('a').click(e => {
                    e.preventDefault()
                    $(item).parent().removeClass('d-none');
                    $(item).focus().select()
                    $(item).parents().eq(1).children().eq(1).addClass('d-none').removeClass('d-flex')

                })
                $(item).parents().eq(1).find('button').click(e => {
                    $(item).parent().addClass('d-none')
                    $(item).parents().eq(1).children().eq(1).addClass('d-flex').removeClass('d-none')
                })
            })


            $('input[name=status]').on('change', function (e) {
                e.preventDefault();
                const isChecked = $('input[name=status]').is(':checked');
                const urlParams = new URLSearchParams(window.location.search);
                const id = urlParams.get('id');
                $.ajax({
                    url: '/user-change-status',
                    method: 'POST',
                    data: JSON.stringify({status: isChecked, id}),
                    contentType: 'application/json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (response) {
                        if (response.status === 200) {
                            $('#message').text(response.message).addClass(' alert alert-success mt-3  in alert-dismissible fade show')
                        } else {
                            $('#message').text(response.message).addClass('alert alert-danger mt-3  in alert-dismissible fade show')
                        }
                    },
                    error: function (error) {
                        console.error('خطا:', error);
                    }
                });
            });

            $('#imageHandle').click((e) => {
                e.preventDefault();
                $('input[name=image]').click()
            })



            $('input[name=image]').on('change', function (e) {
                e.preventDefault(); // جلوگیری از عملکرد پیش‌فرض

                // گرفتن فایل انتخاب‌شده
                const file = this.files[0];
                if (file) {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();

                        reader.onload = function (event) {
                            $('#previewImage')
                                .attr('src', event.target.result)
                                .show(); // نمایش تصویر
                        };

                        reader.readAsDataURL(file);
                    } else {
                        alert('فایل انتخابی یک تصویر نیست.');
                        $('#previewImage').hide(); // مخفی کردن تصویر
                    }
                } else {
                    // اگر هیچ فایلی انتخاب نشده باشد
                    $('#previewImage').hide(); // مخفی کردن تصویر
                }
            });



        }
    }
})(jQuery);
