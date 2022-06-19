function radioCheck(value) {

    $('#learning').empty();

    const choice_category = $('#choice_category' + value).val();

    $.get("/ajaxread", function(data, status) {

        const datas = data['data'];

        $.each(datas, function(index, value) {
            
            if(value['category'] === choice_category) {

                $('#learning').append(`
                <ul>
                    <li>${value['materi']}</ll>
                </ul>
                `);

            }
            
        });
       
        
    });
    
    
}

// function selectCategory() {

//     $('#learning').empty();

//     const choice_category = $('#choice_category').val();
//     $('#category').val(choice_category);

//     $.get("/ajaxread", function(data, status) {

//         const datas = data['data'];

//         $.each(datas, function(index, value) {
            
//             if(value['category'] === choice_category) {

//                 $('#learning').append(`
//                 <ul>
//                     <li>${value['materi']}</ll>
//                 </ul>
//                 `);

//             }
          
//         });
       
        
//     });
    
// }