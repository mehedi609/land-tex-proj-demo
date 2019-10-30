$(document).ready(function () {
    // get flats via ajax
    function fetchFlats(id) {
        // AJAX request
        $.ajax({
            url: `/getflats/${id}`,
            type: 'get',
            success: function (response) {
                // console.log(response);

                let len = 0;
                if (response != null) {
                    len = response.length;
                }
                // console.log(len)

                if (len > 0) {
                    // Read data and create <option >
                    let value = '0';
                    let text = 'Select a Flat';
                    $('#sel_flat').append(new Option(text, value));

                    response.forEach(function (data) {
                        value = data.id;
                        text = data.flat_no;
                        // let option = `<option value="${data.id}">${data.plot_no}</option>`;
                        $('#sel_flat').append(new Option(text, value));
                    })
                } else {
                    // console.log(len)
                    let value = '0';
                    let text = 'No data found';
                    $('#sel_flat').append(new Option(text, value));
                }

            }
        });
    }

    $('#sel_plot').change(function () {
        let id = $(this).val();
        // console.log(id);

        if (id === "0"  ) {
            $('#sel_flat').find('option').remove();
            const value = '0';
            const text = 'Select a Plot From Above';

            let option = `<option value="${value}">${text}</option>`;
            // console.log(option);
            $('#sel_flat').append(new Option(text, value));
        } else {
            // Empty the dropdown
            // $('#sel_plot').find('option').not(':first').remove();
            $('#sel_flat').find('option').remove();
            fetchFlats(id)
        }
    })
})
