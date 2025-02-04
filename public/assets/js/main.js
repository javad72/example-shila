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
                    $(item).parent().removeClass('d-none')
                    $(item).parents().eq(1).children().eq(1).addClass('d-none').removeClass('d-flex')

                })
                $(item).parents().eq(1).find('button').click(e=>{
                    $(item).parent().addClass('d-none')
                    $(item).parents().eq(1).children().eq(1).addClass('d-flex').removeClass('d-none')
                })



            })
        }
    }
})(jQuery);
